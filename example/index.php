<?php
use League\OAuth2\Client\Provider\GenericProvider;

require __DIR__ . '/../vendor/autoload.php';

// App client ID
$client_id = '_0AxROFWtvWVdjS5JU5nOIcLrTWxendL';

// App client secret
$client_secret = '9ZxpvRgMzV6KFdYTfyaRSAZzERXxjqax_L1GHu5J';

// Create our provider
$provider = new GenericProvider([
    'clientId'                => $client_id,    // The client ID assigned to you by the provider
    'clientSecret'            => $client_secret,   // The client password assigned to you by the provider
    'response_type'           => 'code',
    'redirectUri'             => 'http://localhost:8000/',
    'urlAuthorize'            => 'https://login.uber.com/oauth/authorize',
    'urlAccessToken'          => 'https://login.uber.com/oauth/token',
    'urlResourceOwnerDetails' => 'https://sandbox-api.uber.com/v1/me'
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
    header('Location: ' . $authorizationUrl);
    exit;

} else {

    try {

        // Try to get an access token using the authorization code grant.
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);

        echo sprintf('Token: %s<br />Refresh: %s', $accessToken->getToken(), $accessToken->getRefreshToken());

    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

        // Failed to get the access token or user details.
        exit($e->getMessage());

    }

}