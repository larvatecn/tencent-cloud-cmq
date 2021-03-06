<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ;

use TencentCloudCMQ\Http\HttpClient;
use TencentCloudCMQ\Requests\BatchDeleteMessageRequest;
use TencentCloudCMQ\Requests\BatchReceiveMessageRequest;
use TencentCloudCMQ\Requests\BatchSendMessageRequest;
use TencentCloudCMQ\Requests\DeleteMessageRequest;
use TencentCloudCMQ\Requests\GetQueueAttributeRequest;
use TencentCloudCMQ\Requests\ReceiveMessageRequest;
use TencentCloudCMQ\Requests\SendMessageRequest;
use TencentCloudCMQ\Requests\SetQueueAttributeRequest;
use TencentCloudCMQ\Responses\BatchDeleteMessageResponse;
use TencentCloudCMQ\Responses\BatchReceiveMessageResponse;
use TencentCloudCMQ\Responses\BatchSendMessageResponse;
use TencentCloudCMQ\Responses\DeleteMessageResponse;
use TencentCloudCMQ\Responses\GetQueueAttributeResponse;
use TencentCloudCMQ\Responses\ReceiveMessageResponse;
use TencentCloudCMQ\Responses\SendMessageResponse;
use TencentCloudCMQ\Responses\SetQueueAttributeResponse;

/**
 * Class Queue
 * @package TencentCloudCMQ
 */
class Queue
{
    /**
     * @var string
     */
    private $queueName;

    /**
     * @var HttpClient
     */
    private $client;

    /**
     * Queue constructor.
     * @param HttpClient $client
     * @param string $queueName
     */
    public function __construct(HttpClient $client, $queueName)
    {
        $this->queueName = $queueName;
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getQueueName()
    {
        return $this->queueName;
    }

    /**
     * @param SetQueueAttributeRequest $request
     * @return Http\BaseResponse|SetQueueAttributeResponse
     */
    public function setAttribute(SetQueueAttributeRequest $request)
    {
        $request->setQueueName($this->queueName);
        $response = new SetQueueAttributeResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * @param SetQueueAttributeRequest $request
     * @param AsyncCallback|null $callback
     * @return Http\Promise
     */
    public function setAttributeAsync(SetQueueAttributeRequest $request, AsyncCallback $callback = null)
    {
        $request->setQueueName($this->queueName);
        $response = new SetQueueAttributeResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * @return Http\BaseResponse|GetQueueAttributeResponse
     */
    public function getAttribute()
    {
        $request = new GetQueueAttributeRequest($this->queueName);
        $response = new GetQueueAttributeResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * @param AsyncCallback|null $callback
     * @return Http\Promise
     */
    public function getAttributeAsync(AsyncCallback $callback = null)
    {
        $request = new GetQueueAttributeRequest($this->queueName);
        $response = new GetQueueAttributeResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * 向队列推送消息
     * @param SendMessageRequest $request
     * @return Http\BaseResponse|SendMessageResponse
     */
    public function sendMessage(SendMessageRequest $request)
    {
        $request->setQueueName($this->queueName);
        $response = new SendMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 异步推送消息
     * @param SendMessageRequest $request
     * @param AsyncCallback|null $callback
     * @return Http\Promise
     */
    public function sendMessageAsync(SendMessageRequest $request, AsyncCallback $callback = null)
    {
        $request->setQueueName($this->queueName);
        $response = new SendMessageResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    public function batchSendMessage(BatchSendMessageRequest $request)
    {
        $request->setQueueName($this->queueName);
        $response = new BatchSendMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 异步批量发送消息
     * @param BatchSendMessageRequest $request
     * @param AsyncCallback|null $callback
     * @return Http\Promise
     */
    public function batchSendMessageAsync(BatchSendMessageRequest $request, AsyncCallback $callback = null)
    {
        $request->setQueueName($this->queueName);
        $response = new BatchSendMessageResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * 消费消息
     * @param int $waitSeconds
     * @return Http\BaseResponse|ReceiveMessageResponse
     */
    public function receiveMessage($waitSeconds = null)
    {
        $request = new ReceiveMessageRequest($this->queueName);
        if ($waitSeconds != null) $request->setPollingWaitSeconds($waitSeconds);
        $response = new ReceiveMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 异步消费消息
     * @param AsyncCallback|NULL $callback
     * @return Http\Promise
     */
    public function receiveMessageAsync(AsyncCallback $callback = NULL)
    {
        $request = new ReceiveMessageRequest($this->queueName);
        $response = new ReceiveMessageResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * @param int $numOfMessages
     * @return Http\BaseResponse|BatchReceiveMessageResponse
     */
    public function batchReceiveMessage($numOfMessages)
    {
        $request = new BatchReceiveMessageRequest($this->queueName, $numOfMessages);
        $response = new BatchReceiveMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * 异步批量消费消息
     * @param int $numOfMessages
     * @param AsyncCallback|NULL $callback
     * @return Http\Promise
     */
    public function batchReceiveMessageAsync($numOfMessages, AsyncCallback $callback = NULL)
    {
        $request = new BatchReceiveMessageRequest($this->queueName, $numOfMessages);
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    /**
     * @param $receiptHandle
     * @return Http\BaseResponse|DeleteMessageResponse
     */
    public function deleteMessage($receiptHandle)
    {
        $request = new DeleteMessageRequest($this->queueName, $receiptHandle);
        $response = new DeleteMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * @param $receiptHandle
     * @param AsyncCallback|NULL $callback
     * @return Http\Promise
     */
    public function deleteMessageAsync($receiptHandle, AsyncCallback $callback = NULL)
    {
        $request = new DeleteMessageRequest($this->queueName, $receiptHandle);
        $response = new DeleteMessageResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }

    public function batchDeleteMessage($receiptHandles)
    {
        $request = new BatchDeleteMessageRequest($this->queueName, $receiptHandles);
        $response = new BatchDeleteMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    public function batchDeleteMessageAsync($receiptHandles, AsyncCallback $callback = NULL)
    {
        $request = new BatchDeleteMessageRequest($this->queueName, $receiptHandles);
        $response = new BatchDeleteMessageResponse();
        return $this->client->sendRequestAsync($request, $response, $callback);
    }
}
