# WalletPassJP\ProjectsApi

All URIs are relative to *https://walletpass.jp/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createProject**](ProjectsApi.md#createproject) | **POST** /projects | Create new Project
[**deleteProject**](ProjectsApi.md#deleteproject) | **DELETE** /projects/{project} | Delete Project
[**getProjectByID**](ProjectsApi.md#getprojectbyid) | **GET** /projects/{project} | Get Project
[**listProjects**](ProjectsApi.md#listprojects) | **GET** /projects | Get a list of created Projects
[**updateProject**](ProjectsApi.md#updateproject) | **PATCH** /projects/{project} | Update Project

# **createProject**
> \WalletPassJP\Model\ResourceResponse createProject($body)

Create new Project

Create new Project record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\ProjectsApi($key);
$body = new \WalletPassJP\Model\ProjectRequest(); // \WalletPassJP\Model\ProjectRequest |

try {
    $result = $apiInstance->create($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->createProject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\WalletPassJP\Model\ProjectRequest**](../Model/ProjectRequest.md)|  | [optional]

### Return type

[**\WalletPassJP\Model\ResourceResponse**](../Model/ResourceResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteProject**
> deleteProject($project)

Delete Project

Delete Project record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\ProjectsApi($key);
$project_id = 'project_example'; // string | Project id

try {
    $apiInstance->delete($project_id);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->deleteProject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project** | **string**| Project id |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProjectByID**
> \WalletPassJP\Model\ResourceResponse getProjectByID($project)

Get Project record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\ProjectsApi($key);
$project_id = 'project_example'; // string | Project id

try {
    $result = $apiInstance->show($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjectByID: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project** | **string**| Project |

### Return type

[**\WalletPassJP\Model\ResourceResponse**](../Model/ResourceResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listProjects**
> \WalletPassJP\Model\CollectionResponse listProjects($limit, $page, $tags)

Get a list of created Projects

Get all Projects records.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\ProjectsApi($key);
$limit = 15; // int | Records imit
$page = 1; // int | Page number
$tags = ['tags_example']; // string[] | Filter by tags

try {
    $result = $apiInstance->list($limit, $page, $tags);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->list: ', $e->getMessage(), PHP_EOL;
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

# **updateProject**
> updateProject($project, $body)

Update Project

Update Project record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\ProjectsApi($key);
$project_id = 'project_example'; // string | Project id
$body = new \WalletPassJP\Model\ProjectRequest(); // \WalletPassJP\Model\ProjectRequest |

try {
    $apiInstance->update($project_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->updateProject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project** | **string**| Project |
 **body** | [**\WalletPassJP\Model\ProjectRequest**](../Model/ProjectRequest.md)|  | [optional]

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

