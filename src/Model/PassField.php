<?php
/**
 * PassField
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
 * PassField Class Doc Comment
 *
 * @category Class
 * @description Customise how field is rendered on the pass.
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class PassField implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'PassField';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'id' => 'string',
        'template_id' => 'string',
        'label' => 'string',
        'value' => 'string',
        'change_message' => 'string',
        'alignment' => 'string',
        'date_style' => 'string',
        'time_style' => 'string',
        'number_style' => 'string',
        'position_priority' => 'int',
        'apple_position' => 'string',
        'google_position' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'id' => 'uuid',
        'template_id' => 'uuid',
        'label' => null,
        'value' => null,
        'change_message' => null,
        'alignment' => null,
        'date_style' => null,
        'time_style' => null,
        'number_style' => null,
        'position_priority' => 'int32',
        'apple_position' => null,
        'google_position' => null,
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
        'template_id' => 'template_id',
        'label' => 'label',
        'value' => 'value',
        'change_message' => 'change_message',
        'alignment' => 'alignment',
        'date_style' => 'date_style',
        'time_style' => 'time_style',
        'number_style' => 'number_style',
        'position_priority' => 'position_priority',
        'apple_position' => 'apple_position',
        'google_position' => 'google_position',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'template_id' => 'setTemplateId',
        'label' => 'setLabel',
        'value' => 'setValue',
        'change_message' => 'setChangeMessage',
        'alignment' => 'setAlignment',
        'date_style' => 'setDateStyle',
        'time_style' => 'setTimeStyle',
        'number_style' => 'setNumberStyle',
        'position_priority' => 'setPositionPriority',
        'apple_position' => 'setApplePosition',
        'google_position' => 'setGooglePosition',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'template_id' => 'getTemplateId',
        'label' => 'getLabel',
        'value' => 'getValue',
        'change_message' => 'getChangeMessage',
        'alignment' => 'getAlignment',
        'date_style' => 'getDateStyle',
        'time_style' => 'getTimeStyle',
        'number_style' => 'getNumberStyle',
        'position_priority' => 'getPositionPriority',
        'apple_position' => 'getApplePosition',
        'google_position' => 'getGooglePosition',
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

    const ALIGNMENT_NATURAL = 'natural';
    const ALIGNMENT_LEFT = 'left';
    const ALIGNMENT_RIGHT = 'right';
    const ALIGNMENT_CENTER = 'center';
    const DATE_STYLE_NONE = 'none';
    const DATE_STYLE_SHORT = 'short';
    const DATE_STYLE_MEDIUM = 'medium';
    const DATE_STYLE_LONG = 'long';
    const DATE_STYLE_FULL = 'full';
    const TIME_STYLE_NONE = 'none';
    const TIME_STYLE_SHORT = 'short';
    const TIME_STYLE_MEDIUM = 'medium';
    const TIME_STYLE_LONG = 'long';
    const TIME_STYLE_FULL = 'full';
    const NUMBER_STYLE_NONE = 'none';
    const NUMBER_STYLE_DECIMAL = 'decimal';
    const NUMBER_STYLE_PERCENT = 'percent';
    const NUMBER_STYLE_SPELL = 'spell';
    const NUMBER_STYLE_SCIENTIFIC = 'scientific';
    const APPLE_POSITION_NONE = 'none';
    const APPLE_POSITION_BACK = 'back';
    const APPLE_POSITION_PRIMARY = 'primary';
    const APPLE_POSITION_SECONDARY = 'secondary';
    const APPLE_POSITION_AUX = 'aux';
    const APPLE_POSITION_HEADER = 'header';
    const GOOGLE_POSITION_NONE = 'none';
    const GOOGLE_POSITION_EVENT_NAME = 'event_name';
    const GOOGLE_POSITION_EVENT_VENUE_NAME = 'event_venue_name';
    const GOOGLE_POSITION_EVENT_VENUE_ADDRESS = 'event_venue_address';
    const GOOGLE_POSITION_EVENT_GATE = 'event_gate';
    const GOOGLE_POSITION_EVENT_SECTION = 'event_section';
    const GOOGLE_POSITION_EVENT_ROW = 'event_row';
    const GOOGLE_POSITION_EVENT_SEAT = 'event_seat';
    const GOOGLE_POSITION_EVENT_TICKET_HOLDER = 'event_ticket_holder';
    const GOOGLE_POSITION_EVENT_DOORS_OPEN = 'event_doors_open';
    const GOOGLE_POSITION_EVENT_START = 'event_start';
    const GOOGLE_POSITION_EVENT_END = 'event_end';
    const GOOGLE_POSITION_EVENT_TICKET_TYPE = 'event_ticket_type';
    const GOOGLE_POSITION_EVENT_TICKET_NUMBER = 'event_ticket_number';
    const GOOGLE_POSITION_EVENT_CONFIRMATION_NUMBER = 'event_confirmation_number';
    const GOOGLE_POSITION_EVENT_FACE_VALUE = 'event_face_value';
    const GOOGLE_POSITION_EVENT_FINE_PRINT = 'event_fine_print';
    const GOOGLE_POSITION_GIFT_MERCHANT_NAME = 'gift_merchant_name';
    const GOOGLE_POSITION_GIFT_BALANCE = 'gift_balance';
    const GOOGLE_POSITION_GIFT_CARD_NUMBER = 'gift_card_number';
    const GOOGLE_POSITION_GIFT_BALANCE_UPDATE_TIME = 'gift_balance_update_time';
    const GOOGLE_POSITION_GIFT_PIN = 'gift_pin';
    const GOOGLE_POSITION_GIFT_EVENT_NUMBER = 'gift_event_number';
    const GOOGLE_POSITION_LOYALTY_PROGRAM_NAME = 'loyalty_program_name';
    const GOOGLE_POSITION_LOYALTY_POINTS = 'loyalty_points';
    const GOOGLE_POSITION_LOYALTY_SECONDARY_POINTS = 'loyalty_secondary_points';
    const GOOGLE_POSITION_LOYALTY_ACCOUNT_NAME = 'loyalty_account_name';
    const GOOGLE_POSITION_LOYALTY_ACCOUNT_ID = 'loyalty_account_id';
    const GOOGLE_POSITION_LOYALTY_REWARDS_TIER = 'loyalty_rewards_tier';
    const GOOGLE_POSITION_LOYALTY_SECONDARY_REWARDS_TIER = 'loyalty_secondary_rewards_tier';
    const GOOGLE_POSITION_OFFER_TITLE = 'offer_title';
    const GOOGLE_POSITION_OFFER_PROVIDER = 'offer_provider';
    const GOOGLE_POSITION_OFFER_DETAILS = 'offer_details';
    const GOOGLE_POSITION_OFFER_FINE_PRINT = 'offer_fine_print';
    const GOOGLE_POSITION_OFFER_SHORT_TITLE = 'offer_short_title';
    const GOOGLE_POSITION_TEXT_MODULE = 'text_module';
    const GOOGLE_POSITION_LINKS_MODULE = 'links_module';
    const GOOGLE_POSITION_ISSUER_NAME = 'issuer_name';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAlignmentAllowableValues()
    {
        return [
            self::ALIGNMENT_NATURAL,
            self::ALIGNMENT_LEFT,
            self::ALIGNMENT_RIGHT,
            self::ALIGNMENT_CENTER,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDateStyleAllowableValues()
    {
        return [
            self::DATE_STYLE_NONE,
            self::DATE_STYLE_SHORT,
            self::DATE_STYLE_MEDIUM,
            self::DATE_STYLE_LONG,
            self::DATE_STYLE_FULL,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTimeStyleAllowableValues()
    {
        return [
            self::TIME_STYLE_NONE,
            self::TIME_STYLE_SHORT,
            self::TIME_STYLE_MEDIUM,
            self::TIME_STYLE_LONG,
            self::TIME_STYLE_FULL,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getNumberStyleAllowableValues()
    {
        return [
            self::NUMBER_STYLE_NONE,
            self::NUMBER_STYLE_DECIMAL,
            self::NUMBER_STYLE_PERCENT,
            self::NUMBER_STYLE_SPELL,
            self::NUMBER_STYLE_SCIENTIFIC,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getApplePositionAllowableValues()
    {
        return [
            self::APPLE_POSITION_NONE,
            self::APPLE_POSITION_BACK,
            self::APPLE_POSITION_PRIMARY,
            self::APPLE_POSITION_SECONDARY,
            self::APPLE_POSITION_AUX,
            self::APPLE_POSITION_HEADER,
        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getGooglePositionAllowableValues()
    {
        return [
            self::GOOGLE_POSITION_NONE,
            self::GOOGLE_POSITION_EVENT_NAME,
            self::GOOGLE_POSITION_EVENT_VENUE_NAME,
            self::GOOGLE_POSITION_EVENT_VENUE_ADDRESS,
            self::GOOGLE_POSITION_EVENT_GATE,
            self::GOOGLE_POSITION_EVENT_SECTION,
            self::GOOGLE_POSITION_EVENT_ROW,
            self::GOOGLE_POSITION_EVENT_SEAT,
            self::GOOGLE_POSITION_EVENT_TICKET_HOLDER,
            self::GOOGLE_POSITION_EVENT_DOORS_OPEN,
            self::GOOGLE_POSITION_EVENT_START,
            self::GOOGLE_POSITION_EVENT_END,
            self::GOOGLE_POSITION_EVENT_TICKET_TYPE,
            self::GOOGLE_POSITION_EVENT_TICKET_NUMBER,
            self::GOOGLE_POSITION_EVENT_CONFIRMATION_NUMBER,
            self::GOOGLE_POSITION_EVENT_FACE_VALUE,
            self::GOOGLE_POSITION_EVENT_FINE_PRINT,
            self::GOOGLE_POSITION_GIFT_MERCHANT_NAME,
            self::GOOGLE_POSITION_GIFT_BALANCE,
            self::GOOGLE_POSITION_GIFT_CARD_NUMBER,
            self::GOOGLE_POSITION_GIFT_BALANCE_UPDATE_TIME,
            self::GOOGLE_POSITION_GIFT_PIN,
            self::GOOGLE_POSITION_GIFT_EVENT_NUMBER,
            self::GOOGLE_POSITION_LOYALTY_PROGRAM_NAME,
            self::GOOGLE_POSITION_LOYALTY_POINTS,
            self::GOOGLE_POSITION_LOYALTY_SECONDARY_POINTS,
            self::GOOGLE_POSITION_LOYALTY_ACCOUNT_NAME,
            self::GOOGLE_POSITION_LOYALTY_ACCOUNT_ID,
            self::GOOGLE_POSITION_LOYALTY_REWARDS_TIER,
            self::GOOGLE_POSITION_LOYALTY_SECONDARY_REWARDS_TIER,
            self::GOOGLE_POSITION_OFFER_TITLE,
            self::GOOGLE_POSITION_OFFER_PROVIDER,
            self::GOOGLE_POSITION_OFFER_DETAILS,
            self::GOOGLE_POSITION_OFFER_FINE_PRINT,
            self::GOOGLE_POSITION_OFFER_SHORT_TITLE,
            self::GOOGLE_POSITION_TEXT_MODULE,
            self::GOOGLE_POSITION_LINKS_MODULE,
            self::GOOGLE_POSITION_ISSUER_NAME,
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
        $this->container['template_id'] = isset($data['template_id'])
            ? $data['template_id']
            : null;
        $this->container['label'] = isset($data['label']) ? $data['label'] : null;
        $this->container['value'] = isset($data['value']) ? $data['value'] : null;
        $this->container['change_message'] = isset($data['change_message'])
            ? $data['change_message']
            : null;
        $this->container['alignment'] = isset($data['alignment'])
            ? $data['alignment']
            : 'natural';
        $this->container['date_style'] = isset($data['date_style'])
            ? $data['date_style']
            : 'none';
        $this->container['time_style'] = isset($data['time_style'])
            ? $data['time_style']
            : 'none';
        $this->container['number_style'] = isset($data['number_style'])
            ? $data['number_style']
            : 'none';
        $this->container['position_priority'] = isset($data['position_priority'])
            ? $data['position_priority']
            : 0;
        $this->container['apple_position'] = isset($data['apple_position'])
            ? $data['apple_position']
            : 'none';
        $this->container['google_position'] = isset($data['google_position'])
            ? $data['google_position']
            : 'none';
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['label'] === null) {
            $invalidProperties[] = "'label' can't be null";
        }
        if ($this->container['value'] === null) {
            $invalidProperties[] = "'value' can't be null";
        }
        $allowedValues = $this->getAlignmentAllowableValues();
        if (
            !is_null($this->container['alignment']) &&
            !in_array($this->container['alignment'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'alignment', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDateStyleAllowableValues();
        if (
            !is_null($this->container['date_style']) &&
            !in_array($this->container['date_style'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'date_style', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getTimeStyleAllowableValues();
        if (
            !is_null($this->container['time_style']) &&
            !in_array($this->container['time_style'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'time_style', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getNumberStyleAllowableValues();
        if (
            !is_null($this->container['number_style']) &&
            !in_array($this->container['number_style'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'number_style', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getApplePositionAllowableValues();
        if (
            !is_null($this->container['apple_position']) &&
            !in_array($this->container['apple_position'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'apple_position', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getGooglePositionAllowableValues();
        if (
            !is_null($this->container['google_position']) &&
            !in_array($this->container['google_position'], $allowedValues, true)
        ) {
            $invalidProperties[] = sprintf(
                "invalid value for 'google_position', must be one of '%s'",
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
     * @param string $template_id template_id
     *
     * @return $this
     */
    public function setTemplateId($template_id)
    {
        $this->container['template_id'] = $template_id;

        return $this;
    }

    /**
     * Gets label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->container['label'];
    }

    /**
     * Sets label
     *
     * @param string $label The field label, usually represented as a title on the pass.
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->container['label'] = $label;

        return $this;
    }

    /**
     * Gets value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->container['value'];
    }

    /**
     * Sets value
     *
     * @param string $value The default value for the field.
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->container['value'] = $value;

        return $this;
    }

    /**
     * Gets change_message
     *
     * @return string
     */
    public function getChangeMessage()
    {
        return $this->container['change_message'];
    }

    /**
     * Sets change_message
     *
     * @param string $change_message The message that appears when you change the value for a field. `%@` will be replaced with a new value.
     *
     * @return $this
     */
    public function setChangeMessage($change_message)
    {
        $this->container['change_message'] = $change_message;

        return $this;
    }

    /**
     * Gets alignment
     *
     * @return string
     */
    public function getAlignment()
    {
        return $this->container['alignment'];
    }

    /**
     * Sets alignment
     *
     * @param string $alignment Alignment for field title and body text for fields which are displayed on the front of Apple Wallet pass.
     *
     * @return $this
     */
    public function setAlignment($alignment)
    {
        $allowedValues = $this->getAlignmentAllowableValues();
        if (!is_null($alignment) && !in_array($alignment, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'alignment', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['alignment'] = $alignment;

        return $this;
    }

    /**
     * Gets date_style
     *
     * @return string
     */
    public function getDateStyle()
    {
        return $this->container['date_style'];
    }

    /**
     * Sets date_style
     *
     * @param string $date_style date_style
     *
     * @return $this
     */
    public function setDateStyle($date_style)
    {
        $allowedValues = $this->getDateStyleAllowableValues();
        if (!is_null($date_style) && !in_array($date_style, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'date_style', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['date_style'] = $date_style;

        return $this;
    }

    /**
     * Gets time_style
     *
     * @return string
     */
    public function getTimeStyle()
    {
        return $this->container['time_style'];
    }

    /**
     * Sets time_style
     *
     * @param string $time_style time_style
     *
     * @return $this
     */
    public function setTimeStyle($time_style)
    {
        $allowedValues = $this->getTimeStyleAllowableValues();
        if (!is_null($time_style) && !in_array($time_style, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'time_style', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['time_style'] = $time_style;

        return $this;
    }

    /**
     * Gets number_style
     *
     * @return string
     */
    public function getNumberStyle()
    {
        return $this->container['number_style'];
    }

    /**
     * Sets number_style
     *
     * @param string $number_style number_style
     *
     * @return $this
     */
    public function setNumberStyle($number_style)
    {
        $allowedValues = $this->getNumberStyleAllowableValues();
        if (!is_null($number_style) && !in_array($number_style, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'number_style', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['number_style'] = $number_style;

        return $this;
    }

    /**
     * Gets position_priority
     *
     * @return int
     */
    public function getPositionPriority()
    {
        return $this->container['position_priority'];
    }

    /**
     * Sets position_priority
     *
     * @param int $position_priority Priority indicates the position of the section.  If the field type is a text module, the priority of the text module.
     *
     * @return $this
     */
    public function setPositionPriority($position_priority)
    {
        $this->container['position_priority'] = $position_priority;

        return $this;
    }

    /**
     * Gets apple_position
     *
     * @return string
     */
    public function getApplePosition()
    {
        return $this->container['apple_position'];
    }

    /**
     * Sets apple_position
     *
     * @param string $apple_position Selects a section to render a field. One of - `header` - `primary` - `secondary` - `aux` - `back`  `none` if you don't want to render this field on Apple passes.
     *
     * @return $this
     */
    public function setApplePosition($apple_position)
    {
        $allowedValues = $this->getApplePositionAllowableValues();
        if (!is_null($apple_position) && !in_array($apple_position, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'apple_position', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['apple_position'] = $apple_position;

        return $this;
    }

    /**
     * Gets google_position
     *
     * @return string
     */
    public function getGooglePosition()
    {
        return $this->container['google_position'];
    }

    /**
     * Sets google_position
     *
     * @param string $google_position Sets a position of field on the pass.  Determines which field the data will be mapped to on the Google Pay pass.  > Note, not all Google Pay fields support labels or localization. > Where not supported, label and localization options will be ignored.   - `boarding_boarding_time`: DateTime  - `boarding_gate_closes`: DateTime  - `boarding_departure_time`: DateTime  - `boarding_arrival_time`: DateTime  - `event_start`: DateTime  - `event_end`: DateTime  - `event_face_value`: Currency  - `gift_balance`: Currency  - `transit_valid_from`: DateTime  - `transit_valid_until`: DateTime  - `transit_purchase_date`: DateTime  - `transit_face_value`: Currency  - `transit_purchase_price`: Currency  - `text_module`: Common fields   `none` if you don't want to render this field on Google passes.
     *
     * @return $this
     */
    public function setGooglePosition($google_position)
    {
        $allowedValues = $this->getGooglePositionAllowableValues();
        if (!is_null($google_position) && !in_array($google_position, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'google_position', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['google_position'] = $google_position;

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
