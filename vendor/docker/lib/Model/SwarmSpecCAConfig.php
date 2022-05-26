<?php
/**
 * SwarmSpecCAConfig
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
 * SwarmSpecCAConfig Class Doc Comment
 *
 * @category Class
 * @description CA configuration.
 * @package  Docker\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SwarmSpecCAConfig implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SwarmSpec_CAConfig';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'node_cert_expiry' => 'int',
'external_c_as' => '\Docker\Client\Model\SwarmSpecCAConfigExternalCAs[]',
'signing_ca_cert' => 'string',
'signing_ca_key' => 'string',
'force_rotate' => 'int'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'node_cert_expiry' => 'int64',
'external_c_as' => null,
'signing_ca_cert' => null,
'signing_ca_key' => null,
'force_rotate' => 'uint64'    ];

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
        'node_cert_expiry' => 'NodeCertExpiry',
'external_c_as' => 'ExternalCAs',
'signing_ca_cert' => 'SigningCACert',
'signing_ca_key' => 'SigningCAKey',
'force_rotate' => 'ForceRotate'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'node_cert_expiry' => 'setNodeCertExpiry',
'external_c_as' => 'setExternalCAs',
'signing_ca_cert' => 'setSigningCaCert',
'signing_ca_key' => 'setSigningCaKey',
'force_rotate' => 'setForceRotate'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'node_cert_expiry' => 'getNodeCertExpiry',
'external_c_as' => 'getExternalCAs',
'signing_ca_cert' => 'getSigningCaCert',
'signing_ca_key' => 'getSigningCaKey',
'force_rotate' => 'getForceRotate'    ];

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
        $this->container['node_cert_expiry'] = isset($data['node_cert_expiry']) ? $data['node_cert_expiry'] : null;
        $this->container['external_c_as'] = isset($data['external_c_as']) ? $data['external_c_as'] : null;
        $this->container['signing_ca_cert'] = isset($data['signing_ca_cert']) ? $data['signing_ca_cert'] : null;
        $this->container['signing_ca_key'] = isset($data['signing_ca_key']) ? $data['signing_ca_key'] : null;
        $this->container['force_rotate'] = isset($data['force_rotate']) ? $data['force_rotate'] : null;
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
     * Gets node_cert_expiry
     *
     * @return int
     */
    public function getNodeCertExpiry()
    {
        return $this->container['node_cert_expiry'];
    }

    /**
     * Sets node_cert_expiry
     *
     * @param int $node_cert_expiry The duration node certificates are issued for.
     *
     * @return $this
     */
    public function setNodeCertExpiry($node_cert_expiry)
    {
        $this->container['node_cert_expiry'] = $node_cert_expiry;

        return $this;
    }

    /**
     * Gets external_c_as
     *
     * @return \Docker\Client\Model\SwarmSpecCAConfigExternalCAs[]
     */
    public function getExternalCAs()
    {
        return $this->container['external_c_as'];
    }

    /**
     * Sets external_c_as
     *
     * @param \Docker\Client\Model\SwarmSpecCAConfigExternalCAs[] $external_c_as Configuration for forwarding signing requests to an external certificate authority.
     *
     * @return $this
     */
    public function setExternalCAs($external_c_as)
    {
        $this->container['external_c_as'] = $external_c_as;

        return $this;
    }

    /**
     * Gets signing_ca_cert
     *
     * @return string
     */
    public function getSigningCaCert()
    {
        return $this->container['signing_ca_cert'];
    }

    /**
     * Sets signing_ca_cert
     *
     * @param string $signing_ca_cert The desired signing CA certificate for all swarm node TLS leaf certificates, in PEM format.
     *
     * @return $this
     */
    public function setSigningCaCert($signing_ca_cert)
    {
        $this->container['signing_ca_cert'] = $signing_ca_cert;

        return $this;
    }

    /**
     * Gets signing_ca_key
     *
     * @return string
     */
    public function getSigningCaKey()
    {
        return $this->container['signing_ca_key'];
    }

    /**
     * Sets signing_ca_key
     *
     * @param string $signing_ca_key The desired signing CA key for all swarm node TLS leaf certificates, in PEM format.
     *
     * @return $this
     */
    public function setSigningCaKey($signing_ca_key)
    {
        $this->container['signing_ca_key'] = $signing_ca_key;

        return $this;
    }

    /**
     * Gets force_rotate
     *
     * @return int
     */
    public function getForceRotate()
    {
        return $this->container['force_rotate'];
    }

    /**
     * Sets force_rotate
     *
     * @param int $force_rotate An integer whose purpose is to force swarm to generate a new signing CA certificate and key, if none have been specified in `SigningCACert` and `SigningCAKey`
     *
     * @return $this
     */
    public function setForceRotate($force_rotate)
    {
        $this->container['force_rotate'] = $force_rotate;

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
