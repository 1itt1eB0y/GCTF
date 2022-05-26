# SystemVersion

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**platform** | [**\Docker\Client\Model\SystemVersionPlatform**](SystemVersionPlatform.md) |  | [optional] 
**components** | [**\Docker\Client\Model\SystemVersionComponents[]**](SystemVersionComponents.md) | Information about system components | [optional] 
**version** | **string** | The version of the daemon | [optional] 
**api_version** | **string** | The default (and highest) API version that is supported by the daemon | [optional] 
**min_api_version** | **string** | The minimum API version that is supported by the daemon | [optional] 
**git_commit** | **string** | The Git commit of the source code that was used to build the daemon | [optional] 
**go_version** | **string** | The version Go used to compile the daemon, and the version of the Go runtime in use. | [optional] 
**os** | **string** | The operating system that the daemon is running on (\&quot;linux\&quot; or \&quot;windows\&quot;) | [optional] 
**arch** | **string** | The architecture that the daemon is running on | [optional] 
**kernel_version** | **string** | The kernel version (&#x60;uname -r&#x60;) that the daemon is running on.  This field is omitted when empty. | [optional] 
**experimental** | **bool** | Indicates if the daemon is started with experimental features enabled.  This field is omitted when empty / false. | [optional] 
**build_time** | **string** | The date and time that the daemon was compiled. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

