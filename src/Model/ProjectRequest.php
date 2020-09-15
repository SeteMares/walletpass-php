<?php
namespace WalletPassJP\Model;

use \ArrayAccess;
use WalletPassJP\ObjectSerializer;

/**
 * ProjectRequest Class Doc Comment
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class ProjectRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'ProjectRequest';

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
        'settings' => 'object',
        'barcode' => 'object',
        'images' => 'string[]',
        'organization_name' => 'string',
        'links' => '\WalletPassJP\Model\Link[]',
        'beacons' => '\WalletPassJP\Model\Beacon[]',
        'locations' => '\WalletPassJP\Model\Location[]',
        'tags' => 'string[]',
        'associated_store_identifier' => 'string',
        'google_pay_apps' => '\WalletPassJP\Model\TemplateGooglePayApps[]',
        'ios_logo_layout' => 'string',
    ];

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
        'barcode' => null,
        'images' => null,
        'organization_name' => null,
        'links' => null,
        'beacons' => null,
        'locations' => null,
        'tags' => null,
        'associated_store_identifier' => null,
        'google_pay_apps' => null,
        'ios_logo_layout' => null,
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
        'barcode' => 'barcode',
        'images' => 'images',
        'organization_name' => 'organization_name',
        'links' => 'links',
        'beacons' => 'beacons',
        'locations' => 'locations',
        'tags' => 'tags',
        'associated_store_identifier' => 'associated_store_identifier',
        'google_pay_apps' => 'google_pay_apps',
        'ios_logo_layout' => 'ios_logo_layout',
    ];

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
        'barcode' => 'setBarcode',
        'images' => 'setImages',
        'organization_name' => 'setOrganizationName',
        'links' => 'setLinks',
        'beacons' => 'setBeacons',
        'locations' => 'setLocations',
        'tags' => 'setTags',
        'associated_store_identifier' => 'setAssociatedStoreIdentifier',
        'google_pay_apps' => 'setGooglePayApps',
        'ios_logo_layout' => 'setIosLogoLayout',
    ];

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
        'barcode' => 'getBarcode',
        'images' => 'getImages',
        'organization_name' => 'getOrganizationName',
        'links' => 'getLinks',
        'beacons' => 'getBeacons',
        'locations' => 'getLocations',
        'tags' => 'getTags',
        'associated_store_identifier' => 'getAssociatedStoreIdentifier',
        'google_pay_apps' => 'getGooglePayApps',
        'ios_logo_layout' => 'getIosLogoLayout',
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

    const TYPE_GIFTCARD = 'giftcard';
    const TYPE_COUPON = 'coupon';
    const TYPE_VOUCHER = 'voucher';
    const TYPE_STAMPCARD = 'stampcard';
    const TYPE_MEMBERSHIP = 'membership';
    const IOS_LOGO_LAYOUT_SEPARATE = 'separate';
    const IOS_LOGO_LAYOUT_NONE = 'none';
    const IOS_LOGO_LAYOUT__UNSET = 'unset';

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
            self::TYPE_MEMBERSHIP,
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
        $this->container['type'] = $data['type'] ?? null;
        $this->container['external_id'] = isset($data['external_id'])
            ? $data['external_id']
            : null;
        $this->container['template_id'] = isset($data['template_id'])
            ? $data['template_id']
            : null;
        $this->container['redeemed_template_id'] = isset($data['redeemed_template_id'])
            ? $data['redeemed_template_id']
            : null;
        $this->container['title'] = isset($data['title']) ? $data['title'] : null;
        $this->container['is_enabled'] = isset($data['is_enabled'])
            ? $data['is_enabled']
            : false;
        $this->container['background_color'] = isset($data['background_color'])
            ? $data['background_color']
            : null;
        $this->container['text_color'] = isset($data['text_color'])
            ? $data['text_color']
            : null;
        $this->container['label_color'] = isset($data['label_color'])
            ? $data['label_color']
            : null;
        $this->container['settings'] = $data['settings'] ?? null;
        $this->container['barcode'] = $data['barcode'] ?? null;
        $this->container['images'] = isset($data['images']) ? $data['images'] : null;
        $this->container['organization_name'] = isset($data['organization_name'])
            ? $data['organization_name']
            : null;
        $this->container['links'] = isset($data['links']) ? $data['links'] : null;
        $this->container['beacons'] = isset($data['beacons']) ? $data['beacons'] : null;
        $this->container['locations'] = isset($data['locations']) ? $data['locations'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['associated_store_identifier'] =
            $data['associated_store_identifier'] ?? null;
        $this->container['google_pay_apps'] = $data['google_pay_apps'] ?? null;
        $this->container['ios_logo_layout'] = $data['ios_logo_layout'] ?? 'unset';
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

        if ($this->container['title'] === null) {
            $invalidProperties[] = "'title' can't be null";
        }
        if ($this->container['images'] === null) {
            $invalidProperties[] = "'images' can't be null";
        }
        if ($this->container['organization_name'] === null) {
            $invalidProperties[] = "'organization_name' can't be null";
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
     * @param string $template_id Optional. Provide Template ID to specify Project design and distribution settings.
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
     * @param string $title Used to identify this Project. Not shown to the customer.
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
     * @param bool $is_enabled Is it allowed to issue new passes for this Project.
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
     * @return array
     */
    public function getSettings()
    {
        return $this->container['settings'];
    }

    /**
     * Sets settings
     *
     * @param array $settings settings
     *
     * @return $this
     */
    public function setSettings($settings)
    {
        $this->container['settings'] = $settings;

        return $this;
    }

    /**
     * Gets barcode
     *
     * @return array
     */
    public function getBarcode()
    {
        return $this->container['barcode'];
    }

    /**
     * Sets barcode
     *
     * @param array $barcode barcode
     *
     * @return $this
     */
    public function setBarcode($barcode)
    {
        $this->container['barcode'] = $barcode;

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
     * @return \WalletPassJP\Model\Link[]
     */
    public function getLinks()
    {
        return $this->container['links'];
    }

    /**
     * Sets links
     *
     * @param \WalletPassJP\Model\Link[] $links links
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
     * @return \WalletPassJP\Model\Beacon[]
     */
    public function getBeacons()
    {
        return $this->container['beacons'];
    }

    /**
     * Sets beacons
     *
     * @param \WalletPassJP\Model\Beacon[] $beacons beacons
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
     * @return \WalletPassJP\Model\Location[]
     */
    public function getLocations()
    {
        return $this->container['locations'];
    }

    /**
     * Sets locations
     *
     * @param \WalletPassJP\Model\Location[] $locations locations
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
