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
 * Class SendMessageResponse
 * @package TencentCloudCMQ\Responses
 */
class SendMessageResponse extends BaseResponse
{

    /**
     * @var string
     */
    public $msgId;

    /**
     * @var string
     */
    public $clientRequestId;

    /**
     * @return string
     */
    public function getMessageId()
    {
        return $this->msgId;
    }
}
