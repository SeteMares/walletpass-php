<?php
/**
 * TemplatesApi
 * PHP version 7
 *
 * @category Class
 * @package  WalletPassJP\Client
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


namespace WalletPassJP\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use WalletPassJP\Client\ApiException;
use WalletPassJP\Client\Configuration;
use WalletPassJP\Client\HeaderSelector;
use WalletPassJP\Client\ObjectSerializer;

/**
 * TemplatesApi Class Doc Comment
 *
 * @category Class
 * @package  WalletPassJP\Client
 * @author   Kinchaku
 */
class TemplatesApi
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
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
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
     * Operation copyTemplate
     *
     * Copy template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  object $body body (optional)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Client\Model\InlineResponse2012
     */
    public function copyTemplate($template, $body = null)
    {
        list($response) = $this->copyTemplateWithHttpInfo($template, $body);
        return $response;
    }

    /**
     * Operation copyTemplateWithHttpInfo
     *
     * Copy template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  object $body (optional)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Client\Model\InlineResponse2012, HTTP status code, HTTP response headers (array of strings)
     */
    public function copyTemplateWithHttpInfo($template, $body = null)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2012';
        $request = $this->copyTemplateRequest($template, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\InlineResponse2012',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation copyTemplateAsync
     *
     * Copy template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  object $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function copyTemplateAsync($template, $body = null)
    {
        return $this->copyTemplateAsyncWithHttpInfo($template, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation copyTemplateAsyncWithHttpInfo
     *
     * Copy template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  object $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function copyTemplateAsyncWithHttpInfo($template, $body = null)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2012';
        $request = $this->copyTemplateRequest($template, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
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
     * Create request for operation 'copyTemplate'
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  object $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function copyTemplateRequest($template, $body = null)
    {
        // verify the required parameter 'template' is set
        if ($template === null || (is_array($template) && count($template) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template when calling copyTemplate'
            );
        }

        $resourcePath = '/templates/{template}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($template !== null) {
            $resourcePath = str_replace(
                '{' . 'template' . '}',
                ObjectSerializer::toPathValue($template),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
            }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createPass
     *
     * Create pass
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  \WalletPassJP\Client\Model\PassRequest $body body (optional)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Client\Model\InlineResponse2013
     */
    public function createPass($template, $body = null)
    {
        list($response) = $this->createPassWithHttpInfo($template, $body);
        return $response;
    }

    /**
     * Operation createPassWithHttpInfo
     *
     * Create pass
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  \WalletPassJP\Client\Model\PassRequest $body (optional)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Client\Model\InlineResponse2013, HTTP status code, HTTP response headers (array of strings)
     */
    public function createPassWithHttpInfo($template, $body = null)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2013';
        $request = $this->createPassRequest($template, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\InlineResponse2013',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createPassAsync
     *
     * Create pass
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  \WalletPassJP\Client\Model\PassRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createPassAsync($template, $body = null)
    {
        return $this->createPassAsyncWithHttpInfo($template, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createPassAsyncWithHttpInfo
     *
     * Create pass
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  \WalletPassJP\Client\Model\PassRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createPassAsyncWithHttpInfo($template, $body = null)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2013';
        $request = $this->createPassRequest($template, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
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
     * Create request for operation 'createPass'
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  \WalletPassJP\Client\Model\PassRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createPassRequest($template, $body = null)
    {
        // verify the required parameter 'template' is set
        if ($template === null || (is_array($template) && count($template) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template when calling createPass'
            );
        }

        $resourcePath = '/templates/{template}/passes';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($template !== null) {
            $resourcePath = str_replace(
                '{' . 'template' . '}',
                ObjectSerializer::toPathValue($template),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
            }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createTemplate
     *
     * Create template
     *
     * @param  \WalletPassJP\Client\Model\TemplateRequest $body body (optional)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Client\Model\InlineResponse2012
     */
    public function createTemplate($body = null)
    {
        list($response) = $this->createTemplateWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation createTemplateWithHttpInfo
     *
     * Create template
     *
     * @param  \WalletPassJP\Client\Model\TemplateRequest $body (optional)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Client\Model\InlineResponse2012, HTTP status code, HTTP response headers (array of strings)
     */
    public function createTemplateWithHttpInfo($body = null)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2012';
        $request = $this->createTemplateRequest($body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\InlineResponse2012',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createTemplateAsync
     *
     * Create template
     *
     * @param  \WalletPassJP\Client\Model\TemplateRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTemplateAsync($body = null)
    {
        return $this->createTemplateAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createTemplateAsyncWithHttpInfo
     *
     * Create template
     *
     * @param  \WalletPassJP\Client\Model\TemplateRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTemplateAsyncWithHttpInfo($body = null)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2012';
        $request = $this->createTemplateRequest($body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
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
     * Create request for operation 'createTemplate'
     *
     * @param  \WalletPassJP\Client\Model\TemplateRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createTemplateRequest($body = null)
    {

        $resourcePath = '/templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
            }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteTemplate
     *
     * Delete template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteTemplate($template)
    {
        $this->deleteTemplateWithHttpInfo($template);
    }

    /**
     * Operation deleteTemplateWithHttpInfo
     *
     * Delete template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteTemplateWithHttpInfo($template)
    {
        $returnType = '';
        $request = $this->deleteTemplateRequest($template);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteTemplateAsync
     *
     * Delete template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteTemplateAsync($template)
    {
        return $this->deleteTemplateAsyncWithHttpInfo($template)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteTemplateAsyncWithHttpInfo
     *
     * Delete template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteTemplateAsyncWithHttpInfo($template)
    {
        $returnType = '';
        $request = $this->deleteTemplateRequest($template);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
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

    /**
     * Create request for operation 'deleteTemplate'
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteTemplateRequest($template)
    {
        // verify the required parameter 'template' is set
        if ($template === null || (is_array($template) && count($template) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template when calling deleteTemplate'
            );
        }

        $resourcePath = '/templates/{template}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($template !== null) {
            $resourcePath = str_replace(
                '{' . 'template' . '}',
                ObjectSerializer::toPathValue($template),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
            }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTemplateByID
     *
     * Get template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Client\Model\InlineResponse2012
     */
    public function getTemplateByID($template)
    {
        list($response) = $this->getTemplateByIDWithHttpInfo($template);
        return $response;
    }

    /**
     * Operation getTemplateByIDWithHttpInfo
     *
     * Get template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Client\Model\InlineResponse2012, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTemplateByIDWithHttpInfo($template)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2012';
        $request = $this->getTemplateByIDRequest($template);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\InlineResponse2012',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTemplateByIDAsync
     *
     * Get template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplateByIDAsync($template)
    {
        return $this->getTemplateByIDAsyncWithHttpInfo($template)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTemplateByIDAsyncWithHttpInfo
     *
     * Get template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplateByIDAsyncWithHttpInfo($template)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2012';
        $request = $this->getTemplateByIDRequest($template);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
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
     * Create request for operation 'getTemplateByID'
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTemplateByIDRequest($template)
    {
        // verify the required parameter 'template' is set
        if ($template === null || (is_array($template) && count($template) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template when calling getTemplateByID'
            );
        }

        $resourcePath = '/templates/{template}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($template !== null) {
            $resourcePath = str_replace(
                '{' . 'template' . '}',
                ObjectSerializer::toPathValue($template),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
            }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTemplateFields
     *
     * Get all template fields
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Client\Model\InlineResponse2004
     */
    public function getTemplateFields($template)
    {
        list($response) = $this->getTemplateFieldsWithHttpInfo($template);
        return $response;
    }

    /**
     * Operation getTemplateFieldsWithHttpInfo
     *
     * Get all template fields
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Client\Model\InlineResponse2004, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTemplateFieldsWithHttpInfo($template)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2004';
        $request = $this->getTemplateFieldsRequest($template);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\InlineResponse2004',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getTemplateFieldsAsync
     *
     * Get all template fields
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplateFieldsAsync($template)
    {
        return $this->getTemplateFieldsAsyncWithHttpInfo($template)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTemplateFieldsAsyncWithHttpInfo
     *
     * Get all template fields
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplateFieldsAsyncWithHttpInfo($template)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2004';
        $request = $this->getTemplateFieldsRequest($template);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
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
     * Create request for operation 'getTemplateFields'
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTemplateFieldsRequest($template)
    {
        // verify the required parameter 'template' is set
        if ($template === null || (is_array($template) && count($template) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template when calling getTemplateFields'
            );
        }

        $resourcePath = '/templates/{template}/fields';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($template !== null) {
            $resourcePath = str_replace(
                '{' . 'template' . '}',
                ObjectSerializer::toPathValue($template),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
            }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listTemplatePasses
     *
     * Get all template passes
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Client\Model\InlineResponse2003
     */
    public function listTemplatePasses($template, $limit = '15', $page = '1')
    {
        list($response) = $this->listTemplatePassesWithHttpInfo($template, $limit, $page);
        return $response;
    }

    /**
     * Operation listTemplatePassesWithHttpInfo
     *
     * Get all template passes
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Client\Model\InlineResponse2003, HTTP status code, HTTP response headers (array of strings)
     */
    public function listTemplatePassesWithHttpInfo($template, $limit = '15', $page = '1')
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2003';
        $request = $this->listTemplatePassesRequest($template, $limit, $page);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\InlineResponse2003',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listTemplatePassesAsync
     *
     * Get all template passes
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listTemplatePassesAsync($template, $limit = '15', $page = '1')
    {
        return $this->listTemplatePassesAsyncWithHttpInfo($template, $limit, $page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listTemplatePassesAsyncWithHttpInfo
     *
     * Get all template passes
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listTemplatePassesAsyncWithHttpInfo($template, $limit = '15', $page = '1')
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2003';
        $request = $this->listTemplatePassesRequest($template, $limit, $page);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
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
     * Create request for operation 'listTemplatePasses'
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listTemplatePassesRequest($template, $limit = '15', $page = '1')
    {
        // verify the required parameter 'template' is set
        if ($template === null || (is_array($template) && count($template) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template when calling listTemplatePasses'
            );
        }

        $resourcePath = '/templates/{template}/passes';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($limit !== null) {
            $queryParams['limit'] = ObjectSerializer::toQueryValue($limit);
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }

        // path params
        if ($template !== null) {
            $resourcePath = str_replace(
                '{' . 'template' . '}',
                ObjectSerializer::toPathValue($template),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
            }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listTemplates
     *
     * Get all templates
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Client\Model\InlineResponse2002
     */
    public function listTemplates($limit = '15', $page = '1', $tags = null)
    {
        list($response) = $this->listTemplatesWithHttpInfo($limit, $page, $tags);
        return $response;
    }

    /**
     * Operation listTemplatesWithHttpInfo
     *
     * Get all templates
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Client\Model\InlineResponse2002, HTTP status code, HTTP response headers (array of strings)
     */
    public function listTemplatesWithHttpInfo($limit = '15', $page = '1', $tags = null)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2002';
        $request = $this->listTemplatesRequest($limit, $page, $tags);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\InlineResponse2002',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listTemplatesAsync
     *
     * Get all templates
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listTemplatesAsync($limit = '15', $page = '1', $tags = null)
    {
        return $this->listTemplatesAsyncWithHttpInfo($limit, $page, $tags)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listTemplatesAsyncWithHttpInfo
     *
     * Get all templates
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listTemplatesAsyncWithHttpInfo($limit = '15', $page = '1', $tags = null)
    {
        $returnType = '\WalletPassJP\Client\Model\InlineResponse2002';
        $request = $this->listTemplatesRequest($limit, $page, $tags);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
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
     * Create request for operation 'listTemplates'
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listTemplatesRequest($limit = '15', $page = '1', $tags = null)
    {

        $resourcePath = '/templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($limit !== null) {
            $queryParams['limit'] = ObjectSerializer::toQueryValue($limit);
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if (is_array($tags)) {
            $tags = ObjectSerializer::serializeCollection($tags, 'multi', true);
        }
        if ($tags !== null) {
            $queryParams['tags'] = ObjectSerializer::toQueryValue($tags);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
            }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateTemplate
     *
     * Update template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  \WalletPassJP\Client\Model\TemplateRequest $body body (optional)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function updateTemplate($template, $body = null)
    {
        $this->updateTemplateWithHttpInfo($template, $body);
    }

    /**
     * Operation updateTemplateWithHttpInfo
     *
     * Update template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  \WalletPassJP\Client\Model\TemplateRequest $body (optional)
     *
     * @throws \WalletPassJP\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateTemplateWithHttpInfo($template, $body = null)
    {
        $returnType = '';
        $request = $this->updateTemplateRequest($template, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateTemplateAsync
     *
     * Update template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  \WalletPassJP\Client\Model\TemplateRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateTemplateAsync($template, $body = null)
    {
        return $this->updateTemplateAsyncWithHttpInfo($template, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateTemplateAsyncWithHttpInfo
     *
     * Update template
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  \WalletPassJP\Client\Model\TemplateRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateTemplateAsyncWithHttpInfo($template, $body = null)
    {
        $returnType = '';
        $request = $this->updateTemplateRequest($template, $body);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
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

    /**
     * Create request for operation 'updateTemplate'
     *
     * @param  \WalletPassJP\Client\Model\Template $template Template ID (required)
     * @param  \WalletPassJP\Client\Model\TemplateRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateTemplateRequest($template, $body = null)
    {
        // verify the required parameter 'template' is set
        if ($template === null || (is_array($template) && count($template) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template when calling updateTemplate'
            );
        }

        $resourcePath = '/templates/{template}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($template !== null) {
            $resourcePath = str_replace(
                '{' . 'template' . '}',
                ObjectSerializer::toPathValue($template),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

            // // this endpoint requires Bearer token
            if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
            }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
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
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
