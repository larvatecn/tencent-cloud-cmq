<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Model;

use TencentCloudCMQ\Traits\MessagePropertiesForReceive;

/**
 * Class Message
 * @package TencentCloudCMQ\Model
 */
class Message
{
    use MessagePropertiesForReceive;

    /**
     * Message constructor.
     * @param string $msgId
     * @param string $msgBody
     * @param int $enqueueTime
     * @param int $nextVisibleTime
     * @param int $firstDequeueTime
     * @param int $dequeueCount
     * @param string $receiptHandle
     */
    public function __construct($msgId, $msgBody, $enqueueTime, $nextVisibleTime, $firstDequeueTime, $dequeueCount, $receiptHandle)
    {
        $this->msgId = $msgId;
        $this->msgBody = $msgBody;
        $this->enqueueTime = $enqueueTime;
        $this->nextVisibleTime = $nextVisibleTime;
        $this->firstDequeueTime = $firstDequeueTime;
        $this->dequeueCount = $dequeueCount;
        $this->receiptHandle = $receiptHandle;
    }
}
