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

