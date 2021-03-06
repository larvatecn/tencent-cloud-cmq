# tencent-cloud-cmq

这个SDK和阿里云的MNS通用，直接可切换,
支持 同步 异步模式。

[![Build Status](https://travis-ci.org/larva/tencent-cloud-cmq.svg?branch=master)](https://travis-ci.org/larva/tencent-cloud-cmq)
[![License](https://poser.pugx.org/larva/tencent-cloud-cmq/license.svg)](https://packagist.org/packages/larva/tencent-cloud-cmq)
[![Latest Stable Version](https://poser.pugx.org/larva/tencent-cloud-cmq/v/stable.png)](https://packagist.org/packages/larva/tencent-cloud-cmq)
[![Total Downloads](https://poser.pugx.org/larva/tencent-cloud-cmq/downloads.png)](https://packagist.org/packages/larva/tencent-cloud-cmq)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require larva/tencent-cloud-cmq -vv
```

or add

```
"larva/tencent-cloud-cmq ": "~1.0"
```

to the require section of your `composer.json` file.

## Use

```php
use TencentCloudCMQ\Client;

$client = new Client('https://cmq-queue-bj.api.qcloud.com','abcdedgasdf','abcdedgasdf');
$request = new \TencentCloudCMQ\Requests\ListTopicRequest();
try {
    $response = $client->listTopic($request);
    print_r($response);
} catch (Exception $e) {
    print_r($e->getMessage());
}
```

## For Laravel

[larva/laravel-queue-tencent-cloud-cmq](https://github.com/larvatech/laravel-queue-tencent-cloud-cmq)

