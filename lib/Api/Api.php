<?php
namespace WalletPassJP\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use WalletPassJP\Client\Configuration;
use WalletPassJP\Client\HeaderSelector;

/**
 * Api Class
 *
 * @category Class
 * @package  WalletPassJP\Client
 * @author   Kinchaku
 */
class Api
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
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param string               $key
     * @param Configuration|null   $config
     * @param ClientInterface|null $client
     * @param HeaderSelector|null  $selector
     */
    public function __construct(
        string $key,
        Configuration $config = null,
        ClientInterface $client = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->config->setAccessToken($key);
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException(
                    'Failed to open the debug file: ' . $this->config->getDebugFile()
                );
            }
        }

        return $options;
    }
}
?>
