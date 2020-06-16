<?php
namespace WalletPassJP\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use WalletPassJP\Configuration;
use WalletPassJP\HeaderSelector;

/**
 * Api Class
 *
 * @category Class
 * @package  WalletPassJP
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
     * @param Configuration|null   $config
     * @param ClientInterface|null $client
     * @param string|null          $key
     * @param HeaderSelector|null  $selector
     */
    public function __construct(
        Configuration $config = null,
        ClientInterface $client = null,
        string $key = '',
        HeaderSelector $selector = null
    ) {
        $this->config = $config ?: new Configuration();
        $key and $this->config->setAccessToken($key);
        $this->client = $client ?: new Client();
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
