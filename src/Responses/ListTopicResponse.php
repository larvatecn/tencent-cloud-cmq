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
 * Class ListTopicResponse
 * @package TencentCloudCMQ\Responses
 */
class ListTopicResponse extends BaseResponse
{
    /**
     * @var int
     */
    public $totalCount;

    /**
     * @var array
     */
    public $topicList;

    /**
     * 获取主题列表
     * @return array
     */
    public function getTopicList()
    {
        return $this->topicList;
    }

    /**
     * 获取队列Id
     * @return array
     */
    public function getTopicIds()
    {
        $topicIds = [];
        foreach ($this->topicList as $topic) {
            $topicIds[] = $topic['topicId'];
        }
        return $topicIds;
    }

    /**
     * 获取队列名称
     * @return array
     */
    public function getTopicNames()
    {
        $topicNames = [];
        foreach ($this->topicList as $topic) {
            $topicNames[] = $topic['topicName'];
        }
        return $topicNames;
    }
}
