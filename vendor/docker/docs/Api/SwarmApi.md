# Docker\Client\SwarmApi

All URIs are relative to *http://127.0.0.1/v1.41*

Method | HTTP request | Description
------------- | ------------- | -------------
[**swarmInit**](SwarmApi.md#swarminit) | **POST** /swarm/init | Initialize a new swarm
[**swarmInspect**](SwarmApi.md#swarminspect) | **GET** /swarm | Inspect swarm
[**swarmJoin**](SwarmApi.md#swarmjoin) | **POST** /swarm/join | Join an existing swarm
[**swarmLeave**](SwarmApi.md#swarmleave) | **POST** /swarm/leave | Leave a swarm
[**swarmUnlock**](SwarmApi.md#swarmunlock) | **POST** /swarm/unlock | Unlock a locked manager
[**swarmUnlockkey**](SwarmApi.md#swarmunlockkey) | **GET** /swarm/unlockkey | Get the unlock key
[**swarmUpdate**](SwarmApi.md#swarmupdate) | **POST** /swarm/update | Update a swarm

# **swarmInit**
> string swarmInit($body)

Initialize a new swarm

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\SwarmApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\SwarmInitRequest(); // \Docker\Client\Model\SwarmInitRequest | 

try {
    $result = $apiInstance->swarmInit($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SwarmApi->swarmInit: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Docker\Client\Model\SwarmInitRequest**](../Model/SwarmInitRequest.md)|  |

### Return type

**string**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, text/plain
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **swarmInspect**
> \Docker\Client\Model\Swarm swarmInspect()

Inspect swarm

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\SwarmApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->swarmInspect();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SwarmApi->swarmInspect: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Docker\Client\Model\Swarm**](../Model/Swarm.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **swarmJoin**
> swarmJoin($body)

Join an existing swarm

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\SwarmApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\SwarmJoinRequest(); // \Docker\Client\Model\SwarmJoinRequest | 

try {
    $apiInstance->swarmJoin($body);
} catch (Exception $e) {
    echo 'Exception when calling SwarmApi->swarmJoin: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Docker\Client\Model\SwarmJoinRequest**](../Model/SwarmJoinRequest.md)|  |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, text/plain
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **swarmLeave**
> swarmLeave($force)

Leave a swarm

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\SwarmApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$force = false; // bool | Force leave swarm, even if this is the last manager or that it will break the cluster.

try {
    $apiInstance->swarmLeave($force);
} catch (Exception $e) {
    echo 'Exception when calling SwarmApi->swarmLeave: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **force** | **bool**| Force leave swarm, even if this is the last manager or that it will break the cluster. | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **swarmUnlock**
> swarmUnlock($body)

Unlock a locked manager

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\SwarmApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\SwarmUnlockRequest(); // \Docker\Client\Model\SwarmUnlockRequest | 

try {
    $apiInstance->swarmUnlock($body);
} catch (Exception $e) {
    echo 'Exception when calling SwarmApi->swarmUnlock: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Docker\Client\Model\SwarmUnlockRequest**](../Model/SwarmUnlockRequest.md)|  |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **swarmUnlockkey**
> \Docker\Client\Model\UnlockKeyResponse swarmUnlockkey()

Get the unlock key

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\SwarmApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->swarmUnlockkey();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SwarmApi->swarmUnlockkey: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Docker\Client\Model\UnlockKeyResponse**](../Model/UnlockKeyResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **swarmUpdate**
> swarmUpdate($body, $version, $rotate_worker_token, $rotate_manager_token, $rotate_manager_unlock_key)

Update a swarm

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\SwarmApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\SwarmSpec(); // \Docker\Client\Model\SwarmSpec | 
$version = 789; // int | The version number of the swarm object being updated. This is required to avoid conflicting writes.
$rotate_worker_token = false; // bool | Rotate the worker join token.
$rotate_manager_token = false; // bool | Rotate the manager join token.
$rotate_manager_unlock_key = false; // bool | Rotate the manager unlock key.

try {
    $apiInstance->swarmUpdate($body, $version, $rotate_worker_token, $rotate_manager_token, $rotate_manager_unlock_key);
} catch (Exception $e) {
    echo 'Exception when calling SwarmApi->swarmUpdate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Docker\Client\Model\SwarmSpec**](../Model/SwarmSpec.md)|  |
 **version** | **int**| The version number of the swarm object being updated. This is required to avoid conflicting writes. |
 **rotate_worker_token** | **bool**| Rotate the worker join token. | [optional] [default to false]
 **rotate_manager_token** | **bool**| Rotate the manager join token. | [optional] [default to false]
 **rotate_manager_unlock_key** | **bool**| Rotate the manager unlock key. | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, text/plain
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

