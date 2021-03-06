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
 * 创建主题响应
 * @package TencentCloudCMQ\Responses
 */
class CreateTopicResponse extends BaseResponse
{
    /**
     * @var string
     */
    public $topicId;

    /**
     * @var string
     */
    public $topicName;

    /**
     * CreateTopicResponse constructor.
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
     * @return string
     */
    public function getTopicId()
    {
        return $this->topicId;
    }

}
