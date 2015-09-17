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

Which will return a [Price estimate entity](4_entities.md#price_estimate)

##### Time estimate

To get a time estimate, you can call this.

```php
$estimate = (new Lsv\UberApi\Endpoints\Estimate\Time())->query($start_coordinates, $end_coordinates);
```

Which will return a [Time estimate entity](4_entities.md#time_estimate)

### Estimates

### Promotions

### User

### User history

### Requests
