# ProjectRequest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** |  | [optional] 
**external_id** | **string** | The custom/external ID you want to use. Cannot be changed after creation. | [optional] 
**template_id** | **string** | Optional. Provide Template ID to specify Project design and distribution settings. | [optional] 
**redeemed_template_id** | **string** | Optional. Template ID that will be switched to after pass redemption. | [optional] 
**title** | **string** | Used to identify this Project. Not shown to the customer. | 
**is_enabled** | **bool** | Is it allowed to issue new passes for this Project. | [optional] [default to false]
**background_color** | **string** |  | [optional] 
**text_color** | **string** | Optional. Can be calculated from background color. | [optional] 
**label_color** | **string** | Can be calculated from background_color. | [optional] 
**settings** | [**OneOfProjectRequestSettings**](OneOfProjectRequestSettings.md) |  | [optional] 
**images** | **string[]** | Array of Asset IDs, at least logo must be present. | 
**organization_name** | **string** |  | 
**links** | [**\WalletPassJP\Client\Model\Link[]**](Link.md) |  | [optional] 
**beacons** | [**\WalletPassJP\Client\Model\Beacon[]**](Beacon.md) |  | [optional] 
**locations** | [**\WalletPassJP\Client\Model\Location[]**](Location.md) |  | [optional] 
**tags** | **string[]** | Optional array of tags to attach | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

