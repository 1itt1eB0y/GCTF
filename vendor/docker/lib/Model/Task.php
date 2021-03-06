<?php
/**
 * Task
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
 * Task Class Doc Comment
 *
 * @category Class
 * @package  Docker\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Task implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Task';

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
'name' => 'string',
'labels' => 'map[string,string]',
'spec' => '\Docker\Client\Model\TaskSpec',
'service_id' => 'string',
'slot' => 'int',
'node_id' => 'string',
'assigned_generic_resources' => '\Docker\Client\Model\GenericResources',
'status' => '\Docker\Client\Model\TaskStatus',
'desired_state' => '\Docker\Client\Model\TaskState',
'job_iteration' => '\Docker\Client\Model\ObjectVersion'    ];

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
'name' => null,
'labels' => null,
'spec' => null,
'service_id' => null,
'slot' => null,
'node_id' => null,
'assigned_generic_resources' => null,
'status' => null,
'desired_state' => null,
'job_iteration' => null    ];

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
'name' => 'Name',
'labels' => 'Labels',
'spec' => 'Spec',
'service_id' => 'ServiceID',
'slot' => 'Slot',
'node_id' => 'NodeID',
'assigned_generic_resources' => 'AssignedGenericResources',
'status' => 'Status',
'desired_state' => 'DesiredState',
'job_iteration' => 'JobIteration'    ];

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
'name' => 'setName',
'labels' => 'setLabels',
'spec' => 'setSpec',
'service_id' => 'setServiceId',
'slot' => 'setSlot',
'node_id' => 'setNodeId',
'assigned_generic_resources' => 'setAssignedGenericResources',
'status' => 'setStatus',
'desired_state' => 'setDesiredState',
'job_iteration' => 'setJobIteration'    ];

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
'name' => 'getName',
'labels' => 'getLabels',
'spec' => 'getSpec',
'service_id' => 'getServiceId',
'slot' => 'getSlot',
'node_id' => 'getNodeId',
'assigned_generic_resources' => 'getAssignedGenericResources',
'status' => 'getStatus',
'desired_state' => 'getDesiredState',
'job_iteration' => 'getJobIteration'    ];

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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['labels'] = isset($data['labels']) ? $data['labels'] : null;
        $this->container['spec'] = isset($data['spec']) ? $data['spec'] : null;
        $this->container['service_id'] = isset($data['service_id']) ? $data['service_id'] : null;
        $this->container['slot'] = isset($data['slot']) ? $data['slot'] : null;
        $this->container['node_id'] = isset($data['node_id']) ? $data['node_id'] : null;
        $this->container['assigned_generic_resources'] = isset($data['assigned_generic_resources']) ? $data['assigned_generic_resources'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['desired_state'] = isset($data['desired_state']) ? $data['desired_state'] : null;
        $this->container['job_iteration'] = isset($data['job_iteration']) ? $data['job_iteration'] : null;
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
     * @param string $id The ID of the task.
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
     * @param string $created_at created_at
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
     * @param string $updated_at updated_at
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

        return $this;
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
     * @param string $name Name of the task.
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
     * Gets spec
     *
     * @return \Docker\Client\Model\TaskSpec
     */
    public function getSpec()
    {
        return $this->container['spec'];
    }

    /**
     * Sets spec
     *
     * @param \Docker\Client\Model\TaskSpec $spec spec
     *
     * @return $this
     */
    public function setSpec($spec)
    {
        $this->container['spec'] = $spec;

        return $this;
    }

    /**
     * Gets service_id
     *
     * @return string
     */
    public function getServiceId()
    {
        return $this->container['service_id'];
    }

    /**
     * Sets service_id
     *
     * @param string $service_id The ID of the service this task is part of.
     *
     * @return $this
     */
    public function setServiceId($service_id)
    {
        $this->container['service_id'] = $service_id;

        return $this;
    }

    /**
     * Gets slot
     *
     * @return int
     */
    public function getSlot()
    {
        return $this->container['slot'];
    }

    /**
     * Sets slot
     *
     * @param int $slot slot
     *
     * @return $this
     */
    public function setSlot($slot)
    {
        $this->container['slot'] = $slot;

        return $this;
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
     * @param string $node_id The ID of the node that this task is on.
     *
     * @return $this
     */
    public function setNodeId($node_id)
    {
        $this->container['node_id'] = $node_id;

        return $this;
    }

    /**
     * Gets assigned_generic_resources
     *
     * @return \Docker\Client\Model\GenericResources
     */
    public function getAssignedGenericResources()
    {
        return $this->container['assigned_generic_resources'];
    }

    /**
     * Sets assigned_generic_resources
     *
     * @param \Docker\Client\Model\GenericResources $assigned_generic_resources assigned_generic_resources
     *
     * @return $this
     */
    public function setAssignedGenericResources($assigned_generic_resources)
    {
        $this->container['assigned_generic_resources'] = $assigned_generic_resources;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \Docker\Client\Model\TaskStatus
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Docker\Client\Model\TaskStatus $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets desired_state
     *
     * @return \Docker\Client\Model\TaskState
     */
    public function getDesiredState()
    {
        return $this->container['desired_state'];
    }

    /**
     * Sets desired_state
     *
     * @param \Docker\Client\Model\TaskState $desired_state desired_state
     *
     * @return $this
     */
    public function setDesiredState($desired_state)
    {
        $this->container['desired_state'] = $desired_state;

        return $this;
    }

    /**
     * Gets job_iteration
     *
     * @return \Docker\Client\Model\ObjectVersion
     */
    public function getJobIteration()
    {
        return $this->container['job_iteration'];
    }

    /**
     * Sets job_iteration
     *
     * @param \Docker\Client\Model\ObjectVersion $job_iteration job_iteration
     *
     * @return $this
     */
    public function setJobIteration($job_iteration)
    {
        $this->container['job_iteration'] = $job_iteration;

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
