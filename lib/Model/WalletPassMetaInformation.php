<?php
/**
 * WalletPassMetaInformation
 *
 * PHP version 7
 *
 * @category Class
 * @package  WalletPassJP\Client
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


namespace WalletPassJP\Client\Model;

use \ArrayAccess;
use \WalletPassJP\Client\ObjectSerializer;

/**
 * WalletPassMetaInformation Class Doc Comment
 *
 * @category Class
 * @package  WalletPassJP\Client
 * @author   Kinchaku
 */
class WalletPassMetaInformation implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Wallet Pass meta information';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'activity' => 'string[]',
'first_installed_at' => '\DateTime',
'last_installed_at' => '\DateTime',
'first_uninstalled_at' => '\DateTime',
'last_uninstalled_at' => '\DateTime',
'voided_at' => '\DateTime'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'activity' => null,
'first_installed_at' => 'date-time',
'last_installed_at' => 'date-time',
'first_uninstalled_at' => 'date-time',
'last_uninstalled_at' => 'date-time',
'voided_at' => 'date-time'    ];

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
        'activity' => 'activity',
'first_installed_at' => 'first_installed_at',
'last_installed_at' => 'last_installed_at',
'first_uninstalled_at' => 'first_uninstalled_at',
'last_uninstalled_at' => 'last_uninstalled_at',
'voided_at' => 'voided_at'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'activity' => 'setActivity',
'first_installed_at' => 'setFirstInstalledAt',
'last_installed_at' => 'setLastInstalledAt',
'first_uninstalled_at' => 'setFirstUninstalledAt',
'last_uninstalled_at' => 'setLastUninstalledAt',
'voided_at' => 'setVoidedAt'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'activity' => 'getActivity',
'first_installed_at' => 'getFirstInstalledAt',
'last_installed_at' => 'getLastInstalledAt',
'first_uninstalled_at' => 'getFirstUninstalledAt',
'last_uninstalled_at' => 'getLastUninstalledAt',
'voided_at' => 'getVoidedAt'    ];

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
        $this->container['activity'] = isset($data['activity']) ? $data['activity'] : null;
        $this->container['first_installed_at'] = isset($data['first_installed_at']) ? $data['first_installed_at'] : null;
        $this->container['last_installed_at'] = isset($data['last_installed_at']) ? $data['last_installed_at'] : null;
        $this->container['first_uninstalled_at'] = isset($data['first_uninstalled_at']) ? $data['first_uninstalled_at'] : null;
        $this->container['last_uninstalled_at'] = isset($data['last_uninstalled_at']) ? $data['last_uninstalled_at'] : null;
        $this->container['voided_at'] = isset($data['voided_at']) ? $data['voided_at'] : null;
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
     * Gets activity
     *
     * @return string[]
     */
    public function getActivity()
    {
        return $this->container['activity'];
    }

    /**
     * Sets activity
     *
     * @param string[] $activity Pass activity and operations.
     *
     * @return $this
     */
    public function setActivity($activity)
    {
        $this->container['activity'] = $activity;

        return $this;
    }

    /**
     * Gets first_installed_at
     *
     * @return \DateTime
     */
    public function getFirstInstalledAt()
    {
        return $this->container['first_installed_at'];
    }

    /**
     * Sets first_installed_at
     *
     * @param \DateTime $first_installed_at First installation event date.
     *
     * @return $this
     */
    public function setFirstInstalledAt($first_installed_at)
    {
        $this->container['first_installed_at'] = $first_installed_at;

        return $this;
    }

    /**
     * Gets last_installed_at
     *
     * @return \DateTime
     */
    public function getLastInstalledAt()
    {
        return $this->container['last_installed_at'];
    }

    /**
     * Sets last_installed_at
     *
     * @param \DateTime $last_installed_at Last installation event date.
     *
     * @return $this
     */
    public function setLastInstalledAt($last_installed_at)
    {
        $this->container['last_installed_at'] = $last_installed_at;

        return $this;
    }

    /**
     * Gets first_uninstalled_at
     *
     * @return \DateTime
     */
    public function getFirstUninstalledAt()
    {
        return $this->container['first_uninstalled_at'];
    }

    /**
     * Sets first_uninstalled_at
     *
     * @param \DateTime $first_uninstalled_at First uninstalled event date.
     *
     * @return $this
     */
    public function setFirstUninstalledAt($first_uninstalled_at)
    {
        $this->container['first_uninstalled_at'] = $first_uninstalled_at;

        return $this;
    }

    /**
     * Gets last_uninstalled_at
     *
     * @return \DateTime
     */
    public function getLastUninstalledAt()
    {
        return $this->container['last_uninstalled_at'];
    }

    /**
     * Sets last_uninstalled_at
     *
     * @param \DateTime $last_uninstalled_at Last uninstalled event date.
     *
     * @return $this
     */
    public function setLastUninstalledAt($last_uninstalled_at)
    {
        $this->container['last_uninstalled_at'] = $last_uninstalled_at;

        return $this;
    }

    /**
     * Gets voided_at
     *
     * @return \DateTime
     */
    public function getVoidedAt()
    {
        return $this->container['voided_at'];
    }

    /**
     * Sets voided_at
     *
     * @param \DateTime $voided_at Date the pass was used.
     *
     * @return $this
     */
    public function setVoidedAt($voided_at)
    {
        $this->container['voided_at'] = $voided_at;

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
