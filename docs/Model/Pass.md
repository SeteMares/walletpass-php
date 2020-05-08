# Pass

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | System ID. | [optional] 
**external_id** | **string** | The custom/external ID you want to use. Cannot be changed after creation. | [optional] 
**sku** | **string** | Your system SKU. Can be used in the barcode. | [optional] 
**template_id** | **string** | The ID of the template pass is created from. | [optional] 
**link** | **string** | Link to the download page for this pass that detects the operating system of the device that is used and provides specific help. | [optional] 
**status** | **string** | Status is the best determined status of the pass.   - created: Pass has been created.  - installed: Pass has been installed on a device.  - deleted: Pass has been uninstalled from a device.  - canceled: Pass has been canceled without usage.  - used: Pass has been used. | [optional] [default to 'created']
**is_voided** | **bool** | Indicates that the pass is void—for example, a one time use coupon that has been redeemed. The default value is false. | [optional] 
**expires_at** | [**\DateTime**](\DateTime.md) |  | [optional] 
**meta** | [**\WalletPassJP\Client\Model\WalletPassMetaInformation**](WalletPassMetaInformation.md) |  | [optional] 
**updated_at** | [**\DateTime**](\DateTime.md) |  | [optional] 
**created_at** | [**\DateTime**](\DateTime.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

