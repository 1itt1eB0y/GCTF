# ServiceSpec

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Name of the service. | [optional] 
**labels** | **map[string,string]** | User-defined key/value metadata. | [optional] 
**task_template** | [**\Docker\Client\Model\TaskSpec**](TaskSpec.md) |  | [optional] 
**mode** | [**\Docker\Client\Model\ServiceSpecMode**](ServiceSpecMode.md) |  | [optional] 
**update_config** | [**\Docker\Client\Model\ServiceSpecUpdateConfig**](ServiceSpecUpdateConfig.md) |  | [optional] 
**rollback_config** | [**\Docker\Client\Model\ServiceSpecRollbackConfig**](ServiceSpecRollbackConfig.md) |  | [optional] 
**networks** | [**\Docker\Client\Model\NetworkAttachmentConfig[]**](NetworkAttachmentConfig.md) | Specifies which networks the service should attach to. | [optional] 
**endpoint_spec** | [**\Docker\Client\Model\EndpointSpec**](EndpointSpec.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

