<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Responses;

use TencentCloudCMQ\Http\BaseResponse;

class ListSubscriptionResponse extends BaseResponse
{
    /**
     * @var string
     */
    public $topicName;

    /**
     * @var int
     */
    public $totalCount;

    /**
     * @var array
     */
    public $subscriptionList;

    /**
     * ListSubscriptionResponse constructor.
     * @param string $topicName
     */
    public function __construct($topicName)
    {
        $this->topicName = $topicName;
    }

    /**
     * @return string
     */
    public function getTopicName()
    {
        return $this->topicName;
    }

    /**
     * 获取订阅名称列表
     * @return array
     */
    public function getSubscriptionNames()
    {
        $subscriptionNames = [];
        foreach ($this->subscriptionList as $subscription) {
            $subscriptionNames[] = $subscription['subscriptionName'];
        }
        return $subscriptionNames;
    }
}
