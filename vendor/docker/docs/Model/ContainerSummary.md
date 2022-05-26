# ContainerSummary

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The ID of this container | [optional] 
**names** | **string[]** | The names that this container has been given | [optional] 
**image** | **string** | The name of the image used when creating this container | [optional] 
**image_id** | **string** | The ID of the image that this container was created from | [optional] 
**command** | **string** | Command to run when starting the container | [optional] 
**created** | **int** | When the container was created | [optional] 
**ports** | [**\Docker\Client\Model\Port[]**](Port.md) | The ports exposed by this container | [optional] 
**size_rw** | **int** | The size of files that have been created or changed by this container | [optional] 
**size_root_fs** | **int** | The total size of all the files in this container | [optional] 
**labels** | **map[string,string]** | User-defined key/value metadata. | [optional] 
**state** | **string** | The state of this container (e.g. &#x60;Exited&#x60;) | [optional] 
**status** | **string** | Additional human-readable status of this container (e.g. &#x60;Exit 0&#x60;) | [optional] 
**host_config** | [**\Docker\Client\Model\ContainerSummaryHostConfig**](ContainerSummaryHostConfig.md) |  | [optional] 
**network_settings** | [**\Docker\Client\Model\ContainerSummaryNetworkSettings**](ContainerSummaryNetworkSettings.md) |  | [optional] 
**mounts** | [**\Docker\Client\Model\Mount[]**](Mount.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

