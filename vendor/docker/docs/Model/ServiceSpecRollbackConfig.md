# ServiceSpecRollbackConfig

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**parallelism** | **int** | Maximum number of tasks to be rolled back in one iteration (0 means unlimited parallelism). | [optional] 
**delay** | **int** | Amount of time between rollback iterations, in nanoseconds. | [optional] 
**failure_action** | **string** | Action to take if an rolled back task fails to run, or stops running during the rollback. | [optional] 
**monitor** | **int** | Amount of time to monitor each rolled back task for failures, in nanoseconds. | [optional] 
**max_failure_ratio** | **float** | The fraction of tasks that may fail during a rollback before the failure action is invoked, specified as a floating point number between 0 and 1. | [optional] 
**order** | **string** | The order of operations when rolling back a task. Either the old task is shut down before the new task is started, or the new task is started before the old task is shut down. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

