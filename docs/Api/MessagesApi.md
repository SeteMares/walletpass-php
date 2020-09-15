# WalletPassJP\MessagesApi

All URIs are relative to *https://walletpass.jp/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createMessage**](MessagesApi.md#createmessage) | **POST** /messages | Create a Message
[**listMessages**](MessagesApi.md#listmessages) | **GET** /messages | Get all messages

# **createMessage**
> \WalletPassJP\Model\Message createMessage($body)

Create a Message

Schedule custom notification sending

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\MessagesApi($key);
$body = new \WalletPassJP\Model\MessageRequest(); // \WalletPassJP\Model\MessageRequest |

try {
    $result = $apiInstance->create($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagesApi->createMessage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\WalletPassJP\Model\MessageRequest**](../Model/MessageRequest.md)|  | [optional]

### Return type

[**\WalletPassJP\Model\Message**](../Model/Message.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listMessages**
> \WalletPassJP\Model\CollectionResponse listMessages($limit, $page)

Get all messages

Get all Message records.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\MessagesApi($key);
$limit = 15; // int | Records imit
$page = 1; // int | Page number

try {
    $result = $apiInstance->list($limit, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagesApi->listMessages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
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

