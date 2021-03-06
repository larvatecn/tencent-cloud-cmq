<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Responses;

use TencentCloudCMQ\Http\BaseResponse;

class GetTopicAttributeResponse extends BaseResponse
{
    /**
     * @var string
     */
    public $topicName;

    /**
     * @var int
     */
    public $maxMsgSize;

    /**
     * CreateQueueRequest constructor.
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
     * @return int
     */
    public function getMaxMsgSize()
    {
        return $this->maxMsgSize;
    }
}
