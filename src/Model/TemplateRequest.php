<?php
namespace WalletPassJP\Model;

use \ArrayAccess;
use WalletPassJP\ObjectSerializer;

/**
 * TemplateRequest Class Doc Comment
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class TemplateRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'TemplateRequest';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'external_id' => 'string',
        'pass_type_identifier' => 'string',
        'images' => 'string[]',
        'colors' => '\WalletPassJP\Model\Colors',
        'beacons' => '\WalletPassJP\Model\TemplateRequestBeacons',
        'locations' => '\WalletPassJP\Model\TemplateRequestLocations',
        'links' => '\WalletPassJP\Model\TemplateRequestLinks',
        'grouping_identifier' => 'string',
        'logo_text' => 'string',
        'pass_type' => 'string',
        'name' => 'string',
        'description' => 'string',
        'relevant_date' => '\DateTime',
        'organization_name' => 'string',
        'sharing_status' => 'string',
        'barcode' => '\WalletPassJP\Model\BarcodeSettings',
        'expiry_settings' => '\WalletPassJP\Model\TemplateExpirySettings',
        'associated_store_identifier' => 'string',
        'google_pay_apps' => '\WalletPassJP\Model\TemplateGooglePayApps[]',
        'fields' => '\WalletPassJP\Model\PassField[]',
        'ios_logo_layout' => 'string',
        'tags' => 'string[]',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'external_id' => null,
        'pass_type_identifier' => null,
        'images' => null,
        'colors' => null,
        'beacons' => null,
        'locations' => null,
        'links' => null,
        'grouping_identifier' => null,
        'logo_text' => null,
        'pass_type' => null,
        'name' => null,
        'description' => null,
        'relevant_date' => 'date-time',
        'organization_name' => null,
        'sharing_status' => null,
        'barcode' => null,
        'expiry_settings' => null,
        'fields' => null,
        'associated_store_identifier' => null,
        'google_pay_apps' => null,
        'ios_logo_layout' => null,
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
        'external_id' => 'external_id',
        'pass_type_identifier' => 'pass_type_identifier',
        'images' => 'images',
        'colors' => 'colors',
        'beacons' => 'beacons',
        'locations' => 'locations',
        'links' => 'links',
        'grouping_identifier' => 'grouping_identifier',
        'logo_text' => 'logo_text',
        'pass_type' => 'pass_type',
        'name' => 'name',
        'description' => 'description',
        'relevant_date' => 'relevant_date',
        'organization_name' => 'organization_name',
        'sharing_status' => 'sharing_status',
        'barcode' => 'barcode',
        'expiry_settings' => 'expiry_settings',
        'fields' => 'fields',
        'associated_store_identifier' => 'associated_store_identifier',
        'google_pay_apps' => 'google_pay_apps',
        'ios_logo_layout' => 'ios_logo_layout',
        'tags' => 'tags',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'external_id' => 'setExternalId',
        'pass_type_identifier' => 'setPassTypeIdentifier',
        'images' => 'setImages',
        'colors' => 'setColors',
        'beacons' => 'setBeacons',
        'locations' => 'setLocations',
        'links' => 'setLinks',
        'grouping_identifier' => 'setGroupingIdentifier',
        'logo_text' => 'setLogoText',
        'pass_type' => 'setPassType',
        'name' => 'setName',
        'description' => 'setDescription',
        'relevant_date' => 'setRelevantDate',
        'organization_name' => 'setOrganizationName',
        'sharing_status' => 'setSharingStatus',
        'barcode' => 'setBarcode',
        'expiry_settings' => 'setExpirySettings',
        'fields' => 'setFields',
        'associated_store_identifier' => 'setAssociatedStoreIdentifier',
        'google_pay_apps' => 'setGooglePayApps',
        'ios_logo_layout' => 'setIosLogoLayout',
        'tags' => 'setTags',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'external_id' => 'getExternalId',
        'pass_type_identifier' => 'getPassTypeIdentifier',
        'images' => 'getImages',
        'colors' => 'getColors',
        'beacons' => 'getBeacons',
        'locations' => 'getLocations',
        'links' => 'getLinks',
        'grouping_identifier' => 'getGroupingIdentifier',
        'logo_text' => 'getLogoText',
        'pass_type' => 'getPassType',
        'name' => 'getName',
        'description' => 'getDescription',
        'relevant_date' => 'getRelevantDate',
        'organization_name' => 'getOrganizationName',
        'sharing_status' => 'getSharingStatus',
        'barcode' => 'getBarcode',
        'expiry_settings' => 'getExpirySettings',
        'fields' => 'getFields',
        'associated_store_identifier' => 'getAssociatedStoreIdentifier',
        'google_pay_apps' => 'getGooglePayApps',
        'ios_logo_layout' => 'getIosLogoLayout',
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

    const PASS_TYPE_OFFER = 'offer';
    const PASS_TYPE_EVENTTICKET = 'eventticket';
    const PASS_TYPE_GIFTCARD = 'giftcard';
    const PASS_TYPE_LOYALTY = 'loyalty';
    const PASS_TYPE_GENERIC = 'generic';
    const SHARING_STATUS_MULTIPLE_HOLDERS = 'multipleHolders';
    const SHARING_STATUS_ONE_USER_ALL_DEVICES = 'oneUserAllDevices';
    const SHARING_STATUS_ONE_USER_ONE_DEVICE = 'oneUserOneDevice';
    const IOS_LOGO_LAYOUT_SEPARATE = 'separate';
    const IOS_LOGO_LAYOUT_NONE = 'none';
    const IOS_LOGO_LAYOUT__UNSET = 'unset';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPassTypeAllowableValues()
    {
        return [
            self::PASS_TYPE_OFFER,
            self::PASS_TYPE_EVENTTICKET,
            self::PASS_TYPE_GIFTCARD,
            self::PASS_TYPE_LOYALTY,
            self::PASS_TYPE_GENERIC,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSharingStatusAllowableValues()
    {
        return [
            self::SHARING_STATUS_MULTIPLE_HOLDERS,
            self::SHARING_STATUS_ONE_USER_ALL_DEVICES,
            self::SHARING_STATUS_ONE_USER_ONE_DEVICE,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getIosLogoLayoutAllowableValues()
    {
        return [
            self::IOS_LOGO_LAYOUT_SEPARATE,
            self::IOS_LOGO_LAYOUT_NONE,
            self::IOS_LOGO_LAYOUT__UNSET,
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
        $this->container['external_id'] = $data['external_id'] ?? null;
        $this->container['pass_type_identifier'] = $data['pass_type_identifier'] ?? null;
        $this->container['images'] = $data['images'] ?? null;
        $this->container['colors'] = $data['colors'] ?? null;
        $this->container['beacons'] = $data['beacons'] ?? null;
        $this->container['locations'] = $data['locations'] ?? null;
        $this->container['links'] = $data['links'] ?? null;
        $this->container['grouping_identifier'] = $data['grouping_identifier'] ?? null;
        $this->container['logo_text'] = $data['logo_text'] ?? null;
        $this->container['pass_type'] = $data['pass_type'] ?? 'generic';
        $this->container['name'] = $data['name'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['relevant_date'] = $data['relevant_date'] ?? null;
        $this->container['organization_name'] = $data['organization_name'] ?? null;
        $this->container['sharing_status'] = $data['sharing_status'] ?? 'multipleHolders';
        $this->container['barcode'] = $data['barcode'] ?? null;
        $this->container['expiry_settings'] = $data['expiry_settings'] ?? null;
        $this->container['fields'] = $data['fields'] ?? null;
        $this->container['associated_store_identifier'] =
            $data['associated_store_identifier'] ?? null;
        $this->container['google_pay_apps'] = $data['google_pay_apps'] ?? null;
        $this->container['ios_logo_layout'] = $data['ios_logo_layout'] ?? null;
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

        if ($this->container['images'] === null) {
            $invalidProperties[] = "'images' can't be null";
        }
        if ($this->container['logo_text'] === null) {
            $invalidProperties[] = "'logo_text' can't be null";
        }
        if ($this->container['pass_type'] === null) {
            $invalidProperties[] = "'pass_type' can't be null";
        }
        $allowedValues = $this->getPassTypeAllowableValues();
        if (
            !is_null($this->container['pass_type']) &&
            !in_array($this->container['pass_type'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'pass_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['organization_name'] === null) {
            $invalidProperties[] = "'organization_name' can't be null";
        }
        $allowedValues = $this->getSharingStatusAllowableValues();
        if (
            !is_null($this->container['sharing_status']) &&
            !in_array($this->container['sharing_status'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'sharing_status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getIosLogoLayoutAllowableValues();
        if (
            !is_null($this->container['ios_logo_layout']) &&
            !in_array($this->container['ios_logo_layout'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'ios_logo_layout', must be one of '%s'",
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
     * Gets pass_type_identifier
     *
     * @return string
     */
    public function getPassTypeIdentifier()
    {
        return $this->container['pass_type_identifier'];
    }

    /**
     * Sets pass_type_identifier
     *
     * @param string $pass_type_identifier Certificate to use for Apple passes. If not specified, default Certificate will be used.
     *
     * @return $this
     */
    public function setPassTypeIdentifier($pass_type_identifier)
    {
        $this->container['pass_type_identifier'] = $pass_type_identifier;

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
     * Gets colors
     *
     * @return \WalletPassJP\Model\Colors
     */
    public function getColors()
    {
        return $this->container['colors'];
    }

    /**
     * Sets colors
     *
     * @param \WalletPassJP\Model\Colors $colors colors
     *
     * @return $this
     */
    public function setColors($colors)
    {
        $this->container['colors'] = $colors;

        return $this;
    }

    /**
     * Gets beacons
     *
     * @return \WalletPassJP\Model\TemplateRequestBeacons
     */
    public function getBeacons()
    {
        return $this->container['beacons'];
    }

    /**
     * Sets beacons
     *
     * @param \WalletPassJP\Model\TemplateRequestBeacons $beacons beacons
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
     * @return \WalletPassJP\Model\TemplateRequestLocations
     */
    public function getLocations()
    {
        return $this->container['locations'];
    }

    /**
     * Sets locations
     *
     * @param \WalletPassJP\Model\TemplateRequestLocations $locations locations
     *
     * @return $this
     */
    public function setLocations($locations)
    {
        $this->container['locations'] = $locations;

        return $this;
    }

    /**
     * Gets links
     *
     * @return \WalletPassJP\Model\TemplateRequestLinks
     */
    public function getLinks()
    {
        return $this->container['links'];
    }

    /**
     * Sets links
     *
     * @param \WalletPassJP\Model\TemplateRequestLinks $links links
     *
     * @return $this
     */
    public function setLinks($links)
    {
        $this->container['links'] = $links;

        return $this;
    }

    /**
     * Gets grouping_identifier
     *
     * @return string
     */
    public function getGroupingIdentifier()
    {
        return $this->container['grouping_identifier'];
    }

    /**
     * Sets grouping_identifier
     *
     * @param string $grouping_identifier Optional for event tickets and boarding passes; otherwise not allowed. Identifier used to group related passes. If a grouping identifier is specified, passes with the same style, pass type identifier, and grouping identifier are displayed as a group. Otherwise, passes are grouped automatically.  Use this to group passes that are tightly related, such as the boarding passes for different connections of the same trip.
     *
     * @return $this
     */
    public function setGroupingIdentifier($grouping_identifier)
    {
        $this->container['grouping_identifier'] = $grouping_identifier;

        return $this;
    }

    /**
     * Gets logo_text
     *
     * @return string
     */
    public function getLogoText()
    {
        return $this->container['logo_text'];
    }

    /**
     * Sets logo_text
     *
     * @param string $logo_text logo_text
     *
     * @return $this
     */
    public function setLogoText($logo_text)
    {
        $this->container['logo_text'] = $logo_text;

        return $this;
    }

    /**
     * Gets pass_type
     *
     * @return string
     */
    public function getPassType()
    {
        return $this->container['pass_type'];
    }

    /**
     * Sets pass_type
     *
     * @param string $pass_type pass_type
     *
     * @return $this
     */
    public function setPassType($pass_type)
    {
        $allowedValues = $this->getPassTypeAllowableValues();
        if (!in_array($pass_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'pass_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['pass_type'] = $pass_type;

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
     * @param string $name Used to identify a Template
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Brief description of the template.
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets relevant_date
     *
     * @return \DateTime
     */
    public function getRelevantDate()
    {
        return $this->container['relevant_date'];
    }

    /**
     * Sets relevant_date
     *
     * @param \DateTime $relevant_date Recommended for event tickets; otherwise optional. Date and time when the pass becomes relevant. For example, the start time of a movie.  The value must be a complete date with hours and minutes, and may optionally include seconds.
     *
     * @return $this
     */
    public function setRelevantDate($relevant_date)
    {
        $this->container['relevant_date'] = $relevant_date;

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
     * @param string $organization_name This is the name of the company or organisation issuing the pass.
     *
     * @return $this
     */
    public function setOrganizationName($organization_name)
    {
        $this->container['organization_name'] = $organization_name;

        return $this;
    }

    /**
     * Gets sharing_status
     *
     * @return string
     */
    public function getSharingStatus()
    {
        return $this->container['sharing_status'];
    }

    /**
     * Sets sharing_status
     *
     * @param string $sharing_status Determines whether a pass supports sharing across users, devices or both. iOS interprets this as a boolean setting: `oneUserOneDevice` prohibits sharing; all other values allow sharing.
     *
     * @return $this
     */
    public function setSharingStatus($sharing_status)
    {
        $allowedValues = $this->getSharingStatusAllowableValues();
        if (!is_null($sharing_status) && !in_array($sharing_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'sharing_status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['sharing_status'] = $sharing_status;

        return $this;
    }

    /**
     * Gets barcode
     *
     * @return \WalletPassJP\Model\BarcodeSettings
     */
    public function getBarcode()
    {
        return $this->container['barcode'];
    }

    /**
     * Sets barcode
     *
     * @param \WalletPassJP\Model\BarcodeSettings $barcode barcode
     *
     * @return $this
     */
    public function setBarcode($barcode)
    {
        $this->container['barcode'] = $barcode;

        return $this;
    }

    /**
     * Gets expiry_settings
     *
     * @return \WalletPassJP\Model\TemplateExpirySettings
     */
    public function getExpirySettings()
    {
        return $this->container['expiry_settings'];
    }

    /**
     * Sets expiry_settings
     *
     * @param \WalletPassJP\Model\TemplateExpirySettings $expiry_settings expiry_settings
     *
     * @return $this
     */
    public function setExpirySettings($expiry_settings)
    {
        $this->container['expiry_settings'] = $expiry_settings;

        return $this;
    }

    /**
     * Gets associated_store_identifier
     *
     * @return string
     */
    public function getAssociatedStoreIdentifier()
    {
        return $this->container['associated_store_identifier'];
    }

    /**
     * Sets associated_store_identifier
     *
     * @param string $associated_store_identifier iTunes Store item identifier for the associated app.  If the app is not installed, the link opens the App Store and shows the app. If the app is already installed, the link launches the app.
     *
     * @return $this
     */
    public function setAssociatedStoreIdentifier($associated_store_identifier)
    {
        $this->container['associated_store_identifier'] = $associated_store_identifier;

        return $this;
    }

    /**
     * Gets fields
     *
     * @return \WalletPassJP\Model\PassField[]
     */
    public function getFields()
    {
        return $this->container['fields'];
    }

    /**
     * Sets fields
     *
     * @param \WalletPassJP\Model\PassField[] $fields This allows you to configure individual data field that is rendered on the customer UI (data collection page and the pass).
     *
     * @return $this
     */
    public function setFields($fields)
    {
        $this->container['fields'] = $fields;

        return $this;
    }

    /**
     * Gets google_pay_apps
     *
     * @return \WalletPassJP\Model\TemplateGooglePayApps[]
     */
    public function getGooglePayApps()
    {
        return $this->container['google_pay_apps'];
    }

    /**
     * Sets google_pay_apps
     *
     * @param \WalletPassJP\Model\TemplateGooglePayApps[] $google_pay_apps Settings to render an app on the head of a pass. Apps can be Android, iOS or Web
     *
     * @return $this
     */
    public function setGooglePayApps($google_pay_apps)
    {
        $this->container['google_pay_apps'] = $google_pay_apps;

        return $this;
    }

    /**
     * Gets ios_logo_layout
     *
     * @return string
     */
    public function getIosLogoLayout()
    {
        return $this->container['ios_logo_layout'];
    }

    /**
     * Sets ios_logo_layout
     *
     * @param string $ios_logo_layout Apple pass logo settings. - `none` - will omit logo from a pass - `separate` - will use separate Asset `apple_logo` - `unset` - use default logo Asset
     *
     * @return $this
     */
    public function setIosLogoLayout($ios_logo_layout)
    {
        $allowedValues = $this->getIosLogoLayoutAllowableValues();
        if (!is_null($ios_logo_layout) && !in_array($ios_logo_layout, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'ios_logo_layout', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['ios_logo_layout'] = $ios_logo_layout;

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
