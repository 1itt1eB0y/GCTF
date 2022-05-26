<?php
/**
 * Resources
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
 * Resources Class Doc Comment
 *
 * @category Class
 * @description A container&#x27;s resources (cgroups config, ulimits, etc)
 * @package  Docker\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Resources implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Resources';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cpu_shares' => 'int',
'memory' => 'int',
'cgroup_parent' => 'string',
'blkio_weight' => 'int',
'blkio_weight_device' => '\Docker\Client\Model\ResourcesBlkioWeightDevice[]',
'blkio_device_read_bps' => '\Docker\Client\Model\ThrottleDevice[]',
'blkio_device_write_bps' => '\Docker\Client\Model\ThrottleDevice[]',
'blkio_device_read_i_ops' => '\Docker\Client\Model\ThrottleDevice[]',
'blkio_device_write_i_ops' => '\Docker\Client\Model\ThrottleDevice[]',
'cpu_period' => 'int',
'cpu_quota' => 'int',
'cpu_realtime_period' => 'int',
'cpu_realtime_runtime' => 'int',
'cpuset_cpus' => 'string',
'cpuset_mems' => 'string',
'devices' => '\Docker\Client\Model\DeviceMapping[]',
'device_cgroup_rules' => 'string[]',
'device_requests' => '\Docker\Client\Model\DeviceRequest[]',
'kernel_memory' => 'int',
'kernel_memory_tcp' => 'int',
'memory_reservation' => 'int',
'memory_swap' => 'int',
'memory_swappiness' => 'int',
'nano_cpus' => 'int',
'oom_kill_disable' => 'bool',
'init' => 'bool',
'pids_limit' => 'int',
'ulimits' => '\Docker\Client\Model\ResourcesUlimits[]',
'cpu_count' => 'int',
'cpu_percent' => 'int',
'io_maximum_i_ops' => 'int',
'io_maximum_bandwidth' => 'int'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'cpu_shares' => null,
'memory' => 'int64',
'cgroup_parent' => null,
'blkio_weight' => null,
'blkio_weight_device' => null,
'blkio_device_read_bps' => null,
'blkio_device_write_bps' => null,
'blkio_device_read_i_ops' => null,
'blkio_device_write_i_ops' => null,
'cpu_period' => 'int64',
'cpu_quota' => 'int64',
'cpu_realtime_period' => 'int64',
'cpu_realtime_runtime' => 'int64',
'cpuset_cpus' => null,
'cpuset_mems' => null,
'devices' => null,
'device_cgroup_rules' => null,
'device_requests' => null,
'kernel_memory' => 'int64',
'kernel_memory_tcp' => 'int64',
'memory_reservation' => 'int64',
'memory_swap' => 'int64',
'memory_swappiness' => 'int64',
'nano_cpus' => 'int64',
'oom_kill_disable' => null,
'init' => null,
'pids_limit' => 'int64',
'ulimits' => null,
'cpu_count' => 'int64',
'cpu_percent' => 'int64',
'io_maximum_i_ops' => 'int64',
'io_maximum_bandwidth' => 'int64'    ];

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
        'cpu_shares' => 'CpuShares',
'memory' => 'Memory',
'cgroup_parent' => 'CgroupParent',
'blkio_weight' => 'BlkioWeight',
'blkio_weight_device' => 'BlkioWeightDevice',
'blkio_device_read_bps' => 'BlkioDeviceReadBps',
'blkio_device_write_bps' => 'BlkioDeviceWriteBps',
'blkio_device_read_i_ops' => 'BlkioDeviceReadIOps',
'blkio_device_write_i_ops' => 'BlkioDeviceWriteIOps',
'cpu_period' => 'CpuPeriod',
'cpu_quota' => 'CpuQuota',
'cpu_realtime_period' => 'CpuRealtimePeriod',
'cpu_realtime_runtime' => 'CpuRealtimeRuntime',
'cpuset_cpus' => 'CpusetCpus',
'cpuset_mems' => 'CpusetMems',
'devices' => 'Devices',
'device_cgroup_rules' => 'DeviceCgroupRules',
'device_requests' => 'DeviceRequests',
'kernel_memory' => 'KernelMemory',
'kernel_memory_tcp' => 'KernelMemoryTCP',
'memory_reservation' => 'MemoryReservation',
'memory_swap' => 'MemorySwap',
'memory_swappiness' => 'MemorySwappiness',
'nano_cpus' => 'NanoCpus',
'oom_kill_disable' => 'OomKillDisable',
'init' => 'Init',
'pids_limit' => 'PidsLimit',
'ulimits' => 'Ulimits',
'cpu_count' => 'CpuCount',
'cpu_percent' => 'CpuPercent',
'io_maximum_i_ops' => 'IOMaximumIOps',
'io_maximum_bandwidth' => 'IOMaximumBandwidth'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cpu_shares' => 'setCpuShares',
'memory' => 'setMemory',
'cgroup_parent' => 'setCgroupParent',
'blkio_weight' => 'setBlkioWeight',
'blkio_weight_device' => 'setBlkioWeightDevice',
'blkio_device_read_bps' => 'setBlkioDeviceReadBps',
'blkio_device_write_bps' => 'setBlkioDeviceWriteBps',
'blkio_device_read_i_ops' => 'setBlkioDeviceReadIOps',
'blkio_device_write_i_ops' => 'setBlkioDeviceWriteIOps',
'cpu_period' => 'setCpuPeriod',
'cpu_quota' => 'setCpuQuota',
'cpu_realtime_period' => 'setCpuRealtimePeriod',
'cpu_realtime_runtime' => 'setCpuRealtimeRuntime',
'cpuset_cpus' => 'setCpusetCpus',
'cpuset_mems' => 'setCpusetMems',
'devices' => 'setDevices',
'device_cgroup_rules' => 'setDeviceCgroupRules',
'device_requests' => 'setDeviceRequests',
'kernel_memory' => 'setKernelMemory',
'kernel_memory_tcp' => 'setKernelMemoryTcp',
'memory_reservation' => 'setMemoryReservation',
'memory_swap' => 'setMemorySwap',
'memory_swappiness' => 'setMemorySwappiness',
'nano_cpus' => 'setNanoCpus',
'oom_kill_disable' => 'setOomKillDisable',
'init' => 'setInit',
'pids_limit' => 'setPidsLimit',
'ulimits' => 'setUlimits',
'cpu_count' => 'setCpuCount',
'cpu_percent' => 'setCpuPercent',
'io_maximum_i_ops' => 'setIoMaximumIOps',
'io_maximum_bandwidth' => 'setIoMaximumBandwidth'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cpu_shares' => 'getCpuShares',
'memory' => 'getMemory',
'cgroup_parent' => 'getCgroupParent',
'blkio_weight' => 'getBlkioWeight',
'blkio_weight_device' => 'getBlkioWeightDevice',
'blkio_device_read_bps' => 'getBlkioDeviceReadBps',
'blkio_device_write_bps' => 'getBlkioDeviceWriteBps',
'blkio_device_read_i_ops' => 'getBlkioDeviceReadIOps',
'blkio_device_write_i_ops' => 'getBlkioDeviceWriteIOps',
'cpu_period' => 'getCpuPeriod',
'cpu_quota' => 'getCpuQuota',
'cpu_realtime_period' => 'getCpuRealtimePeriod',
'cpu_realtime_runtime' => 'getCpuRealtimeRuntime',
'cpuset_cpus' => 'getCpusetCpus',
'cpuset_mems' => 'getCpusetMems',
'devices' => 'getDevices',
'device_cgroup_rules' => 'getDeviceCgroupRules',
'device_requests' => 'getDeviceRequests',
'kernel_memory' => 'getKernelMemory',
'kernel_memory_tcp' => 'getKernelMemoryTcp',
'memory_reservation' => 'getMemoryReservation',
'memory_swap' => 'getMemorySwap',
'memory_swappiness' => 'getMemorySwappiness',
'nano_cpus' => 'getNanoCpus',
'oom_kill_disable' => 'getOomKillDisable',
'init' => 'getInit',
'pids_limit' => 'getPidsLimit',
'ulimits' => 'getUlimits',
'cpu_count' => 'getCpuCount',
'cpu_percent' => 'getCpuPercent',
'io_maximum_i_ops' => 'getIoMaximumIOps',
'io_maximum_bandwidth' => 'getIoMaximumBandwidth'    ];

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
        $this->container['cpu_shares'] = isset($data['cpu_shares']) ? $data['cpu_shares'] : null;
        $this->container['memory'] = isset($data['memory']) ? $data['memory'] : 0;
        $this->container['cgroup_parent'] = isset($data['cgroup_parent']) ? $data['cgroup_parent'] : null;
        $this->container['blkio_weight'] = isset($data['blkio_weight']) ? $data['blkio_weight'] : null;
        $this->container['blkio_weight_device'] = isset($data['blkio_weight_device']) ? $data['blkio_weight_device'] : null;
        $this->container['blkio_device_read_bps'] = isset($data['blkio_device_read_bps']) ? $data['blkio_device_read_bps'] : null;
        $this->container['blkio_device_write_bps'] = isset($data['blkio_device_write_bps']) ? $data['blkio_device_write_bps'] : null;
        $this->container['blkio_device_read_i_ops'] = isset($data['blkio_device_read_i_ops']) ? $data['blkio_device_read_i_ops'] : null;
        $this->container['blkio_device_write_i_ops'] = isset($data['blkio_device_write_i_ops']) ? $data['blkio_device_write_i_ops'] : null;
        $this->container['cpu_period'] = isset($data['cpu_period']) ? $data['cpu_period'] : null;
        $this->container['cpu_quota'] = isset($data['cpu_quota']) ? $data['cpu_quota'] : null;
        $this->container['cpu_realtime_period'] = isset($data['cpu_realtime_period']) ? $data['cpu_realtime_period'] : null;
        $this->container['cpu_realtime_runtime'] = isset($data['cpu_realtime_runtime']) ? $data['cpu_realtime_runtime'] : null;
        $this->container['cpuset_cpus'] = isset($data['cpuset_cpus']) ? $data['cpuset_cpus'] : null;
        $this->container['cpuset_mems'] = isset($data['cpuset_mems']) ? $data['cpuset_mems'] : null;
        $this->container['devices'] = isset($data['devices']) ? $data['devices'] : null;
        $this->container['device_cgroup_rules'] = isset($data['device_cgroup_rules']) ? $data['device_cgroup_rules'] : null;
        $this->container['device_requests'] = isset($data['device_requests']) ? $data['device_requests'] : null;
        $this->container['kernel_memory'] = isset($data['kernel_memory']) ? $data['kernel_memory'] : null;
        $this->container['kernel_memory_tcp'] = isset($data['kernel_memory_tcp']) ? $data['kernel_memory_tcp'] : null;
        $this->container['memory_reservation'] = isset($data['memory_reservation']) ? $data['memory_reservation'] : null;
        $this->container['memory_swap'] = isset($data['memory_swap']) ? $data['memory_swap'] : null;
        $this->container['memory_swappiness'] = isset($data['memory_swappiness']) ? $data['memory_swappiness'] : null;
        $this->container['nano_cpus'] = isset($data['nano_cpus']) ? $data['nano_cpus'] : null;
        $this->container['oom_kill_disable'] = isset($data['oom_kill_disable']) ? $data['oom_kill_disable'] : null;
        $this->container['init'] = isset($data['init']) ? $data['init'] : null;
        $this->container['pids_limit'] = isset($data['pids_limit']) ? $data['pids_limit'] : null;
        $this->container['ulimits'] = isset($data['ulimits']) ? $data['ulimits'] : null;
        $this->container['cpu_count'] = isset($data['cpu_count']) ? $data['cpu_count'] : null;
        $this->container['cpu_percent'] = isset($data['cpu_percent']) ? $data['cpu_percent'] : null;
        $this->container['io_maximum_i_ops'] = isset($data['io_maximum_i_ops']) ? $data['io_maximum_i_ops'] : null;
        $this->container['io_maximum_bandwidth'] = isset($data['io_maximum_bandwidth']) ? $data['io_maximum_bandwidth'] : null;
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
     * Gets cpu_shares
     *
     * @return int
     */
    public function getCpuShares()
    {
        return $this->container['cpu_shares'];
    }

    /**
     * Sets cpu_shares
     *
     * @param int $cpu_shares An integer value representing this container's relative CPU weight versus other containers.
     *
     * @return $this
     */
    public function setCpuShares($cpu_shares)
    {
        $this->container['cpu_shares'] = $cpu_shares;

        return $this;
    }

    /**
     * Gets memory
     *
     * @return int
     */
    public function getMemory()
    {
        return $this->container['memory'];
    }

    /**
     * Sets memory
     *
     * @param int $memory Memory limit in bytes.
     *
     * @return $this
     */
    public function setMemory($memory)
    {
        $this->container['memory'] = $memory;

        return $this;
    }

    /**
     * Gets cgroup_parent
     *
     * @return string
     */
    public function getCgroupParent()
    {
        return $this->container['cgroup_parent'];
    }

    /**
     * Sets cgroup_parent
     *
     * @param string $cgroup_parent Path to `cgroups` under which the container's `cgroup` is created. If the path is not absolute, the path is considered to be relative to the `cgroups` path of the init process. Cgroups are created if they do not already exist.
     *
     * @return $this
     */
    public function setCgroupParent($cgroup_parent)
    {
        $this->container['cgroup_parent'] = $cgroup_parent;

        return $this;
    }

    /**
     * Gets blkio_weight
     *
     * @return int
     */
    public function getBlkioWeight()
    {
        return $this->container['blkio_weight'];
    }

    /**
     * Sets blkio_weight
     *
     * @param int $blkio_weight Block IO weight (relative weight).
     *
     * @return $this
     */
    public function setBlkioWeight($blkio_weight)
    {
        $this->container['blkio_weight'] = $blkio_weight;

        return $this;
    }

    /**
     * Gets blkio_weight_device
     *
     * @return \Docker\Client\Model\ResourcesBlkioWeightDevice[]
     */
    public function getBlkioWeightDevice()
    {
        return $this->container['blkio_weight_device'];
    }

    /**
     * Sets blkio_weight_device
     *
     * @param \Docker\Client\Model\ResourcesBlkioWeightDevice[] $blkio_weight_device Block IO weight (relative device weight) in the form:  ``` [{\"Path\": \"device_path\", \"Weight\": weight}] ```
     *
     * @return $this
     */
    public function setBlkioWeightDevice($blkio_weight_device)
    {
        $this->container['blkio_weight_device'] = $blkio_weight_device;

        return $this;
    }

    /**
     * Gets blkio_device_read_bps
     *
     * @return \Docker\Client\Model\ThrottleDevice[]
     */
    public function getBlkioDeviceReadBps()
    {
        return $this->container['blkio_device_read_bps'];
    }

    /**
     * Sets blkio_device_read_bps
     *
     * @param \Docker\Client\Model\ThrottleDevice[] $blkio_device_read_bps Limit read rate (bytes per second) from a device, in the form:  ``` [{\"Path\": \"device_path\", \"Rate\": rate}] ```
     *
     * @return $this
     */
    public function setBlkioDeviceReadBps($blkio_device_read_bps)
    {
        $this->container['blkio_device_read_bps'] = $blkio_device_read_bps;

        return $this;
    }

    /**
     * Gets blkio_device_write_bps
     *
     * @return \Docker\Client\Model\ThrottleDevice[]
     */
    public function getBlkioDeviceWriteBps()
    {
        return $this->container['blkio_device_write_bps'];
    }

    /**
     * Sets blkio_device_write_bps
     *
     * @param \Docker\Client\Model\ThrottleDevice[] $blkio_device_write_bps Limit write rate (bytes per second) to a device, in the form:  ``` [{\"Path\": \"device_path\", \"Rate\": rate}] ```
     *
     * @return $this
     */
    public function setBlkioDeviceWriteBps($blkio_device_write_bps)
    {
        $this->container['blkio_device_write_bps'] = $blkio_device_write_bps;

        return $this;
    }

    /**
     * Gets blkio_device_read_i_ops
     *
     * @return \Docker\Client\Model\ThrottleDevice[]
     */
    public function getBlkioDeviceReadIOps()
    {
        return $this->container['blkio_device_read_i_ops'];
    }

    /**
     * Sets blkio_device_read_i_ops
     *
     * @param \Docker\Client\Model\ThrottleDevice[] $blkio_device_read_i_ops Limit read rate (IO per second) from a device, in the form:  ``` [{\"Path\": \"device_path\", \"Rate\": rate}] ```
     *
     * @return $this
     */
    public function setBlkioDeviceReadIOps($blkio_device_read_i_ops)
    {
        $this->container['blkio_device_read_i_ops'] = $blkio_device_read_i_ops;

        return $this;
    }

    /**
     * Gets blkio_device_write_i_ops
     *
     * @return \Docker\Client\Model\ThrottleDevice[]
     */
    public function getBlkioDeviceWriteIOps()
    {
        return $this->container['blkio_device_write_i_ops'];
    }

    /**
     * Sets blkio_device_write_i_ops
     *
     * @param \Docker\Client\Model\ThrottleDevice[] $blkio_device_write_i_ops Limit write rate (IO per second) to a device, in the form:  ``` [{\"Path\": \"device_path\", \"Rate\": rate}] ```
     *
     * @return $this
     */
    public function setBlkioDeviceWriteIOps($blkio_device_write_i_ops)
    {
        $this->container['blkio_device_write_i_ops'] = $blkio_device_write_i_ops;

        return $this;
    }

    /**
     * Gets cpu_period
     *
     * @return int
     */
    public function getCpuPeriod()
    {
        return $this->container['cpu_period'];
    }

    /**
     * Sets cpu_period
     *
     * @param int $cpu_period The length of a CPU period in microseconds.
     *
     * @return $this
     */
    public function setCpuPeriod($cpu_period)
    {
        $this->container['cpu_period'] = $cpu_period;

        return $this;
    }

    /**
     * Gets cpu_quota
     *
     * @return int
     */
    public function getCpuQuota()
    {
        return $this->container['cpu_quota'];
    }

    /**
     * Sets cpu_quota
     *
     * @param int $cpu_quota Microseconds of CPU time that the container can get in a CPU period.
     *
     * @return $this
     */
    public function setCpuQuota($cpu_quota)
    {
        $this->container['cpu_quota'] = $cpu_quota;

        return $this;
    }

    /**
     * Gets cpu_realtime_period
     *
     * @return int
     */
    public function getCpuRealtimePeriod()
    {
        return $this->container['cpu_realtime_period'];
    }

    /**
     * Sets cpu_realtime_period
     *
     * @param int $cpu_realtime_period The length of a CPU real-time period in microseconds. Set to 0 to allocate no time allocated to real-time tasks.
     *
     * @return $this
     */
    public function setCpuRealtimePeriod($cpu_realtime_period)
    {
        $this->container['cpu_realtime_period'] = $cpu_realtime_period;

        return $this;
    }

    /**
     * Gets cpu_realtime_runtime
     *
     * @return int
     */
    public function getCpuRealtimeRuntime()
    {
        return $this->container['cpu_realtime_runtime'];
    }

    /**
     * Sets cpu_realtime_runtime
     *
     * @param int $cpu_realtime_runtime The length of a CPU real-time runtime in microseconds. Set to 0 to allocate no time allocated to real-time tasks.
     *
     * @return $this
     */
    public function setCpuRealtimeRuntime($cpu_realtime_runtime)
    {
        $this->container['cpu_realtime_runtime'] = $cpu_realtime_runtime;

        return $this;
    }

    /**
     * Gets cpuset_cpus
     *
     * @return string
     */
    public function getCpusetCpus()
    {
        return $this->container['cpuset_cpus'];
    }

    /**
     * Sets cpuset_cpus
     *
     * @param string $cpuset_cpus CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     *
     * @return $this
     */
    public function setCpusetCpus($cpuset_cpus)
    {
        $this->container['cpuset_cpus'] = $cpuset_cpus;

        return $this;
    }

    /**
     * Gets cpuset_mems
     *
     * @return string
     */
    public function getCpusetMems()
    {
        return $this->container['cpuset_mems'];
    }

    /**
     * Sets cpuset_mems
     *
     * @param string $cpuset_mems Memory nodes (MEMs) in which to allow execution (0-3, 0,1). Only effective on NUMA systems.
     *
     * @return $this
     */
    public function setCpusetMems($cpuset_mems)
    {
        $this->container['cpuset_mems'] = $cpuset_mems;

        return $this;
    }

    /**
     * Gets devices
     *
     * @return \Docker\Client\Model\DeviceMapping[]
     */
    public function getDevices()
    {
        return $this->container['devices'];
    }

    /**
     * Sets devices
     *
     * @param \Docker\Client\Model\DeviceMapping[] $devices A list of devices to add to the container.
     *
     * @return $this
     */
    public function setDevices($devices)
    {
        $this->container['devices'] = $devices;

        return $this;
    }

    /**
     * Gets device_cgroup_rules
     *
     * @return string[]
     */
    public function getDeviceCgroupRules()
    {
        return $this->container['device_cgroup_rules'];
    }

    /**
     * Sets device_cgroup_rules
     *
     * @param string[] $device_cgroup_rules a list of cgroup rules to apply to the container
     *
     * @return $this
     */
    public function setDeviceCgroupRules($device_cgroup_rules)
    {
        $this->container['device_cgroup_rules'] = $device_cgroup_rules;

        return $this;
    }

    /**
     * Gets device_requests
     *
     * @return \Docker\Client\Model\DeviceRequest[]
     */
    public function getDeviceRequests()
    {
        return $this->container['device_requests'];
    }

    /**
     * Sets device_requests
     *
     * @param \Docker\Client\Model\DeviceRequest[] $device_requests A list of requests for devices to be sent to device drivers.
     *
     * @return $this
     */
    public function setDeviceRequests($device_requests)
    {
        $this->container['device_requests'] = $device_requests;

        return $this;
    }

    /**
     * Gets kernel_memory
     *
     * @return int
     */
    public function getKernelMemory()
    {
        return $this->container['kernel_memory'];
    }

    /**
     * Sets kernel_memory
     *
     * @param int $kernel_memory Kernel memory limit in bytes.  <p><br /></p>  > **Deprecated**: This field is deprecated as the kernel 5.4 deprecated > `kmem.limit_in_bytes`.
     *
     * @return $this
     */
    public function setKernelMemory($kernel_memory)
    {
        $this->container['kernel_memory'] = $kernel_memory;

        return $this;
    }

    /**
     * Gets kernel_memory_tcp
     *
     * @return int
     */
    public function getKernelMemoryTcp()
    {
        return $this->container['kernel_memory_tcp'];
    }

    /**
     * Sets kernel_memory_tcp
     *
     * @param int $kernel_memory_tcp Hard limit for kernel TCP buffer memory (in bytes).
     *
     * @return $this
     */
    public function setKernelMemoryTcp($kernel_memory_tcp)
    {
        $this->container['kernel_memory_tcp'] = $kernel_memory_tcp;

        return $this;
    }

    /**
     * Gets memory_reservation
     *
     * @return int
     */
    public function getMemoryReservation()
    {
        return $this->container['memory_reservation'];
    }

    /**
     * Sets memory_reservation
     *
     * @param int $memory_reservation Memory soft limit in bytes.
     *
     * @return $this
     */
    public function setMemoryReservation($memory_reservation)
    {
        $this->container['memory_reservation'] = $memory_reservation;

        return $this;
    }

    /**
     * Gets memory_swap
     *
     * @return int
     */
    public function getMemorySwap()
    {
        return $this->container['memory_swap'];
    }

    /**
     * Sets memory_swap
     *
     * @param int $memory_swap Total memory limit (memory + swap). Set as `-1` to enable unlimited swap.
     *
     * @return $this
     */
    public function setMemorySwap($memory_swap)
    {
        $this->container['memory_swap'] = $memory_swap;

        return $this;
    }

    /**
     * Gets memory_swappiness
     *
     * @return int
     */
    public function getMemorySwappiness()
    {
        return $this->container['memory_swappiness'];
    }

    /**
     * Sets memory_swappiness
     *
     * @param int $memory_swappiness Tune a container's memory swappiness behavior. Accepts an integer between 0 and 100.
     *
     * @return $this
     */
    public function setMemorySwappiness($memory_swappiness)
    {
        $this->container['memory_swappiness'] = $memory_swappiness;

        return $this;
    }

    /**
     * Gets nano_cpus
     *
     * @return int
     */
    public function getNanoCpus()
    {
        return $this->container['nano_cpus'];
    }

    /**
     * Sets nano_cpus
     *
     * @param int $nano_cpus CPU quota in units of 10<sup>-9</sup> CPUs.
     *
     * @return $this
     */
    public function setNanoCpus($nano_cpus)
    {
        $this->container['nano_cpus'] = $nano_cpus;

        return $this;
    }

    /**
     * Gets oom_kill_disable
     *
     * @return bool
     */
    public function getOomKillDisable()
    {
        return $this->container['oom_kill_disable'];
    }

    /**
     * Sets oom_kill_disable
     *
     * @param bool $oom_kill_disable Disable OOM Killer for the container.
     *
     * @return $this
     */
    public function setOomKillDisable($oom_kill_disable)
    {
        $this->container['oom_kill_disable'] = $oom_kill_disable;

        return $this;
    }

    /**
     * Gets init
     *
     * @return bool
     */
    public function getInit()
    {
        return $this->container['init'];
    }

    /**
     * Sets init
     *
     * @param bool $init Run an init inside the container that forwards signals and reaps processes. This field is omitted if empty, and the default (as configured on the daemon) is used.
     *
     * @return $this
     */
    public function setInit($init)
    {
        $this->container['init'] = $init;

        return $this;
    }

    /**
     * Gets pids_limit
     *
     * @return int
     */
    public function getPidsLimit()
    {
        return $this->container['pids_limit'];
    }

    /**
     * Sets pids_limit
     *
     * @param int $pids_limit Tune a container's PIDs limit. Set `0` or `-1` for unlimited, or `null` to not change.
     *
     * @return $this
     */
    public function setPidsLimit($pids_limit)
    {
        $this->container['pids_limit'] = $pids_limit;

        return $this;
    }

    /**
     * Gets ulimits
     *
     * @return \Docker\Client\Model\ResourcesUlimits[]
     */
    public function getUlimits()
    {
        return $this->container['ulimits'];
    }

    /**
     * Sets ulimits
     *
     * @param \Docker\Client\Model\ResourcesUlimits[] $ulimits A list of resource limits to set in the container. For example:  ``` {\"Name\": \"nofile\", \"Soft\": 1024, \"Hard\": 2048} ```
     *
     * @return $this
     */
    public function setUlimits($ulimits)
    {
        $this->container['ulimits'] = $ulimits;

        return $this;
    }

    /**
     * Gets cpu_count
     *
     * @return int
     */
    public function getCpuCount()
    {
        return $this->container['cpu_count'];
    }

    /**
     * Sets cpu_count
     *
     * @param int $cpu_count The number of usable CPUs (Windows only).  On Windows Server containers, the processor resource controls are mutually exclusive. The order of precedence is `CPUCount` first, then `CPUShares`, and `CPUPercent` last.
     *
     * @return $this
     */
    public function setCpuCount($cpu_count)
    {
        $this->container['cpu_count'] = $cpu_count;

        return $this;
    }

    /**
     * Gets cpu_percent
     *
     * @return int
     */
    public function getCpuPercent()
    {
        return $this->container['cpu_percent'];
    }

    /**
     * Sets cpu_percent
     *
     * @param int $cpu_percent The usable percentage of the available CPUs (Windows only).  On Windows Server containers, the processor resource controls are mutually exclusive. The order of precedence is `CPUCount` first, then `CPUShares`, and `CPUPercent` last.
     *
     * @return $this
     */
    public function setCpuPercent($cpu_percent)
    {
        $this->container['cpu_percent'] = $cpu_percent;

        return $this;
    }

    /**
     * Gets io_maximum_i_ops
     *
     * @return int
     */
    public function getIoMaximumIOps()
    {
        return $this->container['io_maximum_i_ops'];
    }

    /**
     * Sets io_maximum_i_ops
     *
     * @param int $io_maximum_i_ops Maximum IOps for the container system drive (Windows only)
     *
     * @return $this
     */
    public function setIoMaximumIOps($io_maximum_i_ops)
    {
        $this->container['io_maximum_i_ops'] = $io_maximum_i_ops;

        return $this;
    }

    /**
     * Gets io_maximum_bandwidth
     *
     * @return int
     */
    public function getIoMaximumBandwidth()
    {
        return $this->container['io_maximum_bandwidth'];
    }

    /**
     * Sets io_maximum_bandwidth
     *
     * @param int $io_maximum_bandwidth Maximum IO in bytes per second for the container system drive (Windows only).
     *
     * @return $this
     */
    public function setIoMaximumBandwidth($io_maximum_bandwidth)
    {
        $this->container['io_maximum_bandwidth'] = $io_maximum_bandwidth;

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
