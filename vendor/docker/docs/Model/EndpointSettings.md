# EndpointSettings

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ipam_config** | [**\Docker\Client\Model\EndpointIPAMConfig**](EndpointIPAMConfig.md) |  | [optional] 
**links** | **string[]** |  | [optional] 
**aliases** | **string[]** |  | [optional] 
**network_id** | **string** | Unique ID of the network. | [optional] 
**endpoint_id** | **string** | Unique ID for the service endpoint in a Sandbox. | [optional] 
**gateway** | **string** | Gateway address for this network. | [optional] 
**ip_address** | **string** | IPv4 address. | [optional] 
**ip_prefix_len** | **int** | Mask length of the IPv4 address. | [optional] 
**i_pv6_gateway** | **string** | IPv6 gateway address. | [optional] 
**global_i_pv6_address** | **string** | Global IPv6 address. | [optional] 
**global_i_pv6_prefix_len** | **int** | Mask length of the global IPv6 address. | [optional] 
**mac_address** | **string** | MAC address for the endpoint on this network. | [optional] 
**driver_opts** | **map[string,string]** | DriverOpts is a mapping of driver options and values. These options are passed directly to the driver and are driver specific. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

