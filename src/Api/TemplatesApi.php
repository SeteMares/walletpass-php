<?php
namespace WalletPassJP\Api;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use WalletPassJP\ApiException;
use WalletPassJP\ObjectSerializer;
use WalletPassJP\Api\Api as BaseAPI;
use WalletPassJP\Model\PassRequest;
use WalletPassJP\Model\TemplateRequest;

/**
 * Templates Api
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class TemplatesApi extends BaseAPI
{
    /**
     * Operation copyTemplate
     *
     * Copy template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\ResourceResponse
     */
    public function copy($template_id)
    {
        [$response] = $this->copyTemplateWithHttpInfo($template_id);
        return $response->getData();
    }

    /**
     * Operation copyTemplateWithHttpInfo
     *
     * Copy template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function copyTemplateWithHttpInfo($template_id)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->copyTemplateRequest($template_id);

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
            $content = json_decode($content);

            return [
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Template'
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
                        '\WalletPassJP\Model\Template'
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
     * Operation copyTemplateAsync
     *
     * Copy template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function copyTemplateAsync($template_id)
    {
        return $this->copyTemplateAsyncWithHttpInfo($template_id)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation copyTemplateAsyncWithHttpInfo
     *
     * Copy template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function copyTemplateAsyncWithHttpInfo($template_id)
    {
        $request = $this->copyTemplateRequest($template_id);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Template');
    }

    /**
     * Create request for operation 'copyTemplate'
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function copyTemplateRequest($template_id)
    {
        // verify the required parameter 'template' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling copyTemplate'
            );
        }

        $resourcePath = '/templates/{template}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace('{template}', $template_id, $resourcePath);
        }

        // body params
        $_tempBody = null;
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createPass
     *
     * Create pass
     *
     * @param  string $template_id Template ID (required)
     * @param  array $body body
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\Pass
     */
    public function createPass($template_id, $body)
    {
        [$response] = $this->createPassWithHttpInfo($template_id, new PassRequest($body));
        return $response->getData();
    }

    /**
     * Operation createPassWithHttpInfo
     *
     * Create pass
     *
     * @param  string $template_id Template ID (required)
     * @param  PassRequest $body
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function createPassWithHttpInfo($template_id, $body)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->createPassRequest($template_id, $body);

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
            $content = json_decode($content);

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
     * @param  string $template_id Template ID (required)
     * @param  array $body
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createPassAsync($template_id, $body)
    {
        return $this->createPassAsyncWithHttpInfo($template_id, new PassRequest($body))->then(
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
     * @param  string $template_id Template ID (required)
     * @param  \WalletPassJP\Model\PassRequest $body
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function createPassAsyncWithHttpInfo($template_id, $body)
    {
        $request = $this->createPassRequest($template_id, $body);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Pass');
    }

    /**
     * Create request for operation 'createPass'
     *
     * @param  string $template_id Template ID (required)
     * @param  \WalletPassJP\Model\PassRequest $body
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createPassRequest($template_id, $body)
    {
        // verify the required parameter 'template' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling createPass'
            );
        }

        $resourcePath = '/templates/{template}/passes';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace('{template}', $template_id, $resourcePath);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createTemplate
     *
     * Create template
     *
     * @param  array $body
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\Template
     */
    public function create($body)
    {
        [$response] = $this->createTemplateWithHttpInfo(new TemplateRequest($body));
        return $response->getData();
    }

    /**
     * Operation createTemplateWithHttpInfo
     *
     * Create template
     *
     * @param  \WalletPassJP\Model\TemplateRequest $body
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function createTemplateWithHttpInfo($body)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
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
            $content = json_decode($content);

            return [
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Template'
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
                        '\WalletPassJP\Model\Template'
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
     * Operation createTemplateAsync
     *
     * Create template
     *
     * @param  array $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTemplateAsync($body)
    {
        return $this->createTemplateAsyncWithHttpInfo(new TemplateRequest($body))->then(
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
     * @param  \WalletPassJP\Model\TemplateRequest $body
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function createTemplateAsyncWithHttpInfo($body)
    {
        $request = $this->createTemplateRequest($body);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Template');
    }

    /**
     * Create request for operation 'createTemplate'
     *
     * @param  \WalletPassJP\Model\TemplateRequest $body
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createTemplateRequest($body)
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteTemplate
     *
     * Delete template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete($template_id)
    {
        $this->deleteTemplateWithHttpInfo($template_id);
    }

    /**
     * Operation deleteTemplateWithHttpInfo
     *
     * Delete template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    private function deleteTemplateWithHttpInfo($template_id)
    {
        $returnType = '';
        $request = $this->deleteTemplateRequest($template_id);

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
     * Operation deleteTemplateAsync
     *
     * Delete template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteTemplateAsync($template_id)
    {
        return $this->deleteTemplateAsyncWithHttpInfo($template_id)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation deleteTemplateAsyncWithHttpInfo
     *
     * Delete template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function deleteTemplateAsyncWithHttpInfo($template_id)
    {
        $returnType = '';
        $request = $this->deleteTemplateRequest($template_id);

        return $this->client->sendAsync($request, $this->createHttpClientOption())->then(
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
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteTemplateRequest($template_id)
    {
        // verify the required parameter 'template' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling deleteTemplate'
            );
        }

        $resourcePath = '/templates/{template}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace('{template}', $template_id, $resourcePath);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTemplateByID
     *
     * Get template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\Template
     */
    public function show($template_id)
    {
        [$response] = $this->getTemplateByIDWithHttpInfo($template_id);
        return $response->getData();
    }

    /**
     * Operation getTemplateByIDWithHttpInfo
     *
     * Get template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function getTemplateByIDWithHttpInfo($template_id)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->getTemplateByIDRequest($template_id);

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
            $content = json_decode($content);

            return [
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Template'
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
                        '\WalletPassJP\Model\Template'
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
     * Operation getTemplateByIDAsync
     *
     * Get template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplateByIDAsync($template_id)
    {
        return $this->getTemplateByIDAsyncWithHttpInfo($template_id)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation getTemplateByIDAsyncWithHttpInfo
     *
     * Get template
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function getTemplateByIDAsyncWithHttpInfo($template_id)
    {
        $request = $this->getTemplateByIDRequest($template_id);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Template');
    }

    /**
     * Create request for operation 'getTemplateByID'
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTemplateByIDRequest($template_id)
    {
        // verify the required parameter 'template' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling getTemplateByID'
            );
        }

        $resourcePath = '/templates/{template}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace('{template}', $template_id, $resourcePath);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getTemplateFields
     *
     * Get all template fields
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\CollectionResponse
     */
    public function getTemplateFields($template_id)
    {
        [$response] = $this->getTemplateFieldsWithHttpInfo($template_id);
        return $response;
    }

    /**
     * Operation getTemplateFieldsWithHttpInfo
     *
     * Get all template fields
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\CollectionResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function getTemplateFieldsWithHttpInfo($template_id)
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
        $request = $this->getTemplateFieldsRequest($template_id);

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
            $content = json_decode($content);

            return [
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\PassField[]'
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
                        '\WalletPassJP\Model\PassField[]'
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
     * Operation getTemplateFieldsAsync
     *
     * Get all template fields
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplateFieldsAsync($template_id)
    {
        return $this->getTemplateFieldsAsyncWithHttpInfo($template_id)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation getTemplateFieldsAsyncWithHttpInfo
     *
     * Get all template fields
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function getTemplateFieldsAsyncWithHttpInfo($template_id)
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
        $request = $this->getTemplateFieldsRequest($template_id);

        return $this->sendAsyncRequest(
            $request,
            '\WalletPassJP\Model\PassField[]',
            $returnType
        );
    }

    /**
     * Create request for operation 'getTemplateFields'
     *
     * @param  string $template_id Template ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTemplateFieldsRequest($template_id)
    {
        // verify the required parameter 'template' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling getTemplateFields'
            );
        }

        $resourcePath = '/templates/{template}/fields';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace('{template}', $template_id, $resourcePath);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
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
     * @param  string $template_id Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\CollectionResponse
     */
    public function listPasses($template_id, $limit = '15', $page = '1')
    {
        [$response] = $this->listTemplatePassesWithHttpInfo($template_id, $limit, $page);
        return $response;
    }

    /**
     * Operation listTemplatePassesWithHttpInfo
     *
     * Get all template passes
     *
     * @param  string $template_id Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\CollectionResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function listTemplatePassesWithHttpInfo($template_id, $limit = '15', $page = '1')
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
        $request = $this->listTemplatePassesRequest($template_id, $limit, $page);

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
            $content = json_decode($content);

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
     * @param  string $template_id Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listTemplatePassesAsync($template_id, $limit = '15', $page = '1')
    {
        return $this->listTemplatePassesAsyncWithHttpInfo($template_id, $limit, $page)->then(
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
     * @param  string $template_id Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function listTemplatePassesAsyncWithHttpInfo(
        $template_id,
        $limit = '15',
        $page = '1'
    ) {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
        $request = $this->listTemplatePassesRequest($template_id, $limit, $page);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Pass[]', $returnType);
    }

    /**
     * Create request for operation 'listTemplatePasses'
     *
     * @param  string $template_id Template ID (required)
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listTemplatePassesRequest($template_id, $limit = '15', $page = '1')
    {
        // verify the required parameter 'template' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling listTemplatePasses'
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
        if ($template_id !== null) {
            $resourcePath = str_replace('{template}', $template_id, $resourcePath);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
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
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\CollectionResponse
     */
    public function list($limit = '15', $page = '1', $tags = null)
    {
        [$response] = $this->listTemplatesWithHttpInfo($limit, $page, $tags);
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
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\CollectionResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function listTemplatesWithHttpInfo($limit = '15', $page = '1', $tags = null)
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
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
            $content = json_decode($content);

            return [
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Template[]'
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
                        '\WalletPassJP\Model\Template[]'
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
        return $this->listTemplatesAsyncWithHttpInfo($limit, $page, $tags)->then(function (
            $response
        ) {
            return $response[0];
        });
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
    private function listTemplatesAsyncWithHttpInfo($limit = '15', $page = '1', $tags = null)
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
        $request = $this->listTemplatesRequest($limit, $page, $tags);

        return $this->sendAsyncRequest(
            $request,
            '\WalletPassJP\Model\Template[]',
            $returnType
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateTemplate
     *
     * Update template
     *
     * @param  string $template_id Template ID (required)
     * @param  array $body
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\Template|null
     */
    public function update($template_id, $body)
    {
        [$response] = $this->updateTemplateWithHttpInfo(
            $template_id,
            new TemplateRequest($body)
        );
        return $response ? $response->getData() : null;
    }

    /**
     * Operation updateTemplateWithHttpInfo
     *
     * Update template
     *
     * @param  string $template_id Template ID (required)
     * @param  \WalletPassJP\Model\TemplateRequest $body (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function updateTemplateWithHttpInfo($template_id, $body)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->updateTemplateRequest($template_id, $body);

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
            $content = json_decode($responseBody->getContents());

            return [
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Template'
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
                        '\WalletPassJP\Model\Template'
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
     * Operation updateTemplateAsync
     *
     * Update template
     *
     * @param  string $template_id Template ID (required)
     * @param  array $body
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateTemplateAsync($template_id, $body)
    {
        return $this->updateTemplateAsyncWithHttpInfo($template_id, $body)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation updateTemplateAsyncWithHttpInfo
     *
     * Update template
     *
     * @param  string $template_id Template ID (required)
     * @param  \WalletPassJP\Model\TemplateRequest $body
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function updateTemplateAsyncWithHttpInfo($template_id, $body)
    {
        $request = $this->updateTemplateRequest($template_id, $body);

        return $this->sendAsyncRequest($request, '\WalletPassJP\Model\Template');
    }

    /**
     * Create request for operation 'updateTemplate'
     *
     * @param  string $template_id Template ID (required)
     * @param  \WalletPassJP\Model\TemplateRequest $body
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateTemplateRequest($template_id, $body)
    {
        // verify the required parameter 'template' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling updateTemplate'
            );
        }

        $resourcePath = '/templates/{template}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace('{template}', $template_id, $resourcePath);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PATCH',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteField
     *
     * Delete field
     *
     * @param  string $template_id Template ID (required)
     * @param  string $field_id Field ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteField($template_id, $field_id)
    {
        $this->deleteFieldWithHttpInfo($template_id, $field_id);
    }

    /**
     * Operation deleteFieldWithHttpInfo
     *
     * Delete field
     *
     * @param  string $template_id Template ID (required)
     * @param  string $field_id Field ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    private function deleteFieldWithHttpInfo($template_id, $field_id)
    {
        $returnType = '';
        $request = $this->deleteFieldRequest($template_id, $field_id);

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
     * Operation deleteFieldAsync
     *
     * Delete field
     *
     * @param  string $template_id Template ID (required)
     * @param  string $field_id Field ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteFieldAsync($template_id, $field_id)
    {
        return $this->deleteFieldAsyncWithHttpInfo($template_id, $field_id)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation deleteFieldAsyncWithHttpInfo
     *
     * Delete field
     *
     * @param  string $template_id Template ID (required)
     * @param  string $field_id Field ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function deleteFieldAsyncWithHttpInfo($template_id, $field_id)
    {
        $returnType = '';
        $request = $this->deleteFieldRequest($template_id, $field_id);

        return $this->client->sendAsync($request, $this->createHttpClientOption())->then(
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
     * Create request for operation 'deleteField'
     *
     * @param  string $template_id Template ID (required)
     * @param  string $field_id Field ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteFieldRequest($template_id, $field_id)
    {
        // verify the required parameter 'template' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling deleteTemplate'
            );
        }

        // verify the required parameter 'field' is set
        if ($field_id === null || (is_array($field_id) && count($field_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $field_id when calling deleteField'
            );
        }

        $resourcePath = '/templates/{template}/fields/{field}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace('{template}', $template_id, $resourcePath);
        }
        if ($field_id !== null) {
            $resourcePath = str_replace('{field}', $field_id, $resourcePath);
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

        $headers = array_merge($defaultHeaders, $headerParams, $headers);

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getEndpoint() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
