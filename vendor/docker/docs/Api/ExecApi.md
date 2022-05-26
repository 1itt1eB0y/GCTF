# Docker\Client\ExecApi

All URIs are relative to *http://127.0.0.1/v1.41*

Method | HTTP request | Description
------------- | ------------- | -------------
[**containerExec**](ExecApi.md#containerexec) | **POST** /containers/{id}/exec | Create an exec instance
[**execInspect**](ExecApi.md#execinspect) | **GET** /exec/{id}/json | Inspect an exec instance
[**execResize**](ExecApi.md#execresize) | **POST** /exec/{id}/resize | Resize an exec instance
[**execStart**](ExecApi.md#execstart) | **POST** /exec/{id}/start | Start an exec instance

# **containerExec**
> \Docker\Client\Model\IdResponse containerExec($body, $id)

Create an exec instance

Run a command inside a running container.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ExecApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \Docker\Client\Model\ExecConfig(); // \Docker\Client\Model\ExecConfig | Exec configuration
$id = "id_example"; // string | ID or name of container

try {
    $result = $apiInstance->containerExec($body, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExecApi->containerExec: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Docker\Client\Model\ExecConfig**](../Model/ExecConfig.md)| Exec configuration |
 **id** | **string**| ID or name of container |

### Return type

[**\Docker\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **execInspect**
> \Docker\Client\Model\ExecInspectResponse execInspect($id)

Inspect an exec instance

Return low-level information about an exec instance.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ExecApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | Exec instance ID

try {
    $result = $apiInstance->execInspect($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExecApi->execInspect: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Exec instance ID |

### Return type

[**\Docker\Client\Model\ExecInspectResponse**](../Model/ExecInspectResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **execResize**
> execResize($id, $h, $w)

Resize an exec instance

Resize the TTY session used by an exec instance. This endpoint only works if `tty` was specified as part of creating and starting the exec instance.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ExecApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | Exec instance ID
$h = 56; // int | Height of the TTY session in characters
$w = 56; // int | Width of the TTY session in characters

try {
    $apiInstance->execResize($id, $h, $w);
} catch (Exception $e) {
    echo 'Exception when calling ExecApi->execResize: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Exec instance ID |
 **h** | **int**| Height of the TTY session in characters | [optional]
 **w** | **int**| Width of the TTY session in characters | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **execStart**
> execStart($id, $body)

Start an exec instance

Starts a previously set up exec instance. If detach is true, this endpoint returns immediately after starting the command. Otherwise, it sets up an interactive session with the command.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Docker\Client\Api\ExecApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | Exec instance ID
$body = new \Docker\Client\Model\ExecStartConfig(); // \Docker\Client\Model\ExecStartConfig | 

try {
    $apiInstance->execStart($id, $body);
} catch (Exception $e) {
    echo 'Exception when calling ExecApi->execStart: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Exec instance ID |
 **body** | [**\Docker\Client\Model\ExecStartConfig**](../Model/ExecStartConfig.md)|  | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.docker.raw-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

