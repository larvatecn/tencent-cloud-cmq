<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Requests;

use TencentCloudCMQ\Http\BaseRequest;

class ReceiveMessageRequest extends BaseRequest
{
    /**
     * CreateQueueRequest constructor.
     * @param string $queueName
     */
    public function __construct($queueName)
    {
        parent::__construct('ReceiveMessage');
        $this->setQueueName($queueName);
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
     * 本次请求的长轮询等待时间。取值范围 0-30 秒，如果不设置该参数，则默认使用队列属性中的 pollingWaitSeconds 值。
     * @param string $pollingWaitSeconds
     * @return BaseRequest
     */
    public function setPollingWaitSeconds($pollingWaitSeconds)
    {
        $this->setParameter('pollingWaitSeconds', $pollingWaitSeconds);
        return $this;
    }
}
