<?php
/**
 * CampaignRequest
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
 * CampaignRequest Class Doc Comment
 *
 * @category Class
 * @package  WalletPassJP\Client
 * @author   Kinchaku
 */
class CampaignRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CampaignRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'type' => 'string',
'external_id' => 'string',
'template_id' => 'string',
'redeemed_template_id' => 'string',
'title' => 'string',
'is_enabled' => 'bool',
'background_color' => 'string',
'text_color' => 'string',
'label_color' => 'string',
'settings' => 'OneOfCampaignRequestSettings',
'images' => 'string[]',
'organization_name' => 'string',
'links' => '\WalletPassJP\Client\Model\Link[]',
'beacons' => '\WalletPassJP\Client\Model\Beacon[]',
'locations' => '\WalletPassJP\Client\Model\Location[]',
'tags' => 'string[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'type' => null,
'external_id' => null,
'template_id' => 'uuid',
'redeemed_template_id' => 'uuid',
'title' => null,
'is_enabled' => null,
'background_color' => null,
'text_color' => null,
'label_color' => null,
'settings' => null,
'images' => null,
'organization_name' => null,
'links' => null,
'beacons' => null,
'locations' => null,
'tags' => null    ];

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
        'type' => 'type',
'external_id' => 'external_id',
'template_id' => 'template_id',
'redeemed_template_id' => 'redeemed_template_id',
'title' => 'title',
'is_enabled' => 'is_enabled',
'background_color' => 'background_color',
'text_color' => 'text_color',
'label_color' => 'label_color',
'settings' => 'settings',
'images' => 'images',
'organization_name' => 'organization_name',
'links' => 'links',
'beacons' => 'beacons',
'locations' => 'locations',
'tags' => 'tags'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
'external_id' => 'setExternalId',
'template_id' => 'setTemplateId',
'redeemed_template_id' => 'setRedeemedTemplateId',
'title' => 'setTitle',
'is_enabled' => 'setIsEnabled',
'background_color' => 'setBackgroundColor',
'text_color' => 'setTextColor',
'label_color' => 'setLabelColor',
'settings' => 'setSettings',
'images' => 'setImages',
'organization_name' => 'setOrganizationName',
'links' => 'setLinks',
'beacons' => 'setBeacons',
'locations' => 'setLocations',
'tags' => 'setTags'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
'external_id' => 'getExternalId',
'template_id' => 'getTemplateId',
'redeemed_template_id' => 'getRedeemedTemplateId',
'title' => 'getTitle',
'is_enabled' => 'getIsEnabled',
'background_color' => 'getBackgroundColor',
'text_color' => 'getTextColor',
'label_color' => 'getLabelColor',
'settings' => 'getSettings',
'images' => 'getImages',
'organization_name' => 'getOrganizationName',
'links' => 'getLinks',
'beacons' => 'getBeacons',
'locations' => 'getLocations',
'tags' => 'getTags'    ];

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

    const TYPE_GIFTCARD = 'giftcard';
const TYPE_COUPON = 'coupon';
const TYPE_VOUCHER = 'voucher';
const TYPE_STAMPCARD = 'stampcard';
const TYPE_MEMBERSHIP = 'membership';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_GIFTCARD,
self::TYPE_COUPON,
self::TYPE_VOUCHER,
self::TYPE_STAMPCARD,
self::TYPE_MEMBERSHIP,        ];
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
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['external_id'] = isset($data['external_id']) ? $data['external_id'] : null;
        $this->container['template_id'] = isset($data['template_id']) ? $data['template_id'] : null;
        $this->container['redeemed_template_id'] = isset($data['redeemed_template_id']) ? $data['redeemed_template_id'] : null;
        $this->container['title'] = isset($data['title']) ? $data['title'] : null;
        $this->container['is_enabled'] = isset($data['is_enabled']) ? $data['is_enabled'] : false;
        $this->container['background_color'] = isset($data['background_color']) ? $data['background_color'] : null;
        $this->container['text_color'] = isset($data['text_color']) ? $data['text_color'] : null;
        $this->container['label_color'] = isset($data['label_color']) ? $data['label_color'] : null;
        $this->container['settings'] = isset($data['settings']) ? $data['settings'] : null;
        $this->container['images'] = isset($data['images']) ? $data['images'] : null;
        $this->container['organization_name'] = isset($data['organization_name']) ? $data['organization_name'] : null;
        $this->container['links'] = isset($data['links']) ? $data['links'] : null;
        $this->container['beacons'] = isset($data['beacons']) ? $data['beacons'] : null;
        $this->container['locations'] = isset($data['locations']) ? $data['locations'] : null;
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
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['title'] === null) {
            $invalidProperties[] = "'title' can't be null";
        }
        if ($this->container['images'] === null) {
            $invalidProperties[] = "'images' can't be null";
        }
        if ($this->container['organization_name'] === null) {
            $invalidProperties[] = "'organization_name' can't be null";
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
     * @param string $type type
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
     * @param string $template_id Optional. Provide Template ID to specify Campaign design and distribution settings.
     *
     * @return $this
     */
    public function setTemplateId($template_id)
    {
        $this->container['template_id'] = $template_id;

        return $this;
    }

    /**
     * Gets redeemed_template_id
     *
     * @return string
     */
    public function getRedeemedTemplateId()
    {
        return $this->container['redeemed_template_id'];
    }

    /**
     * Sets redeemed_template_id
     *
     * @param string $redeemed_template_id Optional. Template ID that will be switched to after pass redemption.
     *
     * @return $this
     */
    public function setRedeemedTemplateId($redeemed_template_id)
    {
        $this->container['redeemed_template_id'] = $redeemed_template_id;

        return $this;
    }

    /**
     * Gets title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string $title Used to identify this Campaign. Not shown to the customer.
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets is_enabled
     *
     * @return bool
     */
    public function getIsEnabled()
    {
        return $this->container['is_enabled'];
    }

    /**
     * Sets is_enabled
     *
     * @param bool $is_enabled Is it allowed to issue new passes for this Campaign.
     *
     * @return $this
     */
    public function setIsEnabled($is_enabled)
    {
        $this->container['is_enabled'] = $is_enabled;

        return $this;
    }

    /**
     * Gets background_color
     *
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->container['background_color'];
    }

    /**
     * Sets background_color
     *
     * @param string $background_color background_color
     *
     * @return $this
     */
    public function setBackgroundColor($background_color)
    {
        $this->container['background_color'] = $background_color;

        return $this;
    }

    /**
     * Gets text_color
     *
     * @return string
     */
    public function getTextColor()
    {
        return $this->container['text_color'];
    }

    /**
     * Sets text_color
     *
     * @param string $text_color Optional. Can be calculated from background color.
     *
     * @return $this
     */
    public function setTextColor($text_color)
    {
        $this->container['text_color'] = $text_color;

        return $this;
    }

    /**
     * Gets label_color
     *
     * @return string
     */
    public function getLabelColor()
    {
        return $this->container['label_color'];
    }

    /**
     * Sets label_color
     *
     * @param string $label_color Can be calculated from background_color.
     *
     * @return $this
     */
    public function setLabelColor($label_color)
    {
        $this->container['label_color'] = $label_color;

        return $this;
    }

    /**
     * Gets settings
     *
     * @return OneOfCampaignRequestSettings
     */
    public function getSettings()
    {
        return $this->container['settings'];
    }

    /**
     * Sets settings
     *
     * @param OneOfCampaignRequestSettings $settings settings
     *
     * @return $this
     */
    public function setSettings($settings)
    {
        $this->container['settings'] = $settings;

        return $this;
    }

    /**
     * Gets images
     *
     * @return string[]
     */
    public function getImages()
    {
        return $this->container['images'];
    }

    /**
     * Sets images
     *
     * @param string[] $images Array of Asset IDs, at least logo must be present.
     *
     * @return $this
     */
    public function setImages($images)
    {
        $this->container['images'] = $images;

        return $this;
    }

    /**
     * Gets organization_name
     *
     * @return string
     */
    public function getOrganizationName()
    {
        return $this->container['organization_name'];
    }

    /**
     * Sets organization_name
     *
     * @param string $organization_name organization_name
     *
     * @return $this
     */
    public function setOrganizationName($organization_name)
    {
        $this->container['organization_name'] = $organization_name;

        return $this;
    }

    /**
     * Gets links
     *
     * @return \WalletPassJP\Client\Model\Link[]
     */
    public function getLinks()
    {
        return $this->container['links'];
    }

    /**
     * Sets links
     *
     * @param \WalletPassJP\Client\Model\Link[] $links links
     *
     * @return $this
     */
    public function setLinks($links)
    {
        $this->container['links'] = $links;

        return $this;
    }

    /**
     * Gets beacons
     *
     * @return \WalletPassJP\Client\Model\Beacon[]
     */
    public function getBeacons()
    {
        return $this->container['beacons'];
    }

    /**
     * Sets beacons
     *
     * @param \WalletPassJP\Client\Model\Beacon[] $beacons beacons
     *
     * @return $this
     */
    public function setBeacons($beacons)
    {
        $this->container['beacons'] = $beacons;

        return $this;
    }

    /**
     * Gets locations
     *
     * @return \WalletPassJP\Client\Model\Location[]
     */
    public function getLocations()
    {
        return $this->container['locations'];
    }

    /**
     * Sets locations
     *
     * @param \WalletPassJP\Client\Model\Location[] $locations locations
     *
     * @return $this
     */
    public function setLocations($locations)
    {
        $this->container['locations'] = $locations;

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
     * @param string[] $tags Optional array of tags to attach
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

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
