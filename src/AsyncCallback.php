<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ;

use TencentCloudCMQ\Exception\CMQException;
use TencentCloudCMQ\Http\BaseResponse;

/**
 * Class AsyncCallback
 * @package TencentCloudCMQ
 */
class AsyncCallback
{

    /**
     * @var callable
     */
    protected $succeedCallback;

    /**
     * @var callable
     */
    protected $failedCallback;

    /**
     * AsyncCallback constructor.
     * @param callable $succeedCallback
     * @param callable $failedCallback
     */
    public function __construct(callable $succeedCallback, callable $failedCallback)
    {
        $this->succeedCallback = $succeedCallback;
        $this->failedCallback = $failedCallback;
    }

    /**
     * @param BaseResponse $result
     * @return mixed
     */
    public function onSucceed(BaseResponse $result)
    {
        return call_user_func($this->succeedCallback, $result);
    }

    /**
     * @param CMQException $e
     * @return mixed
     */
    public function onFailed(CMQException $e)
    {
        return call_user_func($this->failedCallback, $e);
    }
}
