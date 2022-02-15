<?php
/**
 * Beacon
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
use \WalletPassJP\ObjectSerializer;

/**
 * Beacon Class Doc Comment
 *
 * @category Class
 * @description iBeacons are only supported by iOS.
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class Beacon implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Beacon';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
'proximity_uuid' => 'string',
'major' => 'int',
'minor' => 'int',
'relevant_text' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
'proximity_uuid' => 'uuid',
'major' => 'int16',
'minor' => 'int16',
'relevant_text' => null    ];

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
        'name' => 'name',
'proximity_uuid' => 'proximity_uuid',
'major' => 'major',
'minor' => 'minor',
'relevant_text' => 'relevant_text'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
'proximity_uuid' => 'setProximityUuid',
'major' => 'setMajor',
'minor' => 'setMinor',
'relevant_text' => 'setRelevantText'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
'proximity_uuid' => 'getProximityUuid',
'major' => 'getMajor',
'minor' => 'getMinor',
'relevant_text' => 'getRelevantText'    ];

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
        $this->container['proximity_uuid'] = isset($data['proximity_uuid']) ? $data['proximity_uuid'] : null;
        $this->container['major'] = isset($data['major']) ? $data['major'] : null;
        $this->container['minor'] = isset($data['minor']) ? $data['minor'] : null;
        $this->container['relevant_text'] = isset($data['relevant_text']) ? $data['relevant_text'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['proximity_uuid'] === null) {
            $invalidProperties[] = "'proximity_uuid' can't be null";
        }
        if ($this->container['relevant_text'] === null) {
            $invalidProperties[] = "'relevant_text' can't be null";
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
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets proximity_uuid
     *
     * @return string
     */
    public function getProximityUuid()
    {
        return $this->container['proximity_uuid'];
    }

    /**
     * Sets proximity_uuid
     *
     * @param string $proximity_uuid A valid UUID that is being broadcast by your beacon.
     *
     * @return $this
     */
    public function setProximityUuid($proximity_uuid)
    {
        $this->container['proximity_uuid'] = $proximity_uuid;

        return $this;
    }

    /**
     * Gets major
     *
     * @return int
     */
    public function getMajor()
    {
        return $this->container['major'];
    }

    /**
     * Sets major
     *
     * @param int $major Major identifier.
     *
     * @return $this
     */
    public function setMajor($major)
    {
        $this->container['major'] = $major;

        return $this;
    }

    /**
     * Gets minor
     *
     * @return int
     */
    public function getMinor()
    {
        return $this->container['minor'];
    }

    /**
     * Sets minor
     *
     * @param int $minor Minor identifier.
     *
     * @return $this
     */
    public function setMinor($minor)
    {
        $this->container['minor'] = $minor;

        return $this;
    }

    /**
     * Gets relevant_text
     *
     * @return string
     */
    public function getRelevantText()
    {
        return $this->container['relevant_text'];
    }

    /**
     * Sets relevant_text
     *
     * @param string $relevant_text Message to display on lockscreen (iOS only).
     *
     * @return $this
     */
    public function setRelevantText($relevant_text)
    {
        $this->container['relevant_text'] = $relevant_text;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists(mixed $offset): bool
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
    public function offsetGet(mixed $offset): mixed
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
    public function offsetSet(mixed $offset, mixed $value): void
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
    public function offsetUnset(mixed $offset): void
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
