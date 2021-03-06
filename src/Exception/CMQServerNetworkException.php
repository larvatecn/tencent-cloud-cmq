<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Exception;

/**
 * Class CMQServerNetworkException
 * @package TencentCloudCMQ\Exception
 */
class CMQServerNetworkException extends CMQException
{
    public $status;
    public $header;
    public $data;

    public function __construct($status = 200, $header = null, $data = "")
    {
        if ($header == null) {
            $header = [];
        }
        $this->status = $status;
        $this->header = $header;
        $this->data = $data;
    }

    public function __toString()
    {
        $info = [
            "status" => $this->status,
            "header" => json_encode($this->header),
            "data" => $this->data
        ];

        return "CMQServerNetworkException  " . json_encode($info);
    }
}
