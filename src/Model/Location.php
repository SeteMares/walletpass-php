<?php
/**
 * Location
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
 * Location Class Doc Comment
 *
 * @category Class
 * @description For iOS users message will be displayed on lockscreen.  When the location is interpreted with a small radius, the current location must be on the order of a hundred meters or closer; with a large radius, on the order of a thousand meters or closer.  ##### Large radius (max. 1000m): - Event ticket - Boarding pass  ##### Small radius (max. 100m): - Coupon - Store card - Generic  Boarding passes and event tickets almost always specify a relevant date, so they appear only on the valid date and not each time the user is near the location.
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class Location implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Location';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'name' => 'string',
'latitude' => 'double',
'longitude' => 'double',
'altitude' => 'int',
'address' => 'string',
'relevant_text' => 'string',
'max_distance' => 'int'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'name' => null,
'latitude' => 'double',
'longitude' => 'double',
'altitude' => 'int32',
'address' => null,
'relevant_text' => null,
'max_distance' => 'int32'    ];

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
'latitude' => 'latitude',
'longitude' => 'longitude',
'altitude' => 'altitude',
'address' => 'address',
'relevant_text' => 'relevant_text',
'max_distance' => 'max_distance'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
'latitude' => 'setLatitude',
'longitude' => 'setLongitude',
'altitude' => 'setAltitude',
'address' => 'setAddress',
'relevant_text' => 'setRelevantText',
'max_distance' => 'setMaxDistance'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
'latitude' => 'getLatitude',
'longitude' => 'getLongitude',
'altitude' => 'getAltitude',
'address' => 'getAddress',
'relevant_text' => 'getRelevantText',
'max_distance' => 'getMaxDistance'    ];

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
        $this->container['latitude'] = isset($data['latitude']) ? $data['latitude'] : null;
        $this->container['longitude'] = isset($data['longitude']) ? $data['longitude'] : null;
        $this->container['altitude'] = isset($data['altitude']) ? $data['altitude'] : 0;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['relevant_text'] = isset($data['relevant_text']) ? $data['relevant_text'] : null;
        $this->container['max_distance'] = isset($data['max_distance']) ? $data['max_distance'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['latitude'] === null) {
            $invalidProperties[] = "'latitude' can't be null";
        }
        if ($this->container['longitude'] === null) {
            $invalidProperties[] = "'longitude' can't be null";
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
     * @param string $name Optional. Venue or location name.
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets latitude
     *
     * @return double
     */
    public function getLatitude()
    {
        return $this->container['latitude'];
    }

    /**
     * Sets latitude
     *
     * @param double $latitude Latitude, in degrees, of the location.
     *
     * @return $this
     */
    public function setLatitude($latitude)
    {
        $this->container['latitude'] = $latitude;

        return $this;
    }

    /**
     * Gets longitude
     *
     * @return double
     */
    public function getLongitude()
    {
        return $this->container['longitude'];
    }

    /**
     * Sets longitude
     *
     * @param double $longitude Longitude, in degrees, of the location.
     *
     * @return $this
     */
    public function setLongitude($longitude)
    {
        $this->container['longitude'] = $longitude;

        return $this;
    }

    /**
     * Gets altitude
     *
     * @return int
     */
    public function getAltitude()
    {
        return $this->container['altitude'];
    }

    /**
     * Sets altitude
     *
     * @param int $altitude Optional. Altitude, in meters, of the location.
     *
     * @return $this
     */
    public function setAltitude($altitude)
    {
        $this->container['altitude'] = $altitude;

        return $this;
    }

    /**
     * Gets address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param string $address Optional. Location full address.
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

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
     * Gets max_distance
     *
     * @return int
     */
    public function getMaxDistance()
    {
        return $this->container['max_distance'];
    }

    /**
     * Sets max_distance
     *
     * @param int $max_distance Maximum distance in meters from a relevant latitude and longitude that the pass is relevant. This number is compared to the pass’s default distance and the smaller value is used.
     *
     * @return $this
     */
    public function setMaxDistance($max_distance)
    {
        $this->container['max_distance'] = $max_distance;

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
