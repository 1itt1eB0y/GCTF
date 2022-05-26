# ClusterInfo

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The ID of the swarm. | [optional] 
**version** | [**\Docker\Client\Model\ObjectVersion**](ObjectVersion.md) |  | [optional] 
**created_at** | **string** | Date and time at which the swarm was initialised in [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds. | [optional] 
**updated_at** | **string** | Date and time at which the swarm was last updated in [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds. | [optional] 
**spec** | [**\Docker\Client\Model\SwarmSpec**](SwarmSpec.md) |  | [optional] 
**tls_info** | [**\Docker\Client\Model\TLSInfo**](TLSInfo.md) |  | [optional] 
**root_rotation_in_progress** | **bool** | Whether there is currently a root CA rotation in progress for the swarm | [optional] 
**data_path_port** | **int** | DataPathPort specifies the data path port number for data traffic. Acceptable port range is 1024 to 49151. If no port is set or is set to 0, the default port (4789) is used. | [optional] 
**default_addr_pool** | **string[]** | Default Address Pool specifies default subnet pools for global scope networks. | [optional] 
**subnet_size** | **int** | SubnetSize specifies the subnet size of the networks created from the default subnet pool. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

