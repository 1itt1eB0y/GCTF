<?php
/**
 * ClusterInfo
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
 * ClusterInfo Class Doc Comment
 *
 * @category Class
 * @description ClusterInfo represents information about the swarm as is returned by the \&quot;/info\&quot; endpoint. Join-tokens are not included.
 * @package  Docker\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ClusterInfo implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ClusterInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'string',
'version' => '\Docker\Client\Model\ObjectVersion',
'created_at' => 'string',
'updated_at' => 'string',
'spec' => '\Docker\Client\Model\SwarmSpec',
'tls_info' => '\Docker\Client\Model\TLSInfo',
'root_rotation_in_progress' => 'bool',
'data_path_port' => 'int',
'default_addr_pool' => 'string[]',
'subnet_size' => 'int'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'version' => null,
'created_at' => 'dateTime',
'updated_at' => 'dateTime',
'spec' => null,
'tls_info' => null,
'root_rotation_in_progress' => null,
'data_path_port' => 'uint32',
'default_addr_pool' => 'CIDR',
'subnet_size' => 'uint32'    ];

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
        'id' => 'ID',
'version' => 'Version',
'created_at' => 'CreatedAt',
'updated_at' => 'UpdatedAt',
'spec' => 'Spec',
'tls_info' => 'TLSInfo',
'root_rotation_in_progress' => 'RootRotationInProgress',
'data_path_port' => 'DataPathPort',
'default_addr_pool' => 'DefaultAddrPool',
'subnet_size' => 'SubnetSize'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'version' => 'setVersion',
'created_at' => 'setCreatedAt',
'updated_at' => 'setUpdatedAt',
'spec' => 'setSpec',
'tls_info' => 'setTlsInfo',
'root_rotation_in_progress' => 'setRootRotationInProgress',
'data_path_port' => 'setDataPathPort',
'default_addr_pool' => 'setDefaultAddrPool',
'subnet_size' => 'setSubnetSize'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'version' => 'getVersion',
'created_at' => 'getCreatedAt',
'updated_at' => 'getUpdatedAt',
'spec' => 'getSpec',
'tls_info' => 'getTlsInfo',
'root_rotation_in_progress' => 'getRootRotationInProgress',
'data_path_port' => 'getDataPathPort',
'default_addr_pool' => 'getDefaultAddrPool',
'subnet_size' => 'getSubnetSize'    ];

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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
        $this->container['created_at'] = isset($data['created_at']) ? $data['created_at'] : null;
        $this->container['updated_at'] = isset($data['updated_at']) ? $data['updated_at'] : null;
        $this->container['spec'] = isset($data['spec']) ? $data['spec'] : null;
        $this->container['tls_info'] = isset($data['tls_info']) ? $data['tls_info'] : null;
        $this->container['root_rotation_in_progress'] = isset($data['root_rotation_in_progress']) ? $data['root_rotation_in_progress'] : null;
        $this->container['data_path_port'] = isset($data['data_path_port']) ? $data['data_path_port'] : null;
        $this->container['default_addr_pool'] = isset($data['default_addr_pool']) ? $data['default_addr_pool'] : null;
        $this->container['subnet_size'] = isset($data['subnet_size']) ? $data['subnet_size'] : null;
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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id The ID of the swarm.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets version
     *
     * @return \Docker\Client\Model\ObjectVersion
     */
    public function getVersion()
    {
        return $this->container['version'];
    }

    /**
     * Sets version
     *
     * @param \Docker\Client\Model\ObjectVersion $version version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->container['version'] = $version;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at Date and time at which the swarm was initialised in [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string $updated_at Date and time at which the swarm was last updated in [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets spec
     *
     * @return \Docker\Client\Model\SwarmSpec
     */
    public function getSpec()
    {
        return $this->container['spec'];
    }

    /**
     * Sets spec
     *
     * @param \Docker\Client\Model\SwarmSpec $spec spec
     *
     * @return $this
     */
    public function setSpec($spec)
    {
        $this->container['spec'] = $spec;

        return $this;
    }

    /**
     * Gets tls_info
     *
     * @return \Docker\Client\Model\TLSInfo
     */
    public function getTlsInfo()
    {
        return $this->container['tls_info'];
    }

    /**
     * Sets tls_info
     *
     * @param \Docker\Client\Model\TLSInfo $tls_info tls_info
     *
     * @return $this
     */
    public function setTlsInfo($tls_info)
    {
        $this->container['tls_info'] = $tls_info;

        return $this;
    }

    /**
     * Gets root_rotation_in_progress
     *
     * @return bool
     */
    public function getRootRotationInProgress()
    {
        return $this->container['root_rotation_in_progress'];
    }

    /**
     * Sets root_rotation_in_progress
     *
     * @param bool $root_rotation_in_progress Whether there is currently a root CA rotation in progress for the swarm
     *
     * @return $this
     */
    public function setRootRotationInProgress($root_rotation_in_progress)
    {
        $this->container['root_rotation_in_progress'] = $root_rotation_in_progress;

        return $this;
    }

    /**
     * Gets data_path_port
     *
     * @return int
     */
    public function getDataPathPort()
    {
        return $this->container['data_path_port'];
    }

    /**
     * Sets data_path_port
     *
     * @param int $data_path_port DataPathPort specifies the data path port number for data traffic. Acceptable port range is 1024 to 49151. If no port is set or is set to 0, the default port (4789) is used.
     *
     * @return $this
     */
    public function setDataPathPort($data_path_port)
    {
        $this->container['data_path_port'] = $data_path_port;

        return $this;
    }

    /**
     * Gets default_addr_pool
     *
     * @return string[]
     */
    public function getDefaultAddrPool()
    {
        return $this->container['default_addr_pool'];
    }

    /**
     * Sets default_addr_pool
     *
     * @param string[] $default_addr_pool Default Address Pool specifies default subnet pools for global scope networks.
     *
     * @return $this
     */
    public function setDefaultAddrPool($default_addr_pool)
    {
        $this->container['default_addr_pool'] = $default_addr_pool;

        return $this;
    }

    /**
     * Gets subnet_size
     *
     * @return int
     */
    public function getSubnetSize()
    {
        return $this->container['subnet_size'];
    }

    /**
     * Sets subnet_size
     *
     * @param int $subnet_size SubnetSize specifies the subnet size of the networks created from the default subnet pool.
     *
     * @return $this
     */
    public function setSubnetSize($subnet_size)
    {
        $this->container['subnet_size'] = $subnet_size;

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
