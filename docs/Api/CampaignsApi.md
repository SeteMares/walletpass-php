# WalletPassJP\Client\CampaignsApi

All URIs are relative to *https://walletpass.jp/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createCampaign**](CampaignsApi.md#createcampaign) | **POST** /campaigns | Create new Campaign
[**deleteCampaign**](CampaignsApi.md#deletecampaign) | **DELETE** /campaigns/{campaign} | Delete Campaign
[**getCampaignByID**](CampaignsApi.md#getcampaignbyid) | **GET** /campaigns/{campaign} | Get Campaign
[**listCampaigns**](CampaignsApi.md#listcampaigns) | **GET** /campaigns | Get a list of created Campaigns
[**updateCampaign**](CampaignsApi.md#updatecampaign) | **PATCH** /campaigns/{campaign} | Update Campaign

# **createCampaign**
> \WalletPassJP\Client\Model\InlineResponse2014 createCampaign($body)

Create new Campaign

Create new Campaign record.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: Bearer
    $config = WalletPassJP\Client\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new WalletPassJP\Client\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \WalletPassJP\Client\Model\CampaignRequest(); // \WalletPassJP\Client\Model\CampaignRequest | 

try {
    $result = $apiInstance->createCampaign($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->createCampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\WalletPassJP\Client\Model\CampaignRequest**](../Model/CampaignRequest.md)|  | [optional]

### Return type

[**\WalletPassJP\Client\Model\InlineResponse2014**](../Model/InlineResponse2014.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteCampaign**
> deleteCampaign($campaign)

Delete Campaign

Delete Campaign record.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: Bearer
    $config = WalletPassJP\Client\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new WalletPassJP\Client\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign = "campaign_example"; // string | Campaign

try {
    $apiInstance->deleteCampaign($campaign);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->deleteCampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **campaign** | **string**| Campaign |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCampaignByID**
> \WalletPassJP\Client\Model\InlineResponse2014 getCampaignByID($campaign)

Get Campaign

Get Campaign record.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: Bearer
    $config = WalletPassJP\Client\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new WalletPassJP\Client\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign = "campaign_example"; // string | Campaign

try {
    $result = $apiInstance->getCampaignByID($campaign);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->getCampaignByID: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **campaign** | **string**| Campaign |

### Return type

[**\WalletPassJP\Client\Model\InlineResponse2014**](../Model/InlineResponse2014.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listCampaigns**
> \WalletPassJP\Client\Model\CollectionResponse listCampaigns($limit, $page, $tags)

Get a list of created Campaigns

Get all Campaigns records.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: Bearer
    $config = WalletPassJP\Client\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new WalletPassJP\Client\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 15; // int | Records imit
$page = 1; // int | Page number
$tags = array("tags_example"); // string[] | Filter by tags

try {
    $result = $apiInstance->listCampaigns($limit, $page, $tags);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->listCampaigns: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **limit** | **int**| Records imit | [optional] [default to 15]
 **page** | **int**| Page number | [optional] [default to 1]
 **tags** | [**string[]**](../Model/string.md)| Filter by tags | [optional]

### Return type

[**\WalletPassJP\Client\Model\CollectionResponse**](../Model/CollectionResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateCampaign**
> updateCampaign($campaign, $body)

Update Campaign

Update Campaign record.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
    // Configure HTTP bearer authorization: Bearer
    $config = WalletPassJP\Client\Configuration::getDefaultConfiguration()
    ->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new WalletPassJP\Client\Api\CampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign = "campaign_example"; // string | Campaign
$body = new \WalletPassJP\Client\Model\CampaignRequest(); // \WalletPassJP\Client\Model\CampaignRequest | 

try {
    $apiInstance->updateCampaign($campaign, $body);
} catch (Exception $e) {
    echo 'Exception when calling CampaignsApi->updateCampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **campaign** | **string**| Campaign |
 **body** | [**\WalletPassJP\Client\Model\CampaignRequest**](../Model/CampaignRequest.md)|  | [optional]

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

