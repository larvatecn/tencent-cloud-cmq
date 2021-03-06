<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Responses;

use TencentCloudCMQ\Http\BaseResponse;

class GetSubscriptionAttributeResponse extends BaseResponse
{
    /**
     * @var string
     */
    public $topicName;

    /**
     * @var string
     */
    public $subscriptionName;

    /**
     * @var string
     */
    public $notifyStrategy;

    /**
     * GetSubscriptionAttributeResponse constructor.
     * @param string $topicName
     * @param string $subscriptionName
     */
    public function __construct($topicName, $subscriptionName)
    {
        $this->topicName = $topicName;
        $this->subscriptionName = $subscriptionName;
    }

    /**
     * @return string
     */
    public function getTopicName()
    {
        return $this->topicName;
    }

    /**
     * @return string
     */
    public function getNotifyStrategy()
    {
        return $this->notifyStrategy;
    }
}
