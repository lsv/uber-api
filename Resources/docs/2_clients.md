Clients
=======

# Server token client

First you need to create a Über app - Go to [Manage apps](https://developer.uber.com/dashboard) and create your app.

Now copy the "server token" which we will need to create a server token client.

```php
// Create a server token client
$serverToken = '<paste your server token here>';
$client = new Lsv\UberApi\Client\ServerToken($serverToken);

// Now we can set the client globally by running
Lsv\UberApi\AbstractRequest::setClient($client);

// Or we can set the client pr request fx
$coordinates = new Geocoder\Model\Coordinates\Coordinates(40.7142700, -74.0059700);
$entities = (new Lsv\UberApi\Endpoints\ProductTypes($client))->query($coordinates);

# Oauth2 client

The Oauth2 client gets you access to create Über request for the logged in user.

You are responsible to create the Oauth2 access token and then paste the access token to

```php
$accessToken = '<paste the access token here>';
$client = new Lsv\UberApi\Client\Oauth2($accessToken);
```

You can use this example to redirect to get the access token for the user

First you need to get the client id and client secret from your Über app.

```php
use League\OAuth2\Client\Provider\GenericProvider;

require __DIR__.'/../vendor/autoload.php';

// App client ID
$client_id = '<paste the client id here>';

// App client secret
$client_secret = '<paste the client secret here>';

// Redirect Url
$redirectUrl = '<your url to where the Über should redirect back to you>';

// Create our provider
$provider = new GenericProvider([
    'clientId'                => $client_id,    // The client ID assigned to you by the provider
    'clientSecret'            => $client_secret,   // The client password assigned to you by the provider
    'response_type'           => 'code',
    'scopes'                   => 'profile history request_receipt request',
    'redirectUri'             => $redirectUrl,
    'urlAuthorize'            => 'https://login.uber.com/oauth/authorize',
    'urlAccessToken'          => 'https://login.uber.com/oauth/token',
    'urlResourceOwnerDetails' => 'https://sandbox-api.uber.com/v1/me',
]);

// If we don't have an authorization code then get one
if (!isset($_GET['code'])) {

    // Fetch the authorization URL from the provider; this returns the
    // urlAuthorize option and generates and applies any necessary parameters
    // (e.g. state).
    $authorizationUrl = $provider->getAuthorizationUrl();

    // Get the state generated for you and store it to the session.
    $_SESSION['oauth2state'] = $provider->getState();

    // Redirect the user to the authorization URL.
    header('Location: '.$authorizationUrl);
    exit;
} else {
    try {

        // Try to get an access token using the authorization code grant.
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code'],
        ]);

        echo sprintf('Token: %s<br />Refresh: %s', $accessToken->getToken(), $accessToken->getRefreshToken());
    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

        // Failed to get the access token or user details.
        exit($e->getMessage());
    }
}
```
