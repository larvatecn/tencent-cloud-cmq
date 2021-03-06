<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Http;

use Psr\Http\Message\ResponseInterface;
use TencentCloudCMQ\Exception\CMQServerException;
use TencentCloudCMQ\Exception\CMQServerNetworkException;

/**
 * 响应基类
 * @package TencentCloudCMQ\Http
 */
abstract class BaseResponse
{
    /**
     * @var boolean
     */
    protected $succeed;

    /**
     * @var int
     */
    protected $code;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $requestId;

    /**
     * @var string
     */
    protected $codeDesc;

    /**
     * @var string
     */
    public $clientRequestId;

    /**
     * @var array
     */
    protected $_content = [];

    /**
     * 解析响应
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function unwrapResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() != 200) {
            throw new CMQServerNetworkException($response->getStatusCode(), $response->getHeaders(), $response->getBody()->getContents());
        }
        $content = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        if ($content['code'] == 0) {
            $this->succeed = true;
            foreach ($content as $name => $value) {
                if (property_exists($this, $name)) {
                    $this->{$name} = $value;
                } else {
                    $this->_content[$name] = $value;
                }
            }
        } else {
            $this->unwrapErrorResponse($content);
        }
    }

    /**
     * 解析错误的响应
     * @param array $content
     */
    public function unwrapErrorResponse($content)
    {
        $this->succeed = false;
        throw new CMQServerException($content['message'], $content['requestId'] ?? '', $content['code'], $content);
    }

    /**
     * @return boolean
     */
    public function isSucceed()
    {
        return $this->succeed;
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->_content;
    }
}
