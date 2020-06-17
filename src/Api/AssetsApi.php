<?php
namespace WalletPassJP\Api;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use WalletPassJP\Api\Api as BaseAPI;
use WalletPassJP\ApiException;
use WalletPassJP\ObjectSerializer;

/**
 * AssetsApi
 * PHP version 7
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class AssetsApi extends BaseAPI
{
    /**
     * Operation deleteAsset
     *
     * Delete Asset
     *
     * @param  string $asset Asset ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete($asset)
    {
        $this->deleteAssetWithHttpInfo($asset);
    }

    /**
     * Operation deleteAssetWithHttpInfo
     *
     * Delete Asset
     *
     * @param  string $asset Asset ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteAssetWithHttpInfo($asset)
    {
        $returnType = '';
        $request = $this->deleteAssetRequest($asset);

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
     * Operation deleteAssetAsync
     *
     * Delete Asset
     *
     * @param  string $asset Asset ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAssetAsync($asset)
    {
        return $this->deleteAssetAsyncWithHttpInfo($asset)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteAssetAsyncWithHttpInfo
     *
     * Delete Asset
     *
     * @param  string $asset Asset ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAssetAsyncWithHttpInfo($asset)
    {
        $returnType = '';
        $request = $this->deleteAssetRequest($asset);

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
     * Create request for operation 'deleteAsset'
     *
     * @param  string $asset Asset ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteAssetRequest($asset)
    {
        // verify the required parameter 'asset' is set
        if ($asset === null || (is_array($asset) && count($asset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $asset when calling deleteAsset'
            );
        }

        $resourcePath = '/assets/{asset}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($asset !== null) {
            $resourcePath = str_replace('{asset}', $asset, $resourcePath);
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
     * Operation getAssetByID
     *
     * Get Asset by ID
     *
     * @param  string $asset Asset ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\ResourceResponse
     */
    public function show($asset)
    {
        list($response) = $this->getAssetByIDWithHttpInfo($asset);
        return $response->getData();
    }

    /**
     * Operation getAssetByIDWithHttpInfo
     *
     * Get Asset by ID
     *
     * @param  string $asset Asset ID (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAssetByIDWithHttpInfo($asset)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->getAssetByIDRequest($asset);

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
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Asset'
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
                        '\WalletPassJP\Model\Asset'
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
     * Operation getAssetByIDAsync
     *
     * Get Asset by ID
     *
     * @param  string $asset Asset ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAssetByIDAsync($asset)
    {
        return $this->getAssetByIDAsyncWithHttpInfo($asset)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getAssetByIDAsyncWithHttpInfo
     *
     * Get Asset by ID
     *
     * @param  string $asset Asset ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAssetByIDAsyncWithHttpInfo($asset)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->getAssetByIDRequest($asset);

        return $this->client->sendAsync($request, $this->createHttpClientOption())->then(
            function ($response) use ($returnType) {
                $responseBody = $response->getBody();
                $content = $responseBody->getContents();

                return [
                    ObjectSerializer::deserialize(
                        $content,
                        $returnType,
                        [],
                        '\WalletPassJP\Model\Asset'
                    ),
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
     * Create request for operation 'getAssetByID'
     *
     * @param  string $asset Asset ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getAssetByIDRequest($asset)
    {
        // verify the required parameter 'asset' is set
        if ($asset === null || (is_array($asset) && count($asset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $asset when calling getAssetByID'
            );
        }

        $resourcePath = '/assets/{asset}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($asset !== null) {
            $resourcePath = str_replace('{asset}', $asset, $resourcePath);
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
     * Operation listAssets
     *
     * Get all assets
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
        list($response) = $this->listAssetsWithHttpInfo($limit, $page, $tags);
        return $response;
    }

    /**
     * Operation listAssetsWithHttpInfo
     *
     * Get all assets
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\CollectionResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listAssetsWithHttpInfo($limit = '15', $page = '1', $tags = null)
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
        $request = $this->listAssetsRequest($limit, $page, $tags);

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
                ObjectSerializer::deserialize(
                    $content,
                    $returnType,
                    [],
                    '\WalletPassJP\Model\Asset[]'
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
                        '\WalletPassJP\Model\Asset[]'
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
     * Operation listAssetsAsync
     *
     * Get all assets
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAssetsAsync($limit = '15', $page = '1', $tags = null)
    {
        return $this->listAssetsAsyncWithHttpInfo($limit, $page, $tags)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation listAssetsAsyncWithHttpInfo
     *
     * Get all assets
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAssetsAsyncWithHttpInfo($limit = '15', $page = '1', $tags = null)
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
        $request = $this->listAssetsRequest($limit, $page, $tags);

        return $this->client->sendAsync($request, $this->createHttpClientOption())->then(
            function ($response) use ($returnType) {
                $responseBody = $response->getBody();
                $content = $responseBody->getContents();

                return [
                    ObjectSerializer::deserialize(
                        $content,
                        $returnType,
                        [],
                        '\WalletPassJP\Model\Asset[]'
                    ),
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
     * Create request for operation 'listAssets'
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listAssetsRequest($limit = '15', $page = '1', $tags = null)
    {
        $resourcePath = '/assets';
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
     * Operation updateAsset
     *
     * Update Asset
     *
     * @param  string $asset Asset ID (required)
     * @param  \WalletPassJP\Model\Body1 $body body (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function update($asset, $body = null)
    {
        $this->updateAssetWithHttpInfo($asset, $body);
    }

    /**
     * Operation updateAssetWithHttpInfo
     *
     * Update Asset
     *
     * @param  string $asset Asset ID (required)
     * @param  \WalletPassJP\Model\Body1 $body (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateAssetWithHttpInfo($asset, $body = null)
    {
        $returnType = '';
        $request = $this->updateAssetRequest($asset, $body);

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
     * Operation updateAssetAsync
     *
     * Update Asset
     *
     * @param  string $asset Asset ID (required)
     * @param  \WalletPassJP\Model\Body1 $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateAssetAsync($asset, $body = null)
    {
        return $this->updateAssetAsyncWithHttpInfo($asset, $body)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation updateAssetAsyncWithHttpInfo
     *
     * Update Asset
     *
     * @param  string $asset Asset ID (required)
     * @param  \WalletPassJP\Model\Body1 $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateAssetAsyncWithHttpInfo($asset, $body = null)
    {
        $returnType = '';
        $request = $this->updateAssetRequest($asset, $body);

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
     * Create request for operation 'updateAsset'
     *
     * @param  string $asset Asset ID (required)
     * @param  \WalletPassJP\Model\Body1 $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateAssetRequest($asset, $body = null)
    {
        // verify the required parameter 'asset' is set
        if ($asset === null || (is_array($asset) && count($asset) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $asset when calling updateAsset'
            );
        }

        $resourcePath = '/assets/{asset}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($asset !== null) {
            $resourcePath = str_replace('{asset}', $asset, $resourcePath);
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
     * Operation uploadAsset
     *
     * Upload an asset
     *
     * @param  string $file file (optional)
     * @param  string $type type (optional)
     * @param  string $name name (optional)
     * @param  string[] $tags tags (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\ResourceResponse
     */
    public function upload($file = null, $type = null, $name = null, $tags = null)
    {
        list($response) = $this->uploadAssetWithHttpInfo($file, $type, $name, $tags);
        return $response->getData();
    }

    /**
     * Operation uploadAssetWithHttpInfo
     *
     * Upload an asset
     *
     * @param  string $file (optional)
     * @param  string $type (optional)
     * @param  string $name (optional)
     * @param  string[] $tags (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function uploadAssetWithHttpInfo(
        $file = null,
        $type = null,
        $name = null,
        $tags = null
    ) {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->uploadAssetRequest($file, $type, $name, $tags);

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
                    '\WalletPassJP\Model\Asset'
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
                        '\WalletPassJP\Model\Asset'
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
     * Operation uploadAssetAsync
     *
     * Upload an asset
     *
     * @param  string $file (optional)
     * @param  string $type (optional)
     * @param  string $name (optional)
     * @param  string[] $tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function uploadAssetAsync($file = null, $type = null, $name = null, $tags = null)
    {
        return $this->uploadAssetAsyncWithHttpInfo($file, $type, $name, $tags)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation uploadAssetAsyncWithHttpInfo
     *
     * Upload an asset
     *
     * @param  string $file (optional)
     * @param  string $type (optional)
     * @param  string $name (optional)
     * @param  string[] $tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function uploadAssetAsyncWithHttpInfo(
        $file = null,
        $type = null,
        $name = null,
        $tags = null
    ) {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->uploadAssetRequest($file, $type, $name, $tags);

        return $this->client->sendAsync($request, $this->createHttpClientOption())->then(
            function ($response) use ($returnType) {
                $responseBody = $response->getBody();
                $content = $responseBody->getContents();

                return [
                    ObjectSerializer::deserialize(
                        $content,
                        $returnType,
                        [],
                        '\WalletPassJP\Model\Asset'
                    ),
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
     * Create request for operation 'uploadAsset'
     *
     * @param  string $file (optional)
     * @param  string $type (optional)
     * @param  string $name (optional)
     * @param  string[] $tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function uploadAssetRequest(
        $file = null,
        $type = null,
        $name = null,
        $tags = null
    ) {
        $resourcePath = '/assets';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = true;

        // form params
        if (!$file) {
            throw new \InvalidArgumentException(
                'Missing the required parameter "file" while calling uploadAsset'
            );
        }

        $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(
            ObjectSerializer::toFormValue($file),
            'rb'
        );

        // form params
        if (!$type) {
            throw new \InvalidArgumentException(
                'Missing the required parameter "type" while calling uploadAsset'
            );
        }
        $formParams['type'] = ObjectSerializer::toFormValue($type);

        // form params
        if ($name) {
            $formParams['name'] = ObjectSerializer::toFormValue($name);
        }
        // form params
        if ($tags !== null) {
            $formParams['tags'] = ObjectSerializer::toFormValue($tags);
        }
        // body params

        $headers = $this->headerSelector->selectHeadersForMultipart(['application/json']);

        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    if (is_array($formParamValue)) {
                        foreach ($formParamValue as $value) {
                            $multipartContents[] = [
                                'name' => $formParamName . '[]',
                                'contents' => $value,
                            ];
                        }
                    } else {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValue,
                        ];
                    }
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
}
