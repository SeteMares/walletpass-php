<?php
/**
 * Pass
 *
 * PHP version 7
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */

/**
 * WalletPass
 *
 * WALLET PASS API enables you to issue mobile wallet passes for Apple Wallet, Google Pay and integrate them into your app or cloud system.   ## Prerequisites  Your passes for Apple Wallet must be cryptographically signed with a certificate from your Apple Developer Account.  To obtain your pass signing certificate follow the following:  1. Access your Apple Developer account. 2. In Certificates, Identifiers & Profiles, select Identifiers. 3. Under Identifiers, select Pass Type IDs. 4. Select the pass type identifier, then click Edit. If there is a certificate listed under Production Certificates, click the Download button next to it. If there are no certificates listed, click the Create Certificate button, then follow the instructions to create a pass signing certificate. 5. You can get CSR from `/certificates/csr` endpoint. 6. Upload obtained certificate to /certificates/upload endpoint.
 *
 * OpenAPI spec version: 1.0
 * Contact: contact@walletpass.jp
 */

namespace WalletPassJP\Model;

use \ArrayAccess;
use WalletPassJP\ObjectSerializer;

/**
 * Pass Class Doc Comment
 *
 * @category Class
 * @description Response on pass get or create.
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class Pass implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'Pass';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'id' => 'string',
        'external_id' => 'string',
        'sku' => 'string',
        'template_id' => 'string',
        'link' => 'string',
        'status' => 'string',
        'is_voided' => 'bool',
        'expires_at' => '\DateTime',
        'meta' => '\WalletPassJP\Model\WalletPassMetaInformation',
        'updated_at' => '\DateTime',
        'created_at' => '\DateTime',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'id' => 'uuid',
        'external_id' => null,
        'sku' => null,
        'template_id' => 'uuid',
        'link' => null,
        'status' => null,
        'is_voided' => null,
        'expires_at' => 'date-time',
        'meta' => null,
        'updated_at' => 'date-time',
        'created_at' => 'date-time',
    ];

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
        'id' => 'id',
        'external_id' => 'external_id',
        'sku' => 'sku',
        'template_id' => 'template_id',
        'link' => 'link',
        'status' => 'status',
        'is_voided' => 'is_voided',
        'expires_at' => 'expires_at',
        'meta' => 'meta',
        'updated_at' => 'updated_at',
        'created_at' => 'created_at',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'external_id' => 'setExternalId',
        'sku' => 'setSku',
        'template_id' => 'setTemplateId',
        'link' => 'setLink',
        'status' => 'setStatus',
        'is_voided' => 'setIsVoided',
        'expires_at' => 'setExpiresAt',
        'meta' => 'setMeta',
        'updated_at' => 'setUpdatedAt',
        'created_at' => 'setCreatedAt',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'external_id' => 'getExternalId',
        'sku' => 'getSku',
        'template_id' => 'getTemplateId',
        'link' => 'getLink',
        'status' => 'getStatus',
        'is_voided' => 'getIsVoided',
        'expires_at' => 'getExpiresAt',
        'meta' => 'getMeta',
        'updated_at' => 'getUpdatedAt',
        'created_at' => 'getCreatedAt',
    ];

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

    const STATUS_CREATED = 'created';
    const STATUS_INSTALLED = 'installed';
    const STATUS_DELETED = 'deleted';
    const STATUS_CANCELED = 'canceled';
    const STATUS_USED = 'used';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_CREATED,
            self::STATUS_INSTALLED,
            self::STATUS_DELETED,
            self::STATUS_CANCELED,
            self::STATUS_USED,
        ];
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
        $this->container['external_id'] = isset($data['external_id'])
            ? $data['external_id']
            : null;
        $this->container['sku'] = isset($data['sku']) ? $data['sku'] : null;
        $this->container['template_id'] = isset($data['template_id'])
            ? $data['template_id']
            : null;
        $this->container['link'] = isset($data['link']) ? $data['link'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : 'created';
        $this->container['is_voided'] = isset($data['is_voided']) ? $data['is_voided'] : null;
        $this->container['expires_at'] = isset($data['expires_at'])
            ? $data['expires_at']
            : null;
        $this->container['meta'] = isset($data['meta']) ? $data['meta'] : null;
        $this->container['updated_at'] = isset($data['updated_at'])
            ? $data['updated_at']
            : null;
        $this->container['created_at'] = isset($data['created_at'])
            ? $data['created_at']
            : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getStatusAllowableValues();
        if (
            !is_null($this->container['status']) &&
            !in_array($this->container['status'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

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
     * @param string $id System ID.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets external_id
     *
     * @return string
     */
    public function getExternalId()
    {
        return $this->container['external_id'];
    }

    /**
     * Sets external_id
     *
     * @param string $external_id The custom/external ID you want to use. Cannot be changed after creation.
     *
     * @return $this
     */
    public function setExternalId($external_id)
    {
        $this->container['external_id'] = $external_id;

        return $this;
    }

    /**
     * Gets sku
     *
     * @return string
     */
    public function getSku()
    {
        return $this->container['sku'];
    }

    /**
     * Sets sku
     *
     * @param string $sku Your system SKU. Can be used in the barcode.
     *
     * @return $this
     */
    public function setSku($sku)
    {
        $this->container['sku'] = $sku;

        return $this;
    }

    /**
     * Gets template_id
     *
     * @return string
     */
    public function getTemplateId()
    {
        return $this->container['template_id'];
    }

    /**
     * Sets template_id
     *
     * @param string $template_id The ID of the template pass is created from.
     *
     * @return $this
     */
    public function setTemplateId($template_id)
    {
        $this->container['template_id'] = $template_id;

        return $this;
    }

    /**
     * Gets link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->container['link'];
    }

    /**
     * Sets link
     *
     * @param string $link Link to the download page for this pass that detects the operating system of the device that is used and provides specific help.
     *
     * @return $this
     */
    public function setLink($link)
    {
        $this->container['link'] = $link;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Status is the best determined status of the pass.   - created: Pass has been created.  - installed: Pass has been installed on a device.  - deleted: Pass has been uninstalled from a device.  - canceled: Pass has been canceled without usage.  - used: Pass has been used.
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets is_voided
     *
     * @return bool
     */
    public function getIsVoided()
    {
        return $this->container['is_voided'];
    }

    /**
     * Sets is_voided
     *
     * @param bool $is_voided Indicates that the pass is void—for example, a one time use coupon that has been redeemed. The default value is false.
     *
     * @return $this
     */
    public function setIsVoided($is_voided)
    {
        $this->container['is_voided'] = $is_voided;

        return $this;
    }

    /**
     * Gets expires_at
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param \DateTime $expires_at expires_at
     *
     * @return $this
     */
    public function setExpiresAt($expires_at)
    {
        $this->container['expires_at'] = $expires_at;

        return $this;
    }

    /**
     * Gets meta
     *
     * @return \WalletPassJP\Model\WalletPassMetaInformation
     */
    public function getMeta()
    {
        return $this->container['meta'];
    }

    /**
     * Sets meta
     *
     * @param \WalletPassJP\Model\WalletPassMetaInformation $meta meta
     *
     * @return $this
     */
    public function setMeta($meta)
    {
        $this->container['meta'] = $meta;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param \DateTime $updated_at updated_at
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime $created_at created_at
     *
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->container['created_at'] = $created_at;

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
     * Magic property getter
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (isset(self::$getters[$name])) {
            return call_user_func_array([$this, self::$getters[$name]], []);
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' .
                $name .
                ' in ' .
                $trace[0]['file'] .
                ' on line ' .
                $trace[0]['line'],
            E_USER_NOTICE
        );

        return null;
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
