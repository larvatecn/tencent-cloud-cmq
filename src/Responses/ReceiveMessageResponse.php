<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Responses;

use Psr\Http\Message\ResponseInterface;
use TencentCloudCMQ\Exception\CMQMessageNotExistException;
use TencentCloudCMQ\Exception\CMQServerException;
use TencentCloudCMQ\Exception\CMQServerNetworkException;
use TencentCloudCMQ\Http\BaseResponse;
use TencentCloudCMQ\Traits\MessagePropertiesForReceive;

/**
 * Class ReceiveMessageResponse
 * @package TencentCloudCMQ\Responses
 */
class ReceiveMessageResponse extends BaseResponse
{
    use MessagePropertiesForReceive;

    /**
     * 解析响应
     * @param ResponseInterface $response
     */
    public function unwrapResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() != 200) {
            throw new CMQServerNetworkException($response->getStatusCode(), $response->getHeaders(), $response->getBody()->getContents());
        }
        $content = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        if ($content['code'] != 0) {
            $this->succeed = false;
            if ($content['code'] == 7000) {
                throw new CMQMessageNotExistException($content['message'], $content['code'], $content);
            } else {
                throw new CMQServerException($content['message'], $content['requestId'] ?? '', $content['code'], $content);
            }
        }
        $this->succeed = true;
        foreach ($content as $name => $value) {
            if (property_exists($this, $name)) {
                $this->{$name} = $value;
            } else {
                $this->_content[$name] = $value;
            }
        }
    }
}
