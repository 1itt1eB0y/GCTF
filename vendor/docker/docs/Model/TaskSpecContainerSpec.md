# TaskSpecContainerSpec

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**image** | **string** | The image name to use for the container | [optional] 
**labels** | **map[string,string]** | User-defined key/value data. | [optional] 
**command** | **string[]** | The command to be run in the image. | [optional] 
**args** | **string[]** | Arguments to the command. | [optional] 
**hostname** | **string** | The hostname to use for the container, as a valid [RFC 1123](https://tools.ietf.org/html/rfc1123) hostname. | [optional] 
**env** | **string[]** | A list of environment variables in the form &#x60;VAR&#x3D;value&#x60;. | [optional] 
**dir** | **string** | The working directory for commands to run in. | [optional] 
**user** | **string** | The user inside the container. | [optional] 
**groups** | **string[]** | A list of additional groups that the container process will run as. | [optional] 
**privileges** | [**\Docker\Client\Model\TaskSpecContainerSpecPrivileges**](TaskSpecContainerSpecPrivileges.md) |  | [optional] 
**tty** | **bool** | Whether a pseudo-TTY should be allocated. | [optional] 
**open_stdin** | **bool** | Open &#x60;stdin&#x60; | [optional] 
**read_only** | **bool** | Mount the container&#x27;s root filesystem as read only. | [optional] 
**mounts** | [**\Docker\Client\Model\Mount[]**](Mount.md) | Specification for mounts to be added to containers created as part of the service. | [optional] 
**stop_signal** | **string** | Signal to stop the container. | [optional] 
**stop_grace_period** | **int** | Amount of time to wait for the container to terminate before forcefully killing it. | [optional] 
**health_check** | [**\Docker\Client\Model\HealthConfig**](HealthConfig.md) |  | [optional] 
**hosts** | **string[]** | A list of hostname/IP mappings to add to the container&#x27;s &#x60;hosts&#x60; file. The format of extra hosts is specified in the [hosts(5)](http://man7.org/linux/man-pages/man5/hosts.5.html) man page:      IP_address canonical_hostname [aliases...] | [optional] 
**dns_config** | [**\Docker\Client\Model\TaskSpecContainerSpecDNSConfig**](TaskSpecContainerSpecDNSConfig.md) |  | [optional] 
**secrets** | [**\Docker\Client\Model\TaskSpecContainerSpecSecrets[]**](TaskSpecContainerSpecSecrets.md) | Secrets contains references to zero or more secrets that will be exposed to the service. | [optional] 
**configs** | [**\Docker\Client\Model\TaskSpecContainerSpecConfigs[]**](TaskSpecContainerSpecConfigs.md) | Configs contains references to zero or more configs that will be exposed to the service. | [optional] 
**isolation** | **string** | Isolation technology of the containers running the service. (Windows only) | [optional] 
**init** | **bool** | Run an init inside the container that forwards signals and reaps processes. This field is omitted if empty, and the default (as configured on the daemon) is used. | [optional] 
**sysctls** | **map[string,string]** | Set kernel namedspaced parameters (sysctls) in the container. The Sysctls option on services accepts the same sysctls as the are supported on containers. Note that while the same sysctls are supported, no guarantees or checks are made about their suitability for a clustered environment, and it&#x27;s up to the user to determine whether a given sysctl will work properly in a Service. | [optional] 
**capability_add** | **string[]** | A list of kernel capabilities to add to the default set for the container. | [optional] 
**capability_drop** | **string[]** | A list of kernel capabilities to drop from the default set for the container. | [optional] 
**ulimits** | [**\Docker\Client\Model\ResourcesUlimits[]**](ResourcesUlimits.md) | A list of resource limits to set in the container. For example: &#x60;{\&quot;Name\&quot;: \&quot;nofile\&quot;, \&quot;Soft\&quot;: 1024, \&quot;Hard\&quot;: 2048}&#x60;\&quot; | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

