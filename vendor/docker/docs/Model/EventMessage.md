# EventMessage

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | The type of object emitting the event | [optional] 
**action** | **string** | The type of event | [optional] 
**actor** | [**\Docker\Client\Model\EventActor**](EventActor.md) |  | [optional] 
**scope** | **string** | Scope of the event. Engine events are &#x60;local&#x60; scope. Cluster (Swarm) events are &#x60;swarm&#x60; scope. | [optional] 
**time** | **int** | Timestamp of event | [optional] 
**time_nano** | **int** | Timestamp of event, with nanosecond accuracy | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

