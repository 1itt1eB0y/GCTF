# SwarmInfo

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**node_id** | **string** | Unique identifier of for this node in the swarm. | [optional] [default to '']
**node_addr** | **string** | IP address at which this node can be reached by other nodes in the swarm. | [optional] [default to '']
**local_node_state** | [**\Docker\Client\Model\LocalNodeState**](LocalNodeState.md) |  | [optional] 
**control_available** | **bool** |  | [optional] [default to false]
**error** | **string** |  | [optional] [default to '']
**remote_managers** | [**\Docker\Client\Model\PeerNode[]**](PeerNode.md) | List of ID&#x27;s and addresses of other managers in the swarm. | [optional] 
**nodes** | **int** | Total number of nodes in the swarm. | [optional] 
**managers** | **int** | Total number of managers in the swarm. | [optional] 
**cluster** | [**\Docker\Client\Model\ClusterInfo**](ClusterInfo.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

