# Docker\Client\ContainerApi

All URIs are relative to *http://127.0.0.1/v1.41*

Method | HTTP request | Description
------------- | ------------- | -------------
[**containerArchive**](ContainerApi.md#containerarchive) | **GET** /containers/{id}/archive | Get an archive of a filesystem resource in a container
[**containerArchiveInfo**](ContainerApi.md#containerarchiveinfo) | **HEAD** /containers/{id}/archive | Get information about files in a container
[**containerAttach**](ContainerApi.md#containerattach) | **POST** /containers/{id}/attach | Attach to a container
[**containerAttachWebsocket**](ContainerApi.md#containerattachwebsocket) | **GET** /containers/{id}/attach/ws | Attach to a container via a websocket
[**containerChanges**](ContainerApi.md#containerchanges) | **GET** /containers/{id}/changes | Get changes on a container’s filesystem
[**containerCreate**](ContainerApi.md#containercreate) | **POST** /containers/create | Create a container
[**containerDelete**](ContainerApi.md#containerdelete) | **DELETE** /containers/{id} | Remove a container
[**containerExport**](ContainerApi.md#containerexport) | **GET** /containers/{id}/export | Export a container
[**containerInspect**](ContainerApi.md#containerinspect) | **GET** /containers/{id}/json | Inspect a container
[**containerKill**](ContainerApi.md#containerkill) | **POST** /containers/{id}/kill | Kill a container
[**containerList**](ContainerApi.md#containerlist) | **GET** /containers/json | List containers
[**containerLogs**](ContainerApi.md#containerlogs) | **GET** /containers/{id}/logs | Get container logs
[**containerPause**](ContainerApi.md#containerpause) | **POST** /containers/{id}/pause | Pause a container
[**containerPrune**](ContainerApi.md#containerprune) | **POST** /containers/prune | Delete stopped containers
[**containerRename**](ContainerApi.md#containerrename) | **POST** /containers/{id}/rename | Rename a container
[**containerResize**](ContainerApi.md#containerresize) | **POST** /containers/{id}/resize | Resize a container TTY
[**containerRestart**](ContainerApi.md#containerrestart) | **POST** /containers/{id}/restart | Restart a container
[**containerStart**](ContainerApi.md#containerstart) | **POST** /containers/{id}/start | Start a container
[**containerStats**](ContainerApi.md#containerstats) | **GET** /containers/{id}/stats | Get container stats based on resource usage
[**containerStop**](ContainerApi.md#containerstop) | **POST** /containers/{id}/stop | Stop a container
[**containerTop**](ContainerApi.md#containertop) | **GET** /containers/{id}/top | List processes running inside a container
[**containerUnpause**](ContainerApi.md#containerunpause) | **POST** /containers/{id}/unpause | Unpause a container
[**containerUpdate**](ContainerApi.md#containerupdate) | **POST** /containers/{id}/update | Update a container
[**containerWait**](ContainerApi.md#containerwait) | **POST** /containers/{id}/wait | Wait for a container
[**putContainerArchive**](ContainerApi.md#putcontainerarchive) | **PUT** /containers/{id}/archive | Extract an archive of files or folders to a directory in a container

# **containerArchive**
> containerArchive($id, $path)

Get an archive of a filesystem resource in a container

Get a tar archive of a resource in the filesystem of container id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$path = "path_example"; // string | Resource in the container’s filesystem to archive.

try {
    $apiInstance->containerArchive($id, $path);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerArchive: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **path** | **string**| Resource in the container’s filesystem to archive. |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/x-tar, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerArchiveInfo**
> containerArchiveInfo($id, $path)

Get information about files in a container

A response header `X-Docker-Container-Path-Stat` is returned, containing a base64 - encoded JSON object with some filesystem header information about the path.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$path = "path_example"; // string | Resource in the container’s filesystem to archive.

try {
    $apiInstance->containerArchiveInfo($id, $path);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerArchiveInfo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **path** | **string**| Resource in the container’s filesystem to archive. |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerAttach**
> containerAttach($id, $detach_keys, $logs, $stream, $stdin, $stdout, $stderr)

Attach to a container

Attach to a container to read its output or send it input. You can attach to the same container multiple times and you can reattach to containers that have been detached.  Either the `stream` or `logs` parameter must be `true` for this endpoint to do anything.  See the [documentation for the `docker attach` command](/engine/reference/commandline/attach/) for more details.  ### Hijacking  This endpoint hijacks the HTTP connection to transport `stdin`, `stdout`, and `stderr` on the same socket.  This is the response from the daemon for an attach request:  ``` HTTP/1.1 200 OK Content-Type: application/vnd.docker.raw-stream  [STREAM] ```  After the headers and two new lines, the TCP connection can now be used for raw, bidirectional communication between the client and server.  To hint potential proxies about connection hijacking, the Docker client can also optionally send connection upgrade headers.  For example, the client sends this request to upgrade the connection:  ``` POST /containers/16253994b7c4/attach?stream=1&stdout=1 HTTP/1.1 Upgrade: tcp Connection: Upgrade ```  The Docker daemon will respond with a `101 UPGRADED` response, and will similarly follow with the raw stream:  ``` HTTP/1.1 101 UPGRADED Content-Type: application/vnd.docker.raw-stream Connection: Upgrade Upgrade: tcp  [STREAM] ```  ### Stream format  When the TTY setting is disabled in [`POST /containers/create`](#operation/ContainerCreate), the stream over the hijacked connected is multiplexed to separate out `stdout` and `stderr`. The stream consists of a series of frames, each containing a header and a payload.  The header contains the information which the stream writes (`stdout` or `stderr`). It also contains the size of the associated frame encoded in the last four bytes (`uint32`).  It is encoded on the first eight bytes like this:  ```go header := [8]byte{STREAM_TYPE, 0, 0, 0, SIZE1, SIZE2, SIZE3, SIZE4} ```  `STREAM_TYPE` can be:  - 0: `stdin` (is written on `stdout`) - 1: `stdout` - 2: `stderr`  `SIZE1, SIZE2, SIZE3, SIZE4` are the four bytes of the `uint32` size encoded as big endian.  Following the header is the payload, which is the specified number of bytes of `STREAM_TYPE`.  The simplest way to implement this protocol is the following:  1. Read 8 bytes. 2. Choose `stdout` or `stderr` depending on the first byte. 3. Extract the frame size from the last four bytes. 4. Read the extracted size and output it on the correct output. 5. Goto 1.  ### Stream format when using a TTY  When the TTY setting is enabled in [`POST /containers/create`](#operation/ContainerCreate), the stream is not multiplexed. The data exchanged over the hijacked connection is simply the raw data from the process PTY and client's `stdin`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$detach_keys = "detach_keys_example"; // string | Override the key sequence for detaching a container.Format is a single character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`, `@`, `^`, `[`, `,` or `_`.
$logs = false; // bool | Replay previous logs from the container.  This is useful for attaching to a container that has started and you want to output everything since the container started.  If `stream` is also enabled, once all the previous output has been returned, it will seamlessly transition into streaming current output.
$stream = false; // bool | Stream attached streams from the time the request was made onwards.
$stdin = false; // bool | Attach to `stdin`
$stdout = false; // bool | Attach to `stdout`
$stderr = false; // bool | Attach to `stderr`

try {
    $apiInstance->containerAttach($id, $detach_keys, $logs, $stream, $stdin, $stdout, $stderr);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerAttach: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **detach_keys** | **string**| Override the key sequence for detaching a container.Format is a single character &#x60;[a-Z]&#x60; or &#x60;ctrl-&lt;value&gt;&#x60; where &#x60;&lt;value&gt;&#x60; is one of: &#x60;a-z&#x60;, &#x60;@&#x60;, &#x60;^&#x60;, &#x60;[&#x60;, &#x60;,&#x60; or &#x60;_&#x60;. | [optional]
 **logs** | **bool**| Replay previous logs from the container.  This is useful for attaching to a container that has started and you want to output everything since the container started.  If &#x60;stream&#x60; is also enabled, once all the previous output has been returned, it will seamlessly transition into streaming current output. | [optional] [default to false]
 **stream** | **bool**| Stream attached streams from the time the request was made onwards. | [optional] [default to false]
 **stdin** | **bool**| Attach to &#x60;stdin&#x60; | [optional] [default to false]
 **stdout** | **bool**| Attach to &#x60;stdout&#x60; | [optional] [default to false]
 **stderr** | **bool**| Attach to &#x60;stderr&#x60; | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/vnd.docker.raw-stream, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerAttachWebsocket**
> containerAttachWebsocket($id, $detach_keys, $logs, $stream, $stdin, $stdout, $stderr)

Attach to a container via a websocket

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$detach_keys = "detach_keys_example"; // string | Override the key sequence for detaching a container.Format is a single character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`, `@`, `^`, `[`, `,`, or `_`.
$logs = false; // bool | Return logs
$stream = false; // bool | Return stream
$stdin = false; // bool | Attach to `stdin`
$stdout = false; // bool | Attach to `stdout`
$stderr = false; // bool | Attach to `stderr`

try {
    $apiInstance->containerAttachWebsocket($id, $detach_keys, $logs, $stream, $stdin, $stdout, $stderr);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerAttachWebsocket: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **detach_keys** | **string**| Override the key sequence for detaching a container.Format is a single character &#x60;[a-Z]&#x60; or &#x60;ctrl-&lt;value&gt;&#x60; where &#x60;&lt;value&gt;&#x60; is one of: &#x60;a-z&#x60;, &#x60;@&#x60;, &#x60;^&#x60;, &#x60;[&#x60;, &#x60;,&#x60;, or &#x60;_&#x60;. | [optional]
 **logs** | **bool**| Return logs | [optional] [default to false]
 **stream** | **bool**| Return stream | [optional] [default to false]
 **stdin** | **bool**| Attach to &#x60;stdin&#x60; | [optional] [default to false]
 **stdout** | **bool**| Attach to &#x60;stdout&#x60; | [optional] [default to false]
 **stderr** | **bool**| Attach to &#x60;stderr&#x60; | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerChanges**
> \Docker\Client\Model\ContainerChangeResponseItem[] containerChanges($id)

Get changes on a container’s filesystem

Returns which files in a container's filesystem have been added, deleted, or modified. The `Kind` of modification can be one of:  - `0`: Modified - `1`: Added - `2`: Deleted

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container

try {
    $result = $apiInstance->containerChanges($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerChanges: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |

### Return type

[**\Docker\Client\Model\ContainerChangeResponseItem[]**](../Model/ContainerChangeResponseItem.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerCreate**
> \Docker\Client\Model\ContainerCreateResponse containerCreate($body, $name)

Create a container

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\ContainersCreateBody(); // \Docker\Client\Model\ContainersCreateBody | Container to create
$name = "name_example"; // string | Assign the specified name to the container. Must match `/?[a-zA-Z0-9][a-zA-Z0-9_.-]+`.

try {
    $result = $apiInstance->containerCreate($body, $name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Docker\Client\Model\ContainersCreateBody**](../Model/ContainersCreateBody.md)| Container to create |
 **name** | **string**| Assign the specified name to the container. Must match &#x60;/?[a-zA-Z0-9][a-zA-Z0-9_.-]+&#x60;. | [optional]

### Return type

[**\Docker\Client\Model\ContainerCreateResponse**](../Model/ContainerCreateResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/octet-stream
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerDelete**
> containerDelete($id, $v, $force, $link)

Remove a container

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$v = false; // bool | Remove anonymous volumes associated with the container.
$force = false; // bool | If the container is running, kill it before removing it.
$link = false; // bool | Remove the specified link associated with the container.

try {
    $apiInstance->containerDelete($id, $v, $force, $link);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **v** | **bool**| Remove anonymous volumes associated with the container. | [optional] [default to false]
 **force** | **bool**| If the container is running, kill it before removing it. | [optional] [default to false]
 **link** | **bool**| Remove the specified link associated with the container. | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerExport**
> containerExport($id)

Export a container

Export the contents of a container as a tarball.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container

try {
    $apiInstance->containerExport($id);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerExport: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/octet-stream, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerInspect**
> \Docker\Client\Model\ContainerInspectResponse containerInspect($id, $size)

Inspect a container

Return low-level information about a container.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$size = false; // bool | Return the size of container as fields `SizeRw` and `SizeRootFs`

try {
    $result = $apiInstance->containerInspect($id, $size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerInspect: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **size** | **bool**| Return the size of container as fields &#x60;SizeRw&#x60; and &#x60;SizeRootFs&#x60; | [optional] [default to false]

### Return type

[**\Docker\Client\Model\ContainerInspectResponse**](../Model/ContainerInspectResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerKill**
> containerKill($id, $signal)

Kill a container

Send a POSIX signal to a container, defaulting to killing to the container.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$signal = "SIGKILL"; // string | Signal to send to the container as an integer or string (e.g. `SIGINT`)

try {
    $apiInstance->containerKill($id, $signal);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerKill: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **signal** | **string**| Signal to send to the container as an integer or string (e.g. &#x60;SIGINT&#x60;) | [optional] [default to SIGKILL]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerList**
> \Docker\Client\Model\ContainerSummary[] containerList($all, $limit, $size, $filters)

List containers

Returns a list of containers. For details on the format, see the [inspect endpoint](#operation/ContainerInspect).  Note that it uses a different, smaller representation of a container than inspecting a single container. For example, the list of linked containers is not propagated .

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$all = false; // bool | Return all containers. By default, only running containers are shown.
$limit = 56; // int | Return this number of most recently created containers, including non-running ones.
$size = false; // bool | Return the size of container as fields `SizeRw` and `SizeRootFs`.
$filters = "filters_example"; // string | Filters to process on the container list, encoded as JSON (a `map[string][]string`). For example, `{\"status\": [\"paused\"]}` will only return paused containers.  Available filters:  - `ancestor`=(`<image-name>[:<tag>]`, `<image id>`, or `<image@digest>`) - `before`=(`<container id>` or `<container name>`) - `expose`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`) - `exited=<int>` containers with exit code of `<int>` - `health`=(`starting`|`healthy`|`unhealthy`|`none`) - `id=<ID>` a container's ID - `isolation=`(`default`|`process`|`hyperv`) (Windows daemon only) - `is-task=`(`true`|`false`) - `label=key` or `label=\"key=value\"` of a container label - `name=<name>` a container's name - `network`=(`<network id>` or `<network name>`) - `publish`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`) - `since`=(`<container id>` or `<container name>`) - `status=`(`created`|`restarting`|`running`|`removing`|`paused`|`exited`|`dead`) - `volume`=(`<volume name>` or `<mount point destination>`)

try {
    $result = $apiInstance->containerList($all, $limit, $size, $filters);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **all** | **bool**| Return all containers. By default, only running containers are shown. | [optional] [default to false]
 **limit** | **int**| Return this number of most recently created containers, including non-running ones. | [optional]
 **size** | **bool**| Return the size of container as fields &#x60;SizeRw&#x60; and &#x60;SizeRootFs&#x60;. | [optional] [default to false]
 **filters** | **string**| Filters to process on the container list, encoded as JSON (a &#x60;map[string][]string&#x60;). For example, &#x60;{\&quot;status\&quot;: [\&quot;paused\&quot;]}&#x60; will only return paused containers.  Available filters:  - &#x60;ancestor&#x60;&#x3D;(&#x60;&lt;image-name&gt;[:&lt;tag&gt;]&#x60;, &#x60;&lt;image id&gt;&#x60;, or &#x60;&lt;image@digest&gt;&#x60;) - &#x60;before&#x60;&#x3D;(&#x60;&lt;container id&gt;&#x60; or &#x60;&lt;container name&gt;&#x60;) - &#x60;expose&#x60;&#x3D;(&#x60;&lt;port&gt;[/&lt;proto&gt;]&#x60;|&#x60;&lt;startport-endport&gt;/[&lt;proto&gt;]&#x60;) - &#x60;exited&#x3D;&lt;int&gt;&#x60; containers with exit code of &#x60;&lt;int&gt;&#x60; - &#x60;health&#x60;&#x3D;(&#x60;starting&#x60;|&#x60;healthy&#x60;|&#x60;unhealthy&#x60;|&#x60;none&#x60;) - &#x60;id&#x3D;&lt;ID&gt;&#x60; a container&#x27;s ID - &#x60;isolation&#x3D;&#x60;(&#x60;default&#x60;|&#x60;process&#x60;|&#x60;hyperv&#x60;) (Windows daemon only) - &#x60;is-task&#x3D;&#x60;(&#x60;true&#x60;|&#x60;false&#x60;) - &#x60;label&#x3D;key&#x60; or &#x60;label&#x3D;\&quot;key&#x3D;value\&quot;&#x60; of a container label - &#x60;name&#x3D;&lt;name&gt;&#x60; a container&#x27;s name - &#x60;network&#x60;&#x3D;(&#x60;&lt;network id&gt;&#x60; or &#x60;&lt;network name&gt;&#x60;) - &#x60;publish&#x60;&#x3D;(&#x60;&lt;port&gt;[/&lt;proto&gt;]&#x60;|&#x60;&lt;startport-endport&gt;/[&lt;proto&gt;]&#x60;) - &#x60;since&#x60;&#x3D;(&#x60;&lt;container id&gt;&#x60; or &#x60;&lt;container name&gt;&#x60;) - &#x60;status&#x3D;&#x60;(&#x60;created&#x60;|&#x60;restarting&#x60;|&#x60;running&#x60;|&#x60;removing&#x60;|&#x60;paused&#x60;|&#x60;exited&#x60;|&#x60;dead&#x60;) - &#x60;volume&#x60;&#x3D;(&#x60;&lt;volume name&gt;&#x60; or &#x60;&lt;mount point destination&gt;&#x60;) | [optional]

### Return type

[**\Docker\Client\Model\ContainerSummary[]**](../Model/ContainerSummary.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerLogs**
> string containerLogs($id, $follow, $stdout, $stderr, $since, $until, $timestamps, $tail)

Get container logs

Get `stdout` and `stderr` logs from a container.  Note: This endpoint works only for containers with the `json-file` or `journald` logging driver.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$follow = false; // bool | Keep connection after returning logs.
$stdout = false; // bool | Return logs from `stdout`
$stderr = false; // bool | Return logs from `stderr`
$since = 0; // int | Only return logs since this time, as a UNIX timestamp
$until = 0; // int | Only return logs before this time, as a UNIX timestamp
$timestamps = false; // bool | Add timestamps to every log line
$tail = "all"; // string | Only return this number of log lines from the end of the logs. Specify as an integer or `all` to output all log lines.

try {
    $result = $apiInstance->containerLogs($id, $follow, $stdout, $stderr, $since, $until, $timestamps, $tail);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerLogs: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **follow** | **bool**| Keep connection after returning logs. | [optional] [default to false]
 **stdout** | **bool**| Return logs from &#x60;stdout&#x60; | [optional] [default to false]
 **stderr** | **bool**| Return logs from &#x60;stderr&#x60; | [optional] [default to false]
 **since** | **int**| Only return logs since this time, as a UNIX timestamp | [optional] [default to 0]
 **until** | **int**| Only return logs before this time, as a UNIX timestamp | [optional] [default to 0]
 **timestamps** | **bool**| Add timestamps to every log line | [optional] [default to false]
 **tail** | **string**| Only return this number of log lines from the end of the logs. Specify as an integer or &#x60;all&#x60; to output all log lines. | [optional] [default to all]

### Return type

**string**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerPause**
> containerPause($id)

Pause a container

Use the freezer cgroup to suspend all processes in a container.  Traditionally, when suspending a process the `SIGSTOP` signal is used, which is observable by the process being suspended. With the freezer cgroup the process is unaware, and unable to capture, that it is being suspended, and subsequently resumed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container

try {
    $apiInstance->containerPause($id);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerPause: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerPrune**
> \Docker\Client\Model\ContainerPruneResponse containerPrune($filters)

Delete stopped containers

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$filters = "filters_example"; // string | Filters to process on the prune list, encoded as JSON (a `map[string][]string`).  Available filters: - `until=<timestamp>` Prune containers created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time. - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune containers with (or without, in case `label!=...` is used) the specified labels.

try {
    $result = $apiInstance->containerPrune($filters);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerPrune: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filters** | **string**| Filters to process on the prune list, encoded as JSON (a &#x60;map[string][]string&#x60;).  Available filters: - &#x60;until&#x3D;&lt;timestamp&gt;&#x60; Prune containers created before this timestamp. The &#x60;&lt;timestamp&gt;&#x60; can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. &#x60;10m&#x60;, &#x60;1h30m&#x60;) computed relative to the daemon machine’s time. - &#x60;label&#x60; (&#x60;label&#x3D;&lt;key&gt;&#x60;, &#x60;label&#x3D;&lt;key&gt;&#x3D;&lt;value&gt;&#x60;, &#x60;label!&#x3D;&lt;key&gt;&#x60;, or &#x60;label!&#x3D;&lt;key&gt;&#x3D;&lt;value&gt;&#x60;) Prune containers with (or without, in case &#x60;label!&#x3D;...&#x60; is used) the specified labels. | [optional]

### Return type

[**\Docker\Client\Model\ContainerPruneResponse**](../Model/ContainerPruneResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerRename**
> containerRename($id, $name)

Rename a container

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$name = "name_example"; // string | New name for the container

try {
    $apiInstance->containerRename($id, $name);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerRename: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **name** | **string**| New name for the container |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerResize**
> containerResize($id, $h, $w)

Resize a container TTY

Resize the TTY for a container.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$h = 56; // int | Height of the TTY session in characters
$w = 56; // int | Width of the TTY session in characters

try {
    $apiInstance->containerResize($id, $h, $w);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerResize: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **h** | **int**| Height of the TTY session in characters | [optional]
 **w** | **int**| Width of the TTY session in characters | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: text/plain, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerRestart**
> containerRestart($id, $t)

Restart a container

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$t = 56; // int | Number of seconds to wait before killing the container

try {
    $apiInstance->containerRestart($id, $t);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerRestart: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **t** | **int**| Number of seconds to wait before killing the container | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerStart**
> containerStart($id, $detach_keys)

Start a container

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$detach_keys = "detach_keys_example"; // string | Override the key sequence for detaching a container. Format is a single character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`, `@`, `^`, `[`, `,` or `_`.

try {
    $apiInstance->containerStart($id, $detach_keys);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerStart: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **detach_keys** | **string**| Override the key sequence for detaching a container. Format is a single character &#x60;[a-Z]&#x60; or &#x60;ctrl-&lt;value&gt;&#x60; where &#x60;&lt;value&gt;&#x60; is one of: &#x60;a-z&#x60;, &#x60;@&#x60;, &#x60;^&#x60;, &#x60;[&#x60;, &#x60;,&#x60; or &#x60;_&#x60;. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerStats**
> object containerStats($id, $stream, $one_shot)

Get container stats based on resource usage

This endpoint returns a live stream of a container’s resource usage statistics.  The `precpu_stats` is the CPU statistic of the *previous* read, and is used to calculate the CPU usage percentage. It is not an exact copy of the `cpu_stats` field.  If either `precpu_stats.online_cpus` or `cpu_stats.online_cpus` is nil then for compatibility with older daemons the length of the corresponding `cpu_usage.percpu_usage` array should be used.  On a cgroup v2 host, the following fields are not set * `blkio_stats`: all fields other than `io_service_bytes_recursive` * `cpu_stats`: `cpu_usage.percpu_usage` * `memory_stats`: `max_usage` and `failcnt` Also, `memory_stats.stats` fields are incompatible with cgroup v1.  To calculate the values shown by the `stats` command of the docker cli tool the following formulas can be used: * used_memory = `memory_stats.usage - memory_stats.stats.cache` * available_memory = `memory_stats.limit` * Memory usage % = `(used_memory / available_memory) * 100.0` * cpu_delta = `cpu_stats.cpu_usage.total_usage - precpu_stats.cpu_usage.total_usage` * system_cpu_delta = `cpu_stats.system_cpu_usage - precpu_stats.system_cpu_usage` * number_cpus = `lenght(cpu_stats.cpu_usage.percpu_usage)` or `cpu_stats.online_cpus` * CPU usage % = `(cpu_delta / system_cpu_delta) * number_cpus * 100.0`

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$stream = true; // bool | Stream the output. If false, the stats will be output once and then it will disconnect.
$one_shot = false; // bool | Only get a single stat instead of waiting for 2 cycles. Must be used with `stream=false`.

try {
    $result = $apiInstance->containerStats($id, $stream, $one_shot);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerStats: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **stream** | **bool**| Stream the output. If false, the stats will be output once and then it will disconnect. | [optional] [default to true]
 **one_shot** | **bool**| Only get a single stat instead of waiting for 2 cycles. Must be used with &#x60;stream&#x3D;false&#x60;. | [optional] [default to false]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerStop**
> containerStop($id, $t)

Stop a container

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$t = 56; // int | Number of seconds to wait before killing the container

try {
    $apiInstance->containerStop($id, $t);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerStop: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **t** | **int**| Number of seconds to wait before killing the container | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerTop**
> \Docker\Client\Model\ContainerTopResponse containerTop($id, $ps_args)

List processes running inside a container

On Unix systems, this is done by running the `ps` command. This endpoint is not supported on Windows.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$ps_args = "-ef"; // string | The arguments to pass to `ps`. For example, `aux`

try {
    $result = $apiInstance->containerTop($id, $ps_args);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerTop: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **ps_args** | **string**| The arguments to pass to &#x60;ps&#x60;. For example, &#x60;aux&#x60; | [optional] [default to -ef]

### Return type

[**\Docker\Client\Model\ContainerTopResponse**](../Model/ContainerTopResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerUnpause**
> containerUnpause($id)

Unpause a container

Resume a container which has been paused.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container

try {
    $apiInstance->containerUnpause($id);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerUnpause: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerUpdate**
> \Docker\Client\Model\ContainerUpdateResponse containerUpdate($body, $id)

Update a container

Change various configuration options of a container without having to recreate it.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\IdUpdateBody(); // \Docker\Client\Model\IdUpdateBody | 
$id = "id_example"; // string | ID or name of the container

try {
    $result = $apiInstance->containerUpdate($body, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerUpdate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Docker\Client\Model\IdUpdateBody**](../Model/IdUpdateBody.md)|  |
 **id** | **string**| ID or name of the container |

### Return type

[**\Docker\Client\Model\ContainerUpdateResponse**](../Model/ContainerUpdateResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **containerWait**
> \Docker\Client\Model\ContainerWaitResponse containerWait($id, $condition)

Wait for a container

Block until a container stops, then returns the exit code.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID or name of the container
$condition = "not-running"; // string | Wait until a container state reaches the given condition, either 'not-running' (default), 'next-exit', or 'removed'.

try {
    $result = $apiInstance->containerWait($id, $condition);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->containerWait: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID or name of the container |
 **condition** | **string**| Wait until a container state reaches the given condition, either &#x27;not-running&#x27; (default), &#x27;next-exit&#x27;, or &#x27;removed&#x27;. | [optional] [default to not-running]

### Return type

[**\Docker\Client\Model\ContainerWaitResponse**](../Model/ContainerWaitResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **putContainerArchive**
> putContainerArchive($body, $path, $id, $no_overwrite_dir_non_dir, $copy_uidgid)

Extract an archive of files or folders to a directory in a container

Upload a tar archive to be extracted to a path in the filesystem of container id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ContainerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\Object(); // Object | The input stream must be a tar archive compressed with one of the
following algorithms: `identity` (no compression), `gzip`, `bzip2`,
or `xz`.

$path = "path_example"; // string | Path to a directory in the container to extract the archive’s contents into.
$id = "id_example"; // string | ID or name of the container
$no_overwrite_dir_non_dir = "no_overwrite_dir_non_dir_example"; // string | If `1`, `true`, or `True` then it will be an error if unpacking the given content would cause an existing directory to be replaced with a non-directory and vice versa.
$copy_uidgid = "copy_uidgid_example"; // string | If `1`, `true`, then it will copy UID/GID maps to the dest file or dir

try {
    $apiInstance->putContainerArchive($body, $path, $id, $no_overwrite_dir_non_dir, $copy_uidgid);
} catch (Exception $e) {
    echo 'Exception when calling ContainerApi->putContainerArchive: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | **Object**| The input stream must be a tar archive compressed with one of the
following algorithms: &#x60;identity&#x60; (no compression), &#x60;gzip&#x60;, &#x60;bzip2&#x60;,
or &#x60;xz&#x60;.
 |
 **path** | **string**| Path to a directory in the container to extract the archive’s contents into. |
 **id** | **string**| ID or name of the container |
 **no_overwrite_dir_non_dir** | **string**| If &#x60;1&#x60;, &#x60;true&#x60;, or &#x60;True&#x60; then it will be an error if unpacking the given content would cause an existing directory to be replaced with a non-directory and vice versa. | [optional]
 **copy_uidgid** | **string**| If &#x60;1&#x60;, &#x60;true&#x60;, then it will copy UID/GID maps to the dest file or dir | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-tar, application/octet-stream
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

