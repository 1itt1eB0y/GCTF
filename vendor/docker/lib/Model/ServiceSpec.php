<?php
/**
 * ServiceSpec
 *
 * PHP version 5
 *
 * @category Class
 * @package  Docker\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Docker Engine API
 *
 * The Engine API is an HTTP API served by Docker Engine. It is the API the Docker client uses to communicate with the Engine, so everything the Docker client can do can be done with the API.  Most of the client's commands map directly to API endpoints (e.g. `docker ps` is `GET /containers/json`). The notable exception is running containers, which consists of several API calls.  # Errors  The API uses standard HTTP status codes to indicate the success or failure of the API call. The body of the response will be JSON in the following format:  ``` {   \"message\": \"page not found\" } ```  # Versioning  The API is usually changed in each release, so API calls are versioned to ensure that clients don't break. To lock to a specific version of the API, you prefix the URL with its version, for example, call `/v1.30/info` to use the v1.30 version of the `/info` endpoint. If the API version specified in the URL is not supported by the daemon, a HTTP `400 Bad Request` error message is returned.  If you omit the version-prefix, the current version of the API (v1.41) is used. For example, calling `/info` is the same as calling `/v1.41/info`. Using the API without a version-prefix is deprecated and will be removed in a future release.  Engine releases in the near future should support this version of the API, so your client will continue to work even if it is talking to a newer Engine.  The API uses an open schema model, which means server may add extra properties to responses. Likewise, the server will ignore any extra query parameters and request body properties. When you write clients, you need to ignore additional properties in responses to ensure they do not break when talking to newer daemons.   # Authentication  Authentication for registries is handled client side. The client has to send authentication details to various endpoints that need to communicate with registries, such as `POST /images/(name)/push`. These are sent as `X-Registry-Auth` header as a [base64url encoded](https://tools.ietf.org/html/rfc4648#section-5) (JSON) string with the following structure:  ``` {   \"username\": \"string\",   \"password\": \"string\",   \"email\": \"string\",   \"serveraddress\": \"string\" } ```  The `serveraddress` is a domain/IP without a protocol. Throughout this structure, double quotes are required.  If you have already got an identity token from the [`/auth` endpoint](#operation/SystemAuth), you can just pass this instead of credentials:  ``` {   \"identitytoken\": \"9cbaf023786cd7...\" } ```
 *
 * OpenAPI spec version: 1.41
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.33
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Docker\Client\Model;

use \ArrayAccess;
use \Docker\Client\ObjectSerializer;

/**
 * ServiceSpec Class Doc Comment
 *
 * @category Class
 * @description User modifiable configuration for a service.
 * @package  Docker\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ServiceSpec implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ServiceSpec';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
'labels' => 'map[string,string]',
'task_template' => '\Docker\Client\Model\TaskSpec',
'mode' => '\Docker\Client\Model\ServiceSpecMode',
'update_config' => '\Docker\Client\Model\ServiceSpecUpdateConfig',
'rollback_config' => '\Docker\Client\Model\ServiceSpecRollbackConfig',
'networks' => '\Docker\Client\Model\NetworkAttachmentConfig[]',
'endpoint_spec' => '\Docker\Client\Model\EndpointSpec'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
'labels' => null,
'task_template' => null,
'mode' => null,
'update_config' => null,
'rollback_config' => null,
'networks' => null,
'endpoint_spec' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'name' => 'Name',
'labels' => 'Labels',
'task_template' => 'TaskTemplate',
'mode' => 'Mode',
'update_config' => 'UpdateConfig',
'rollback_config' => 'RollbackConfig',
'networks' => 'Networks',
'endpoint_spec' => 'EndpointSpec'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
'labels' => 'setLabels',
'task_template' => 'setTaskTemplate',
'mode' => 'setMode',
'update_config' => 'setUpdateConfig',
'rollback_config' => 'setRollbackConfig',
'networks' => 'setNetworks',
'endpoint_spec' => 'setEndpointSpec'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
'labels' => 'getLabels',
'task_template' => 'getTaskTemplate',
'mode' => 'getMode',
'update_config' => 'getUpdateConfig',
'rollback_config' => 'getRollbackConfig',
'networks' => 'getNetworks',
'endpoint_spec' => 'getEndpointSpec'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['labels'] = isset($data['labels']) ? $data['labels'] : null;
        $this->container['task_template'] = isset($data['task_template']) ? $data['task_template'] : null;
        $this->container['mode'] = isset($data['mode']) ? $data['mode'] : null;
        $this->container['update_config'] = isset($data['update_config']) ? $data['update_config'] : null;
        $this->container['rollback_config'] = isset($data['rollback_config']) ? $data['rollback_config'] : null;
        $this->container['networks'] = isset($data['networks']) ? $data['networks'] : null;
        $this->container['endpoint_spec'] = isset($data['endpoint_spec']) ? $data['endpoint_spec'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Name of the service.
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets labels
     *
     * @return map[string,string]
     */
    public function getLabels()
    {
        return $this->container['labels'];
    }

    /**
     * Sets labels
     *
     * @param map[string,string] $labels User-defined key/value metadata.
     *
     * @return $this
     */
    public function setLabels($labels)
    {
        $this->container['labels'] = $labels;

        return $this;
    }

    /**
     * Gets task_template
     *
     * @return \Docker\Client\Model\TaskSpec
     */
    public function getTaskTemplate()
    {
        return $this->container['task_template'];
    }

    /**
     * Sets task_template
     *
     * @param \Docker\Client\Model\TaskSpec $task_template task_template
     *
     * @return $this
     */
    public function setTaskTemplate($task_template)
    {
        $this->container['task_template'] = $task_template;

        return $this;
    }

    /**
     * Gets mode
     *
     * @return \Docker\Client\Model\ServiceSpecMode
     */
    public function getMode()
    {
        return $this->container['mode'];
    }

    /**
     * Sets mode
     *
     * @param \Docker\Client\Model\ServiceSpecMode $mode mode
     *
     * @return $this
     */
    public function setMode($mode)
    {
        $this->container['mode'] = $mode;

        return $this;
    }

    /**
     * Gets update_config
     *
     * @return \Docker\Client\Model\ServiceSpecUpdateConfig
     */
    public function getUpdateConfig()
    {
        return $this->container['update_config'];
    }

    /**
     * Sets update_config
     *
     * @param \Docker\Client\Model\ServiceSpecUpdateConfig $update_config update_config
     *
     * @return $this
     */
    public function setUpdateConfig($update_config)
    {
        $this->container['update_config'] = $update_config;

        return $this;
    }

    /**
     * Gets rollback_config
     *
     * @return \Docker\Client\Model\ServiceSpecRollbackConfig
     */
    public function getRollbackConfig()
    {
        return $this->container['rollback_config'];
    }

    /**
     * Sets rollback_config
     *
     * @param \Docker\Client\Model\ServiceSpecRollbackConfig $rollback_config rollback_config
     *
     * @return $this
     */
    public function setRollbackConfig($rollback_config)
    {
        $this->container['rollback_config'] = $rollback_config;

        return $this;
    }

    /**
     * Gets networks
     *
     * @return \Docker\Client\Model\NetworkAttachmentConfig[]
     */
    public function getNetworks()
    {
        return $this->container['networks'];
    }

    /**
     * Sets networks
     *
     * @param \Docker\Client\Model\NetworkAttachmentConfig[] $networks Specifies which networks the service should attach to.
     *
     * @return $this
     */
    public function setNetworks($networks)
    {
        $this->container['networks'] = $networks;

        return $this;
    }

    /**
     * Gets endpoint_spec
     *
     * @return \Docker\Client\Model\EndpointSpec
     */
    public function getEndpointSpec()
    {
        return $this->container['endpoint_spec'];
    }

    /**
     * Sets endpoint_spec
     *
     * @param \Docker\Client\Model\EndpointSpec $endpoint_spec endpoint_spec
     *
     * @return $this
     */
    public function setEndpointSpec($endpoint_spec)
    {
        $this->container['endpoint_spec'] = $endpoint_spec;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
