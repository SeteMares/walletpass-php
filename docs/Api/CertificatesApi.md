# WalletPassJP\CertificatesApi

All URIs are relative to *https://walletpass.jp/api/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteCertificate**](CertificatesApi.md#deletecertificate) | **DELETE** /certificates/{certificate} | Delete certificate
[**getCSR**](CertificatesApi.md#getcsr) | **GET** /certificates/csr | Get CSR
[**getCertificateByID**](CertificatesApi.md#getcertificatebyid) | **GET** /certificates/{certificate} | Get certificate by ID
[**listCertificates**](CertificatesApi.md#listcertificates) | **GET** /certificates | Get all certificates
[**updateCertificate**](CertificatesApi.md#updatecertificate) | **PATCH** /certificates/{certificate} | Update Certificate
[**uploadCertificate**](CertificatesApi.md#uploadcertificate) | **POST** /certificates/upload | Upload Certificate
[**uploadP12Certificate**](CertificatesApi.md#uploadp12certificate) | **POST** /certificates | Upload new certificate

# **deleteCertificate**
> deleteCertificate($certificate)

Delete certificate

Delete a certificate.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\CertificatesApi($key);
$certificate_id = '';

try {
    $apiInstance->delete($certificate_id);
} catch (Exception $e) {
    echo 'Exception when calling CertificatesApi->deleteCertificate: ',
        $e->getMessage(),
        PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **certificate** | **string**| Certificate ID |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCSR**
> object getCSR()

Get Certificate Signing Request

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

$apiInstance = new WalletPassJP\Api\CertificatesApi();

try {
    $result = $apiInstance->getCSR();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CertificatesApi->getCSR: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: text/plain, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCertificateByID**
> \WalletPassJP\Model\Certificate getCertificateByID($certificate)

Get certificate by ID

Get Certificate record.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\CertificatesApi($key);
$certificate_id = 'certificate_example'; // Certificate ID

try {
    $result = $apiInstance->show($certificate_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CertificatesApi->getCertificateByID: ',
        $e->getMessage(),
        PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **certificate** | **string**| Certificate ID |

### Return type

[**\WalletPassJP\Model\Certificate**](../Model/Certificate.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **listCertificates**
> \WalletPassJP\Model\CollectionResponse listCertificates($limit, $page)

Get all certificates

Get all Certificates records.

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\CertificatesApi($key);
$limit = 15; // int | Records imit
$page = 1; // int | Page number

try {
    $result = $apiInstance->list($limit, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CertificatesApi->listCertificates: ',
        $e->getMessage(),
        PHP_EOL;
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

# **updateCertificate**
> updateCertificate($certificate, $body)

Update Certificate

Set this certificate as a new default

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

$apiInstance = new WalletPassJP\Api\CertificatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$certificate_id = 'certificate_example'; // Certificate ID
$body = new \WalletPassJP\Model\Body2(); // \WalletPassJP\Model\Body2 |

try {
    $apiInstance->update($certificate, $body);
} catch (Exception $e) {
    echo 'Exception when calling CertificatesApi->updateCertificate: ',
        $e->getMessage(),
        PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **certificate** | **string**| Certificate ID |
 **body** | [**\WalletPassJP\Model\Body2**](../Model/Body2.md)|  | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadCertificate**
> \WalletPassJP\Model\Certificate uploadCertificate($file)

Upload Certificate

Upload apple pass type certificate in .cer format

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\CertificatesApi($key);
$file = 'file_example'; // string |

try {
    $result = $apiInstance->upload($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CertificatesApi->uploadCertificate: ',
        $e->getMessage(),
        PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **string****string**|  | [optional]

### Return type

[**\WalletPassJP\Model\Certificate**](../Model/Certificate.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadP12Certificate**
> \WalletPassJP\Model\Certificate uploadP12Certificate($body)

Upload new certificate

When adding a certificate, you must paste the contents of your p12 certificate into the certificate field in the request payload. You can get the contents of your p12 file with the two following commands: ```bash openssl base64 -in wallet-prod.p12 -out wallet-prod.pem cat wallet-prod.pem | tr -d \"\\n\\r\" | less ```

### Example
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
// Configure HTTP bearer authorization: Bearer
$key = 'YOUR_ACCESS_TOKEN';

$apiInstance = new WalletPassJP\Api\CertificatesApi($key);
$body = new \WalletPassJP\Model\CertificateRequest(); // \WalletPassJP\Model\CertificateRequest |

try {
    $result = $apiInstance->uploadP12Certificate($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CertificatesApi->uploadP12Certificate: ',
        $e->getMessage(),
        PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\WalletPassJP\Model\CertificateRequest**](../Model/CertificateRequest.md)|  | [optional]

### Return type

[**\WalletPassJP\Model\Certificate**](../Model/Certificate.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

