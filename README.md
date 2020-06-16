# WalletPass-php
WALLET PASS API enables you to issue mobile wallet passes for Apple Wallet, Google Pay and integrate them into your app or cloud system.

## Prerequisites

Your passes for Apple Wallet must be cryptographically signed with a certificate from your Apple Developer Account.
To obtain your pass signing certificate follow the following:
  1. Access your Apple Developer account.
  2. In Certificates, Identifiers & Profiles, select Identifiers.
  3. Under Identifiers, select Pass Type IDs.
  4. Select the pass type identifier, then click Edit. If there is a certificate listed under Production Certificates, click the Download button next to it. If there are no certificates listed, click the Create Certificate button, then follow the instructions to create a pass signing certificate.
  5. You can get CSR from `/certificates/csr` endpoint. 
  6. Upload obtained certificate to /certificates/upload endpoint.

- API version: 1.0

## Requirements

PHP 7.2 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/setemares/walletpass-php.git"
    }
  ],
  "require": {
    "setemares/walletpass-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
require_once('/path/to/walletpass-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once __DIR__ . '/vendor/autoload.php';
use WalletPassJP\Configuration;
use WalletPassJP\Client;

$key = 'YOUR_API_KEY';
$config = (new Configuration())->setEndpoint('https://walletpass.jp/api/v1');

$apiInstance = new Client(
    $key,
    // config is optional
    $config,
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

$asset_id = 'asset id';

try {
    $result = $apiInstance->assets()->show($asset_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssetsApi->show: ', $e->getMessage(), PHP_EOL;
}

$limit = 15; // int | Records imit
$page = 1; // int | Page number
$tags = []; // string[] | Filter by tags

try {
    $result = $apiInstance->assets()->list($limit, $page, $tags);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssetsApi->list: ', $e->getMessage(), PHP_EOL;
}

$asset_id = 'asset id'; // Asset ID
$body = new \WalletPassJP\Model\Body1(); // \WalletPassJP\Model\Body1 |

try {
    $apiInstance->assets()->update($asset_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling AssetsApi->update: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentation for API Endpoints

All URIs are relative to *https://walletpass.jp/api/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AssetsApi* | [**deleteAsset**](docs/Api/AssetsApi.md#deleteasset) | **DELETE** /assets/{asset} | Delete Asset
*AssetsApi* | [**getAssetByID**](docs/Api/AssetsApi.md#getassetbyid) | **GET** /assets/{asset} | Get Asset by ID
*AssetsApi* | [**listAssets**](docs/Api/AssetsApi.md#listassets) | **GET** /assets | Get all assets
*AssetsApi* | [**updateAsset**](docs/Api/AssetsApi.md#updateasset) | **PATCH** /assets/{asset} | Update Asset
*AssetsApi* | [**uploadAsset**](docs/Api/AssetsApi.md#uploadasset) | **POST** /assets | Upload an asset
*ProjectsApi* | [**createProject**](docs/Api/ProjectsApi.md#createproject) | **POST** /projects | Create new Project
*ProjectsApi* | [**deleteProject**](docs/Api/ProjectsApi.md#deleteproject) | **DELETE** /projects/{project} | Delete Project
*ProjectsApi* | [**getProjectByID**](docs/Api/ProjectsApi.md#getprojectbyid) | **GET** /projects/{project} | Get Project
*ProjectsApi* | [**listProjects**](docs/Api/ProjectsApi.md#listprojects) | **GET** /projects | Get a list of created Projects
*ProjectsApi* | [**updateProject**](docs/Api/ProjectsApi.md#updateproject) | **PATCH** /projects/{project} | Update Project
*CertificatesApi* | [**deleteCertificate**](docs/Api/CertificatesApi.md#deletecertificate) | **DELETE** /certificates/{certificate} | Delete certificate
*CertificatesApi* | [**getCSR**](docs/Api/CertificatesApi.md#getcsr) | **GET** /certificates/csr | Get CSR
*CertificatesApi* | [**getCertificateByID**](docs/Api/CertificatesApi.md#getcertificatebyid) | **GET** /certificates/{certificate} | Get certificate by ID
*CertificatesApi* | [**listCertificates**](docs/Api/CertificatesApi.md#listcertificates) | **GET** /certificates | Get all certificates
*CertificatesApi* | [**updateCertificate**](docs/Api/CertificatesApi.md#updatecertificate) | **PATCH** /certificates/{certificate} | Update Certificate
*CertificatesApi* | [**uploadCertificate**](docs/Api/CertificatesApi.md#uploadcertificate) | **POST** /certificates/upload | Upload Certificate
*CertificatesApi* | [**uploadP12Certificate**](docs/Api/CertificatesApi.md#uploadp12certificate) | **POST** /certificates | Upload new certificate
*MessagesApi* | [**createMessage**](docs/Api/MessagesApi.md#createmessage) | **POST** /messages | Create a Message
*MessagesApi* | [**listMessages**](docs/Api/MessagesApi.md#listmessages) | **GET** /messages | Get all messages
*PassesApi* | [**createPass**](docs/Api/PassesApi.md#createpass) | **POST** /templates/{template}/passes | Create pass
*PassesApi* | [**deletePass**](docs/Api/PassesApi.md#deletepass) | **DELETE** /passes/{pass} | Delete pass
*PassesApi* | [**getPassApple**](docs/Api/PassesApi.md#getpassapple) | **GET** /passes/{pass}/pkpass | Get pass in pkpass format
*PassesApi* | [**getPassByExtID**](docs/Api/PassesApi.md#getpassbyextid) | **GET** /passes/external/{externalID} | Get pass by external ID
*PassesApi* | [**getPassByID**](docs/Api/PassesApi.md#getpassbyid) | **GET** /passes/{pass} | Get pass
*PassesApi* | [**getPassGoogle**](docs/Api/PassesApi.md#getpassgoogle) | **GET** /passes/{pass}/gpay | Get pass Google Play installation link
*PassesApi* | [**getPassLink**](docs/Api/PassesApi.md#getpasslink) | **GET** /passes/{pass}/link | Get pass download link
*PassesApi* | [**listTemplatePasses**](docs/Api/PassesApi.md#listtemplatepasses) | **GET** /templates/{template}/passes | Get all template passes
*PassesApi* | [**updatePass**](docs/Api/PassesApi.md#updatepass) | **PATCH** /passes/{pass} | Update pass
*TagsApi* | [**deleteTag**](docs/Api/TagsApi.md#deletetag) | **DELETE** /tags/{tag} | Delete tag
*TagsApi* | [**getTagModels**](docs/Api/TagsApi.md#gettagmodels) | **GET** /tags/{tag} | Get associated models
*TagsApi* | [**listTags**](docs/Api/TagsApi.md#listtags) | **GET** /tags | Your GET endpoint
*TemplatesApi* | [**copyTemplate**](docs/Api/TemplatesApi.md#copytemplate) | **POST** /templates/{template} | Copy template
*TemplatesApi* | [**createPass**](docs/Api/TemplatesApi.md#createpass) | **POST** /templates/{template}/passes | Create pass
*TemplatesApi* | [**createTemplate**](docs/Api/TemplatesApi.md#createtemplate) | **POST** /templates | Create template
*TemplatesApi* | [**deleteTemplate**](docs/Api/TemplatesApi.md#deletetemplate) | **DELETE** /templates/{template} | Delete template
*TemplatesApi* | [**getTemplateByID**](docs/Api/TemplatesApi.md#gettemplatebyid) | **GET** /templates/{template} | Get template
*TemplatesApi* | [**getTemplateFields**](docs/Api/TemplatesApi.md#gettemplatefields) | **GET** /templates/{template}/fields | Get all template fields
*TemplatesApi* | [**listTemplatePasses**](docs/Api/TemplatesApi.md#listtemplatepasses) | **GET** /templates/{template}/passes | Get all template passes
*TemplatesApi* | [**listTemplates**](docs/Api/TemplatesApi.md#listtemplates) | **GET** /templates | Get all templates
*TemplatesApi* | [**updateTemplate**](docs/Api/TemplatesApi.md#updatetemplate) | **PATCH** /templates/{template} | Update template

## Documentation For Models

 - [Asset](docs/Model/Asset.md)
 - [BarcodeSettings](docs/Model/BarcodeSettings.md)
 - [Beacon](docs/Model/Beacon.md)
 - [Project](docs/Model/Project.md)
 - [ProjectRequest](docs/Model/ProjectRequest.md)
 - [ProjectTemplates](docs/Model/ProjectTemplates.md)
 - [Certificate](docs/Model/Certificate.md)
 - [CertificateRequest](docs/Model/CertificateRequest.md)
 - [Colors](docs/Model/Colors.md)
 - [Error](docs/Model/Error.md)
 - [Link](docs/Model/Link.md)
 - [Location](docs/Model/Location.md)
 - [Message](docs/Model/Message.md)
 - [MessagesLocalizedBody](docs/Model/MessagesLocalizedBody.md)
 - [MessagesLocalizedHeader](docs/Model/MessagesLocalizedHeader.md)
 - [PaginationMeta](docs/Model/PaginationMeta.md)
 - [Pass](docs/Model/Pass.md)
 - [PassField](docs/Model/PassField.md)
 - [PassRequest](docs/Model/PassRequest.md)
 - [PassRequestFields](docs/Model/PassRequestFields.md)
 - [SettingsCoupon](docs/Model/SettingsCoupon.md)
 - [SettingsGiftCard](docs/Model/SettingsGiftCard.md)
 - [SettingsMembership](docs/Model/SettingsMembership.md)
 - [SettingsStampCard](docs/Model/SettingsStampCard.md)
 - [Template](docs/Model/Template.md)
 - [TemplateExpirySettings](docs/Model/TemplateExpirySettings.md)
 - [TemplateGooglePayApps](docs/Model/TemplateGooglePayApps.md)
 - [TemplateRequest](docs/Model/TemplateRequest.md)
 - [TemplateRequestBeacons](docs/Model/TemplateRequestBeacons.md)
 - [TemplateRequestLinks](docs/Model/TemplateRequestLinks.md)
 - [TemplateRequestLocations](docs/Model/TemplateRequestLocations.md)
 - [WalletPassMetaInformation](docs/Model/WalletPassMetaInformation.md)

## Documentation For Authorization


## Bearer

- **Type**: HTTP bearer authentication


## Author

contact@walletpass.jp

