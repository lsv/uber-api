Endpoints
=========

### Product types

(does not require Oauth2)

Which product types are availible at your current position.

Please be aware that promotion and/or experiment product types will not be returned by this.

To get the product type call this - We will set the [client](2_clients.md) and we will need some [coordinates](8_coordinates.md)

```php
$productTypes = (new Lsv\UberApi\Endpoints\ProductTypes())->query($coordinates);
```

Now ```$productTypes``` will be an array of [ProductType entities](9_entities.md#producttype)

### Estimates

### Promotions

### User

### User history

### Requests
