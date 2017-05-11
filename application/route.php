<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
        'id'   => '\d+',
    ],
    // '[hello]'     => [
    //     ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
    //     ':name' => ['index/hello', ['method' => 'post']],
    // ],
    'contact/'           => 'index/contact/index',
    'contact/add'        => 'index/contact/add',
    'contact/update'     => 'index/contact/update',
    'contact/delete'     => 'index/contact/delete',
    'group/add'          => 'index/group/add',
    'group/delete'       => 'index/group/delete',
    'group/update'       => 'index/group/update',
    'group/read'         => 'index/group/read',
    'query/'             => 'index/query/index',
    'query/init'         => 'index/query/init',
    'query/execute'      => 'index/query/execute',

];
