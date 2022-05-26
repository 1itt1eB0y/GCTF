# ServiceSpecUpdateConfig

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**parallelism** | **int** | Maximum number of tasks to be updated in one iteration (0 means unlimited parallelism). | [optional] 
**delay** | **int** | Amount of time between updates, in nanoseconds. | [optional] 
**failure_action** | **string** | Action to take if an updated task fails to run, or stops running during the update. | [optional] 
**monitor** | **int** | Amount of time to monitor each updated task for failures, in nanoseconds. | [optional] 
**max_failure_ratio** | **float** | The fraction of tasks that may fail during an update before the failure action is invoked, specified as a floating point number between 0 and 1. | [optional] 
**order** | **string** | The order of operations when rolling out an updated task. Either the old task is shut down before the new task is started, or the new task is started before the old task is shut down. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

