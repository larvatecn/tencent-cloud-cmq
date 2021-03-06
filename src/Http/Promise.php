<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace TencentCloudCMQ\Http;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Exception\TransferException;
use Psr\Http\Message\ResponseInterface;
use TencentCloudCMQ\Exception\CMQException;

/**
 * Class Promise
 * @package TencentCloudCMQ\Http
 */
class Promise
{
    /**
     * @var BaseResponse
     */
    private $response;

    /**
     * @var PromiseInterface
     */
    private $promise;

    /**
     * Promise constructor.
     * @param PromiseInterface $promise
     * @param BaseResponse $response
     */
    public function __construct(PromiseInterface &$promise, BaseResponse &$response)
    {
        $this->promise = $promise;
        $this->response = $response;
    }

    /**
     * @return bool
     */
    public function isCompleted()
    {
        return $this->promise->getState() != 'pending';
    }

    /**
     * @return BaseResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    public function wait()
    {
        try {
            $res = $this->promise->wait();
            if ($res instanceof ResponseInterface) {
                $this->response->unwrapResponse($res);
            }
        } catch (TransferException $e) {
            $message = $e->getMessage();
            if ($e->hasResponse()) {
                $message = $e->getResponse()->getBody();
            }
            throw new CMQException($message, $e->getCode());
        }
        return $this->response;
    }
}
