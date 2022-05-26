<?php
/**
 * SwarmInfo
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
 * SwarmInfo Class Doc Comment
 *
 * @category Class
 * @description Represents generic information about swarm.
 * @package  Docker\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SwarmInfo implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SwarmInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'node_id' => 'string',
'node_addr' => 'string',
'local_node_state' => '\Docker\Client\Model\LocalNodeState',
'control_available' => 'bool',
'error' => 'string',
'remote_managers' => '\Docker\Client\Model\PeerNode[]',
'nodes' => 'int',
'managers' => 'int',
'cluster' => '\Docker\Client\Model\ClusterInfo'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'node_id' => null,
'node_addr' => null,
'local_node_state' => null,
'control_available' => null,
'error' => null,
'remote_managers' => null,
'nodes' => null,
'managers' => null,
'cluster' => null    ];

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
        'node_id' => 'NodeID',
'node_addr' => 'NodeAddr',
'local_node_state' => 'LocalNodeState',
'control_available' => 'ControlAvailable',
'error' => 'Error',
'remote_managers' => 'RemoteManagers',
'nodes' => 'Nodes',
'managers' => 'Managers',
'cluster' => 'Cluster'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'node_id' => 'setNodeId',
'node_addr' => 'setNodeAddr',
'local_node_state' => 'setLocalNodeState',
'control_available' => 'setControlAvailable',
'error' => 'setError',
'remote_managers' => 'setRemoteManagers',
'nodes' => 'setNodes',
'managers' => 'setManagers',
'cluster' => 'setCluster'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'node_id' => 'getNodeId',
'node_addr' => 'getNodeAddr',
'local_node_state' => 'getLocalNodeState',
'control_available' => 'getControlAvailable',
'error' => 'getError',
'remote_managers' => 'getRemoteManagers',
'nodes' => 'getNodes',
'managers' => 'getManagers',
'cluster' => 'getCluster'    ];

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
        $this->container['node_id'] = isset($data['node_id']) ? $data['node_id'] : '';
        $this->container['node_addr'] = isset($data['node_addr']) ? $data['node_addr'] : '';
        $this->container['local_node_state'] = isset($data['local_node_state']) ? $data['local_node_state'] : null;
        $this->container['control_available'] = isset($data['control_available']) ? $data['control_available'] : false;
        $this->container['error'] = isset($data['error']) ? $data['error'] : '';
        $this->container['remote_managers'] = isset($data['remote_managers']) ? $data['remote_managers'] : null;
        $this->container['nodes'] = isset($data['nodes']) ? $data['nodes'] : null;
        $this->container['managers'] = isset($data['managers']) ? $data['managers'] : null;
        $this->container['cluster'] = isset($data['cluster']) ? $data['cluster'] : null;
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
     * Gets node_id
     *
     * @return string
     */
    public function getNodeId()
    {
        return $this->container['node_id'];
    }

    /**
     * Sets node_id
     *
     * @param string $node_id Unique identifier of for this node in the swarm.
     *
     * @return $this
     */
    public function setNodeId($node_id)
    {
        $this->container['node_id'] = $node_id;

        return $this;
    }

    /**
     * Gets node_addr
     *
     * @return string
     */
    public function getNodeAddr()
    {
        return $this->container['node_addr'];
    }

    /**
     * Sets node_addr
     *
     * @param string $node_addr IP address at which this node can be reached by other nodes in the swarm.
     *
     * @return $this
     */
    public function setNodeAddr($node_addr)
    {
        $this->container['node_addr'] = $node_addr;

        return $this;
    }

    /**
     * Gets local_node_state
     *
     * @return \Docker\Client\Model\LocalNodeState
     */
    public function getLocalNodeState()
    {
        return $this->container['local_node_state'];
    }

    /**
     * Sets local_node_state
     *
     * @param \Docker\Client\Model\LocalNodeState $local_node_state local_node_state
     *
     * @return $this
     */
    public function setLocalNodeState($local_node_state)
    {
        $this->container['local_node_state'] = $local_node_state;

        return $this;
    }

    /**
     * Gets control_available
     *
     * @return bool
     */
    public function getControlAvailable()
    {
        return $this->container['control_available'];
    }

    /**
     * Sets control_available
     *
     * @param bool $control_available control_available
     *
     * @return $this
     */
    public function setControlAvailable($control_available)
    {
        $this->container['control_available'] = $control_available;

        return $this;
    }

    /**
     * Gets error
     *
     * @return string
     */
    public function getError()
    {
        return $this->container['error'];
    }

    /**
     * Sets error
     *
     * @param string $error error
     *
     * @return $this
     */
    public function setError($error)
    {
        $this->container['error'] = $error;

        return $this;
    }

    /**
     * Gets remote_managers
     *
     * @return \Docker\Client\Model\PeerNode[]
     */
    public function getRemoteManagers()
    {
        return $this->container['remote_managers'];
    }

    /**
     * Sets remote_managers
     *
     * @param \Docker\Client\Model\PeerNode[] $remote_managers List of ID's and addresses of other managers in the swarm.
     *
     * @return $this
     */
    public function setRemoteManagers($remote_managers)
    {
        $this->container['remote_managers'] = $remote_managers;

        return $this;
    }

    /**
     * Gets nodes
     *
     * @return int
     */
    public function getNodes()
    {
        return $this->container['nodes'];
    }

    /**
     * Sets nodes
     *
     * @param int $nodes Total number of nodes in the swarm.
     *
     * @return $this
     */
    public function setNodes($nodes)
    {
        $this->container['nodes'] = $nodes;

        return $this;
    }

    /**
     * Gets managers
     *
     * @return int
     */
    public function getManagers()
    {
        return $this->container['managers'];
    }

    /**
     * Sets managers
     *
     * @param int $managers Total number of managers in the swarm.
     *
     * @return $this
     */
    public function setManagers($managers)
    {
        $this->container['managers'] = $managers;

        return $this;
    }

    /**
     * Gets cluster
     *
     * @return \Docker\Client\Model\ClusterInfo
     */
    public function getCluster()
    {
        return $this->container['cluster'];
    }

    /**
     * Sets cluster
     *
     * @param \Docker\Client\Model\ClusterInfo $cluster cluster
     *
     * @return $this
     */
    public function setCluster($cluster)
    {
        $this->container['cluster'] = $cluster;

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
