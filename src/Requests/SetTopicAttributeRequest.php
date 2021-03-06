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
 * Class SetTopicAttributeRequest
 * @package TencentCloudCMQ\Requests
 */
class SetTopicAttributeRequest extends BaseRequest
{
    /**
     * SetTopicAttributeRequest constructor.
     */
    public function __construct()
    {
        parent::__construct('SetTopicAttributes');
    }

    /**
     * 设置主题名称
     * @param string $topicName
     * @return BaseRequest
     */
    public function setTopicName($topicName)
    {
        $this->setParameter('topicName', $topicName);
        return $this;
    }

    /**
     * 消息最大长度。取值范围1024-65536 Byte（即 1-64K），默认值 65536。
     * @param int $maxMsgSize
     * @return BaseRequest
     */
    public function setMaxMsgSize($maxMsgSize)
    {
        $this->setParameter('maxMsgSize', $maxMsgSize);
        return $this;
    }


}
