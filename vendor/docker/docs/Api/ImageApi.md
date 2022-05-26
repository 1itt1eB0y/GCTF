# Docker\Client\ImageApi

All URIs are relative to *http://127.0.0.1/v1.41*

Method | HTTP request | Description
------------- | ------------- | -------------
[**buildPrune**](ImageApi.md#buildprune) | **POST** /build/prune | Delete builder cache
[**imageBuild**](ImageApi.md#imagebuild) | **POST** /build | Build an image
[**imageCommit**](ImageApi.md#imagecommit) | **POST** /commit | Create a new image from a container
[**imageCreate**](ImageApi.md#imagecreate) | **POST** /images/create | Create an image
[**imageDelete**](ImageApi.md#imagedelete) | **DELETE** /images/{name} | Remove an image
[**imageGet**](ImageApi.md#imageget) | **GET** /images/{name}/get | Export an image
[**imageGetAll**](ImageApi.md#imagegetall) | **GET** /images/get | Export several images
[**imageHistory**](ImageApi.md#imagehistory) | **GET** /images/{name}/history | Get the history of an image
[**imageInspect**](ImageApi.md#imageinspect) | **GET** /images/{name}/json | Inspect an image
[**imageList**](ImageApi.md#imagelist) | **GET** /images/json | List Images
[**imageLoad**](ImageApi.md#imageload) | **POST** /images/load | Import images
[**imagePrune**](ImageApi.md#imageprune) | **POST** /images/prune | Delete unused images
[**imagePush**](ImageApi.md#imagepush) | **POST** /images/{name}/push | Push an image
[**imageSearch**](ImageApi.md#imagesearch) | **GET** /images/search | Search images
[**imageTag**](ImageApi.md#imagetag) | **POST** /images/{name}/tag | Tag an image

# **buildPrune**
> \Docker\Client\Model\BuildPruneResponse buildPrune($keep_storage, $all, $filters)

Delete builder cache

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$keep_storage = 789; // int | Amount of disk space in bytes to keep for cache
$all = true; // bool | Remove all types of build cache
$filters = "filters_example"; // string | A JSON encoded value of the filters (a `map[string][]string`) to process on the list of build cache objects.  Available filters:  - `until=<duration>`: duration relative to daemon's time, during which build cache was not used, in Go's duration format (e.g., '24h') - `id=<id>` - `parent=<id>` - `type=<string>` - `description=<string>` - `inuse` - `shared` - `private`

try {
    $result = $apiInstance->buildPrune($keep_storage, $all, $filters);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->buildPrune: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **keep_storage** | **int**| Amount of disk space in bytes to keep for cache | [optional]
 **all** | **bool**| Remove all types of build cache | [optional]
 **filters** | **string**| A JSON encoded value of the filters (a &#x60;map[string][]string&#x60;) to process on the list of build cache objects.  Available filters:  - &#x60;until&#x3D;&lt;duration&gt;&#x60;: duration relative to daemon&#x27;s time, during which build cache was not used, in Go&#x27;s duration format (e.g., &#x27;24h&#x27;) - &#x60;id&#x3D;&lt;id&gt;&#x60; - &#x60;parent&#x3D;&lt;id&gt;&#x60; - &#x60;type&#x3D;&lt;string&gt;&#x60; - &#x60;description&#x3D;&lt;string&gt;&#x60; - &#x60;inuse&#x60; - &#x60;shared&#x60; - &#x60;private&#x60; | [optional]

### Return type

[**\Docker\Client\Model\BuildPruneResponse**](../Model/BuildPruneResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageBuild**
> imageBuild($body, $content_type, $x_registry_config, $dockerfile, $t, $extrahosts, $remote, $q, $nocache, $cachefrom, $pull, $rm, $forcerm, $memory, $memswap, $cpushares, $cpusetcpus, $cpuperiod, $cpuquota, $buildargs, $shmsize, $squash, $labels, $networkmode, $platform, $target, $outputs)

Build an image

Build an image from a tar archive with a `Dockerfile` in it.  The `Dockerfile` specifies how the image is built from the tar archive. It is typically in the archive's root, but can be at a different path or have a different name by specifying the `dockerfile` parameter. [See the `Dockerfile` reference for more information](/engine/reference/builder/).  The Docker daemon performs a preliminary validation of the `Dockerfile` before starting the build, and returns an error if the syntax is incorrect. After that, each instruction is run one-by-one until the ID of the new image is output.  The build is canceled if the client drops the connection by quitting or being killed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\Object(); // Object | A tar archive compressed with one of the following algorithms: identity (no compression), gzip, bzip2, xz.
$content_type = "application/x-tar"; // string | 
$x_registry_config = "x_registry_config_example"; // string | This is a base64-encoded JSON object with auth configurations for multiple registries that a build may refer to.  The key is a registry URL, and the value is an auth configuration object, [as described in the authentication section](#section/Authentication). For example:  ``` {   \"docker.example.com\": {     \"username\": \"janedoe\",     \"password\": \"hunter2\"   },   \"https://index.docker.io/v1/\": {     \"username\": \"mobydock\",     \"password\": \"conta1n3rize14\"   } } ```  Only the registry domain name (and port if not the default 443) are required. However, for legacy reasons, the Docker Hub registry must be specified with both a `https://` prefix and a `/v1/` suffix even though Docker will prefer to use the v2 registry API.
$dockerfile = "Dockerfile"; // string | Path within the build context to the `Dockerfile`. This is ignored if `remote` is specified and points to an external `Dockerfile`.
$t = "t_example"; // string | A name and optional tag to apply to the image in the `name:tag` format. If you omit the tag the default `latest` value is assumed. You can provide several `t` parameters.
$extrahosts = "extrahosts_example"; // string | Extra hosts to add to /etc/hosts
$remote = "remote_example"; // string | A Git repository URI or HTTP/HTTPS context URI. If the URI points to a single text file, the file’s contents are placed into a file called `Dockerfile` and the image is built from that file. If the URI points to a tarball, the file is downloaded by the daemon and the contents therein used as the context for the build. If the URI points to a tarball and the `dockerfile` parameter is also specified, there must be a file with the corresponding path inside the tarball.
$q = false; // bool | Suppress verbose build output.
$nocache = false; // bool | Do not use the cache when building the image.
$cachefrom = "cachefrom_example"; // string | JSON array of images used for build cache resolution.
$pull = "pull_example"; // string | Attempt to pull the image even if an older image exists locally.
$rm = true; // bool | Remove intermediate containers after a successful build.
$forcerm = false; // bool | Always remove intermediate containers, even upon failure.
$memory = 56; // int | Set memory limit for build.
$memswap = 56; // int | Total memory (memory + swap). Set as `-1` to disable swap.
$cpushares = 56; // int | CPU shares (relative weight).
$cpusetcpus = "cpusetcpus_example"; // string | CPUs in which to allow execution (e.g., `0-3`, `0,1`).
$cpuperiod = 56; // int | The length of a CPU period in microseconds.
$cpuquota = 56; // int | Microseconds of CPU time that the container can get in a CPU period.
$buildargs = "buildargs_example"; // string | JSON map of string pairs for build-time variables. Users pass these values at build-time. Docker uses the buildargs as the environment context for commands run via the `Dockerfile` RUN instruction, or for variable expansion in other `Dockerfile` instructions. This is not meant for passing secret values.  For example, the build arg `FOO=bar` would become `{\"FOO\":\"bar\"}` in JSON. This would result in the query parameter `buildargs={\"FOO\":\"bar\"}`. Note that `{\"FOO\":\"bar\"}` should be URI component encoded.  [Read more about the buildargs instruction.](/engine/reference/builder/#arg)
$shmsize = 56; // int | Size of `/dev/shm` in bytes. The size must be greater than 0. If omitted the system uses 64MB.
$squash = true; // bool | Squash the resulting images layers into a single layer. *(Experimental release only.)*
$labels = "labels_example"; // string | Arbitrary key/value labels to set on the image, as a JSON map of string pairs.
$networkmode = "networkmode_example"; // string | Sets the networking mode for the run commands during build. Supported standard values are: `bridge`, `host`, `none`, and `container:<name|id>`. Any other value is taken as a custom network's name or ID to which this container should connect to.
$platform = "platform_example"; // string | Platform in the format os[/arch[/variant]]
$target = "target_example"; // string | Target build stage
$outputs = "outputs_example"; // string | BuildKit output configuration

try {
    $apiInstance->imageBuild($body, $content_type, $x_registry_config, $dockerfile, $t, $extrahosts, $remote, $q, $nocache, $cachefrom, $pull, $rm, $forcerm, $memory, $memswap, $cpushares, $cpusetcpus, $cpuperiod, $cpuquota, $buildargs, $shmsize, $squash, $labels, $networkmode, $platform, $target, $outputs);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageBuild: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | **Object**| A tar archive compressed with one of the following algorithms: identity (no compression), gzip, bzip2, xz. | [optional]
 **content_type** | **string**|  | [optional] [default to application/x-tar]
 **x_registry_config** | **string**| This is a base64-encoded JSON object with auth configurations for multiple registries that a build may refer to.  The key is a registry URL, and the value is an auth configuration object, [as described in the authentication section](#section/Authentication). For example:  &#x60;&#x60;&#x60; {   \&quot;docker.example.com\&quot;: {     \&quot;username\&quot;: \&quot;janedoe\&quot;,     \&quot;password\&quot;: \&quot;hunter2\&quot;   },   \&quot;https://index.docker.io/v1/\&quot;: {     \&quot;username\&quot;: \&quot;mobydock\&quot;,     \&quot;password\&quot;: \&quot;conta1n3rize14\&quot;   } } &#x60;&#x60;&#x60;  Only the registry domain name (and port if not the default 443) are required. However, for legacy reasons, the Docker Hub registry must be specified with both a &#x60;https://&#x60; prefix and a &#x60;/v1/&#x60; suffix even though Docker will prefer to use the v2 registry API. | [optional]
 **dockerfile** | **string**| Path within the build context to the &#x60;Dockerfile&#x60;. This is ignored if &#x60;remote&#x60; is specified and points to an external &#x60;Dockerfile&#x60;. | [optional] [default to Dockerfile]
 **t** | **string**| A name and optional tag to apply to the image in the &#x60;name:tag&#x60; format. If you omit the tag the default &#x60;latest&#x60; value is assumed. You can provide several &#x60;t&#x60; parameters. | [optional]
 **extrahosts** | **string**| Extra hosts to add to /etc/hosts | [optional]
 **remote** | **string**| A Git repository URI or HTTP/HTTPS context URI. If the URI points to a single text file, the file’s contents are placed into a file called &#x60;Dockerfile&#x60; and the image is built from that file. If the URI points to a tarball, the file is downloaded by the daemon and the contents therein used as the context for the build. If the URI points to a tarball and the &#x60;dockerfile&#x60; parameter is also specified, there must be a file with the corresponding path inside the tarball. | [optional]
 **q** | **bool**| Suppress verbose build output. | [optional] [default to false]
 **nocache** | **bool**| Do not use the cache when building the image. | [optional] [default to false]
 **cachefrom** | **string**| JSON array of images used for build cache resolution. | [optional]
 **pull** | **string**| Attempt to pull the image even if an older image exists locally. | [optional]
 **rm** | **bool**| Remove intermediate containers after a successful build. | [optional] [default to true]
 **forcerm** | **bool**| Always remove intermediate containers, even upon failure. | [optional] [default to false]
 **memory** | **int**| Set memory limit for build. | [optional]
 **memswap** | **int**| Total memory (memory + swap). Set as &#x60;-1&#x60; to disable swap. | [optional]
 **cpushares** | **int**| CPU shares (relative weight). | [optional]
 **cpusetcpus** | **string**| CPUs in which to allow execution (e.g., &#x60;0-3&#x60;, &#x60;0,1&#x60;). | [optional]
 **cpuperiod** | **int**| The length of a CPU period in microseconds. | [optional]
 **cpuquota** | **int**| Microseconds of CPU time that the container can get in a CPU period. | [optional]
 **buildargs** | **string**| JSON map of string pairs for build-time variables. Users pass these values at build-time. Docker uses the buildargs as the environment context for commands run via the &#x60;Dockerfile&#x60; RUN instruction, or for variable expansion in other &#x60;Dockerfile&#x60; instructions. This is not meant for passing secret values.  For example, the build arg &#x60;FOO&#x3D;bar&#x60; would become &#x60;{\&quot;FOO\&quot;:\&quot;bar\&quot;}&#x60; in JSON. This would result in the query parameter &#x60;buildargs&#x3D;{\&quot;FOO\&quot;:\&quot;bar\&quot;}&#x60;. Note that &#x60;{\&quot;FOO\&quot;:\&quot;bar\&quot;}&#x60; should be URI component encoded.  [Read more about the buildargs instruction.](/engine/reference/builder/#arg) | [optional]
 **shmsize** | **int**| Size of &#x60;/dev/shm&#x60; in bytes. The size must be greater than 0. If omitted the system uses 64MB. | [optional]
 **squash** | **bool**| Squash the resulting images layers into a single layer. *(Experimental release only.)* | [optional]
 **labels** | **string**| Arbitrary key/value labels to set on the image, as a JSON map of string pairs. | [optional]
 **networkmode** | **string**| Sets the networking mode for the run commands during build. Supported standard values are: &#x60;bridge&#x60;, &#x60;host&#x60;, &#x60;none&#x60;, and &#x60;container:&lt;name|id&gt;&#x60;. Any other value is taken as a custom network&#x27;s name or ID to which this container should connect to. | [optional]
 **platform** | **string**| Platform in the format os[/arch[/variant]] | [optional]
 **target** | **string**| Target build stage | [optional]
 **outputs** | **string**| BuildKit output configuration | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/octet-stream
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCommit**
> \Docker\Client\Model\IdResponse imageCommit($body, $container, $repo, $tag, $comment, $author, $pause, $changes)

Create a new image from a container

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\ContainerConfig(); // \Docker\Client\Model\ContainerConfig | The container configuration
$container = "container_example"; // string | The ID or name of the container to commit
$repo = "repo_example"; // string | Repository name for the created image
$tag = "tag_example"; // string | Tag name for the create image
$comment = "comment_example"; // string | Commit message
$author = "author_example"; // string | Author of the image (e.g., `John Hannibal Smith <hannibal@a-team.com>`)
$pause = true; // bool | Whether to pause the container before committing
$changes = "changes_example"; // string | `Dockerfile` instructions to apply while committing

try {
    $result = $apiInstance->imageCommit($body, $container, $repo, $tag, $comment, $author, $pause, $changes);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageCommit: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Docker\Client\Model\ContainerConfig**](../Model/ContainerConfig.md)| The container configuration | [optional]
 **container** | **string**| The ID or name of the container to commit | [optional]
 **repo** | **string**| Repository name for the created image | [optional]
 **tag** | **string**| Tag name for the create image | [optional]
 **comment** | **string**| Commit message | [optional]
 **author** | **string**| Author of the image (e.g., &#x60;John Hannibal Smith &lt;hannibal@a-team.com&gt;&#x60;) | [optional]
 **pause** | **bool**| Whether to pause the container before committing | [optional] [default to true]
 **changes** | **string**| &#x60;Dockerfile&#x60; instructions to apply while committing | [optional]

### Return type

[**\Docker\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCreate**
> imageCreate($body, $x_registry_auth, $from_image, $from_src, $repo, $tag, $message, $changes, $platform)

Create an image

Create an image by either pulling it from a registry or importing it.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = "body_example"; // string | Image content if the value `-` has been specified in fromSrc query parameter
$x_registry_auth = "x_registry_auth_example"; // string | A base64url-encoded auth configuration.  Refer to the [authentication section](#section/Authentication) for details.
$from_image = "from_image_example"; // string | Name of the image to pull. The name may include a tag or digest. This parameter may only be used when pulling an image. The pull is cancelled if the HTTP connection is closed.
$from_src = "from_src_example"; // string | Source to import. The value may be a URL from which the image can be retrieved or `-` to read the image from the request body. This parameter may only be used when importing an image.
$repo = "repo_example"; // string | Repository name given to an image when it is imported. The repo may include a tag. This parameter may only be used when importing an image.
$tag = "tag_example"; // string | Tag or digest. If empty when pulling an image, this causes all tags for the given image to be pulled.
$message = "message_example"; // string | Set commit message for imported image.
$changes = array("changes_example"); // string[] | Apply `Dockerfile` instructions to the image that is created, for example: `changes=ENV DEBUG=true`. Note that `ENV DEBUG=true` should be URI component encoded.  Supported `Dockerfile` instructions: `CMD`|`ENTRYPOINT`|`ENV`|`EXPOSE`|`ONBUILD`|`USER`|`VOLUME`|`WORKDIR`
$platform = "platform_example"; // string | Platform in the format os[/arch[/variant]]

try {
    $apiInstance->imageCreate($body, $x_registry_auth, $from_image, $from_src, $repo, $tag, $message, $changes, $platform);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**string**](../Model/string.md)| Image content if the value &#x60;-&#x60; has been specified in fromSrc query parameter | [optional]
 **x_registry_auth** | **string**| A base64url-encoded auth configuration.  Refer to the [authentication section](#section/Authentication) for details. | [optional]
 **from_image** | **string**| Name of the image to pull. The name may include a tag or digest. This parameter may only be used when pulling an image. The pull is cancelled if the HTTP connection is closed. | [optional]
 **from_src** | **string**| Source to import. The value may be a URL from which the image can be retrieved or &#x60;-&#x60; to read the image from the request body. This parameter may only be used when importing an image. | [optional]
 **repo** | **string**| Repository name given to an image when it is imported. The repo may include a tag. This parameter may only be used when importing an image. | [optional]
 **tag** | **string**| Tag or digest. If empty when pulling an image, this causes all tags for the given image to be pulled. | [optional]
 **message** | **string**| Set commit message for imported image. | [optional]
 **changes** | [**string[]**](../Model/string.md)| Apply &#x60;Dockerfile&#x60; instructions to the image that is created, for example: &#x60;changes&#x3D;ENV DEBUG&#x3D;true&#x60;. Note that &#x60;ENV DEBUG&#x3D;true&#x60; should be URI component encoded.  Supported &#x60;Dockerfile&#x60; instructions: &#x60;CMD&#x60;|&#x60;ENTRYPOINT&#x60;|&#x60;ENV&#x60;|&#x60;EXPOSE&#x60;|&#x60;ONBUILD&#x60;|&#x60;USER&#x60;|&#x60;VOLUME&#x60;|&#x60;WORKDIR&#x60; | [optional]
 **platform** | **string**| Platform in the format os[/arch[/variant]] | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: text/plain, application/octet-stream
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageDelete**
> \Docker\Client\Model\ImageDeleteResponseItem[] imageDelete($name, $force, $noprune)

Remove an image

Remove an image, along with any untagged parent images that were referenced by that image.  Images can't be removed if they have descendant images, are being used by a running container or are being used by a build.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Image name or ID
$force = false; // bool | Remove the image even if it is being used by stopped containers or has other tags
$noprune = false; // bool | Do not delete untagged parent images

try {
    $result = $apiInstance->imageDelete($name, $force, $noprune);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Image name or ID |
 **force** | **bool**| Remove the image even if it is being used by stopped containers or has other tags | [optional] [default to false]
 **noprune** | **bool**| Do not delete untagged parent images | [optional] [default to false]

### Return type

[**\Docker\Client\Model\ImageDeleteResponseItem[]**](../Model/ImageDeleteResponseItem.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageGet**
> string imageGet($name)

Export an image

Get a tarball containing all images and metadata for a repository.  If `name` is a specific name and tag (e.g. `ubuntu:latest`), then only that image (and its parents) are returned. If `name` is an image ID, similarly only that image (and its parents) are returned, but with the exclusion of the `repositories` file in the tarball, as there were no image names referenced.  ### Image tarball format  An image tarball contains one directory per image layer (named using its long ID), each containing these files:  - `VERSION`: currently `1.0` - the file format version - `json`: detailed layer information, similar to `docker inspect layer_id` - `layer.tar`: A tarfile containing the filesystem changes in this layer  The `layer.tar` file contains `aufs` style `.wh..wh.aufs` files and directories for storing attribute changes and deletions.  If the tarball defines a repository, the tarball should also include a `repositories` file at the root that contains a list of repository and tag names mapped to layer IDs.  ```json {   \"hello-world\": {     \"latest\": \"565a9d68a73f6706862bfe8409a7f659776d4d60a8d096eb4a3cbce6999cc2a1\"   } } ```

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Image name or ID

try {
    $result = $apiInstance->imageGet($name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Image name or ID |

### Return type

**string**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/x-tar

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageGetAll**
> string imageGetAll($names)

Export several images

Get a tarball containing all images and metadata for several image repositories.  For each value of the `names` parameter: if it is a specific name and tag (e.g. `ubuntu:latest`), then only that image (and its parents) are returned; if it is an image ID, similarly only that image (and its parents) are returned and there would be no names referenced in the 'repositories' file for this image ID.  For details on the format, see the [export image endpoint](#operation/ImageGet).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$names = array("names_example"); // string[] | Image names to filter by

try {
    $result = $apiInstance->imageGetAll($names);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageGetAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **names** | [**string[]**](../Model/string.md)| Image names to filter by | [optional]

### Return type

**string**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/x-tar

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageHistory**
> \Docker\Client\Model\HistoryResponseItem[] imageHistory($name)

Get the history of an image

Return parent layers of an image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Image name or ID

try {
    $result = $apiInstance->imageHistory($name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageHistory: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Image name or ID |

### Return type

[**\Docker\Client\Model\HistoryResponseItem[]**](../Model/HistoryResponseItem.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageInspect**
> \Docker\Client\Model\Image imageInspect($name)

Inspect an image

Return low-level information about an image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Image name or id

try {
    $result = $apiInstance->imageInspect($name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageInspect: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Image name or id |

### Return type

[**\Docker\Client\Model\Image**](../Model/Image.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageList**
> \Docker\Client\Model\ImageSummary[] imageList($all, $filters, $digests)

List Images

Returns a list of images on the server. Note that it uses a different, smaller representation of an image than inspecting a single image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$all = false; // bool | Show all images. Only images from a final layer (no children) are shown by default.
$filters = "filters_example"; // string | A JSON encoded value of the filters (a `map[string][]string`) to process on the images list.  Available filters:  - `before`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`) - `dangling=true` - `label=key` or `label=\"key=value\"` of an image label - `reference`=(`<image-name>[:<tag>]`) - `since`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
$digests = false; // bool | Show digest information as a `RepoDigests` field on each image.

try {
    $result = $apiInstance->imageList($all, $filters, $digests);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **all** | **bool**| Show all images. Only images from a final layer (no children) are shown by default. | [optional] [default to false]
 **filters** | **string**| A JSON encoded value of the filters (a &#x60;map[string][]string&#x60;) to process on the images list.  Available filters:  - &#x60;before&#x60;&#x3D;(&#x60;&lt;image-name&gt;[:&lt;tag&gt;]&#x60;,  &#x60;&lt;image id&gt;&#x60; or &#x60;&lt;image@digest&gt;&#x60;) - &#x60;dangling&#x3D;true&#x60; - &#x60;label&#x3D;key&#x60; or &#x60;label&#x3D;\&quot;key&#x3D;value\&quot;&#x60; of an image label - &#x60;reference&#x60;&#x3D;(&#x60;&lt;image-name&gt;[:&lt;tag&gt;]&#x60;) - &#x60;since&#x60;&#x3D;(&#x60;&lt;image-name&gt;[:&lt;tag&gt;]&#x60;,  &#x60;&lt;image id&gt;&#x60; or &#x60;&lt;image@digest&gt;&#x60;) | [optional]
 **digests** | **bool**| Show digest information as a &#x60;RepoDigests&#x60; field on each image. | [optional] [default to false]

### Return type

[**\Docker\Client\Model\ImageSummary[]**](../Model/ImageSummary.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageLoad**
> imageLoad($body, $quiet)

Import images

Load a set of images and tags into a repository.  For details on the format, see the [export image endpoint](#operation/ImageGet).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\Object(); // Object | Tar archive containing images
$quiet = false; // bool | Suppress progress details during load.

try {
    $apiInstance->imageLoad($body, $quiet);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageLoad: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | **Object**| Tar archive containing images | [optional]
 **quiet** | **bool**| Suppress progress details during load. | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-tar
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imagePrune**
> \Docker\Client\Model\ImagePruneResponse imagePrune($filters)

Delete unused images

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$filters = "filters_example"; // string | Filters to process on the prune list, encoded as JSON (a `map[string][]string`). Available filters:  - `dangling=<boolean>` When set to `true` (or `1`), prune only    unused *and* untagged images. When set to `false`    (or `0`), all unused images are pruned. - `until=<string>` Prune images created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time. - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune images with (or without, in case `label!=...` is used) the specified labels.

try {
    $result = $apiInstance->imagePrune($filters);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imagePrune: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filters** | **string**| Filters to process on the prune list, encoded as JSON (a &#x60;map[string][]string&#x60;). Available filters:  - &#x60;dangling&#x3D;&lt;boolean&gt;&#x60; When set to &#x60;true&#x60; (or &#x60;1&#x60;), prune only    unused *and* untagged images. When set to &#x60;false&#x60;    (or &#x60;0&#x60;), all unused images are pruned. - &#x60;until&#x3D;&lt;string&gt;&#x60; Prune images created before this timestamp. The &#x60;&lt;timestamp&gt;&#x60; can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. &#x60;10m&#x60;, &#x60;1h30m&#x60;) computed relative to the daemon machine’s time. - &#x60;label&#x60; (&#x60;label&#x3D;&lt;key&gt;&#x60;, &#x60;label&#x3D;&lt;key&gt;&#x3D;&lt;value&gt;&#x60;, &#x60;label!&#x3D;&lt;key&gt;&#x60;, or &#x60;label!&#x3D;&lt;key&gt;&#x3D;&lt;value&gt;&#x60;) Prune images with (or without, in case &#x60;label!&#x3D;...&#x60; is used) the specified labels. | [optional]

### Return type

[**\Docker\Client\Model\ImagePruneResponse**](../Model/ImagePruneResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imagePush**
> imagePush($name, $x_registry_auth, $tag)

Push an image

Push an image to a registry.  If you wish to push an image on to a private registry, that image must already have a tag which references the registry. For example, `registry.example.com/myimage:latest`.  The push is cancelled if the HTTP connection is closed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Image name or ID.
$x_registry_auth = "x_registry_auth_example"; // string | A base64url-encoded auth configuration.  Refer to the [authentication section](#section/Authentication) for details.
$tag = "tag_example"; // string | The tag to associate with the image on the registry.

try {
    $apiInstance->imagePush($name, $x_registry_auth, $tag);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imagePush: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Image name or ID. |
 **x_registry_auth** | **string**| A base64url-encoded auth configuration.  Refer to the [authentication section](#section/Authentication) for details. |
 **tag** | **string**| The tag to associate with the image on the registry. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageSearch**
> \Docker\Client\Model\ImageSearchResponseItem[] imageSearch($term, $limit, $filters)

Search images

Search for an image on Docker Hub.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$term = "term_example"; // string | Term to search
$limit = 56; // int | Maximum number of results to return
$filters = "filters_example"; // string | A JSON encoded value of the filters (a `map[string][]string`) to process on the images list. Available filters:  - `is-automated=(true|false)` - `is-official=(true|false)` - `stars=<number>` Matches images that has at least 'number' stars.

try {
    $result = $apiInstance->imageSearch($term, $limit, $filters);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **term** | **string**| Term to search |
 **limit** | **int**| Maximum number of results to return | [optional]
 **filters** | **string**| A JSON encoded value of the filters (a &#x60;map[string][]string&#x60;) to process on the images list. Available filters:  - &#x60;is-automated&#x3D;(true|false)&#x60; - &#x60;is-official&#x3D;(true|false)&#x60; - &#x60;stars&#x3D;&lt;number&gt;&#x60; Matches images that has at least &#x27;number&#x27; stars. | [optional]

### Return type

[**\Docker\Client\Model\ImageSearchResponseItem[]**](../Model/ImageSearchResponseItem.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageTag**
> imageTag($name, $repo, $tag)

Tag an image

Tag an image so that it becomes part of a repository.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ImageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$name = "name_example"; // string | Image name or ID to tag.
$repo = "repo_example"; // string | The repository to tag in. For example, `someuser/someimage`.
$tag = "tag_example"; // string | The name of the new tag.

try {
    $apiInstance->imageTag($name, $repo, $tag);
} catch (Exception $e) {
    echo 'Exception when calling ImageApi->imageTag: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Image name or ID to tag. |
 **repo** | **string**| The repository to tag in. For example, &#x60;someuser/someimage&#x60;. | [optional]
 **tag** | **string**| The name of the new tag. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

