<?php
/**
 * Body4
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
 * Body4 Class Doc Comment
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class Body4 implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'body_4';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'template_id' => 'string',
        'header' => 'string',
        'body' => 'string',
        'scheduled_at' => '\DateTime',
        'localized_body' => '\WalletPassJP\Model\MessagesLocalizedBody',
        'localized_header' => '\WalletPassJP\Model\MessagesLocalizedHeader',
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'template_id' => 'uuid',
'header' => null,
'body' => null,
'scheduled_at' => 'date-time',
'localized_body' => null,
'localized_header' => null    ];

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
        'template_id' => 'template_id',
        'header' => 'header',
        'body' => 'body',
        'scheduled_at' => 'scheduled_at',
        'localized_body' => 'localized_body',
        'localized_header' => 'localized_header',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'template_id' => 'setTemplateId',
        'header' => 'setHeader',
        'body' => 'setBody',
        'scheduled_at' => 'setScheduledAt',
        'localized_body' => 'setLocalizedBody',
        'localized_header' => 'setLocalizedHeader',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'template_id' => 'getTemplateId',
        'header' => 'getHeader',
        'body' => 'getBody',
        'scheduled_at' => 'getScheduledAt',
        'localized_body' => 'getLocalizedBody',
        'localized_header' => 'getLocalizedHeader',
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
        $this->container['template_id'] = isset($data['template_id']) ? $data['template_id'] : null;
        $this->container['header'] = isset($data['header']) ? $data['header'] : null;
        $this->container['body'] = isset($data['body']) ? $data['body'] : null;
        $this->container['scheduled_at'] = isset($data['scheduled_at']) ? $data['scheduled_at'] : null;
        $this->container['localized_body'] = isset($data['localized_body']) ? $data['localized_body'] : null;
        $this->container['localized_header'] = isset($data['localized_header']) ? $data['localized_header'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['template_id'] === null) {
            $invalidProperties[] = "'template_id' can't be null";
        }
        if ($this->container['body'] === null) {
            $invalidProperties[] = "'body' can't be null";
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
