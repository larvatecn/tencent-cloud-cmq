<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Responses;

use TencentCloudCMQ\Http\BaseResponse;

class GetQueueAttributeResponse extends BaseResponse
{
    /**
     * @var int
     */
    public $maxMsgHeapNum;

    /**
     * @var int
     */
    public $pollingWaitSeconds;

    /**
     * @var int
     */
    public $visibilityTimeout;
    public $maxMsgSize;
    public $msgRetentionSeconds;
    public $rewindSeconds;
    public $delayMsgNum;
    public $minMsgTime;
    public $rewindMsgNum;
    public $inactiveMsgNum;
    public $activeMsgNum;
    public $lastModifyTime;
    public $createTime;

    /**
     * @var string
     */
    public $queueName;

    /**
     * @var string
     */
    public $queueId;

    /**
     * @return int
     */
    public function getVisibilityTimeout()
    {
        return $this->visibilityTimeout;
    }

    /**
     * @return string
     */
    public function getQueueName()
    {
        return $this->queueName;
    }

    /**
     * @return bool
     */
    public function getRewindEnabled()
    {
        return $this->rewindSeconds > 0;
    }
}
