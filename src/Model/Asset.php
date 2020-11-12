<?php
/**
 * Asset
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
 * Asset Class Doc Comment
 *
 * @category Class
 * @description Assets are the visual elements of the pass.  You can reuse assets, meaning that you can assign the same asset to multiple passes, reducing the number of asset operations and also reducing the amount of bandwidth required to create a pass.
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class Asset implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'Asset';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'id' => 'string',
        'type' => 'string',
        'name' => 'string',
        'url' => 'string',
        'created_at' => '\DateTime',
        'tags' => 'string[]',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'id' => 'uuid',
        'type' => null,
        'name' => null,
        'url' => 'uri',
        'created_at' => 'date-time',
        'tags' => null,
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
        'type' => 'type',
        'name' => 'name',
        'url' => 'url',
        'created_at' => 'created_at',
        'tags' => 'tags',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'type' => 'setType',
        'name' => 'setName',
        'url' => 'setUrl',
        'created_at' => 'setCreatedAt',
        'tags' => 'setTags',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'type' => 'getType',
        'name' => 'getName',
        'url' => 'getUrl',
        'created_at' => 'getCreatedAt',
        'tags' => 'getTags',
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

    const TYPE_ICON = 'icon';
    const TYPE_LOGO = 'logo';
    const TYPE_STRIP = 'strip';
    const TYPE_THUMBNAIL = 'thumbnail';
    const TYPE_BACKGROUND = 'background';
    const TYPE_FOOTER = 'footer';
    const TYPE_APPLE_LOGO = 'apple_logo';
    const TYPE_CONTACT_PICTURE = 'contact_picture';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_ICON,
            self::TYPE_LOGO,
            self::TYPE_STRIP,
            self::TYPE_THUMBNAIL,
            self::TYPE_BACKGROUND,
            self::TYPE_FOOTER,
            self::TYPE_APPLE_LOGO,
            self::TYPE_CONTACT_PICTURE,
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
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
        $this->container['created_at'] = isset($data['created_at'])
            ? $data['created_at']
            : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getTypeAllowableValues();
        if (
            !is_null($this->container['type']) &&
            !in_array($this->container['type'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'type', must be one of '%s'",
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
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type Type of asset
     *
     * @return $this
     */
    public function setType($type)
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($type) && !in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

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
     * @param string $name Used to identify this asset. Not shown to the customer.
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url Asset public URL.
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

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
     * Gets tags
     *
     * @return string[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param string[] $tags List of attached tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
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
