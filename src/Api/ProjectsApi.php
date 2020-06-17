<?php
namespace WalletPassJP\Api;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use WalletPassJP\ApiException;
use WalletPassJP\ObjectSerializer;
use WalletPassJP\Api\Api as BaseAPI;
use WalletPassJP\Model\ProjectRequest;

/**
 * Projects Api
 *
 * @category Class
 * @package  WalletPassJP
 * @author   Kinchaku
 */
class ProjectsApi extends BaseAPI
{
    /**
     * Operation createProject
     *
     * Create new Project
     *
     * @param  array $body body (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\ResourceResponse
     */
    public function create($body = null)
    {
        list($response) = $this->createProjectWithHttpInfo(new ProjectRequest($body));
        return $response->getData();
    }

    /**
     * Operation createProjectWithHttpInfo
     *
     * Create new Project
     *
     * @param  \WalletPassJP\Model\ProjectRequest $body (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function createProjectWithHttpInfo($body = null)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->createProjectRequest($body);

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
                    '\WalletPassJP\Model\Project'
                ),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\ResourceResponse',
                        $e->getResponseHeaders(),
                        '\WalletPassJP\Model\Project'
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
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
     * Operation createProjectAsync
     *
     * Create new Project
     *
     * @param  array $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAsync($body = null)
    {
        return $this->createProjectAsyncWithHttpInfo(new ProjectRequest($body))->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation createProjectAsyncWithHttpInfo
     *
     * Create new Project
     *
     * @param  \WalletPassJP\Model\ProjectRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function createProjectAsyncWithHttpInfo($body = null)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->createProjectRequest($body);

        return $this->client->sendAsync($request, $this->createHttpClientOption())->then(
            function ($response) use ($returnType) {
                $responseBody = $response->getBody();
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }

                return [
                    ObjectSerializer::deserialize(
                        $content,
                        $returnType,
                        [],
                        '\WalletPassJP\Model\Project'
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
     * Create request for operation 'createProject'
     *
     * @param  \WalletPassJP\Model\ProjectRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createProjectRequest($body = null)
    {
        $resourcePath = '/projects';
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
     * Operation deleteProject
     *
     * Delete Project
     *
     * @param  string $project Project (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete($project)
    {
        $this->deleteProjectWithHttpInfo($project);
    }

    /**
     * Operation deleteProjectWithHttpInfo
     *
     * Delete Project
     *
     * @param  string $project Project (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    private function deleteProjectWithHttpInfo($project)
    {
        $returnType = '';
        $request = $this->deleteProjectRequest($project);

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
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
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
     * Operation deleteProjectAsync
     *
     * Delete Project
     *
     * @param  string $project Project (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAsync($project)
    {
        return $this->deleteProjectAsyncWithHttpInfo($project)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation deleteProjectAsyncWithHttpInfo
     *
     * Delete Project
     *
     * @param  string $project Project (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function deleteProjectAsyncWithHttpInfo($project)
    {
        $returnType = '';
        $request = $this->deleteProjectRequest($project);

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
     * Create request for operation 'deleteProject'
     *
     * @param  string $project Project (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteProjectRequest($project)
    {
        // verify the required parameter 'project' is set
        if ($project === null || (is_array($project) && count($project) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project when calling deleteProject'
            );
        }

        $resourcePath = '/projects/{project}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($project !== null) {
            $resourcePath = str_replace('{project}', $project, $resourcePath);
        }

        // body params
        $_tempBody = null;

        $headers = $this->headerSelector->selectHeaders(['application/json'], []);

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
     * Operation getProjectByID
     *
     * Get Project
     *
     * @param  string $project Project (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WalletPassJP\Model\ResourceResponse
     */
    public function show($project)
    {
        list($response) = $this->getProjectByIDWithHttpInfo($project);
        return $response->getData();
    }

    /**
     * Operation getProjectByIDWithHttpInfo
     *
     * Get Project
     *
     * @param  string $project Project (required)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\ResourceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function getProjectByIDWithHttpInfo($project)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->getProjectByIDRequest($project);

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
                    '\WalletPassJP\Model\Project'
                ),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\ResourceResponse',
                        $e->getResponseHeaders(),
                        '\WalletPassJP\Model\Project'
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
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
     * Operation getProjectByIDAsync
     *
     * Get Project
     *
     * @param  string $project Project (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function getProjectByIDAsync($project)
    {
        return $this->getProjectByIDAsyncWithHttpInfo($project)->then(function ($response) {
            return $response[0];
        });
    }

    /**
     * Operation getProjectByIDAsyncWithHttpInfo
     *
     * Get Project
     *
     * @param  string $project Project (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function getProjectByIDAsyncWithHttpInfo($project)
    {
        $returnType = '\WalletPassJP\Model\ResourceResponse';
        $request = $this->getProjectByIDRequest($project);

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
                    ObjectSerializer::deserialize(
                        $content,
                        $returnType,
                        [],
                        '\WalletPassJP\Model\Project'
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
     * Create request for operation 'getProjectByID'
     *
     * @param  string $project Project (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getProjectByIDRequest($project)
    {
        // verify the required parameter 'project' is set
        if ($project === null || (is_array($project) && count($project) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project when calling getProjectByID'
            );
        }

        $resourcePath = '/projects/{project}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($project !== null) {
            $resourcePath = str_replace('{project}', $project, $resourcePath);
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
     * Operation listProjects
     *
     * Get a list of created Projects
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
        list($response) = $this->listProjectsWithHttpInfo($limit, $page, $tags);
        return $response;
    }

    /**
     * Operation listProjectsWithHttpInfo
     *
     * Get a list of created Projects
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WalletPassJP\Model\CollectionResponse, HTTP status code, HTTP response headers (array of strings)
     */
    private function listProjectsWithHttpInfo($limit = '15', $page = '1', $tags = null)
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
        $request = $this->listProjectsRequest($limit, $page, $tags);

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
                    '\WalletPassJP\Model\Project[]'
                ),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\CollectionResponse',
                        $e->getResponseHeaders(),
                        '\WalletPassJP\Model\Project[]'
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
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
     * Operation listProjectsAsync
     *
     * Get a list of created Projects
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function listProjectsAsync($limit = '15', $page = '1', $tags = null)
    {
        return $this->listProjectsAsyncWithHttpInfo($limit, $page, $tags)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation listProjectsAsyncWithHttpInfo
     *
     * Get a list of created Projects
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function listProjectsAsyncWithHttpInfo($limit = '15', $page = '1', $tags = null)
    {
        $returnType = '\WalletPassJP\Model\CollectionResponse';
        $request = $this->listProjectsRequest($limit, $page, $tags);

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
                    ObjectSerializer::deserialize(
                        $content,
                        $returnType,
                        [],
                        '\WalletPassJP\Model\Project[]'
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
     * Create request for operation 'listProjects'
     *
     * @param  int $limit Records imit (optional, default to 15)
     * @param  int $page Page number (optional, default to 1)
     * @param  string[] $tags Filter by tags (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listProjectsRequest($limit = '15', $page = '1', $tags = null)
    {
        $resourcePath = '/projects';
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
     * Operation updateProject
     *
     * Update Project
     *
     * @param  string $project Project (required)
     * @param  \WalletPassJP\Model\ProjectRequest $body body (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function update($project, $body = null)
    {
        $this->updateProjectWithHttpInfo($project, $body);
    }

    /**
     * Operation updateProjectWithHttpInfo
     *
     * Update Project
     *
     * @param  string $project Project (required)
     * @param  \WalletPassJP\Model\ProjectRequest $body (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    private function updateProjectWithHttpInfo($project, $body = null)
    {
        $returnType = '';
        $request = $this->updateProjectRequest($project, $body);

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
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
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
     * Operation updateProjectAsync
     *
     * Update Project
     *
     * @param  string $project Project (required)
     * @param  \WalletPassJP\Model\ProjectRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function updateProjectAsync($project, $body = null)
    {
        return $this->updateProjectAsyncWithHttpInfo($project, $body)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     * Operation updateProjectAsyncWithHttpInfo
     *
     * Update Project
     *
     * @param  string $project Project (required)
     * @param  \WalletPassJP\Model\ProjectRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function updateProjectAsyncWithHttpInfo($project, $body = null)
    {
        $returnType = '';
        $request = $this->updateProjectRequest($project, $body);

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
     * Create request for operation 'updateProject'
     *
     * @param  string $project Project (required)
     * @param  \WalletPassJP\Model\ProjectRequest $body (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateProjectRequest($project, $body = null)
    {
        // verify the required parameter 'project' is set
        if ($project === null || (is_array($project) && count($project) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project when calling updateProject'
            );
        }

        $resourcePath = '/projects/{project}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($project !== null) {
            $resourcePath = str_replace('{project}', $project, $resourcePath);
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
     * Operation archiveProject/unarchiveProject
     *
     * Archive/Unarchive Project
     *
     * @param  string $project Project ID (required)
     * @param  bool|null $archive (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function archive($project, $archive = true)
    {
        $this->archiveProjectWithHttpInfo($project, $archive);
    }

    /**
     *
     * Archive/Unarchive Project
     *
     * @param  string $project Project (required)
     * @param  bool|null $archive (optional)
     *
     * @throws \WalletPassJP\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    private function archiveProjectWithHttpInfo($project, $archive = true)
    {
        $returnType = '';
        $request = $this->archiveProjectRequest($project, $archive);

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
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WalletPassJP\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
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
     * Operation archiveAsync
     *
     * Archive/Unarchive Project
     *
     * @param  string $project Project (required)
     * @param  bool|null $archive (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function archiveAsync($project, $archive = true)
    {
        return $this->archiveProjectAsyncWithHttpInfo($project, $archive)->then(function (
            $response
        ) {
            return $response[0];
        });
    }

    /**
     *
     * Archive/Unarchive Project
     *
     * @param  string $project Project (required)
     * @param  bool|null $archive (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    private function archiveProjectAsyncWithHttpInfo($project, $archive = true)
    {
        $returnType = '';
        $request = $this->archiveProjectRequest($project, $archive);

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
     * Create request for operation 'archiveProject'
     *
     * @param  string $project Project ID (required)
     * @param  bool|null $archive (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function archiveProjectRequest($project, $archive = true)
    {
        // verify the required parameter 'project' is set
        if ($project === null || (is_array($project) && count($project) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project when calling updateProject'
            );
        }

        $resourcePath = '/projects/{project}/' . ($archive ? 'archive' : 'unarchive');
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($project !== null) {
            $resourcePath = str_replace('{project}', $project, $resourcePath);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

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
            $this->config->getEndpoint() . $resourcePath,
            $headers,
            $httpBody
        );
    }
}
