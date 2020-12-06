<?php
return array(
	//'配置项'=>'配置值'
	    // 是否开启令牌验证  
    'TOKEN_ON' => false,   
    // 令牌验证的表单隐藏字段名称  
    'TOKEN_NAME' => '__hash__',  
    //令牌哈希验证规则 默认为MD5  
    'TOKEN_TYPE' => 'md5',  
    //令牌验证出错后是否重置令牌 默认为true  
    'TOKEN_RESET' => true,
    'DB_FIELDTYPE_CHECK' => true
);