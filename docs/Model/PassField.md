# PassField

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | System ID. | [optional] 
**template_id** | **string** |  | [optional] 
**label** | **string** | The field label, usually represented as a title on the pass. | 
**value** | **string** | The default value for the field. | 
**change_message** | **string** | The message that appears when you change the value for a field. &#x60;%@&#x60; will be replaced with a new value. | [optional] 
**alignment** | **string** | Alignment for field title and body text for fields which are displayed on the front of Apple Wallet pass. | [optional] [default to 'natural']
**date_style** | **string** |  | [optional] [default to 'none']
**time_style** | **string** |  | [optional] [default to 'none']
**number_style** | **string** |  | [optional] [default to 'none']
**position_priority** | **int** | Priority indicates the position of the section.  If the field type is a text module, the priority of the text module. | [optional] [default to 0]
**apple_position** | **string** | Selects a section to render a field. One of - &#x60;header&#x60; - &#x60;primary&#x60; - &#x60;secondary&#x60; - &#x60;aux&#x60; - &#x60;back&#x60;  &#x60;none&#x60; if you don&#x27;t want to render this field on Apple passes. | [optional] [default to 'none']
**google_position** | **string** | Sets a position of field on the pass.  Determines which field the data will be mapped to on the Google Pay pass.  &gt; Note, not all Google Pay fields support labels or localization. &gt; Where not supported, label and localization options will be ignored.   - &#x60;boarding_boarding_time&#x60;: DateTime  - &#x60;boarding_gate_closes&#x60;: DateTime  - &#x60;boarding_departure_time&#x60;: DateTime  - &#x60;boarding_arrival_time&#x60;: DateTime  - &#x60;event_start&#x60;: DateTime  - &#x60;event_end&#x60;: DateTime  - &#x60;event_face_value&#x60;: Currency  - &#x60;gift_balance&#x60;: Currency  - &#x60;transit_valid_from&#x60;: DateTime  - &#x60;transit_valid_until&#x60;: DateTime  - &#x60;transit_purchase_date&#x60;: DateTime  - &#x60;transit_face_value&#x60;: Currency  - &#x60;transit_purchase_price&#x60;: Currency  - &#x60;text_module&#x60;: Common fields   &#x60;none&#x60; if you don&#x27;t want to render this field on Google passes. | [optional] [default to 'none']

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

