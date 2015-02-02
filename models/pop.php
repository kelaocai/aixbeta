<?php
/*
+--------------------------------------------------------------------------
|   WeCenter [#RELEASE_VERSION#]
|   ========================================
|   by WeCenter Software
|   © 2011 - 2014 WeCenter. All Rights Reserved
|   http://www.wecenter.com
|   ========================================
|   Support: WeCenter@qq.com
|
+---------------------------------------------------------------------------
*/


if (!defined('IN_ANWSION'))
{
	die;
}

class pop_class extends AWS_MODEL
{
	public function get_recommond_list($flag)
	{
		return $this->fetch_all('ACCOUNT','REG_SPM="'.$flag.'"');
	}


}