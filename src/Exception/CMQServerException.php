<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Exception;


class CMQServerException extends CMQException
{
    public $requestId;

    public function __construct($message, $requestId, $code = -1, $data = [])
    {
        parent::__construct($message, $code, $data);
        $this->requestId = $requestId;
    }

    public function __toString()
    {
        return "CMQServerException  " . $this->getinfo() . ", RequestID:" . $this->requestId;
    }
}
