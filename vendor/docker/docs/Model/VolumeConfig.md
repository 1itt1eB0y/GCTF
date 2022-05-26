# VolumeConfig

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | The new volume&#x27;s name. If not specified, Docker generates a name. | [optional] 
**driver** | **string** | Name of the volume driver to use. | [optional] [default to 'local']
**driver_opts** | **map[string,string]** | A mapping of driver options and values. These options are passed directly to the driver and are driver specific. | [optional] 
**labels** | **map[string,string]** | User-defined key/value metadata. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

