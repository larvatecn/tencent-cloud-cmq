<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Requests;

use TencentCloudCMQ\Http\BaseRequest;

class RewindQueueRequest extends BaseRequest
{
    private $queueName;

    /**
     * CreateQueueRequest constructor.
     * @param string $queueName
     */
    public function __construct($queueName)
    {
        parent::__construct('RewindQueue');
        $this->setQueueName($queueName);
        $this->queueName = $queueName;
    }

    /**
     * 设置队列名称
     * @param string $queueName
     * @return BaseRequest
     */
    public function setQueueName($queueName)
    {
        $this->setParameter('queueName', $queueName);
        return $this;
    }

    /**
     * 设定该时间，则（Batch）receiveMessage 接口，会按照生产消息的先后顺序消费该时间戳以后的消息。
     * @param string $startConsumeTime
     * @return BaseRequest
     */
    public function setStartConsumeTime($startConsumeTime)
    {
        $this->setParameter('startConsumeTime', $startConsumeTime);
        return $this;
    }

}
