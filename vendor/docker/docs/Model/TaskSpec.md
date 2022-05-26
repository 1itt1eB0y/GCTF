# TaskSpec

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**plugin_spec** | [**\Docker\Client\Model\TaskSpecPluginSpec**](TaskSpecPluginSpec.md) |  | [optional] 
**container_spec** | [**\Docker\Client\Model\TaskSpecContainerSpec**](TaskSpecContainerSpec.md) |  | [optional] 
**network_attachment_spec** | [**\Docker\Client\Model\TaskSpecNetworkAttachmentSpec**](TaskSpecNetworkAttachmentSpec.md) |  | [optional] 
**resources** | [**\Docker\Client\Model\TaskSpecResources**](TaskSpecResources.md) |  | [optional] 
**restart_policy** | [**\Docker\Client\Model\TaskSpecRestartPolicy**](TaskSpecRestartPolicy.md) |  | [optional] 
**placement** | [**\Docker\Client\Model\TaskSpecPlacement**](TaskSpecPlacement.md) |  | [optional] 
**force_update** | **int** | A counter that triggers an update even if no relevant parameters have been changed. | [optional] 
**runtime** | **string** | Runtime is the type of runtime specified for the task executor. | [optional] 
**networks** | [**\Docker\Client\Model\NetworkAttachmentConfig[]**](NetworkAttachmentConfig.md) | Specifies which networks the service should attach to. | [optional] 
**log_driver** | [**\Docker\Client\Model\TaskSpecLogDriver**](TaskSpecLogDriver.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

