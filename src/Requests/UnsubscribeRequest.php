<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Requests;

use TencentCloudCMQ\Http\BaseRequest;

class UnsubscribeRequest extends BaseRequest
{
    /**
     * UnsubscribeRequest constructor.
     * @param string $topicName
     * @param string $subscriptionName
     */
    public function __construct($topicName, $subscriptionName)
    {
        parent::__construct('Unsubscribe');
        $this->setTopicName($topicName);
        $this->setSubscriptionName($subscriptionName);
    }

    /**
     * 设置主题名称
     * @param string $topicName
     * @return BaseRequest
     */
    public function setTopicName($topicName)
    {
        $this->setParameter('topicName', $topicName);
        return $this;
    }

    /**
     * 订阅名字，在单个地域同一帐号的同一主题下唯一。订阅名称是一个不超过 64 个字符的字符串，必须以字母为首字符，剩余部分可以包含字母、数字和横划线(-)。
     * @param string $subscriptionName
     * @return BaseRequest
     */
    public function setSubscriptionName($subscriptionName)
    {
        $this->setParameter('subscriptionName', $subscriptionName);
        return $this;
    }
}