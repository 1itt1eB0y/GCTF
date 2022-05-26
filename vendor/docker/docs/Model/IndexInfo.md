# IndexInfo

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Name of the registry, such as \&quot;docker.io\&quot;. | [optional] 
**mirrors** | **string[]** | List of mirrors, expressed as URIs. | [optional] 
**secure** | **bool** | Indicates if the registry is part of the list of insecure registries.  If &#x60;false&#x60;, the registry is insecure. Insecure registries accept un-encrypted (HTTP) and/or untrusted (HTTPS with certificates from unknown CAs) communication.  &gt; **Warning**: Insecure registries can be useful when running a local &gt; registry. However, because its use creates security vulnerabilities &gt; it should ONLY be enabled for testing purposes. For increased &gt; security, users should add their CA to their system&#x27;s list of &gt; trusted CAs instead of enabling this option. | [optional] 
**official** | **bool** | Indicates whether this is an official registry (i.e., Docker Hub / docker.io) | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

