# WalletPassJP\Client\TagsApi

All URIs are relative to *https://walletpass.jp/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteTag**](TagsApi.md#deletetag) | **DELETE** /tags/{tag} | Delete tag
[**getTagModels**](TagsApi.md#gettagmodels) | **GET** /tags/{tag} | Get associated models
[**listTags**](TagsApi.md#listtags) | **GET** /tags | Your GET endpoint

# **deleteTag**
> deleteTag($tag)

Delete tag

Delete Tag record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TagsApi($key);
$tag = 'tag_example'; // string | Tag name

try {
    $apiInstance->delete($tag);
} catch (Exception $e) {
    echo 'Exception when calling TagsApi->deleteTag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tag** | **string**| Tag name |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTagModels**
> \WalletPassJP\Client\Model\InlineResponse2009 getTagModels($tag, $limit, $page)

Get associated models

Get everything associated with this tag

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TagsApi($key);
$tag = 'tag_example'; // string | Tag name
$limit = 15; // int | Records imit
$page = 1; // int | Page number

try {
    $result = $apiInstance->getTagModels($tag, $limit, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagsApi->getTagModels: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **tag** | **string**| Tag name |
 **limit** | **int**| Records imit | [optional] [default to 15]
 **page** | **int**| Page number | [optional] [default to 1]

### Return type

[**\WalletPassJP\Client\Model\InlineResponse2009**](../Model/InlineResponse2009.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listTags**
> \WalletPassJP\Client\Model\CollectionResponse listTags()

Your GET endpoint

Get all tags.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TagsApi($key);

try {
    $result = $apiInstance->list();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TagsApi->listTags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\WalletPassJP\Client\Model\CollectionResponse**](../Model/CollectionResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

