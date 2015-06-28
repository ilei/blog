<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
    array(
        'name' => '首页',
        'href' => '/istratoradmin/admin/home/',
    ), 
    array(
        'name' => '菜单',
        'children' => array(
            array(
                'href' => '/istratoradmin/menu/index/',
                'name' => '列表',
            ),
            array(
                'href' => '/istratoradmin/menu/add/',
                'name' => '添加',
            ),
        )

    ), 
    array(
        'name' => '文章',
        'children' => array(
            array(
                'href' => '/istratoradmin/article/index/',
                'name' => '列表',
            ),
            array(
                'href' => '/istratoradmin/article/add/',
                'name' => '添加',
            ),
        )
    ), 
    array(
        'name' => '类别',
        'children' => array(
            array(
                'href' => '/istratoradmin/category/index/',
                'name' => '列表',
            ),
            array(
                'href' => '/istratoradmin/category/add/',
                'name' => '添加',
            ),
        )
    ), 


);
/* End of file auth.php */
/* Location: ./application/config/auth.php */
