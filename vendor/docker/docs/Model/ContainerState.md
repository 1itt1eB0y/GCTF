# ContainerState

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**status** | **string** | String representation of the container state. Can be one of \&quot;created\&quot;, \&quot;running\&quot;, \&quot;paused\&quot;, \&quot;restarting\&quot;, \&quot;removing\&quot;, \&quot;exited\&quot;, or \&quot;dead\&quot;. | [optional] 
**running** | **bool** | Whether this container is running.  Note that a running container can be _paused_. The &#x60;Running&#x60; and &#x60;Paused&#x60; booleans are not mutually exclusive:  When pausing a container (on Linux), the freezer cgroup is used to suspend all processes in the container. Freezing the process requires the process to be running. As a result, paused containers are both &#x60;Running&#x60; _and_ &#x60;Paused&#x60;.  Use the &#x60;Status&#x60; field instead to determine if a container&#x27;s state is \&quot;running\&quot;. | [optional] 
**paused** | **bool** | Whether this container is paused. | [optional] 
**restarting** | **bool** | Whether this container is restarting. | [optional] 
**oom_killed** | **bool** | Whether this container has been killed because it ran out of memory. | [optional] 
**dead** | **bool** |  | [optional] 
**pid** | **int** | The process ID of this container | [optional] 
**exit_code** | **int** | The last exit code of this container | [optional] 
**error** | **string** |  | [optional] 
**started_at** | **string** | The time when this container was last started. | [optional] 
**finished_at** | **string** | The time when this container last exited. | [optional] 
**health** | [**\Docker\Client\Model\Health**](Health.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

