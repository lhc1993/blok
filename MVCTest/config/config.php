<?php
/**
 * Created by PhpStorm
 * Author: sandmliu
 * Date: 2020/3/22
 * Time: 23:23
 */


// 数据库配置
#$config['db']['host'] = '192.168.1.128';
$config['db']['host'] = 'localhost';
$config['db']['username'] = 'root';
$config['db']['password'] = '123456';
$config['db']['dbname'] = 'project';

// 默认控制器和操作名
$config['defaultController'] = 'Item';
$config['defaultAction'] = 'index';

return $config;