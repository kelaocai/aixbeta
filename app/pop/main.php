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


if (!defined('IN_ANWSION')) {
    die;
}

class main extends AWS_CONTROLLER
{
    public function get_access_rule()
    {
        if ($this->user_info['permission']['visit_people'] AND $this->user_info['permission']['visit_site']) {
            $rule_action['rule_type'] = 'black';
        } else {
            $rule_action['rule_type'] = 'white';
        }

        return $rule_action;
    }

    public function index_action()
    {


        TPL::output('pop/szu');
    }

    public function test_action()
    {
        require_once("system/alipay/alipay_submit.class.php");
        require_once('system/HttpClient.class.php');

        $alipay_config['key'] = '';
        $key = '6E73E4BA89BA4F58A65BF644D69CA6E2';
        $par = array('alipayId' => 'test@111.com', 'spm' => 'a.szu.dm', 'source' => 'dm', 'ts' => time());
        $alipaySubmit = new AlipaySubmit($alipay_config);

//        echo $alipaySubmit->buildRequestPara($par);

        $par_link=createLinkstring($par);
        $token=md5Sign($par_link,$key);
        //echo $par_link.'&token='.$token;



       //$pageContents = HttpClient::quickPost('http://test.diandianzhe.com/zhe/remote/api/reg_account_ajax.htm',$par_link.'&_token='.$token);


        header("Content-type:application/json");

        //echo $pageContents;
       echo "http://test.diandianzhe.com/zhe/remote/api/reg_account_ajax.htm?".$par_link.'&_token='.$token;




    }


}