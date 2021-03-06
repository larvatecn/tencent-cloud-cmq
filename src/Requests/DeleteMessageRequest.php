<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Requests;


use TencentCloudCMQ\Http\BaseRequest;

class DeleteMessageRequest extends BaseRequest
{
    /**
     * CreateQueueRequest constructor.
     * @param string $queueName
     * @param string $receiptHandle
     */
    public function __construct($queueName, $receiptHandle)
    {
        parent::__construct('DeleteMessage');
        $this->setParameter('queueName', $queueName);
        $this->setParameter('receiptHandle', $receiptHandle);
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

    public function setReceiptHandle($receiptHandle)
    {
        $this->setParameter('receiptHandle', $receiptHandle);
        return $this;
    }
}
