<?php

return array(
	'top' => array(
		'appkey' => '123456',
		'appsecret' => '1234567890',
		'api_url' => 'http://gw.api.taobao.com/router/rest',
		'container_url' => 'http://container.open.taobao.com/container',
		'login_url' => '',
		'callback_url' => 'http://www.xxx.com/api/taobao/callback',
		'taobaoke_nick' => 'nick',
	),

	'task' => array(
		'domain' => array(
			'result_filename' => '/tmp/task.domain.txt',
			'suffix' => array('.us'),
			'digital' => array(0, 0),
			'char' => array(2000, 5000),
		),
	),
);