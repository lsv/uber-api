Endpoints
=========

### Product types

(does not require Oauth2)

Which product types are availible at your current position.

Please be aware that promotion and/or experiment product types will not be returned by this.

To get the product type call this - We will set the [client](2_clients.md) and we will need some [coordinates](5_coordinates.md)

```php
$productTypes = (new Lsv\UberApi\Endpoints\ProductTypes())->query($coordinates);
```

Now ```$productTypes``` will be an array of [ProductType entities](4_entities.md#producttype)

### Estimates

##### Price estimate

To get a price estimate, you can call this.

```php
$estimate = (new Lsv\UberApi\Endpoints\Estimate\Price())->query($start_coordinates, $end_coordinates);
```

Which will return a [Price estimate entity](4_entities.md#price-estimate)

##### Time estimate

To get a time estimate, you can call this.

```php
$estimate = (new Lsv\UberApi\Endpoints\Estimate\Time())->query($start_coordinates, $end_coordinates);
```

Which will return a [Time estimate entity](4_entities.md#time-estimate)

### Promotions

(does not require oauth2)

The Promotions endpoint returns information about the promotion that will be available to a new user based on their activity's location.
These promotions do not apply for existing users.

Note: Please do not mention the promotion in your app unless you are part of our new user promotion whitelist.

```php
$promotions = (new Lsv\UberApi\Endpoints\Promotions())->query($start_coordinates, $end_coordinates);
```

Now $promotions are is a array of [Promotion entities](4_entities.md#promotion)

### User

##### User profile

(requires oauth2 client)

To get the user profile

```php
$user = (new Lsv\UberApi\Endpoints\User\Profile())->query();
```

Returns a [Profile entity](4_entities.md#user-profile)

##### User history/activity

(requires oauth2 client)

To get a user activity/history you can call this

```php
$activities = (new Lsv\UberApi\Endpoints\User\Activity())->query();
```

Returns an array of [Activity entities](4_entities.md#user-activity)

Note:

There is also the old activity (version 1.1) list availible

```php
$activities = (new Lsv\UberApi\Endpoints\User\Activity11())->query();
```

### Request

(All requests requires oauth2)

The Request endpoint allows a ride to be requested on behalf of an Uber user given their desired product, start, and end locations.

```php
$productId = 123; // See ProductType
$request = (new Lsv\UberApi\Endpoints\Request())->query($productId, $start_coordinates, $end_coordinates);
```

Or you can query it with a [ProductType entity](4_entities.md#producttype)

```php
$request = (new Lsv\UberApi\Endpoints\Request())->queryByProduct($productTypeEntity, $end_coordinates);
```

Or you can query it with a [Request estimate (see below)](#estimate)

```php
$request = (new Lsv\UberApi\Endpoints\Request())->queryByEstimate($requestEstimateEntity);
```

All three will return a [Detail entity](4_entities.md#request-detail)

But most of the details are empty, and you should query the [details (see below)](#detail) because it can take some time before a driver accepts your request.

##### Estimate

To get estimates for a fare you can call this

```php
$productId = 123; // See ProductType
$request = (new Lsv\UberApi\Endpoints\Request\Estimate())->query($productId, $start_coordinates, $end_coordinates);
```

Or you can query it with a [ProductType entity](4_entities.md#producttype)

```php
$request = (new Lsv\UberApi\Endpoints\Request\Estimate())->queryByProduct($productTypeEntity, $end_coordinates);
```

These will return a [Request estimate entity](4_entities.md#request-estimate)

##### Detail

To get details of a request, you can call

```php
$requestId = 123;
$request = (new Lsv\UberApi\Endpoints\Request\Detail())->query($requestId);
```

Or you can query it with [Detail entity](4_entities.md#request-detail)

```php
$request = (new Lsv\UberApi\Endpoints\Request())->queryByDetail($requestEntity);
```

Both will return a [Detail entity](4_entities.md#request-detail)

##### Cancel

You can also cancel a request

```php
$requestId = 123;
$request = (new Lsv\UberApi\Endpoints\Request\Cancel())->query($requestId);
```

Or you can query it with [Detail entity](4_entities.md#request-detail)

```php
$request = (new Lsv\UberApi\Endpoints\Request\Cancel())->queryByDetail($requestEntity);
```

If ```$request``` is TRUE then it its cancel, otherwise it will return a string

fx ```[202] Error```

So remember to use type check fx ```if ($request === TRUE) { echo "its cancelled"; }```

##### Map

To get a url to a map where the driver is you can query this

```php
$requestId = 123;
$request = (new Lsv\UberApi\Endpoints\Request\Map())->query($requestId);
```

Or you can query it with [Detail entity](4_entities.md#request-detail)

```php
$request = (new Lsv\UberApi\Endpoints\Request\Map())->queryByDetail($requestEntity);
```

Both will return a [Map entity](4_entities.md#map)

##### Receipt

To get a receipt details you can query this

```php
$requestId = 123;
$request = (new Lsv\UberApi\Endpoints\Request\Receipt())->query($requestId);
```

Or you can query it with [Detail entity](4_entities.md#request-detail)

```php
$request = (new Lsv\UberApi\Endpoints\Request\Receipt())->queryByDetail($requestEntity);
```

Both will return a [Receipt entity](4_entities.md#receipt)
