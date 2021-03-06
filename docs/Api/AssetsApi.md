# WalletPassJP\AssetsApi

All URIs are relative to *https://walletpass.jp/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteAsset**](AssetsApi.md#deleteasset) | **DELETE** /assets/{asset} | Delete Asset
[**getAssetByID**](AssetsApi.md#getassetbyid) | **GET** /assets/{asset} | Get Asset by ID
[**listAssets**](AssetsApi.md#listassets) | **GET** /assets | Get all assets
[**updateAsset**](AssetsApi.md#updateasset) | **PATCH** /assets/{asset} | Update Asset
[**uploadAsset**](AssetsApi.md#uploadasset) | **POST** /assets | Upload an asset

# **deleteAsset**
> deleteAsset($asset)

Delete Asset

Delete an asset.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\AssetsApi($key);
$asset_id = 'asset_example'; // Asset ID

try {
    $apiInstance->delete($asset_id);
} catch (Exception $e) {
    echo 'Exception when calling AssetsApi->deleteAsset: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **asset** | **string** | Asset ID |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAssetByID**
> \WalletPassJP\Model\Asset getAssetByID($asset)

Get Asset by ID

Get Asset record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\AssetsApi($key);
$asset_id = 'asset_example'; // Asset ID

try {
    $result = $apiInstance->show($asset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssetsApi->getAssetByID: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **asset** | **string** | Asset ID |

### Return type

[**\WalletPassJP\Model\Asset**](../Model/Asset.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listAssets**
> \WalletPassJP\Model\CollectionResponse listAssets($limit, $page, $tags)

Get all assets

Get all Assets records.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\AssetsApi($key);
$limit = 15; // int | Records imit
$page = 1; // int | Page number
$tags = ['tags_example']; // string[] | Filter by tags

try {
    $result = $apiInstance->list($limit, $page, $tags);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssetsApi->listAssets: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **limit** | **int**| Records imit | [optional] [default to 15]
 **page** | **int**| Page number | [optional] [default to 1]
 **tags** | **string[]** | Filter by tags | [optional]

### Return type

[**\WalletPassJP\Model\CollectionResponse**](../Model/CollectionResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateAsset**
> updateAsset($asset, $body)

Update Asset

Use to attach tags to an Asset.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\AssetsApi($key);
$asset_id = 'asset_example'; // Asset ID
$body = new \WalletPassJP\Model\Body1(); // \WalletPassJP\Model\Body1 |

try {
    $apiInstance->update($asset, $body);
} catch (Exception $e) {
    echo 'Exception when calling AssetsApi->updateAsset: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **asset** | **string** | Asset ID |
 **body** | [**\WalletPassJP\Model\Body1**](../Model/Body1.md)|  | [optional]

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadAsset**
> \WalletPassJP\Model\Asset uploadAsset($file, $type, $name, $tags)

Upload an asset

| Asset Type    |  Used in       | Dimensions |---------------|----------------------------------|----------------------------------| | icon          | Required for all types of Apple passes | 87x87 | logo          | Must be square. Logo is circle-cropped by Google Pay | 660x660, a 15% safety margin is recommended | apple_logo    | Can be used for Apple passes without logo_text and where square logo is unwanted (FIXME) | maximum 480x150 | strip         | Coupon, Gift Card, Event Ticket, Stamp and Membership Card. Used as `hero` in Google Pay and in the dialog box when installing a pass | 1125x294 for Event Tickets or 1125x369 for other types of passes | thumbnail     | Event tickets and Membership Cards | 270x270 The aspect ratio should be in the range of 2:3 to 3:2, otherwise the image is cropped | background    | Only for Event Tickets | 360x440 | footer        | Only for Boarding Passes | 858x45  Preferred image format is `png` since it supports transparency.  Maximum upload size is 1 Megabyte (1024 Kb).  **Reference**  * [Google Pay, brand guideline](https://developers.google.com/pay/passes/guides/get-started/api-guidelines/brand-guidelines) * [Apple Wallet, pass design guide](https://developer.apple.com/library/archive/documentation/UserExperience/Conceptual/PassKit_PG/Creating.html#//apple_ref/doc/uid/TP40012195-CH4-SW1)

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\AssetsApi($key);
$file = 'file_example'; // string |
$type = 'type_example'; // string |
$name = 'name_example'; // string |
$tags = ['tags_example']; // string[] |

try {
    $result = $apiInstance->upload($file, $type, $name, $tags);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssetsApi->uploadAsset: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **string**|  | [optional]
 **type** | **string**|  | [optional]
 **name** | **string**|  | [optional]
 **tags** | **string[]**|  | [optional]

### Return type

[**\WalletPassJP\Model\Asset**](../Model/Asset.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

