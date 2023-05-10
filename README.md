# Delhivery API (V1) Laravel SDK
## Laravel SDK (module) for [Delhivery API Version 1](https://delhivery-express-api-doc.readme.io/reference/introduction-1). The integration of Delhivery API in your laravel application is made easy.

## Installation

You can install the package via composer:

```bash
composer require nguyendachuy/laravel-delhivery-api
```

You can publish config file with:

```bash
php artisan vendor:publish --provider="NguyenHuy\Delhivery\DelhiveryServiceProvider" --tag="config"
```

## This is the contents of the published config file:
```php
return [
    /*
    |--------------------------------------------------------------------------
    | Delhivery Mode
    |--------------------------------------------------------------------------
    |
    | Here you can set the mode for delhivery. (staging or live)
    | default is staging
    */

    'mode' => env('DELHIVERY_MODE', 'staging'),


    /*
    |--------------------------------------------------------------------------
    | Delhivery Token
    |--------------------------------------------------------------------------
    |
    | Here you can set the token delhivery.
    | 
    */

    'token' => env('DELHIVERY_TOKEN', null),


    /*
    |--------------------------------------------------------------------------
    | Default output response type
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the output response you need.
    | 
    | Supported: "collection" , "object", "array"
    | 
    */

    'responseType' => env('DELHIVERY_RESPONSE_TYPE', 'collection'),
];
```
## Pincode Serviceability

https://delhivery-express-api-doc.readme.io/reference/1-pincode-servicability-api
```php

    $response =  Delhivery::pincode()->getLocations([
        'filter_codes' => 400064
    ]);

```
## WayBill Management

### Bulk WayBill
https://delhivery-express-api-doc.readme.io/reference/bulk-waybill
```php

    $response =  Delhivery::waybill()->bulk([
        'count' => 5
    ]);

```
### Fetch WayBill(generate singel waybill)
https://delhivery-express-api-doc.readme.io/reference/bulk-waybill
```php

    $response =  Delhivery::waybill()->fetch([
        'client_name' => ''
    ]);

```

## Orders

#### Create order
https://delhivery-express-api-doc.readme.io/reference/order-creation-api
```php
$orderDetails = [
    // refer above url for required parameters 
    'shipments' => [...],
    'pickup_location' => [...],
];
    $response =  Delhivery::order()->create($orderDetails);

```

### Update order
https://delhivery-express-api-doc.readme.io/reference/testedit-order
 ```php   
$orderDetails = [
    // refer above url for required parameters 
    'tax_value' => [12345,123456 ]
    'shipment_width' => 10,
    'product_details' => '',
    'add' => ''
];
$response =  Delhivery::order($token)->edit($orderDetails);
```

 #### Cancel an order
https://delhivery-express-api-doc.readme.io/reference/cancel-order-api
```php
$waybill = 'waybill no'; 
$response =  Delhivery::order()->cancel(['waybill' => $waybill]);
```

 #### Tracking order
https://delhivery-express-api-doc.readme.io/reference/order-tracking-api
```php
$waybill = 'waybill no'; 
$response =  Delhivery::order()->track(['waybill' => $waybill]);
```

## Invoice Management
https://delhivery-express-api-doc.readme.io/reference/invoice-shipping-charge-api
```php
$response =  Delhivery::invoice()->getLocations([]);
```

## Packing Slip Management
https://delhivery-express-api-doc.readme.io/reference/packing-slip-api

```php
$response =  Delhivery::packingSlip()->print($waybill);
```

## Pickup Scheduling Management
https://delhivery-express-api-doc.readme.io/reference/pickup-request-creation-api

```php
$response =  Delhivery::pickup()->request([]);
```

## Warehouse Management

### Client Warehouse Creation
https://delhivery-express-api-doc.readme.io/reference/clientwarehouse-create-api

```php
$response =  Delhivery::warehouse()->create([]);
```

### Client Warehouse Edit
https://delhivery-express-api-doc.readme.io/reference/clientwarehouse-edit-api

```php
$response =  Delhivery::warehouse()->edit([]);
```

## NDR

https://delhivery-express-api-doc.readme.io/reference/asynchronous-ndr-package-action-api

### NDR API
```php
$response =  Delhivery::ndr()->update([]);
```

### Get UPL id status
```php
$response =  Delhivery::ndr()->get($upl);
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [NguyenDacHuy](https://github.com/nguyendachuy)
- [All Contributors](../../contributors)

## Please feel free to contact me if you find any bug or create an issue for that!.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
