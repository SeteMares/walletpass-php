<?php
namespace WalletPassJP\Model;

use \ArrayAccess;
use WalletPassJP\ObjectSerializer;

/**
 * Message Class Doc Comment
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class Message implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'Message';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'id' => 'string',
        'user' => 'string',
        'header' => 'string',
        'body' => 'string',
        'localized_header' => '\WalletPassJP\Model\MessagesLocalizedHeader',
        'localized_body' => '\WalletPassJP\Model\MessagesLocalizedBody',
        'scheduled_at' => '\DateTime',
        'sent_at' => '\DateTime',
        'pass_filter' => 'object',
        'template_id' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'id' => 'uuid',
        'user' => null,
        'header' => null,
        'body' => null,
        'localized_header' => null,
        'localized_body' => null,
        'scheduled_at' => 'date-time',
        'sent_at' => 'date-time',
        'pass_filter' => null,
        'template_id' => 'uuid',
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
        'user' => 'user',
        'header' => 'header',
        'body' => 'body',
        'localized_header' => 'localized_header',
        'localized_body' => 'localized_body',
        'scheduled_at' => 'scheduled_at',
        'sent_at' => 'sent_at',
        'pass_filter' => 'pass_filter',
        'template_id' => 'template_id',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'user' => 'setUser',
        'header' => 'setHeader',
        'body' => 'setBody',
        'localized_header' => 'setLocalizedHeader',
        'localized_body' => 'setLocalizedBody',
        'scheduled_at' => 'setScheduledAt',
        'sent_at' => 'setSentAt',
        'pass_filter' => 'setPassFilter',
        'template_id' => 'setTemplateId',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'user' => 'getUser',
        'header' => 'getHeader',
        'body' => 'getBody',
        'localized_header' => 'getLocalizedHeader',
        'localized_body' => 'getLocalizedBody',
        'scheduled_at' => 'getScheduledAt',
        'sent_at' => 'getSentAt',
        'pass_filter' => 'getPassFilter',
        'template_id' => 'getTemplateId',
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['user'] = isset($data['user']) ? $data['user'] : null;
        $this->container['header'] = isset($data['header']) ? $data['header'] : null;
        $this->container['body'] = isset($data['body']) ? $data['body'] : null;
        $this->container['localized_header'] = isset($data['localized_header'])
            ? $data['localized_header']
            : null;
        $this->container['localized_body'] = isset($data['localized_body'])
            ? $data['localized_body']
            : null;
        $this->container['scheduled_at'] = isset($data['scheduled_at'])
            ? $data['scheduled_at']
            : null;
        $this->container['sent_at'] = isset($data['sent_at']) ? $data['sent_at'] : null;
        $this->container['pass_filter'] = isset($data['pass_filter'])
            ? $data['pass_filter']
            : null;
        $this->container['template_id'] = isset($data['template_id'])
            ? $data['template_id']
            : null;
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
     * @param string $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->container['user'];
    }

    /**
     * Sets user
     *
     * @param string $user Name of a user who scheduled/sent the message.
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->container['user'] = $user;

        return $this;
    }

    /**
     * Gets header
     *
     * @return string
     */
    public function getHeader()
    {
        return $this->container['header'];
    }

    /**
     * Sets header
     *
     * @param string $header Android only
     *
     * @return $this
     */
    public function setHeader($header)
    {
        $this->container['header'] = $header;

        return $this;
    }

    /**
     * Gets body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->container['body'];
    }

    /**
     * Sets body
     *
     * @param string $body body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->container['body'] = $body;

        return $this;
    }

    /**
     * Gets localized_header
     *
     * @return \WalletPassJP\Model\MessagesLocalizedHeader
     */
    public function getLocalizedHeader()
    {
        return $this->container['localized_header'];
    }

    /**
     * Sets localized_header
     *
     * @param \WalletPassJP\Model\MessagesLocalizedHeader $localized_header localized_header
     *
     * @return $this
     */
    public function setLocalizedHeader($localized_header)
    {
        $this->container['localized_header'] = $localized_header;

        return $this;
    }

    /**
     * Gets localized_body
     *
     * @return \WalletPassJP\Model\MessagesLocalizedBody
     */
    public function getLocalizedBody()
    {
        return $this->container['localized_body'];
    }

    /**
     * Sets localized_body
     *
     * @param \WalletPassJP\Model\MessagesLocalizedBody $localized_body localized_body
     *
     * @return $this
     */
    public function setLocalizedBody($localized_body)
    {
        $this->container['localized_body'] = $localized_body;

        return $this;
    }

    /**
     * Gets scheduled_at
     *
     * @return \DateTime
     */
    public function getScheduledAt()
    {
        return $this->container['scheduled_at'];
    }

    /**
     * Sets scheduled_at
     *
     * @param \DateTime $scheduled_at scheduled_at
     *
     * @return $this
     */
    public function setScheduledAt($scheduled_at)
    {
        $this->container['scheduled_at'] = $scheduled_at;

        return $this;
    }

    /**
     * Gets sent_at
     *
     * @return \DateTime
     */
    public function getSentAt()
    {
        return $this->container['sent_at'];
    }

    /**
     * Sets sent_at
     *
     * @param \DateTime $sent_at sent_at
     *
     * @return $this
     */
    public function setSentAt($sent_at)
    {
        $this->container['sent_at'] = $sent_at;

        return $this;
    }

    /**
     * Gets pass_filter
     *
     * @return object
     */
    public function getPassFilter()
    {
        return $this->container['pass_filter'];
    }

    /**
     * Sets pass_filter
     *
     * @param object $pass_filter pass_filter
     *
     * @return $this
     */
    public function setPassFilter($pass_filter)
    {
        $this->container['pass_filter'] = $pass_filter;

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
