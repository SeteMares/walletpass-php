# WalletPassJP\Client\TemplatesApi

All URIs are relative to *https://walletpass.jp/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**copyTemplate**](TemplatesApi.md#copytemplate) | **POST** /templates/{template} | Copy template
[**createPass**](TemplatesApi.md#createpass) | **POST** /templates/{template}/passes | Create pass
[**createTemplate**](TemplatesApi.md#createtemplate) | **POST** /templates | Create template
[**deleteTemplate**](TemplatesApi.md#deletetemplate) | **DELETE** /templates/{template} | Delete template
[**getTemplateByID**](TemplatesApi.md#gettemplatebyid) | **GET** /templates/{template} | Get template
[**getTemplateFields**](TemplatesApi.md#gettemplatefields) | **GET** /templates/{template}/fields | Get all template fields
[**listTemplatePasses**](TemplatesApi.md#listtemplatepasses) | **GET** /templates/{template}/passes | Get all template passes
[**listTemplates**](TemplatesApi.md#listtemplates) | **GET** /templates | Get all templates
[**updateTemplate**](TemplatesApi.md#updatetemplate) | **PATCH** /templates/{template} | Update template

# **copyTemplate**
> \WalletPassJP\Client\Model\ResourceResponse copyTemplate($template, $body)

Create a copy of a specified Template record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TemplatesApi($key);
$template_id = '';

try {
    $result = $apiInstance->copyTemplate($template_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->copyTemplate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template** | string | Template ID 

### Return type

[**\WalletPassJP\Client\Model\ResourceResponse**](../Model/ResourceResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createPass**
> \WalletPassJP\Client\Model\ResourceResponse createPass($template, $body)

Create Pass record for the specified Template.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TemplatesApi($key);
$template_id = ''; // Template ID
$body = new \WalletPassJP\Client\Model\PassRequest(); // \WalletPassJP\Client\Model\PassRequest |

try {
    $result = $apiInstance->createPass($template, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->createPass: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template** | string | Template ID 
 **body** | [**\WalletPassJP\Client\Model\PassRequest**](../Model/PassRequest.md)|  | [optional]

### Return type

[**\WalletPassJP\Client\Model\ResourceResponse**](../Model/ResourceResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createTemplate**
> \WalletPassJP\Client\Model\ResourceResponse createTemplate($body)

Create template

Create new Template.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TemplatesApi($key);
$body = new \WalletPassJP\Client\Model\TemplateRequest(); // \WalletPassJP\Client\Model\TemplateRequest |

try {
    $result = $apiInstance->create($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->createTemplate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\WalletPassJP\Client\Model\TemplateRequest**](../Model/TemplateRequest.md)|  | [optional]

### Return type

[**\WalletPassJP\Client\Model\ResourceResponse**](../Model/ResourceResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteTemplate**
> deleteTemplate($template)

Delete template

Delete Template record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TemplatesApi($key);
$template_id = ''; // Template ID

try {
    $apiInstance->delete($template_id);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->deleteTemplate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template** | string | Template ID 

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTemplateByID**
> \WalletPassJP\Client\Model\ResourceResponse getTemplateByID($template)

Get template

Get Template record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TemplatesApi($key);
$template_id = ''; // Template ID

try {
    $result = $apiInstance->show($template);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->getTemplateByID: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template** | string | Template ID 

### Return type

[**\WalletPassJP\Client\Model\ResourceResponse**](../Model/ResourceResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTemplateFields**
> \WalletPassJP\Client\Model\CollectionResponse getTemplateFields($template)

Get all template fields

Get all fields for the specified Template.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TemplatesApi($key);
$template_id = ''; // Template ID

try {
    $result = $apiInstance->getTemplateFields($template);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->getTemplateFields: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template** | string | Template ID 

### Return type

[**\WalletPassJP\Client\Model\CollectionResponse**](../Model/CollectionResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listTemplatePasses**
> \WalletPassJP\Client\Model\CollectionResponse listTemplatePasses($template, $limit, $page)

Get all template passes

Get all Passes for the specified Template.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TemplatesApi($key);
$template_id = ''; // Template ID
$limit = 15; // int | Records imit
$page = 1; // int | Page number

try {
    $result = $apiInstance->listTemplatePasses($template, $limit, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->listTemplatePasses: ',
        $e->getMessage(),
        PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template** | string | Template ID 
 **limit** | **int**| Records imit | [optional] [default to 15]
 **page** | **int**| Page number | [optional] [default to 1]

### Return type

[**\WalletPassJP\Client\Model\CollectionResponse**](../Model/CollectionResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listTemplates**
> \WalletPassJP\Client\Model\CollectionResponse listTemplates($limit, $page, $tags)

Get all templates

Get all Templates records.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TemplatesApi($key);
$limit = 15; // int | Records imit
$page = 1; // int | Page number
$tags = ['tags_example']; // string[] | Filter by tags

try {
    $result = $apiInstance->list($limit, $page, $tags);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->listTemplates: ', $e->getMessage(), PHP_EOL;
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

[**\WalletPassJP\Client\Model\CollectionResponse**](../Model/CollectionResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateTemplate**
> updateTemplate($template, $body)

Update template

Update Template record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Client\Api\TemplatesApi($key);
$template_id = ''; // Template ID
$body = new \WalletPassJP\Client\Model\TemplateRequest(); // \WalletPassJP\Client\Model\TemplateRequest |

try {
    $apiInstance->update($template, $body);
} catch (Exception $e) {
    echo 'Exception when calling TemplatesApi->updateTemplate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template** | string | Template ID 
 **body** | [**\WalletPassJP\Client\Model\TemplateRequest**](../Model/TemplateRequest.md)|  | [optional]

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

