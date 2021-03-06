<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ;

use TencentCloudCMQ\Http\HttpClient;
use TencentCloudCMQ\Requests\ClearSubscriptionFilterTagsRequest;
use TencentCloudCMQ\Requests\GetSubscriptionAttributeRequest;
use TencentCloudCMQ\Requests\GetTopicAttributeRequest;
use TencentCloudCMQ\Requests\ListSubscriptionRequest;
use TencentCloudCMQ\Requests\PublishMessageRequest;
use TencentCloudCMQ\Requests\SetSubscriptionAttributeRequest;
use TencentCloudCMQ\Requests\SetTopicAttributeRequest;
use TencentCloudCMQ\Requests\SubscribeRequest;
use TencentCloudCMQ\Requests\UnsubscribeRequest;
use TencentCloudCMQ\Responses\ClearSubscriptionFilterTagsResponse;
use TencentCloudCMQ\Responses\GetSubscriptionAttributeResponse;
use TencentCloudCMQ\Responses\GetTopicAttributeResponse;
use TencentCloudCMQ\Responses\ListSubscriptionResponse;
use TencentCloudCMQ\Responses\PublishMessageResponse;
use TencentCloudCMQ\Responses\SetSubscriptionAttributeResponse;
use TencentCloudCMQ\Responses\SetTopicAttributeResponse;
use TencentCloudCMQ\Responses\SubscribeResponse;
use TencentCloudCMQ\Responses\UnsubscribeResponse;

/**
 * Class Topic
 * @package TencentCloudCMQ
 */
class Topic
{
    /**
     * @var string
     */
    private $topicName;

    /**
     * @var HttpClient
     */
    private $client;

    /**
     * Topic constructor.
     * @param HttpClient $client
     * @param string $topicName
     */
    public function __construct(HttpClient $client, $topicName)
    {
        $this->client = $client;
        $this->topicName = $topicName;
    }

    /**
     * @return string
     */
    public function getTopicName()
    {
        return $this->topicName;
    }

    public function setAttribute(SetTopicAttributeRequest $request)
    {
        $request->setTopicName($this->topicName);
        $response = new SetTopicAttributeResponse($this->topicName);
        return $this->client->sendRequest($request, $response);
    }

    /**
     * @return Http\BaseResponse|GetTopicAttributeResponse
     */
    public function getAttribute()
    {
        $request = new GetTopicAttributeRequest($this->topicName);
        $response = new GetTopicAttributeResponse($this->topicName);
        return $this->client->sendRequest($request, $response);
    }

    /**
     * @param PublishMessageRequest $request
     * @return Http\BaseResponse|PublishMessageResponse
     */
    public function publishMessage(PublishMessageRequest $request)
    {
        $request->setTopicName($this->topicName);
        $response = new PublishMessageResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * @param SubscribeRequest $request
     * @return Http\BaseResponse
     */
    public function subscribe(SubscribeRequest $request)
    {
        $request->setTopicName($this->topicName);
        $response = new SubscribeResponse();
        return $this->client->sendRequest($request, $response);
    }

    public function unsubscribe($subscriptionName)
    {
        $request = new UnsubscribeRequest($this->topicName, $subscriptionName);
        $response = new UnsubscribeResponse();
        return $this->client->sendRequest($request, $response);
    }

    public function ClearSubscriptionFilterTags($subscriptionName)
    {
        $request = new ClearSubscriptionFilterTagsRequest($this->topicName, $subscriptionName);
        $response = new ClearSubscriptionFilterTagsResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * @param $subscriptionName
     * @return Http\BaseResponse|GetSubscriptionAttributeResponse
     */
    public function getSubscriptionAttribute($subscriptionName)
    {
        $request = new GetSubscriptionAttributeRequest($this->topicName, $subscriptionName);
        $response = new GetSubscriptionAttributeResponse($this->topicName,$subscriptionName);
        return $this->client->sendRequest($request, $response);
    }

    public function setSubscriptionAttribute(SetSubscriptionAttributeRequest $request)
    {
        $request->setTopicName($this->topicName);
        $response = new SetSubscriptionAttributeResponse();
        return $this->client->sendRequest($request, $response);
    }

    /**
     * @param null $retNum
     * @param null $prefix
     * @param null $marker
     * @return Http\BaseResponse|ListSubscriptionResponse
     */
    public function listSubscription($retNum = null, $prefix = null, $marker = null)
    {
        $request = new ListSubscriptionRequest($this->topicName, $retNum, $prefix, $marker);
        $response = new ListSubscriptionResponse($this->topicName);
        return $this->client->sendRequest($request, $response);
    }
}
