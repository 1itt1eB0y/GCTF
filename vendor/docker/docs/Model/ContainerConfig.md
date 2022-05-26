# ContainerConfig

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**hostname** | **string** | The hostname to use for the container, as a valid RFC 1123 hostname. | [optional] 
**domainname** | **string** | The domain name to use for the container. | [optional] 
**user** | **string** | The user that commands are run as inside the container. | [optional] 
**attach_stdin** | **bool** | Whether to attach to &#x60;stdin&#x60;. | [optional] [default to false]
**attach_stdout** | **bool** | Whether to attach to &#x60;stdout&#x60;. | [optional] [default to true]
**attach_stderr** | **bool** | Whether to attach to &#x60;stderr&#x60;. | [optional] [default to true]
**exposed_ports** | **map[string,object]** | An object mapping ports to an empty object in the form:  &#x60;{\&quot;&lt;port&gt;/&lt;tcp|udp|sctp&gt;\&quot;: {}}&#x60; | [optional] 
**tty** | **bool** | Attach standard streams to a TTY, including &#x60;stdin&#x60; if it is not closed. | [optional] [default to false]
**open_stdin** | **bool** | Open &#x60;stdin&#x60; | [optional] [default to false]
**stdin_once** | **bool** | Close &#x60;stdin&#x60; after one attached client disconnects | [optional] [default to false]
**env** | **string[]** | A list of environment variables to set inside the container in the form &#x60;[\&quot;VAR&#x3D;value\&quot;, ...]&#x60;. A variable without &#x60;&#x3D;&#x60; is removed from the environment, rather than to have an empty value. | [optional] 
**cmd** | **string[]** | Command to run specified as a string or an array of strings. | [optional] 
**healthcheck** | [**\Docker\Client\Model\HealthConfig**](HealthConfig.md) |  | [optional] 
**args_escaped** | **bool** | Command is already escaped (Windows only) | [optional] 
**image** | **string** | The name of the image to use when creating the container/ | [optional] 
**volumes** | **map[string,object]** | An object mapping mount point paths inside the container to empty objects. | [optional] 
**working_dir** | **string** | The working directory for commands to run in. | [optional] 
**entrypoint** | **string[]** | The entry point for the container as a string or an array of strings.  If the array consists of exactly one empty string (&#x60;[\&quot;\&quot;]&#x60;) then the entry point is reset to system default (i.e., the entry point used by docker when there is no &#x60;ENTRYPOINT&#x60; instruction in the &#x60;Dockerfile&#x60;). | [optional] 
**network_disabled** | **bool** | Disable networking for the container. | [optional] 
**mac_address** | **string** | MAC address of the container. | [optional] 
**on_build** | **string[]** | &#x60;ONBUILD&#x60; metadata that were defined in the image&#x27;s &#x60;Dockerfile&#x60;. | [optional] 
**labels** | **map[string,string]** | User-defined key/value metadata. | [optional] 
**stop_signal** | **string** | Signal to stop a container as a string or unsigned integer. | [optional] [default to 'SIGTERM']
**stop_timeout** | **int** | Timeout to stop a container in seconds. | [optional] 
**shell** | **string[]** | Shell for when &#x60;RUN&#x60;, &#x60;CMD&#x60;, and &#x60;ENTRYPOINT&#x60; uses a shell. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

