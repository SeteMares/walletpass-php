<?php
namespace WalletPassJP\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use WalletPassJP\ApiException;
use WalletPassJP\Configuration;
use WalletPassJP\HeaderSelector;
use WalletPassJP\ObjectSerializer;

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

    /**
     *
     * @param \GuzzleHttp\Psr7\Request $request
     * @param string $className
     * @param string|null $returnType
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    protected function sendAsyncRequest($request, $className, $returnType = null)
    {
        $returnType = $returnType ?: '\WalletPassJP\Model\ResourceResponse';

        return $this->client->sendAsync($request, $this->createHttpClientOption())->then(
            function ($response) use ($returnType, $className) {
                $responseBody = $response->getBody();
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }

                return [
                    ObjectSerializer::deserialize($content, $returnType, [], $className),
                    $response->getStatusCode(),
                    $response->getHeaders(),
                ];
            },
            function ($exception) {
                $response = $exception->getResponse();
                $statusCode = $response->getStatusCode();
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $exception->getRequest()->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }
        );
    }

    /**
     *
     * @param \GuzzleHttp\Psr7\Request $request
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    protected function sendAsyncWithoutResponse($request)
    {
        return $this->client->sendAsync($request, $this->createHttpClientOption())->then(
            function ($response) {
                return [null, $response->getStatusCode(), $response->getHeaders()];
            },
            function ($exception) {
                $response = $exception->getResponse();
                $statusCode = $response->getStatusCode();
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $exception->getRequest()->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }
        );
    }
}
?>
