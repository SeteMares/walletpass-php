# WalletPassJP\PassesApi

All URIs are relative to *https://walletpass.jp/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createPass**](PassesApi.md#createpass) | **POST** /templates/{template}/passes | Create pass
[**deletePass**](PassesApi.md#deletepass) | **DELETE** /passes/{pass} | Delete pass
[**getPassApple**](PassesApi.md#getpassapple) | **GET** /passes/{pass}/pkpass | Get pass in pkpass format
[**getPassByExtID**](PassesApi.md#getpassbyextid) | **GET** /passes/external/{externalID} | Get pass by external ID
[**getPassByID**](PassesApi.md#getpassbyid) | **GET** /passes/{pass} | Get pass
[**getPassGoogle**](PassesApi.md#getpassgoogle) | **GET** /passes/{pass}/gpay | Get pass Google Play installation link
[**getPassLink**](PassesApi.md#getpasslink) | **GET** /passes/{pass}/link | Get pass download link
[**listTemplatePasses**](PassesApi.md#listtemplatepasses) | **GET** /templates/{template}/passes | Get all template passes
[**updatePass**](PassesApi.md#updatepass) | **PATCH** /passes/{pass} | Update pass

# **createPass**
> \WalletPassJP\Model\ResourceResponse createPass($template, $body)

Create pass

Create Pass record for the specified Template.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\PassesApi($key);
$template_id = 'template_example'; // Template ID
$body = new \WalletPassJP\Model\PassRequest(); // \WalletPassJP\Model\PassRequest |

try {
    $result = $apiInstance->create($template, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PassesApi->createPass: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template** | **string** | Template ID 
 **body** | [**\WalletPassJP\Model\PassRequest**](../Model/PassRequest.md)|  | [optional]

### Return type

[**\WalletPassJP\Model\ResourceResponse**](../Model/ResourceResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deletePass**
> deletePass($pass)

Delete pass

Delete Pass record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\PassesApi($key);
$pass_id = 'pass_example'; // string | Pass ID

try {
    $apiInstance->delete($pass_id);
} catch (Exception $e) {
    echo 'Exception when calling PassesApi->deletePass: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pass** | **string**| Pass ID |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPassApple**
> string getPassApple($pass)

Get pass in pkpass format

Download pkpass file.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\PassesApi($key);
$pass_id = 'pass_example'; // string | Pass ID

try {
    $result = $apiInstance->getPassApple($pass_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PassesApi->getPassApple: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pass** | **string** | Pass ID |

### Return type

**string**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/vnd.apple.pkpass, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPassByExtID**
> \WalletPassJP\Model\ResourceResponse getPassByExtID($external_id)

Get pass by external ID

Get Pass record by external ID.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\PassesApi($key);
$external_id = 'external_id_example'; // string | The custom or external ID

try {
    $result = $apiInstance->getPassByExtID($external_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PassesApi->getPassByExtID: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **external_id** | **string**| The custom or external ID |

### Return type

[**\WalletPassJP\Model\ResourceResponse**](../Model/ResourceResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPassByID**
> \WalletPassJP\Model\ResourceResponse getPassByID($pass)

Get pass

Get Pass record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\PassesApi($key);
$pass_id = 'pass_example'; // string | Pass ID

try {
    $result = $apiInstance->show($pass_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PassesApi->getPassByID: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pass** | **string**| Pass ID |

### Return type

[**\WalletPassJP\Model\ResourceResponse**](../Model/ResourceResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPassGoogle**
> \WalletPassJP\Model\Pass getPassGoogle($pass)

Get pass Google Play installation link

Get Google Play link.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\PassesApi($key);
$pass_id = 'pass_example'; // string | Pass ID

try {
    $result = $apiInstance->getPassGoogle($pass_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PassesApi->getPassGoogle: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pass** | **string** | Pass ID |

### Return type

[**\WalletPassJP\Model\Pass**](../Model/Pass.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPassLink**
> string getPassLink($pass)

Get pass download link

Get Pass distribution page link.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\PassesApi($key);
$pass_id = 'pass_example'; // string | Pass ID

try {
    $result = $apiInstance->getPassLink($pass_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PassesApi->getPassLink: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pass** | **string** | Pass ID |

### Return type

**string**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listTemplatePasses**
> \WalletPassJP\Model\CollectionResponse listTemplatePasses($template, $limit, $page)

Get all template passes

Get all Passes for the specified Template.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\PassesApi($key);
$template_id = ''; // Template ID
$limit = 15; // int | Records imit
$page = 1; // int | Page number

try {
    $result = $apiInstance->listTemplatePasses($template_id, $limit, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PassesApi->listTemplatePasses: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template** | **string** | Template ID 
 **limit** | **int**| Records imit | [optional] [default to 15]
 **page** | **int**| Page number | [optional] [default to 1]

### Return type

[**\WalletPassJP\Model\CollectionResponse**](../Model/CollectionResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updatePass**
> updatePass($pass)

Update pass

Update Pass record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\PassesApi($key);
$pass_id = 'pass_example'; // string | Pass ID
$body = []; //pass request
try {
    $apiInstance->update($pass_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling PassesApi->updatePass: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pass** | **string**| Pass ID |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

