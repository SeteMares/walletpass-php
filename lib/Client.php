<?php
namespace WalletPassJP;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use WalletPassJP\Configuration;

use WalletPassJP\Api\AssetsApi;
use WalletPassJP\Api\CertificatesApi;
use WalletPassJP\Api\PassesApi;
use WalletPassJP\Api\ProjectsApi;
use WalletPassJP\Api\TemplatesApi;
use WalletPassJP\Api\MessagesApi;
use WalletPassJP\Api\TagsApi;

/**
 * Api Class
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class Client
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var AssetsApi
     */
    protected $assetsApi;

    /** @var CertificatesApi */
    protected $certificatesApi;

    /** @var MessagesApi */
    protected $messagesApi;

    /** @var ProjectsApi */
    protected $projectsApi;

    /** @var TemplatesApi */
    protected $templatesApi;

    /** @var PassesApi */
    protected $passesApi;

    /** @var TagsApi */
    protected $tagsApi;

    /**
     * @param string               $key
     * @param Configuration|null   $config
     * @param ClientInterface|null $client
     */
    public function __construct(
        string $key,
        Configuration $config = null,
        ClientInterface $client = null
    ) {
        $this->client = $client ?: new GuzzleClient();
        $this->config = $config ?: new Configuration();
        $this->config->setAccessToken($key);
    }

    /**
     * Get assets API interface
     *
     * @return AssetsApi
     */
    public function assets()
    {
        return $this->assetsApi ??
            ($this->assetsApi = new AssetsApi($this->config, $this->client));
    }

    /**
     * Get certificates API interface
     *
     * @return CertificatesApi
     */
    public function certificates()
    {
        return $this->certificatesApi ??
            ($this->certificatesApi = new CertificatesApi($this->config, $this->client));
    }

    /**
     * Get messages API interface
     *
     * @return MessagesApi
     */
    public function messages()
    {
        return $this->messagesApi ??
            ($this->messagesApi = new MessagesApi($this->config, $this->client));
    }

    /**
     * Get projects API interface
     *
     * @return ProjectsApi
     */
    public function projects()
    {
        return $this->projectsApi ??
            ($this->projectsApi = new ProjectsApi($this->config, $this->client));
    }

    /**
     * Get templates API interface
     *
     * @return TemplatesApi
     */
    public function templates()
    {
        return $this->templatesApi ??
            ($this->templatesApi = new TemplatesApi($this->config, $this->client));
    }

    /**
     * Get passes API interface
     *
     * @return PassesApi
     */
    public function passes()
    {
        return $this->passesApi ??
            ($this->passesApi = new PassesApi($this->config, $this->client));
    }

    /**
     * Get tags API interface
     *
     * @return TagsApi
     */
    public function tags()
    {
        return $this->tagsApi ?? ($this->tagsApi = new TagsApi($this->config, $this->client));
    }
}
?>
