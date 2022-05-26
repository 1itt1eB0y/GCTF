# Docker\Client\ConfigApi

All URIs are relative to *http://127.0.0.1/v1.41*

Method | HTTP request | Description
------------- | ------------- | -------------
[**configCreate**](ConfigApi.md#configcreate) | **POST** /configs/create | Create a config
[**configDelete**](ConfigApi.md#configdelete) | **DELETE** /configs/{id} | Delete a config
[**configInspect**](ConfigApi.md#configinspect) | **GET** /configs/{id} | Inspect a config
[**configList**](ConfigApi.md#configlist) | **GET** /configs | List configs
[**configUpdate**](ConfigApi.md#configupdate) | **POST** /configs/{id}/update | Update a Config

# **configCreate**
> \Docker\Client\Model\IdResponse configCreate($body)

Create a config

### Example
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Docker\Client\Model\ConfigsCreateBody**](../Model/ConfigsCreateBody.md)|  | [optional]

### Return type

[**\Docker\Client\Model\IdResponse**](../Model/IdResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **configDelete**
> configDelete($id)

Delete a config

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID of the config |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **configInspect**
> \Docker\Client\Model\Config configInspect($id)

Inspect a config

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID of the config |

### Return type

[**\Docker\Client\Model\Config**](../Model/Config.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **configList**
> \Docker\Client\Model\Config[] configList($filters)

List configs

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filters** | **string**| A JSON encoded value of the filters (a &#x60;map[string][]string&#x60;) to process on the configs list.  Available filters:  - &#x60;id&#x3D;&lt;config id&gt;&#x60; - &#x60;label&#x3D;&lt;key&gt; or label&#x3D;&lt;key&gt;&#x3D;value&#x60; - &#x60;name&#x3D;&lt;config name&gt;&#x60; - &#x60;names&#x3D;&lt;config name&gt;&#x60; | [optional]

### Return type

[**\Docker\Client\Model\Config[]**](../Model/Config.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **configUpdate**
> configUpdate($version, $id, $body)

Update a Config

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

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

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **version** | **int**| The version number of the config object being updated. This is required to avoid conflicting writes. |
 **id** | **string**| The ID or name of the config |
 **body** | [**\Docker\Client\Model\ConfigSpec**](../Model/ConfigSpec.md)| The spec of the config to update. Currently, only the Labels field
can be updated. All other fields must remain unchanged from the
[ConfigInspect endpoint](#operation/ConfigInspect) response values.
 | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, text/plain
 - **Accept**: application/json, text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

