<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Requests;


use TencentCloudCMQ\Http\BaseRequest;

class ListSubscriptionRequest extends BaseRequest
{
    /**
     * UnsubscribeRequest constructor.
     * @param string $topicName
     * @param $searchWord
     * @param $offset
     * @param $limit
     */
    public function __construct($topicName, $searchWord, $offset, $limit)
    {
        parent::__construct('ListSubscriptionByTopic');
        $this->setTopicName($topicName);
        if ($searchWord != null) $this->setSearchWord($searchWord);
        if ($offset != null) $this->setOffset($offset);
        if ($limit != null) $this->setLimit($limit);
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
     * 用于过滤队列列表，后台用模糊匹配的方式来返回符合条件的队列列表。如果不填该参数，默认返回帐号下的所有队列。
     * @param string $searchWord
     * @return BaseRequest
     */
    public function setSearchWord($searchWord)
    {
        $this->setParameter('searchWord', $searchWord);
        return $this;
    }

    /**
     * 分页时本页获取队列列表的起始位置。如果填写了该值，必须也要填写 limit 。该值缺省时，后台取默认值 0
     * @param string $offset
     * @return BaseRequest
     */
    public function setOffset($offset)
    {
        $this->setParameter('offset', $offset);
        return $this;
    }

    /**
     * 分页时本页获取队列的个数，如果不传递该参数，则该参数默认为 0，最大值为 0。
     * @param string $limit
     * @return BaseRequest
     */
    public function setLimit($limit)
    {
        $this->setParameter('limit', $limit);
        return $this;
    }
}
