<?php

return array(
    'redis_conn_url'    => 'tcp://127.0.0.1:6379',
    'mo'    => array(
        'provider'  => 'SWISSCOM',
        'language'  => 'EN'
    ),
    'client'    => array(
        'log_file'  => 'data/log/client.log',
    ),
    'mt'    => array(        
        'url'       => 'http://127.0.0.1/work/hpro2/sms-inbound-mock/public/mt-server.php',
        'account'   => 'demo',
        'username'  => 'demo',
        'password'  => 'demo',
        'text'      => 'Hello there!',
        'price'     => 60
    )
);
