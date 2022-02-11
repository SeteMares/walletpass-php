<?php
namespace WalletPassJP\Api;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use WalletPassJP\ApiException;
use WalletPassJP\Model\PassRequest;
use WalletPassJP\ObjectSerializer;
use WalletPassJP\Api\Api as BaseAPI;

/**
 * Passes Api
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class PassesApi extends BaseAPI
{
    /**
     * Operation createPass
     *
     * Create pass
     *
     * @param  string $template Template ID (required)
     * @param  \WalletPassJP\Model\PassRequest $body body (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\ResourceResponse
     */
    public function create($template, $body = null)
    {
        list($response) = $this->createPassWithHttpInfo($template, $body);
        return $response->getData();
    }

    /**
     * Operation createPassWithHttpInfo
     *
     * Create pass
     *
     * @param  string $template Template ID (required)
     * @param  \WalletPassJP\Model\PassRequest $body (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createPassWithHttpInfo($template, $body = null)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
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
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Pass'
                ),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\ResourceResponse',
                        $e->getResponseHeaders(),
                        '\WalletPassJP\Model\Pass'
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
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
     * @param  string $template Template ID (required)
     * @param  \WalletPassJP\Model\PassRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createPassAsync($template, $body = null)
    {
        return $this->createPassAsyncWithHttpInfo($template, $body)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation createPassAsyncWithHttpInfo
     *
     * Create pass
     *
     * @param  string $template_id Template ID (required)
     * @param  \WalletPassJP\Model\PassRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createPassAsyncWithHttpInfo($template_id, $body = null)
    {
        $request = $this->createPassRequest($template_id, $body);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Pass');
    }

    /**
     * Create request for operation 'createPass'
     *
     * @param  string $template Template ID (required)
     * @param  \WalletPassJP\Model\PassRequest $body (optional)
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
            $resourcePath = str_replace('{template}', $template, $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(['application/json']);
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
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deletePass
     *
     * Delete pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete($pass)
    {
        $this->deletePassWithHttpInfo($pass);
    }

    /**
     * Operation deletePassWithHttpInfo
     *
     * Delete pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deletePassWithHttpInfo($pass)
    {
        $returnType = '';
        $request = $this->deletePassRequest($pass);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deletePassAsync
     *
     * Delete pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deletePassAsync($pass)
    {
        return $this->deletePassAsyncWithHttpInfo($pass)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deletePassAsyncWithHttpInfo
     *
     * Delete pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deletePassAsyncWithHttpInfo($pass)
    {
        $request = $this->deletePassRequest($pass);

        return $this->sendAsyncWithoutResponse($request);
    }

    /**
     * Create request for operation 'deletePass'
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deletePassRequest($pass)
    {
        // verify the required parameter 'pass' is set
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling deletePass'
            );
        }

        $resourcePath = '/passes/{pass}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace(
                '{' . 'pass' . '}',
                ObjectSerializer::toPathValue($pass),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(['application/json']);
        } else {
            $headers = $this->headerSelector->selectHeaders(['application/json'], []);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'DELETE',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPassApple
     *
     * Get pass in pkpass format
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function getPassApple($pass)
    {
        list($response) = $this->getPassAppleWithHttpInfo($pass);
        return $response;
    }

    /**
     * Operation getPassAppleWithHttpInfo
     *
     * Get pass in pkpass format
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPassAppleWithHttpInfo($pass)
    {
        $returnType = '\SplFileObject';
        $request = $this->getPassAppleRequest($pass);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, $response->getHeaders()),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPassAppleAsync
     *
     * Get pass in pkpass format
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPassAppleAsync($pass)
    {
        return $this->getPassAppleAsyncWithHttpInfo($pass)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getPassAppleAsyncWithHttpInfo
     *
     * Get pass in pkpass format
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPassAppleAsyncWithHttpInfo($pass)
    {
        $returnType = '\SplFileObject';
        $request = $this->getPassAppleRequest($pass);

        return $this->client->sendAsync($request, $this->createHttpClientOption())->then(
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
     * Create request for operation 'getPassApple'
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPassAppleRequest($pass)
    {
        // verify the required parameter 'pass' is set
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling getPassApple'
            );
        }

        $resourcePath = '/passes/{pass}/pkpass';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace(
                '{' . 'pass' . '}',
                ObjectSerializer::toPathValue($pass),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart([
                'application/vnd.apple.pkpass',
                'application/json',
            ]);
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/vnd.apple.pkpass', 'application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPassByExtID
     *
     * Get pass by external ID
     *
     * @param  string $external_id The custom or external ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\ResourceResponse
     */
    public function getPassByExtID($external_id)
    {
        list($response) = $this->getPassByExtIDWithHttpInfo($external_id);
        return $response->getData();
    }

    /**
     * Operation getPassByExtIDWithHttpInfo
     *
     * Get pass by external ID
     *
     * @param  string $external_id The custom or external ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPassByExtIDWithHttpInfo($external_id)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->getPassByExtIDRequest($external_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Pass'
                ),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\ResourceResponse',
                        $e->getResponseHeaders(),
                        '\WalletPassJP\Model\Pass'
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPassByExtIDAsync
     *
     * Get pass by external ID
     *
     * @param  string $external_id The custom or external ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPassByExtIDAsync($external_id)
    {
        return $this->getPassByExtIDAsyncWithHttpInfo($external_id)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation getPassByExtIDAsyncWithHttpInfo
     *
     * Get pass by external ID
     *
     * @param  string $external_id The custom or external ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPassByExtIDAsyncWithHttpInfo($external_id)
    {
        $request = $this->getPassByExtIDRequest($external_id);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Pass');
    }

    /**
     * Create request for operation 'getPassByExtID'
     *
     * @param  string $external_id The custom or external ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPassByExtIDRequest($external_id)
    {
        // verify the required parameter 'external_id' is set
        if ($external_id === null || (is_array($external_id) && count($external_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $external_id when calling getPassByExtID'
            );
        }

        $resourcePath = '/passes/external/{externalID}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($external_id !== null) {
            $resourcePath = str_replace(
                '{' . 'externalID' . '}',
                ObjectSerializer::toPathValue($external_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(['application/json']);
        } else {
            $headers = $this->headerSelector->selectHeaders(['application/json'], []);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPassByID
     *
     * Get pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\ResourceResponse
     */
    public function show($pass)
    {
        list($response) = $this->getPassByIDWithHttpInfo($pass);
        return $response->getData();
    }

    /**
     * Operation getPassByIDWithHttpInfo
     *
     * Get pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPassByIDWithHttpInfo($pass)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->getPassByIDRequest($pass);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Pass'
                ),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\ResourceResponse',
                        $e->getResponseHeaders(),
                        '\WalletPassJP\Model\Pass'
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPassByIDAsync
     *
     * Get pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPassByIDAsync($pass)
    {
        return $this->getPassByIDAsyncWithHttpInfo($pass)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getPassByIDAsyncWithHttpInfo
     *
     * Get pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPassByIDAsyncWithHttpInfo($pass)
    {
        $request = $this->getPassByIDRequest($pass);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Pass');
    }

    /**
     * Create request for operation 'getPassByID'
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPassByIDRequest($pass)
    {
        // verify the required parameter 'pass' is set
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling getPassByID'
            );
        }

        $resourcePath = '/passes/{pass}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace(
                '{' . 'pass' . '}',
                ObjectSerializer::toPathValue($pass),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(['application/json']);
        } else {
            $headers = $this->headerSelector->selectHeaders(['application/json'], []);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPassGoogle
     *
     * Get pass Google Play installation link
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function getPassGoogle($pass)
    {
        list($response) = $this->getPassGoogleWithHttpInfo($pass);
        return $response;
    }

    /**
     * Operation getPassGoogleWithHttpInfo
     *
     * Get pass Google Play installation link
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPassGoogleWithHttpInfo($pass)
    {
        $returnType = 'string';
        $request = $this->getPassGoogleRequest($pass);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPassGoogleAsync
     *
     * Get pass Google Play installation link
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPassGoogleAsync($pass)
    {
        return $this->getPassGoogleAsyncWithHttpInfo($pass)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getPassGoogleAsyncWithHttpInfo
     *
     * Get pass Google Play installation link
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPassGoogleAsyncWithHttpInfo($pass)
    {
        $request = $this->getPassGoogleRequest($pass);

        return $this->sendAsyncRequest($request, '', 'string');
    }

    /**
     * Create request for operation 'getPassGoogle'
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPassGoogleRequest($pass)
    {
        // verify the required parameter 'pass' is set
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling getPassGoogle'
            );
        }

        $resourcePath = '/passes/{pass}/gpay';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace(
                '{' . 'pass' . '}',
                ObjectSerializer::toPathValue($pass),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(['application/json']);
        } else {
            $headers = $this->headerSelector->selectHeaders(['application/json'], []);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPassLink
     *
     * Get pass download link
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function getPassLink($pass)
    {
        list($response) = $this->getPassLinkWithHttpInfo($pass);
        return $response;
    }

    /**
     * Operation getPassLinkWithHttpInfo
     *
     * Get pass download link
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPassLinkWithHttpInfo($pass)
    {
        $returnType = 'string';
        $request = $this->getPassLinkRequest($pass);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
            $content = $responseBody->getContents();
            if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                $content = json_decode($content);
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPassLinkAsync
     *
     * Get pass download link
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPassLinkAsync($pass)
    {
        return $this->getPassLinkAsyncWithHttpInfo($pass)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getPassLinkAsyncWithHttpInfo
     *
     * Get pass download link
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPassLinkAsyncWithHttpInfo($pass)
    {
        $returnType = 'string';
        $request = $this->getPassLinkRequest($pass);

        return $this->sendAsyncRequest($request, '', 'string');
    }

    /**
     * Create request for operation 'getPassLink'
     *
     * @param  \WalletPassJP\Model\Pass $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPassLinkRequest($pass)
    {
        // verify the required parameter 'pass' is set
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling getPassLink'
            );
        }

        $resourcePath = '/passes/{pass}/link';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace(
                '{' . 'pass' . '}',
                ObjectSerializer::toPathValue($pass),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(['application/json']);
        } else {
            $headers = $this->headerSelector->selectHeaders(['application/json'], []);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listTemplatePasses
     *
     * Get all template passes
     *
     * @param  string $template Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\CollectionResponse
     */
    public function list($template, $limit = '15', $page = '1')
    {
        list($response) = $this->listTemplatePassesWithHttpInfo($template, $limit, $page);
        return $response;
    }

    /**
     * Operation listTemplatePassesWithHttpInfo
     *
     * Get all template passes
     *
     * @param  string $template Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\CollectionResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listTemplatePassesWithHttpInfo($template, $limit = '15', $page = '1')
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
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
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
                if (!in_array($returnType, ['string', 'integer', 'bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Pass[]'
                ),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\CollectionResponse',
                        $e->getResponseHeaders(),
                        '\WalletPassJP\Model\Pass[]'
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
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
     * @param  string $template Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listTemplatePassesAsync($template, $limit = '15', $page = '1')
    {
        return $this->listTemplatePassesAsyncWithHttpInfo($template, $limit, $page)->then(
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
     * @param  string $template Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listTemplatePassesAsyncWithHttpInfo($template, $limit = '15', $page = '1')
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
        $request = $this->listTemplatePassesRequest($template, $limit, $page);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Pass[]', $returnType);
    }

    /**
     * Create request for operation 'listTemplatePasses'
     *
     * @param  string $template Template ID (required)
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
            $resourcePath = str_replace('{template}', $template, $resourcePath);
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(['application/json']);
        } else {
            $headers = $this->headerSelector->selectHeaders(['application/json'], []);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updatePass
     *
     * Update pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\Pass
     */
    public function update($pass, $body)
    {
        $this->updatePassWithHttpInfo($pass,  new PassRequest($body));
    }

    /**
     * Operation updatePassWithHttpInfo
     *
     * Update pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function updatePassWithHttpInfo($pass, $body)
    {
        $returnType = '';
        $request = $this->updatePassRequest($pass, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
                case 201:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\ResourceResponse',
                        $e->getResponseHeaders(),
                        '\WalletPassJP\Model\Pass'
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updatePassAsync
     *
     * Update pass
     *
     * @param  string $pass Pass ID (required)
     * @param  array $body
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updatePassAsync($pass, $body)
    {
        return $this->updatePassAsyncWithHttpInfo($pass, new PassRequest($body))->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation updatePassAsyncWithHttpInfo
     *
     * Update pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updatePassAsyncWithHttpInfo($pass, $body)
    {
        $request = $this->updatePassRequest($pass, $body);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Pass');
    }

    /**
     * Create request for operation 'updatePass'
     *
     * @param  string $pass Pass ID (required)
     * @param  \WalletPassJP\Model\PassRequest $body
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updatePassRequest($pass, $body)
    {
        // verify the required parameter 'pass' is set
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling updatePass'
            );
        }

        $resourcePath = '/passes/{pass}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace(
                '{' . 'pass' . '}',
                ObjectSerializer::toPathValue($pass),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(['application/json']);
        } else {
            $headers = $this->headerSelector->selectHeaders(['application/json'], []);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue,
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'PATCH',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation redeemPass
     *
     * Redeem pass
     *
     * @param  string $pass Pass ID (required)
     * @param  array $body (optional)
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \WalletPassJP\ApiException on non-2xx response
     */
    public function redeem($pass, $body = null): void
    {
        $this->redeemPassWithHttpInfo($pass, $body);
    }

    /**
     * Operation redeemPassWithHttpInfo
     *
     * Redeem pass
     *
     * @param  string $pass
     * @param  array $body (optional)
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws \InvalidArgumentException
     * @throws \WalletPassJP\ApiException on non-2xx response
     */
    protected function redeemPassWithHttpInfo($pass, $body = null)
    {
        $returnType = '';
        $request = $this->redeemPassRequest($pass, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation redeemPassAsync
     *
     * Redeem pass
     *
     * @param  string $pass
     * @param  array $body (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    protected function redeemPassAsync($pass, $body = null)
    {
        return $this->redeemPassAsyncWithHttpInfo($pass, $body)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation redeemPassAsyncWithHttpInfo
     *
     * Redeem pass
     *
     * @param  string $pass
     * @param  array $body (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    protected function redeemPassAsyncWithHttpInfo($pass, $body = null)
    {
        $request = $this->redeemPassRequest($pass, $body);

        return $this->sendAsyncWithoutResponse($request);
    }

    /**
     * @param  string $pass Pass ID (required)
     * @param  array $body (optional)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws \InvalidArgumentException
     */
    protected function redeemPassRequest($pass, $body = null)
    {
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling redeemPass'
            );
        }

        $resourcePath = '/passes/{pass}/redeem';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace('{pass}', $pass, $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'PATCH',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation punchPass
     *
     * Punch pass
     *
     * @param  string $pass Pass ID (required)
     * @param  array $body (optional)
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \WalletPassJP\ApiException on non-2xx response
     */
    public function punch($pass, $body = null): void
    {
        $this->punchPassWithHttpInfo($pass, $body);
    }

    /**
     * Operation punchPassWithHttpInfo
     *
     * Punch pass
     *
     * @param  string $pass
     * @param  array $body (optional)
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws \InvalidArgumentException
     * @throws \WalletPassJP\ApiException on non-2xx response
     */
    protected function punchPassWithHttpInfo($pass, $body = null)
    {
        $returnType = '';
        $request = $this->punchPassRequest($pass, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                            ->getResponse()
                            ->getBody()
                            ->getContents()
                        : null
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
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation punchPassAsync
     *
     * Punch pass
     *
     * @param  string $pass
     * @param  array $body (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    protected function punchPassAsync($pass, $body = null)
    {
        return $this->punchPassAsyncWithHttpInfo($pass, $body)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation punchPassAsyncWithHttpInfo
     *
     * Punch pass
     *
     * @param  string $pass
     * @param  array $body (optional)
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    protected function punchPassAsyncWithHttpInfo($pass, $body = null)
    {
        $request = $this->punchPassRequest($pass, $body);

        return $this->sendAsyncWithoutResponse($request);
    }

    /**
     * @param  string $pass Pass ID (required)
     * @param  array $body (optional)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws \InvalidArgumentException
     */
    protected function punchPassRequest($pass, $body = null)
    {
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling punchPass'
            );
        }

        $resourcePath = '/passes/{pass}/punch';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace('{pass}', $pass, $resourcePath);
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'PATCH',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation checkinPass
     *
     * Checkin pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \WalletPassJP\ApiException on non-2xx response
     */
    public function checkin($pass): void
    {
        $this->checkinPassWithHttpInfo($pass);
    }

    /**
     * Operation checkinPassWithHttpInfo
     *
     * Checkin pass
     *
     * @param  string $pass
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws \InvalidArgumentException
     * @throws \WalletPassJP\ApiException on non-2xx response
     */
    protected function checkinPassWithHttpInfo($pass, $body = null)
    {
        $returnType = '';
        $request = $this->checkinPassRequest($pass, $body);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                        ->getResponse()
                        ->getBody()
                        ->getContents()
                        : null
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
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation checkinPassAsync
     *
     * Checkin pass
     *
     * @param  string $pass
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    protected function checkinPassAsync($pass)
    {
        return $this->checkinPassAsyncWithHttpInfo($pass)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation checkinPassAsyncWithHttpInfo
     *
     * Checkin pass
     *
     * @param  string $pass
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    protected function checkinPassAsyncWithHttpInfo($pass)
    {
        $request = $this->checkinPassRequest($pass);

        return $this->sendAsyncWithoutResponse($request);
    }

    /**
     * @param  string $pass Pass ID (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws \InvalidArgumentException
     */
    protected function checkinPassRequest($pass)
    {
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling redeemPass'
            );
        }

        $resourcePath = '/passes/{pass}/checkin';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace('{pass}', $pass, $resourcePath);
        }

        // body params
        $_tempBody = null;

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'PATCH',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation checkoutPass
     *
     * Checkout pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \WalletPassJP\ApiException on non-2xx response
     */
    public function checkout($pass): void
    {
        $this->checkoutPassWithHttpInfo($pass);
    }

    /**
     * Operation checkoutPassWithHttpInfo
     *
     * Checkout pass
     *
     * @param  string $pass
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws \InvalidArgumentException
     * @throws \WalletPassJP\ApiException on non-2xx response
     */
    protected function checkoutPassWithHttpInfo($pass)
    {
        $returnType = '';
        $request = $this->checkoutPassRequest($pass);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                        ->getResponse()
                        ->getBody()
                        ->getContents()
                        : null
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
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation checkoutPassAsync
     *
     * Checkout pass
     *
     * @param  string $pass
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    protected function checkoutPassAsync($pass)
    {
        return $this->checkoutPassAsyncWithHttpInfo($pass)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation checkoutPassAsyncWithHttpInfo
     *
     * Checkout pass
     *
     * @param  string $pass
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    protected function checkoutPassAsyncWithHttpInfo($pass)
    {
        $request = $this->checkoutPassRequest($pass);

        return $this->sendAsyncWithoutResponse($request);
    }

    /**
     * @param  string $pass Pass ID (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws \InvalidArgumentException
     */
    protected function checkoutPassRequest($pass)
    {
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling redeemPass'
            );
        }

        $resourcePath = '/passes/{pass}/checkout';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace('{pass}', $pass, $resourcePath);
        }

        // body params
        $_tempBody = null;

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'PATCH',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation voidPass
     *
     * Void pass
     *
     * @param  string $pass Pass ID (required)
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \WalletPassJP\ApiException on non-2xx response
     */
    public function void($pass): void
    {
        $this->voidPassWithHttpInfo($pass);
    }

    /**
     * Operation voidPassWithHttpInfo
     *
     * Void pass
     *
     * @param  string $pass
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws \InvalidArgumentException
     * @throws \WalletPassJP\ApiException on non-2xx response
     */
    protected function voidPassWithHttpInfo($pass)
    {
        $returnType = '';
        $request = $this->voidPassRequest($pass);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e
                        ->getResponse()
                        ->getBody()
                        ->getContents()
                        : null
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
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        json_decode($e->getResponseBody()),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation voidPassAsync
     *
     * Void pass
     *
     * @param  string $pass
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    protected function voidPassAsync($pass)
    {
        return $this->voidPassAsyncWithHttpInfo($pass)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation voidPassAsyncWithHttpInfo
     *
     * Void pass
     *
     * @param  string $pass
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \InvalidArgumentException
     */
    protected function voidPassAsyncWithHttpInfo($pass)
    {
        $request = $this->voidPassRequest($pass);

        return $this->sendAsyncWithoutResponse($request);
    }

    /**
     * @param  string $pass Pass ID (required)
     *
     * @return \GuzzleHttp\Psr7\Request
     * @throws \InvalidArgumentException
     */
    protected function voidPassRequest($pass)
    {
        if ($pass === null || (is_array($pass) && count($pass) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $pass when calling redeemPass'
            );
        }

        $resourcePath = '/passes/{pass}/void';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($pass !== null) {
            $resourcePath = str_replace('{pass}', $pass, $resourcePath);
        }

        // body params
        $_tempBody = null;

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (
                $httpBody instanceof \stdClass &&
                $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'PATCH',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
