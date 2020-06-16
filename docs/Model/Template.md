# Template

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | System ID. Read only. | [optional] 
**external_id** | **string** | The custom/external ID you want to use. Cannot be changed after creation. | [optional] 
**certificate_id** | **string** | Certificate used to sign Apple passes. | [optional] 
**colors** | [**\WalletPassJP\Model\Colors**](Colors.md) |  | [optional] 
**images** | **string[]** | Array of Asset IDs | [optional] 
**links** | [**\WalletPassJP\Model\Link[]**](Link.md) |  | [optional] 
**beacons** | [**\WalletPassJP\Model\Beacon[]**](Beacon.md) |  | [optional] 
**locations** | [**\WalletPassJP\Model\Location[]**](Location.md) | An array of valid coordinates. latitude and longitude must contain valid values. relevant_text is the push notification that is shown on lockscreen. You can also specify an altitude and the max_distance which defines the number of meters around the coordinate where the notification will be shown. | [optional] 
**grouping_identifier** | **string** | For event tickets and boarding passes used to group related passes; otherwise not allowed. Identifier. If a grouping identifier is specified, passes with the same type, pass identifier and grouping identifier are displayed in a group. Otherwise, passes are grouped by type and pass identifier. | [optional] 
**logo_text** | **string** |  | [optional] 
**pass_type** | **string** |  | [optional] [default to 'generic']
**name** | **string** | Used to identify a Template | [optional] 
**description** | **string** | Brief description of the template. | [optional] 
**relevant_date** | [**\DateTime**](\DateTime.md) | Recommended for event tickets and boarding passes; otherwise optional. Date and time when the pass becomes relevant. For example, the start time of a movie.  The value must be a complete date with hours and minutes, and may optionally include seconds. | [optional] 
**organization_name** | **string** | This is the name of the company or organisation issuing the pass. | [optional] 
**sharing_status** | **string** | Determines whether a pass supports sharing across users, devices or both. iOS interprets this as a boolean setting: &#x60;oneUserOneDevice&#x60; prohibits sharing; all other values allow sharing. | [optional] [default to 'multipleHolders']
**barcode** | [**\WalletPassJP\Model\BarcodeSettings**](BarcodeSettings.md) |  | [optional] 
**expiry_settings** | [**\WalletPassJP\Model\TemplateExpirySettings**](TemplateExpirySettings.md) |  | [optional] 
**associated_store_identifier** | **string** | iTunes Store item identifier for the associated app.  If the app is not installed, the link opens the App Store and shows the app. If the app is already installed, the link launches the app. | [optional] 
**fields** | [**\WalletPassJP\Model\PassField[]**](PassField.md) | This allows you to configure individual data field that is rendered on the customer UI (data collection page and the pass). | [optional] 
**google_pay_apps** | [**\WalletPassJP\Model\TemplateGooglePayApps[]**](TemplateGooglePayApps.md) | Settings to render an app on the head of a pass. Apps can be Android, iOS or Web | [optional] 
**ios_logo_layout** | **string** | Apple pass logo settings. - &#x60;none&#x60; - will omit logo from a pass - &#x60;separate&#x60; - will use separate Asset &#x60;apple_logo&#x60; - &#x60;unset&#x60; - use default logo Asset | [optional] [default to 'unset']
**created_at** | [**\DateTime**](\DateTime.md) |  | [optional] 
**updated_at** | [**\DateTime**](\DateTime.md) |  | [optional] 
**tags** | **string[]** | List of attached tags | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

