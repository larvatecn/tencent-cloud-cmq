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
 * Class ListQueueResponse
 * @package TencentCloudCMQ\Responses
 */
class ListQueueResponse extends BaseResponse
{
    /**
     * @var int
     */
    public $totalCount;

    /**
     * @var array
     */
    public $queueList;

    /**
     * 获取队列列表
     * @return array
     */
    public function getQueueList()
    {
        return $this->queueList;
    }

    /**
     * 获取队列Id
     * @return array
     */
    public function getQueueIds()
    {
        $queueIds = [];
        foreach ($this->queueList as $queue) {
            $queueIds[] = $queue['queueId'];
        }
        return $queueIds;
    }

    /**
     * 获取队列名称
     * @return array
     */
    public function getQueueNames()
    {
        $queueNames = [];
        foreach ($this->queueList as $queue) {
            $queueNames[] = $queue['queueName'];
        }
        return $queueNames;
    }
}
