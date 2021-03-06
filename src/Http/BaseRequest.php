<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Http;

/**
 * Class BaseRequest
 * @package TencentCloudCMQ\Http
 */
abstract class BaseRequest
{
    /**
     * Api参数
     * @var array
     */
    private $parameter = [];

    /**
     * BaseRequest constructor.
     * @param string $action
     */
    public function __construct($action)
    {
        $this->parameter['Action'] = ucfirst($action);
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->parameter['Action'];
    }

    /**
     * @param string $key
     * @param string|array $value
     */
    public function setParameter($key, $value)
    {
        $this->parameter[$key] = $value;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return array_filter($this->parameter);
    }
}
