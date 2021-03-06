<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ;

use TencentCloudCMQ\Http\HttpClient;
use TencentCloudCMQ\Requests\CreateQueueRequest;
use TencentCloudCMQ\Requests\CreateTopicRequest;
use TencentCloudCMQ\Requests\DeleteQueueRequest;
use TencentCloudCMQ\Requests\DeleteTopicRequest;
use TencentCloudCMQ\Requests\ListQueueRequest;
use TencentCloudCMQ\Requests\ListTopicRequest;
use TencentCloudCMQ\Requests\RewindQueueRequest;
use TencentCloudCMQ\Responses\CreateQueueResponse;
use TencentCloudCMQ\Responses\CreateTopicResponse;
use TencentCloudCMQ\Responses\DeleteQueueResponse;
use TencentCloudCMQ\Responses\DeleteTopicResponse;
use TencentCloudCMQ\Responses\ListQueueResponse;
use TencentCloudCMQ\Responses\ListTopicResponse;
use TencentCloudCMQ\Responses\RewindQueueResponse;

/**
 * Class Client
 * @package TencentCloudCMQ
 */
class Client
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * Client constructor.
     * @param string $endPoint
     * @param string $secretId
     * @param string $secretKey
     * @param Config|null $config
     */
    public function __construct($endPoint, $secretId, $secretKey, Config $config = NULL)
    {
        $this->client = new HttpClient($endPoint, $secretId, $secretKey, $config);
    }

    /**
     * @return HttpClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Returns a queue reference for operating on the queue
     * this function does not create the queue automatically.
     *
     * @param string $queueName :  the queue name
     * @return Queue $queue: the Queue instance
     */
    public function getQueueRef($queueName)
    {
        return new Queue($this->client, $queueName);
    }

    public function rewindQueue($queueName, $startConsumeTime)
    {
        $request = new  RewindQueueRequest($queueName);
        $request->setStartConsumeTime($startConsumeTime);
        $response = new RewindQueueResponse($queueName);
        return $this->client->sendRequest($request, $response);
    }

    /**
     * Create Queue and Returns the Queue reference
     * @param CreateQueueRequest $request :  the QueueName and QueueAttributes
     * @return Http\BaseResponse|CreateQueueResponse
     */
    public function createQueue(CreateQueueRequest $request)
    {
        $response = new CreateQueueResponse($request->getQueueName());
        return $this->client->sendRequest($request, $response);
    }

    /**
     * Create Queue and Returns the Queue reference
     * The request will not be sent until calling MnsPromise->wait();
     *
     * @param CreateQueueRequest $request :  the QueueName and QueueAttributes
     * @param AsyncCallback $callback :  the Callback when the request finishes
     * @return Http\Promise
     */
    public function createQueueAsync(CreateQueueRequest $request, AsyncCallback $callback = null)
    {
        $response = new CreateQueueResponse($request->getQueueName());
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * Query the queues created by current account
     *
     * @param ListQueueRequest $request : define filters for quering queues
     * @return Http\BaseResponse|ListQueueResponse
     */
    public function listQueue(ListQueueRequest $request)
    {
        $response = new ListQueueResponse();
        return $this->client->sendRequest($request, $response);
    }

    public function listQueueAsync(ListQueueRequest $request, AsyncCallback $callback = null)
    {
        $response = new ListQueueResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * Delete the specified queue
     * the request will succeed even when the queue does not exist
     *
     * @param $queueName : the queueName
     * @return Http\BaseResponse|DeleteQueueResponse
     */
    public function deleteQueue($queueName)
    {
        $request = new DeleteQueueRequest($queueName);
        $response = new DeleteQueueResponse();
        return $this->client->sendRequest($request, $response);
    }

    public function deleteQueueAsync($queueName, AsyncCallback $callback = NULL)
    {
        $request = new DeleteQueueRequest($queueName);
        $response = new DeleteQueueResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * Returns a topic reference for operating on the topic
     * this function does not create the topic automatically.
     *
     * @param string $topicName :  the topic name
     * @return Topic $topic: the Topic instance
     */
    public function getTopicRef($topicName)
    {
        return new Topic($this->client, $topicName);
    }

    /**
     * @param CreateTopicRequest $request
     * @return Http\BaseResponse|CreateTopicResponse
     */
    public function createTopic(CreateTopicRequest $request)
    {
        $response = new CreateTopicResponse($request->getTopicName());
        return $this->client->sendRequest($request, $response);
    }

    /**
     * @param $topicName
     * @return Http\BaseResponse|DeleteTopicResponse
     */
    public function deleteTopic($topicName)
    {
        $request = new DeleteTopicRequest($topicName);
        $response = new DeleteTopicResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * @param ListTopicRequest $request
     * @return Http\BaseResponse|ListTopicResponse
     */
    public function listTopic(ListTopicRequest $request)
    {
        $response = new ListTopicResponse();
        return $this->client->sendRequest($request, $response);
    }
}
