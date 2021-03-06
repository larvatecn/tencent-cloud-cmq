<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Exception;

class CMQMessageNotExistException extends CMQException
{
    public function __toString()
    {
        return "CMQMessageNotExistException  " . $this->getInfo();
    }
}
