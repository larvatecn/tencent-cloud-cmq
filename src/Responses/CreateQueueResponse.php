<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Responses;

use TencentCloudCMQ\Http\BaseResponse;

/**
 * 创建队列响应
 * @package TencentCloudCMQ\Responses
 */
class CreateQueueResponse extends BaseResponse
{
    /**
     * @var string
     */
    public $queueName;

    /**
     * @var string
     */
    public $queueId;

    /**
     * CreateQueueResponse constructor.
     * @param string $queueName
     */
    public function __construct($queueName)
    {
        $this->queueName = $queueName;
    }

    /**
     * @return string
     */
    public function getQueueName()
    {
        return $this->queueName;
    }

    /**
     * @return string
     */
    public function getQueueId()
    {
        return $this->queueId;
    }
}
