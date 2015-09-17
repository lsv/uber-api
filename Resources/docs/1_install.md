Install and usage
=================

### Install

Install by using composer

```json
composer require lsv/uber-api
```

OR add it to your composer.json file

```json
"require": {
    "lsv/uber-api": "^1.0"
}
```

and run

```json
composer update lsv/uber-api
```

### Usage

First you need to create a Über app - Go to [Manage apps](https://developer.uber.com/dashboard) and create your app, next copy the "server token" you will need this for a [serverToken client](2_clients.md#server-token-client).

Or redirect your user to oauth2 login, and then get a access token, so you can use a [Oauth2 client](2_clients.md#oauth2-client) 

Now we can create a client

```php
// Server token client
$serverToken = '<paste your server token here>';
$client = new Lsv\UberApi\Client\ServerToken($serverToken);

// Oauth2 client
$oauth2Token = '<paste your user access token here>';
$client = new Lsv\UberApi\Client\Oauth2($oauth2Token);

// Now you can set the client globally
Lsv\UberApi\AbstractRequest::setClient($client);

// And then run a query from a endpoint
// We just need some coordinates for this query
$coordinates = new Geocoder\Model\Coordinates\Coordinates(40.7142700, -74.0059700);
$entities = (new Lsv\UberApi\Endpoints\ProductTypes())->query($coordinates);
// In this case you will now have a array of ProductType entities

// We can also set the client pr request
$entities = (new Lsv\UberApi\Endpoints\ProductTypes($client))->query($coordinates);
```

There are many things you can do, such as get estimates, get a users history, create a request and so on
