<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Exception;

use RuntimeException;

/**
 * Class CmqException
 * @package TencentCloudCMQ\Exception
 */
class CMQException extends RuntimeException
{
    public $code;
    public $message;
    public $data;

    public function __construct($message, $code = -1, $data = [])
    {
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    public function __toString()
    {
        return "CMQException  " . $this->getInfo();
    }

    public function getInfo()
    {
        $info = ['code' => $this->code,
            'data' => json_encode($this->data),
            'message' => $this->message
        ];
        return json_encode($info);
    }
}
