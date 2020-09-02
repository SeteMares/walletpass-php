<?php
/**
 * ProjectTemplates
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
 * ProjectTemplates Class Doc Comment
 *
 * @category Class
 * @description Template ID that will be switched to after pass redemption.
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class ProjectTemplates implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'Project_templates';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'default' => '\WalletPassJP\Model\Template',
        'redeemed' => '\WalletPassJP\Model\Template',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'default' => null,
        'redeemed' => null,
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
        'default' => 'default',
        'redeemed' => 'redeemed',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'default' => 'setDefault',
        'redeemed' => 'setRedeemed',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'default' => 'getDefault',
        'redeemed' => 'getRedeemed',
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
        $this->container['default'] = isset($data['default']) ? $data['default'] : null;
        $this->container['redeemed'] = isset($data['redeemed']) ? $data['redeemed'] : null;
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
     * Gets default
     *
     * @return \WalletPassJP\Model\Template
     */
    public function getDefault()
    {
        return $this->container['default'];
    }

    /**
     * Sets default
     *
     * @param \WalletPassJP\Model\Template $default default
     *
     * @return $this
     */
    public function setDefault($default)
    {
        $this->container['default'] = $default;

        return $this;
    }

    /**
     * Gets redeemed
     *
     * @return \WalletPassJP\Model\Template
     */
    public function getRedeemed()
    {
        return $this->container['redeemed'];
    }

    /**
     * Sets redeemed
     *
     * @param \WalletPassJP\Model\Template $redeemed redeemed
     *
     * @return $this
     */
    public function setRedeemed($redeemed)
    {
        $this->container['redeemed'] = $redeemed;

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
