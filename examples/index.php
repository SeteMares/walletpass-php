<?php
require_once __DIR__ . '/vendor/autoload.php';
use WalletPassJP\Client\Configuration;
use WalletPassJP\Client\Api\AssetsApi;
use WalletPassJP\Client\Api\CertificatesApi;
use WalletPassJP\Client\Api\TemplatesApi;
use WalletPassJP\Client\Api\ProjectsApi;

$key = 'key';
$config = (new Configuration())->setEndpoint('https://walletpass.jp/api/v1');

// $apiInstance = new AssetsApi($key, $config);
//
// try {
//     $result = $apiInstance->show('909ce13a-4e0f-4225-8048-21ffb9ffce55');
//     print_r($result);
// } catch (Exception $e) {
//     echo 'Exception when calling AssetsApi->getAssetByID: ', $e->getMessage(), PHP_EOL;
// }

// $apiInstance = new AssetsApi($key);
// $limit = 15; // int | Records imit
// $page = 1; // int | Page number
// $tags = []; // string[] | Filter by tags
//
// try {
//     $result = $apiInstance->list($limit, $page, $tags);
//     print_r($result);
//     print_r($result->meta);
// } catch (Exception $e) {
//     echo 'Exception when calling AssetsApi->list: ', $e->getMessage(), PHP_EOL;
// }

// $apiInstance = new CertificatesApi($key, $config);
// $limit = 15; // int | Records imit
// $page = 1; // int | Page number
// $tags = []; // string[] | Filter by tags
//
// try {
//     $result = $apiInstance->list($limit, $page, $tags);
//     print_r($result);
//     print_r($result->meta);
// } catch (Exception $e) {
//     echo 'Exception when calling CertificatesApi->list: ', $e->getMessage(), PHP_EOL;
// }

// $apiInstance = new TemplatesApi($key, $config);
// $limit = 15; // int | Records imit
// $page = 1; // int | Page number
// $tags = []; // string[] | Filter by tags
//
// try {
//     $result = $apiInstance->list($limit, $page, $tags);
//     print_r($result);
//     print_r($result->meta);
// } catch (Exception $e) {
//     echo 'Exception when calling TemplatesApi->list: ', $e->getMessage(), PHP_EOL;
// }

$apiInstance = new ProjectsApi($key, $config);
$limit = 15; // int | Records imit
$page = 1; // int | Page number
$tags = []; // string[] | Filter by tags

try {
    $result = $apiInstance->list($limit, $page, $tags);
    print_r($result);
    print_r($result->meta);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->list: ', $e->getMessage(), PHP_EOL;
}

?>
