# SwaggerClient-php
The Engine API is an HTTP API served by Docker Engine. It is the API the Docker client uses to communicate with the Engine, so everything the Docker client can do can be done with the API.  Most of the client's commands map directly to API endpoints (e.g. `docker ps` is `GET /containers/json`). The notable exception is running containers, which consists of several API calls.  # Errors  The API uses standard HTTP status codes to indicate the success or failure of the API call. The body of the response will be JSON in the following format:  ``` {   \"message\": \"page not found\" } ```  # Versioning  The API is usually changed in each release, so API calls are versioned to ensure that clients don't break. To lock to a specific version of the API, you prefix the URL with its version, for example, call `/v1.30/info` to use the v1.30 version of the `/info` endpoint. If the API version specified in the URL is not supported by the daemon, a HTTP `400 Bad Request` error message is returned.  If you omit the version-prefix, the current version of the API (v1.41) is used. For example, calling `/info` is the same as calling `/v1.41/info`. Using the API without a version-prefix is deprecated and will be removed in a future release.  Engine releases in the near future should support this version of the API, so your client will continue to work even if it is talking to a newer Engine.  The API uses an open schema model, which means server may add extra properties to responses. Likewise, the server will ignore any extra query parameters and request body properties. When you write clients, you need to ignore additional properties in responses to ensure they do not break when talking to newer daemons.   # Authentication  Authentication for registries is handled client side. The client has to send authentication details to various endpoints that need to communicate with registries, such as `POST /images/(name)/push`. These are sent as `X-Registry-Auth` header as a [base64url encoded](https://tools.ietf.org/html/rfc4648#section-5) (JSON) string with the following structure:  ``` {   \"username\": \"string\",   \"password\": \"string\",   \"email\": \"string\",   \"serveraddress\": \"string\" } ```  The `serveraddress` is a domain/IP without a protocol. Throughout this structure, double quotes are required.  If you have already got an identity token from the [`/auth` endpoint](#operation/SystemAuth), you can just pass this instead of credentials:  ``` {   \"identitytoken\": \"9cbaf023786cd7...\" } ```

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 1.41
- Build package: io.swagger.codegen.v3.generators.php.PhpClientCodegen

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ConfigApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\ConfigsCreateBody(); // \Docker\Client\Model\ConfigsCreateBody | 

try {
    $result = $apiInstance->configCreate($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConfigApi->configCreate: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Docker\Client\Api\ConfigApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID of the config

try {
    $apiInstance->configDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ConfigApi->configDelete: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Docker\Client\Api\ConfigApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | ID of the config

try {
    $result = $apiInstance->configInspect($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConfigApi->configInspect: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Docker\Client\Api\ConfigApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$filters = "filters_example"; // string | A JSON encoded value of the filters (a `map[string][]string`) to process on the configs list.  Available filters:  - `id=<config id>` - `label=<key> or label=<key>=value` - `name=<config name>` - `names=<config name>`

try {
    $result = $apiInstance->configList($filters);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConfigApi->configList: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Docker\Client\Api\ConfigApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$version = 789; // int | The version number of the config object being updated. This is required to avoid conflicting writes.
$id = "id_example"; // string | The ID or name of the config
$body = new \Docker\Client\Model\ConfigSpec(); // \Docker\Client\Model\ConfigSpec | The spec of the config to update. Currently, only the Labels field
can be updated. All other fields must remain unchanged from the
[ConfigInspect endpoint](#operation/ConfigInspect) response values.


try {
    $apiInstance->configUpdate($version, $id, $body);
} catch (Exception $e) {
    echo 'Exception when calling ConfigApi->configUpdate: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentation for API Endpoints

All URIs are relative to *http://127.0.0.1/v1.41*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ConfigApi* | [**configCreate**](docs/Api/ConfigApi.md#configcreate) | **POST** /configs/create | Create a config
*ConfigApi* | [**configDelete**](docs/Api/ConfigApi.md#configdelete) | **DELETE** /configs/{id} | Delete a config
*ConfigApi* | [**configInspect**](docs/Api/ConfigApi.md#configinspect) | **GET** /configs/{id} | Inspect a config
*ConfigApi* | [**configList**](docs/Api/ConfigApi.md#configlist) | **GET** /configs | List configs
*ConfigApi* | [**configUpdate**](docs/Api/ConfigApi.md#configupdate) | **POST** /configs/{id}/update | Update a Config
*ContainerApi* | [**containerArchive**](docs/Api/ContainerApi.md#containerarchive) | **GET** /containers/{id}/archive | Get an archive of a filesystem resource in a container
*ContainerApi* | [**containerArchiveInfo**](docs/Api/ContainerApi.md#containerarchiveinfo) | **HEAD** /containers/{id}/archive | Get information about files in a container
*ContainerApi* | [**containerAttach**](docs/Api/ContainerApi.md#containerattach) | **POST** /containers/{id}/attach | Attach to a container
*ContainerApi* | [**containerAttachWebsocket**](docs/Api/ContainerApi.md#containerattachwebsocket) | **GET** /containers/{id}/attach/ws | Attach to a container via a websocket
*ContainerApi* | [**containerChanges**](docs/Api/ContainerApi.md#containerchanges) | **GET** /containers/{id}/changes | Get changes on a container’s filesystem
*ContainerApi* | [**containerCreate**](docs/Api/ContainerApi.md#containercreate) | **POST** /containers/create | Create a container
*ContainerApi* | [**containerDelete**](docs/Api/ContainerApi.md#containerdelete) | **DELETE** /containers/{id} | Remove a container
*ContainerApi* | [**containerExport**](docs/Api/ContainerApi.md#containerexport) | **GET** /containers/{id}/export | Export a container
*ContainerApi* | [**containerInspect**](docs/Api/ContainerApi.md#containerinspect) | **GET** /containers/{id}/json | Inspect a container
*ContainerApi* | [**containerKill**](docs/Api/ContainerApi.md#containerkill) | **POST** /containers/{id}/kill | Kill a container
*ContainerApi* | [**containerList**](docs/Api/ContainerApi.md#containerlist) | **GET** /containers/json | List containers
*ContainerApi* | [**containerLogs**](docs/Api/ContainerApi.md#containerlogs) | **GET** /containers/{id}/logs | Get container logs
*ContainerApi* | [**containerPause**](docs/Api/ContainerApi.md#containerpause) | **POST** /containers/{id}/pause | Pause a container
*ContainerApi* | [**containerPrune**](docs/Api/ContainerApi.md#containerprune) | **POST** /containers/prune | Delete stopped containers
*ContainerApi* | [**containerRename**](docs/Api/ContainerApi.md#containerrename) | **POST** /containers/{id}/rename | Rename a container
*ContainerApi* | [**containerResize**](docs/Api/ContainerApi.md#containerresize) | **POST** /containers/{id}/resize | Resize a container TTY
*ContainerApi* | [**containerRestart**](docs/Api/ContainerApi.md#containerrestart) | **POST** /containers/{id}/restart | Restart a container
*ContainerApi* | [**containerStart**](docs/Api/ContainerApi.md#containerstart) | **POST** /containers/{id}/start | Start a container
*ContainerApi* | [**containerStats**](docs/Api/ContainerApi.md#containerstats) | **GET** /containers/{id}/stats | Get container stats based on resource usage
*ContainerApi* | [**containerStop**](docs/Api/ContainerApi.md#containerstop) | **POST** /containers/{id}/stop | Stop a container
*ContainerApi* | [**containerTop**](docs/Api/ContainerApi.md#containertop) | **GET** /containers/{id}/top | List processes running inside a container
*ContainerApi* | [**containerUnpause**](docs/Api/ContainerApi.md#containerunpause) | **POST** /containers/{id}/unpause | Unpause a container
*ContainerApi* | [**containerUpdate**](docs/Api/ContainerApi.md#containerupdate) | **POST** /containers/{id}/update | Update a container
*ContainerApi* | [**containerWait**](docs/Api/ContainerApi.md#containerwait) | **POST** /containers/{id}/wait | Wait for a container
*ContainerApi* | [**putContainerArchive**](docs/Api/ContainerApi.md#putcontainerarchive) | **PUT** /containers/{id}/archive | Extract an archive of files or folders to a directory in a container
*DistributionApi* | [**distributionInspect**](docs/Api/DistributionApi.md#distributioninspect) | **GET** /distribution/{name}/json | Get image information from the registry
*ExecApi* | [**containerExec**](docs/Api/ExecApi.md#containerexec) | **POST** /containers/{id}/exec | Create an exec instance
*ExecApi* | [**execInspect**](docs/Api/ExecApi.md#execinspect) | **GET** /exec/{id}/json | Inspect an exec instance
*ExecApi* | [**execResize**](docs/Api/ExecApi.md#execresize) | **POST** /exec/{id}/resize | Resize an exec instance
*ExecApi* | [**execStart**](docs/Api/ExecApi.md#execstart) | **POST** /exec/{id}/start | Start an exec instance
*ImageApi* | [**buildPrune**](docs/Api/ImageApi.md#buildprune) | **POST** /build/prune | Delete builder cache
*ImageApi* | [**imageBuild**](docs/Api/ImageApi.md#imagebuild) | **POST** /build | Build an image
*ImageApi* | [**imageCommit**](docs/Api/ImageApi.md#imagecommit) | **POST** /commit | Create a new image from a container
*ImageApi* | [**imageCreate**](docs/Api/ImageApi.md#imagecreate) | **POST** /images/create | Create an image
*ImageApi* | [**imageDelete**](docs/Api/ImageApi.md#imagedelete) | **DELETE** /images/{name} | Remove an image
*ImageApi* | [**imageGet**](docs/Api/ImageApi.md#imageget) | **GET** /images/{name}/get | Export an image
*ImageApi* | [**imageGetAll**](docs/Api/ImageApi.md#imagegetall) | **GET** /images/get | Export several images
*ImageApi* | [**imageHistory**](docs/Api/ImageApi.md#imagehistory) | **GET** /images/{name}/history | Get the history of an image
*ImageApi* | [**imageInspect**](docs/Api/ImageApi.md#imageinspect) | **GET** /images/{name}/json | Inspect an image
*ImageApi* | [**imageList**](docs/Api/ImageApi.md#imagelist) | **GET** /images/json | List Images
*ImageApi* | [**imageLoad**](docs/Api/ImageApi.md#imageload) | **POST** /images/load | Import images
*ImageApi* | [**imagePrune**](docs/Api/ImageApi.md#imageprune) | **POST** /images/prune | Delete unused images
*ImageApi* | [**imagePush**](docs/Api/ImageApi.md#imagepush) | **POST** /images/{name}/push | Push an image
*ImageApi* | [**imageSearch**](docs/Api/ImageApi.md#imagesearch) | **GET** /images/search | Search images
*ImageApi* | [**imageTag**](docs/Api/ImageApi.md#imagetag) | **POST** /images/{name}/tag | Tag an image
*NetworkApi* | [**networkConnect**](docs/Api/NetworkApi.md#networkconnect) | **POST** /networks/{id}/connect | Connect a container to a network
*NetworkApi* | [**networkCreate**](docs/Api/NetworkApi.md#networkcreate) | **POST** /networks/create | Create a network
*NetworkApi* | [**networkDelete**](docs/Api/NetworkApi.md#networkdelete) | **DELETE** /networks/{id} | Remove a network
*NetworkApi* | [**networkDisconnect**](docs/Api/NetworkApi.md#networkdisconnect) | **POST** /networks/{id}/disconnect | Disconnect a container from a network
*NetworkApi* | [**networkInspect**](docs/Api/NetworkApi.md#networkinspect) | **GET** /networks/{id} | Inspect a network
*NetworkApi* | [**networkList**](docs/Api/NetworkApi.md#networklist) | **GET** /networks | List networks
*NetworkApi* | [**networkPrune**](docs/Api/NetworkApi.md#networkprune) | **POST** /networks/prune | Delete unused networks
*NodeApi* | [**nodeDelete**](docs/Api/NodeApi.md#nodedelete) | **DELETE** /nodes/{id} | Delete a node
*NodeApi* | [**nodeInspect**](docs/Api/NodeApi.md#nodeinspect) | **GET** /nodes/{id} | Inspect a node
*NodeApi* | [**nodeList**](docs/Api/NodeApi.md#nodelist) | **GET** /nodes | List nodes
*NodeApi* | [**nodeUpdate**](docs/Api/NodeApi.md#nodeupdate) | **POST** /nodes/{id}/update | Update a node
*PluginApi* | [**getPluginPrivileges**](docs/Api/PluginApi.md#getpluginprivileges) | **GET** /plugins/privileges | Get plugin privileges
*PluginApi* | [**pluginCreate**](docs/Api/PluginApi.md#plugincreate) | **POST** /plugins/create | Create a plugin
*PluginApi* | [**pluginDelete**](docs/Api/PluginApi.md#plugindelete) | **DELETE** /plugins/{name} | Remove a plugin
*PluginApi* | [**pluginDisable**](docs/Api/PluginApi.md#plugindisable) | **POST** /plugins/{name}/disable | Disable a plugin
*PluginApi* | [**pluginEnable**](docs/Api/PluginApi.md#pluginenable) | **POST** /plugins/{name}/enable | Enable a plugin
*PluginApi* | [**pluginInspect**](docs/Api/PluginApi.md#plugininspect) | **GET** /plugins/{name}/json | Inspect a plugin
*PluginApi* | [**pluginList**](docs/Api/PluginApi.md#pluginlist) | **GET** /plugins | List plugins
*PluginApi* | [**pluginPull**](docs/Api/PluginApi.md#pluginpull) | **POST** /plugins/pull | Install a plugin
*PluginApi* | [**pluginPush**](docs/Api/PluginApi.md#pluginpush) | **POST** /plugins/{name}/push | Push a plugin
*PluginApi* | [**pluginSet**](docs/Api/PluginApi.md#pluginset) | **POST** /plugins/{name}/set | Configure a plugin
*PluginApi* | [**pluginUpgrade**](docs/Api/PluginApi.md#pluginupgrade) | **POST** /plugins/{name}/upgrade | Upgrade a plugin
*SecretApi* | [**secretCreate**](docs/Api/SecretApi.md#secretcreate) | **POST** /secrets/create | Create a secret
*SecretApi* | [**secretDelete**](docs/Api/SecretApi.md#secretdelete) | **DELETE** /secrets/{id} | Delete a secret
*SecretApi* | [**secretInspect**](docs/Api/SecretApi.md#secretinspect) | **GET** /secrets/{id} | Inspect a secret
*SecretApi* | [**secretList**](docs/Api/SecretApi.md#secretlist) | **GET** /secrets | List secrets
*SecretApi* | [**secretUpdate**](docs/Api/SecretApi.md#secretupdate) | **POST** /secrets/{id}/update | Update a Secret
*ServiceApi* | [**serviceCreate**](docs/Api/ServiceApi.md#servicecreate) | **POST** /services/create | Create a service
*ServiceApi* | [**serviceDelete**](docs/Api/ServiceApi.md#servicedelete) | **DELETE** /services/{id} | Delete a service
*ServiceApi* | [**serviceInspect**](docs/Api/ServiceApi.md#serviceinspect) | **GET** /services/{id} | Inspect a service
*ServiceApi* | [**serviceList**](docs/Api/ServiceApi.md#servicelist) | **GET** /services | List services
*ServiceApi* | [**serviceLogs**](docs/Api/ServiceApi.md#servicelogs) | **GET** /services/{id}/logs | Get service logs
*ServiceApi* | [**serviceUpdate**](docs/Api/ServiceApi.md#serviceupdate) | **POST** /services/{id}/update | Update a service
*SessionApi* | [**session**](docs/Api/SessionApi.md#session) | **POST** /session | Initialize interactive session
*SwarmApi* | [**swarmInit**](docs/Api/SwarmApi.md#swarminit) | **POST** /swarm/init | Initialize a new swarm
*SwarmApi* | [**swarmInspect**](docs/Api/SwarmApi.md#swarminspect) | **GET** /swarm | Inspect swarm
*SwarmApi* | [**swarmJoin**](docs/Api/SwarmApi.md#swarmjoin) | **POST** /swarm/join | Join an existing swarm
*SwarmApi* | [**swarmLeave**](docs/Api/SwarmApi.md#swarmleave) | **POST** /swarm/leave | Leave a swarm
*SwarmApi* | [**swarmUnlock**](docs/Api/SwarmApi.md#swarmunlock) | **POST** /swarm/unlock | Unlock a locked manager
*SwarmApi* | [**swarmUnlockkey**](docs/Api/SwarmApi.md#swarmunlockkey) | **GET** /swarm/unlockkey | Get the unlock key
*SwarmApi* | [**swarmUpdate**](docs/Api/SwarmApi.md#swarmupdate) | **POST** /swarm/update | Update a swarm
*SystemApi* | [**systemAuth**](docs/Api/SystemApi.md#systemauth) | **POST** /auth | Check auth configuration
*SystemApi* | [**systemDataUsage**](docs/Api/SystemApi.md#systemdatausage) | **GET** /system/df | Get data usage information
*SystemApi* | [**systemEvents**](docs/Api/SystemApi.md#systemevents) | **GET** /events | Monitor events
*SystemApi* | [**systemInfo**](docs/Api/SystemApi.md#systeminfo) | **GET** /info | Get system information
*SystemApi* | [**systemPing**](docs/Api/SystemApi.md#systemping) | **GET** /_ping | Ping
*SystemApi* | [**systemPingHead**](docs/Api/SystemApi.md#systempinghead) | **HEAD** /_ping | Ping
*SystemApi* | [**systemVersion**](docs/Api/SystemApi.md#systemversion) | **GET** /version | Get version
*TaskApi* | [**taskInspect**](docs/Api/TaskApi.md#taskinspect) | **GET** /tasks/{id} | Inspect a task
*TaskApi* | [**taskList**](docs/Api/TaskApi.md#tasklist) | **GET** /tasks | List tasks
*TaskApi* | [**taskLogs**](docs/Api/TaskApi.md#tasklogs) | **GET** /tasks/{id}/logs | Get task logs
*VolumeApi* | [**volumeCreate**](docs/Api/VolumeApi.md#volumecreate) | **POST** /volumes/create | Create a volume
*VolumeApi* | [**volumeDelete**](docs/Api/VolumeApi.md#volumedelete) | **DELETE** /volumes/{name} | Remove a volume
*VolumeApi* | [**volumeInspect**](docs/Api/VolumeApi.md#volumeinspect) | **GET** /volumes/{name} | Inspect a volume
*VolumeApi* | [**volumeList**](docs/Api/VolumeApi.md#volumelist) | **GET** /volumes | List volumes
*VolumeApi* | [**volumePrune**](docs/Api/VolumeApi.md#volumeprune) | **POST** /volumes/prune | Delete unused volumes

## Documentation For Models

 - [Address](docs/Model/Address.md)
 - [AuthConfig](docs/Model/AuthConfig.md)
 - [BuildCache](docs/Model/BuildCache.md)
 - [BuildInfo](docs/Model/BuildInfo.md)
 - [BuildPruneResponse](docs/Model/BuildPruneResponse.md)
 - [ClusterInfo](docs/Model/ClusterInfo.md)
 - [Commit](docs/Model/Commit.md)
 - [Config](docs/Model/Config.md)
 - [ConfigSpec](docs/Model/ConfigSpec.md)
 - [ConfigsCreateBody](docs/Model/ConfigsCreateBody.md)
 - [ContainerChangeResponseItem](docs/Model/ContainerChangeResponseItem.md)
 - [ContainerConfig](docs/Model/ContainerConfig.md)
 - [ContainerCreateResponse](docs/Model/ContainerCreateResponse.md)
 - [ContainerInspectResponse](docs/Model/ContainerInspectResponse.md)
 - [ContainerPruneResponse](docs/Model/ContainerPruneResponse.md)
 - [ContainerState](docs/Model/ContainerState.md)
 - [ContainerSummary](docs/Model/ContainerSummary.md)
 - [ContainerSummaryHostConfig](docs/Model/ContainerSummaryHostConfig.md)
 - [ContainerSummaryNetworkSettings](docs/Model/ContainerSummaryNetworkSettings.md)
 - [ContainerTopResponse](docs/Model/ContainerTopResponse.md)
 - [ContainerUpdateResponse](docs/Model/ContainerUpdateResponse.md)
 - [ContainerWaitResponse](docs/Model/ContainerWaitResponse.md)
 - [ContainerWaitResponseError](docs/Model/ContainerWaitResponseError.md)
 - [ContainersCreateBody](docs/Model/ContainersCreateBody.md)
 - [ContainersCreateBody1](docs/Model/ContainersCreateBody1.md)
 - [CreateImageInfo](docs/Model/CreateImageInfo.md)
 - [DeviceMapping](docs/Model/DeviceMapping.md)
 - [DeviceRequest](docs/Model/DeviceRequest.md)
 - [DistributionInspect](docs/Model/DistributionInspect.md)
 - [Driver](docs/Model/Driver.md)
 - [EndpointIPAMConfig](docs/Model/EndpointIPAMConfig.md)
 - [EndpointPortConfig](docs/Model/EndpointPortConfig.md)
 - [EndpointSettings](docs/Model/EndpointSettings.md)
 - [EndpointSpec](docs/Model/EndpointSpec.md)
 - [EngineDescription](docs/Model/EngineDescription.md)
 - [EngineDescriptionPlugins](docs/Model/EngineDescriptionPlugins.md)
 - [ErrorDetail](docs/Model/ErrorDetail.md)
 - [ErrorResponse](docs/Model/ErrorResponse.md)
 - [EventActor](docs/Model/EventActor.md)
 - [EventMessage](docs/Model/EventMessage.md)
 - [ExecConfig](docs/Model/ExecConfig.md)
 - [ExecInspectResponse](docs/Model/ExecInspectResponse.md)
 - [ExecStartConfig](docs/Model/ExecStartConfig.md)
 - [GenericResources](docs/Model/GenericResources.md)
 - [GenericResourcesInner](docs/Model/GenericResourcesInner.md)
 - [GraphDriverData](docs/Model/GraphDriverData.md)
 - [Health](docs/Model/Health.md)
 - [HealthConfig](docs/Model/HealthConfig.md)
 - [HealthcheckResult](docs/Model/HealthcheckResult.md)
 - [HistoryResponseItem](docs/Model/HistoryResponseItem.md)
 - [HostConfig](docs/Model/HostConfig.md)
 - [HostConfigLogConfig](docs/Model/HostConfigLogConfig.md)
 - [IPAM](docs/Model/IPAM.md)
 - [IdResponse](docs/Model/IdResponse.md)
 - [IdUpdateBody](docs/Model/IdUpdateBody.md)
 - [IdUpdateBody1](docs/Model/IdUpdateBody1.md)
 - [Image](docs/Model/Image.md)
 - [ImageDeleteResponseItem](docs/Model/ImageDeleteResponseItem.md)
 - [ImageID](docs/Model/ImageID.md)
 - [ImageMetadata](docs/Model/ImageMetadata.md)
 - [ImagePruneResponse](docs/Model/ImagePruneResponse.md)
 - [ImageRootFS](docs/Model/ImageRootFS.md)
 - [ImageSearchResponseItem](docs/Model/ImageSearchResponseItem.md)
 - [ImageSummary](docs/Model/ImageSummary.md)
 - [IndexInfo](docs/Model/IndexInfo.md)
 - [InlineResponse400](docs/Model/InlineResponse400.md)
 - [JoinTokens](docs/Model/JoinTokens.md)
 - [Limit](docs/Model/Limit.md)
 - [LocalNodeState](docs/Model/LocalNodeState.md)
 - [ManagerStatus](docs/Model/ManagerStatus.md)
 - [Mount](docs/Model/Mount.md)
 - [MountBindOptions](docs/Model/MountBindOptions.md)
 - [MountPoint](docs/Model/MountPoint.md)
 - [MountTmpfsOptions](docs/Model/MountTmpfsOptions.md)
 - [MountVolumeOptions](docs/Model/MountVolumeOptions.md)
 - [MountVolumeOptionsDriverConfig](docs/Model/MountVolumeOptionsDriverConfig.md)
 - [Network](docs/Model/Network.md)
 - [NetworkAttachmentConfig](docs/Model/NetworkAttachmentConfig.md)
 - [NetworkConnectRequest](docs/Model/NetworkConnectRequest.md)
 - [NetworkContainer](docs/Model/NetworkContainer.md)
 - [NetworkCreateRequest](docs/Model/NetworkCreateRequest.md)
 - [NetworkCreateResponse](docs/Model/NetworkCreateResponse.md)
 - [NetworkDisconnectRequest](docs/Model/NetworkDisconnectRequest.md)
 - [NetworkPruneResponse](docs/Model/NetworkPruneResponse.md)
 - [NetworkSettings](docs/Model/NetworkSettings.md)
 - [NetworkingConfig](docs/Model/NetworkingConfig.md)
 - [Node](docs/Model/Node.md)
 - [NodeDescription](docs/Model/NodeDescription.md)
 - [NodeSpec](docs/Model/NodeSpec.md)
 - [NodeState](docs/Model/NodeState.md)
 - [NodeStatus](docs/Model/NodeStatus.md)
 - [OCIDescriptor](docs/Model/OCIDescriptor.md)
 - [OCIPlatform](docs/Model/OCIPlatform.md)
 - [ObjectVersion](docs/Model/ObjectVersion.md)
 - [PeerNode](docs/Model/PeerNode.md)
 - [Platform](docs/Model/Platform.md)
 - [Plugin](docs/Model/Plugin.md)
 - [PluginConfig](docs/Model/PluginConfig.md)
 - [PluginConfigArgs](docs/Model/PluginConfigArgs.md)
 - [PluginConfigInterface](docs/Model/PluginConfigInterface.md)
 - [PluginConfigLinux](docs/Model/PluginConfigLinux.md)
 - [PluginConfigNetwork](docs/Model/PluginConfigNetwork.md)
 - [PluginConfigRootfs](docs/Model/PluginConfigRootfs.md)
 - [PluginConfigUser](docs/Model/PluginConfigUser.md)
 - [PluginDevice](docs/Model/PluginDevice.md)
 - [PluginEnv](docs/Model/PluginEnv.md)
 - [PluginInterfaceType](docs/Model/PluginInterfaceType.md)
 - [PluginMount](docs/Model/PluginMount.md)
 - [PluginPrivilege](docs/Model/PluginPrivilege.md)
 - [PluginSettings](docs/Model/PluginSettings.md)
 - [PluginsInfo](docs/Model/PluginsInfo.md)
 - [Port](docs/Model/Port.md)
 - [PortBinding](docs/Model/PortBinding.md)
 - [PortMap](docs/Model/PortMap.md)
 - [ProcessConfig](docs/Model/ProcessConfig.md)
 - [ProgressDetail](docs/Model/ProgressDetail.md)
 - [PushImageInfo](docs/Model/PushImageInfo.md)
 - [Reachability](docs/Model/Reachability.md)
 - [RegistryServiceConfig](docs/Model/RegistryServiceConfig.md)
 - [ResourceObject](docs/Model/ResourceObject.md)
 - [Resources](docs/Model/Resources.md)
 - [ResourcesBlkioWeightDevice](docs/Model/ResourcesBlkioWeightDevice.md)
 - [ResourcesUlimits](docs/Model/ResourcesUlimits.md)
 - [RestartPolicy](docs/Model/RestartPolicy.md)
 - [Runtime](docs/Model/Runtime.md)
 - [Secret](docs/Model/Secret.md)
 - [SecretSpec](docs/Model/SecretSpec.md)
 - [SecretsCreateBody](docs/Model/SecretsCreateBody.md)
 - [Service](docs/Model/Service.md)
 - [ServiceCreateResponse](docs/Model/ServiceCreateResponse.md)
 - [ServiceEndpoint](docs/Model/ServiceEndpoint.md)
 - [ServiceEndpointVirtualIPs](docs/Model/ServiceEndpointVirtualIPs.md)
 - [ServiceJobStatus](docs/Model/ServiceJobStatus.md)
 - [ServiceServiceStatus](docs/Model/ServiceServiceStatus.md)
 - [ServiceSpec](docs/Model/ServiceSpec.md)
 - [ServiceSpecMode](docs/Model/ServiceSpecMode.md)
 - [ServiceSpecModeReplicated](docs/Model/ServiceSpecModeReplicated.md)
 - [ServiceSpecModeReplicatedJob](docs/Model/ServiceSpecModeReplicatedJob.md)
 - [ServiceSpecRollbackConfig](docs/Model/ServiceSpecRollbackConfig.md)
 - [ServiceSpecUpdateConfig](docs/Model/ServiceSpecUpdateConfig.md)
 - [ServiceUpdateResponse](docs/Model/ServiceUpdateResponse.md)
 - [ServiceUpdateStatus](docs/Model/ServiceUpdateStatus.md)
 - [ServicesCreateBody](docs/Model/ServicesCreateBody.md)
 - [Swarm](docs/Model/Swarm.md)
 - [SwarmInfo](docs/Model/SwarmInfo.md)
 - [SwarmInitRequest](docs/Model/SwarmInitRequest.md)
 - [SwarmInitRequest1](docs/Model/SwarmInitRequest1.md)
 - [SwarmJoinRequest](docs/Model/SwarmJoinRequest.md)
 - [SwarmJoinRequest1](docs/Model/SwarmJoinRequest1.md)
 - [SwarmSpec](docs/Model/SwarmSpec.md)
 - [SwarmSpecCAConfig](docs/Model/SwarmSpecCAConfig.md)
 - [SwarmSpecCAConfigExternalCAs](docs/Model/SwarmSpecCAConfigExternalCAs.md)
 - [SwarmSpecDispatcher](docs/Model/SwarmSpecDispatcher.md)
 - [SwarmSpecEncryptionConfig](docs/Model/SwarmSpecEncryptionConfig.md)
 - [SwarmSpecOrchestration](docs/Model/SwarmSpecOrchestration.md)
 - [SwarmSpecRaft](docs/Model/SwarmSpecRaft.md)
 - [SwarmSpecTaskDefaults](docs/Model/SwarmSpecTaskDefaults.md)
 - [SwarmSpecTaskDefaultsLogDriver](docs/Model/SwarmSpecTaskDefaultsLogDriver.md)
 - [SwarmUnlockRequest](docs/Model/SwarmUnlockRequest.md)
 - [SystemAuthResponse](docs/Model/SystemAuthResponse.md)
 - [SystemDataUsageResponse](docs/Model/SystemDataUsageResponse.md)
 - [SystemInfo](docs/Model/SystemInfo.md)
 - [SystemInfoDefaultAddressPools](docs/Model/SystemInfoDefaultAddressPools.md)
 - [SystemVersion](docs/Model/SystemVersion.md)
 - [SystemVersionComponents](docs/Model/SystemVersionComponents.md)
 - [SystemVersionPlatform](docs/Model/SystemVersionPlatform.md)
 - [TLSInfo](docs/Model/TLSInfo.md)
 - [Task](docs/Model/Task.md)
 - [TaskSpec](docs/Model/TaskSpec.md)
 - [TaskSpecContainerSpec](docs/Model/TaskSpecContainerSpec.md)
 - [TaskSpecContainerSpecConfigs](docs/Model/TaskSpecContainerSpecConfigs.md)
 - [TaskSpecContainerSpecDNSConfig](docs/Model/TaskSpecContainerSpecDNSConfig.md)
 - [TaskSpecContainerSpecFile](docs/Model/TaskSpecContainerSpecFile.md)
 - [TaskSpecContainerSpecFile1](docs/Model/TaskSpecContainerSpecFile1.md)
 - [TaskSpecContainerSpecPrivileges](docs/Model/TaskSpecContainerSpecPrivileges.md)
 - [TaskSpecContainerSpecPrivilegesCredentialSpec](docs/Model/TaskSpecContainerSpecPrivilegesCredentialSpec.md)
 - [TaskSpecContainerSpecPrivilegesSELinuxContext](docs/Model/TaskSpecContainerSpecPrivilegesSELinuxContext.md)
 - [TaskSpecContainerSpecSecrets](docs/Model/TaskSpecContainerSpecSecrets.md)
 - [TaskSpecLogDriver](docs/Model/TaskSpecLogDriver.md)
 - [TaskSpecNetworkAttachmentSpec](docs/Model/TaskSpecNetworkAttachmentSpec.md)
 - [TaskSpecPlacement](docs/Model/TaskSpecPlacement.md)
 - [TaskSpecPlacementPreferences](docs/Model/TaskSpecPlacementPreferences.md)
 - [TaskSpecPlacementSpread](docs/Model/TaskSpecPlacementSpread.md)
 - [TaskSpecPluginSpec](docs/Model/TaskSpecPluginSpec.md)
 - [TaskSpecResources](docs/Model/TaskSpecResources.md)
 - [TaskSpecRestartPolicy](docs/Model/TaskSpecRestartPolicy.md)
 - [TaskState](docs/Model/TaskState.md)
 - [TaskStatus](docs/Model/TaskStatus.md)
 - [TaskStatusContainerStatus](docs/Model/TaskStatusContainerStatus.md)
 - [ThrottleDevice](docs/Model/ThrottleDevice.md)
 - [UnlockKeyResponse](docs/Model/UnlockKeyResponse.md)
 - [Volume](docs/Model/Volume.md)
 - [VolumeConfig](docs/Model/VolumeConfig.md)
 - [VolumeListResponse](docs/Model/VolumeListResponse.md)
 - [VolumePruneResponse](docs/Model/VolumePruneResponse.md)
 - [VolumeUsageData](docs/Model/VolumeUsageData.md)

## Documentation For Authorization

 All endpoints do not require authorization.


## Author



