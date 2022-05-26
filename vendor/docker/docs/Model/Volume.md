# Volume

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Name of the volume. | 
**driver** | **string** | Name of the volume driver used by the volume. | 
**mountpoint** | **string** | Mount path of the volume on the host. | 
**created_at** | **string** | Date/Time the volume was created. | [optional] 
**status** | **map[string,object]** | Low-level details about the volume, provided by the volume driver. Details are returned as a map with key/value pairs: &#x60;{\&quot;key\&quot;:\&quot;value\&quot;,\&quot;key2\&quot;:\&quot;value2\&quot;}&#x60;.  The &#x60;Status&#x60; field is optional, and is omitted if the volume driver does not support this feature. | [optional] 
**labels** | **map[string,string]** | User-defined key/value metadata. | 
**scope** | **string** | The level at which the volume exists. Either &#x60;global&#x60; for cluster-wide, or &#x60;local&#x60; for machine level. | [default to 'local']
**options** | **map[string,string]** | The driver specific options used when creating the volume. | 
**usage_data** | [**\Docker\Client\Model\VolumeUsageData**](VolumeUsageData.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

