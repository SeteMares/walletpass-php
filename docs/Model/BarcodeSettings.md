# BarcodeSettings

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**format** | **string** | Provide &#x60;none&#x60; if you don&#x27;t need barcode on your pass. | [optional] [default to 'none']
**type** | **string** | Default is &#x60;system&#x60;.  - &#x60;system&#x60;: Each issued pass will use it&#x27;s unique id for barcode payload.  - &#x60;fixed&#x60;: All issued passes use the same payload as defined in it&#x27;s template. - &#x60;per_pass&#x60;: Barcode payload needs to be provided on each pass creation request. | [optional] [default to 'system']
**payload** | **string** | Defaults to pass id | [optional] 
**alt_text** | **string** | Defaults to payload | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

