<?php
/**
 * Template
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
 * Template Class Doc Comment
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class Template implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'Template';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'id' => 'string',
        'external_id' => 'string',
        'certificate_id' => 'string',
        'colors' => '\WalletPassJP\Model\Colors',
        'images' => '\WalletPassJP\Model\Asset[]',
        'links' => '\WalletPassJP\Model\Link[]',
        'beacons' => '\WalletPassJP\Model\Beacon[]',
        'locations' => '\WalletPassJP\Model\Location[]',
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
        'fields' => '\WalletPassJP\Model\PassField[]',
        'google_pay_apps' => '\WalletPassJP\Model\TemplateGooglePayApps[]',
        'ios_logo_layout' => 'string',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime',
        'tags' => 'string[]',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'id' => 'uuid',
        'external_id' => null,
        'certificate_id' => 'uuid',
        'colors' => null,
        'images' => null,
        'links' => null,
        'beacons' => null,
        'locations' => null,
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
        'associated_store_identifier' => null,
        'fields' => null,
        'google_pay_apps' => null,
        'ios_logo_layout' => null,
        'created_at' => 'date-time',
        'updated_at' => 'date-time',
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
        'external_id' => 'external_id',
        'certificate_id' => 'certificate_id',
        'colors' => 'colors',
        'images' => 'images',
        'links' => 'links',
        'beacons' => 'beacons',
        'locations' => 'locations',
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
        'associated_store_identifier' => 'associated_store_identifier',
        'fields' => 'fields',
        'google_pay_apps' => 'google_pay_apps',
        'ios_logo_layout' => 'ios_logo_layout',
        'created_at' => 'created_at',
        'updated_at' => 'updated_at',
        'tags' => 'tags',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'external_id' => 'setExternalId',
        'certificate_id' => 'setCertificateId',
        'colors' => 'setColors',
        'images' => 'setImages',
        'links' => 'setLinks',
        'beacons' => 'setBeacons',
        'locations' => 'setLocations',
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
        'associated_store_identifier' => 'setAssociatedStoreIdentifier',
        'fields' => 'setFields',
        'google_pay_apps' => 'setGooglePayApps',
        'ios_logo_layout' => 'setIosLogoLayout',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
        'tags' => 'setTags',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'external_id' => 'getExternalId',
        'certificate_id' => 'getCertificateId',
        'colors' => 'getColors',
        'images' => 'getImages',
        'links' => 'getLinks',
        'beacons' => 'getBeacons',
        'locations' => 'getLocations',
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
        'associated_store_identifier' => 'getAssociatedStoreIdentifier',
        'fields' => 'getFields',
        'google_pay_apps' => 'getGooglePayApps',
        'ios_logo_layout' => 'getIosLogoLayout',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['external_id'] = isset($data['external_id'])
            ? $data['external_id']
            : null;
        $this->container['certificate_id'] = isset($data['certificate_id'])
            ? $data['certificate_id']
            : null;
        $this->container['colors'] = isset($data['colors']) ? $data['colors'] : null;
        $this->container['images'] = isset($data['images']) ? $data['images'] : null;
        $this->container['links'] = isset($data['links']) ? $data['links'] : null;
        $this->container['beacons'] = isset($data['beacons']) ? $data['beacons'] : null;
        $this->container['locations'] = isset($data['locations']) ? $data['locations'] : null;
        $this->container['grouping_identifier'] = isset($data['grouping_identifier'])
            ? $data['grouping_identifier']
            : null;
        $this->container['logo_text'] = isset($data['logo_text']) ? $data['logo_text'] : null;
        $this->container['pass_type'] = isset($data['pass_type'])
            ? $data['pass_type']
            : 'generic';
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['description'] = isset($data['description'])
            ? $data['description']
            : null;
        $this->container['relevant_date'] = isset($data['relevant_date'])
            ? $data['relevant_date']
            : null;
        $this->container['organization_name'] = isset($data['organization_name'])
            ? $data['organization_name']
            : null;
        $this->container['sharing_status'] = isset($data['sharing_status'])
            ? $data['sharing_status']
            : 'multipleHolders';
        $this->container['barcode'] = isset($data['barcode']) ? $data['barcode'] : null;
        $this->container['expiry_settings'] = isset($data['expiry_settings'])
            ? $data['expiry_settings']
            : null;
        $this->container['associated_store_identifier'] = isset(
            $data['associated_store_identifier']
        )
            ? $data['associated_store_identifier']
            : null;
        $this->container['fields'] = isset($data['fields']) ? $data['fields'] : null;
        $this->container['google_pay_apps'] = isset($data['google_pay_apps'])
            ? $data['google_pay_apps']
            : null;
        $this->container['ios_logo_layout'] = isset($data['ios_logo_layout'])
            ? $data['ios_logo_layout']
            : 'unset';
        $this->container['created_at'] = isset($data['created_at'])
            ? $data['created_at']
            : null;
        $this->container['updated_at'] = isset($data['updated_at'])
            ? $data['updated_at']
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
     * @param string $id System ID. Read only.
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
     * Gets certificate_id
     *
     * @return string
     */
    public function getCertificateId()
    {
        return $this->container['certificate_id'];
    }

    /**
     * Sets certificate_id
     *
     * @param string $certificate_id Certificate used to sign Apple passes.
     *
     * @return $this
     */
    public function setCertificateId($certificate_id)
    {
        $this->container['certificate_id'] = $certificate_id;

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
     * Gets images
     *
     * @return \WalletPassJP\Model\Asset[]
     */
    public function getImages()
    {
        return $this->container['images'];
    }

    /**
     * Sets images
     *
     * @param \WalletPassJP\Model\Asset[] $images Array of Asset IDs
     *
     * @return $this
     */
    public function setImages($images)
    {
        $this->container['images'] = $images;

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
     * @param \WalletPassJP\Model\Location[] $locations An array of valid coordinates. latitude and longitude must contain valid values. relevant_text is the push notification that is shown on lockscreen. You can also specify an altitude and the max_distance which defines the number of meters around the coordinate where the notification will be shown.
     *
     * @return $this
     */
    public function setLocations($locations)
    {
        $this->container['locations'] = $locations;

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
     * @param string $grouping_identifier For event tickets and boarding passes used to group related passes; otherwise not allowed. Identifier. If a grouping identifier is specified, passes with the same type, pass identifier and grouping identifier are displayed in a group. Otherwise, passes are grouped by type and pass identifier.
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
        if (!is_null($pass_type) && !in_array($pass_type, $allowedValues, true)) {
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
     * @param \DateTime $relevant_date Recommended for event tickets and boarding passes; otherwise optional. Date and time when the pass becomes relevant. For example, the start time of a movie.  The value must be a complete date with hours and minutes, and may optionally include seconds.
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
