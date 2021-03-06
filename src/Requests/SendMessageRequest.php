<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Requests;

use TencentCloudCMQ\Http\BaseRequest;

/**
 * Class SendMessageRequest
 * @package TencentCloudCMQ\Requests
 */
class SendMessageRequest extends BaseRequest
{
    /**
     * CreateQueueRequest constructor.
     */
    public function __construct()
    {
        parent::__construct('SendMessage');
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
     * 消息正文。至少 1 Byte，最大长度受限于设置的队列消息最大长度属性。
     * @param string $msgBody
     * @return BaseRequest
     */
    public function setMsgBody($msgBody)
    {
        $this->setParameter('msgBody', $msgBody);
        return $this;
    }

    /**
     * 单位为秒，表示该消息发送到队列后，需要延时多久用户才可见该消息。
     * @param string $delaySeconds
     * @return BaseRequest
     */
    public function setDelaySeconds($delaySeconds)
    {
        $this->setParameter('delaySeconds', $delaySeconds);
        return $this;
    }
}
