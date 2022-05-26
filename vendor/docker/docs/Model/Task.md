# Task

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The ID of the task. | [optional] 
**version** | [**\Docker\Client\Model\ObjectVersion**](ObjectVersion.md) |  | [optional] 
**created_at** | **string** |  | [optional] 
**updated_at** | **string** |  | [optional] 
**name** | **string** | Name of the task. | [optional] 
**labels** | **map[string,string]** | User-defined key/value metadata. | [optional] 
**spec** | [**\Docker\Client\Model\TaskSpec**](TaskSpec.md) |  | [optional] 
**service_id** | **string** | The ID of the service this task is part of. | [optional] 
**slot** | **int** |  | [optional] 
**node_id** | **string** | The ID of the node that this task is on. | [optional] 
**assigned_generic_resources** | [**\Docker\Client\Model\GenericResources**](GenericResources.md) |  | [optional] 
**status** | [**\Docker\Client\Model\TaskStatus**](TaskStatus.md) |  | [optional] 
**desired_state** | [**\Docker\Client\Model\TaskState**](TaskState.md) |  | [optional] 
**job_iteration** | [**\Docker\Client\Model\ObjectVersion**](ObjectVersion.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

