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
        $scence_id=$_GET['scenceId'];

        TPL::output('pop/szu');
    }

    public function submit_action()
    {
        require_once("system/alipay/alipay_submit.class.php");
        require_once('system/HttpClient.class.php');

        $alipay_id=$_POST['alipayid'];

        if($alipay_id){
            $key = '6E73E4BA89BA4F58A65BF644D69CA6E2';
            $par = array('alipayId' => $alipay_id, 'spm' => 'a.szu.dm', 'source' => 'weixin.dm', 'ts' => time());
            $sort_par=argSort($par);
            $par_link=createLinkstring($sort_par);
            $token=md5Sign($par_link,$key);
            $pageContents = HttpClient::quickPost('http://test.diandianzhe.com/zhe/remote/api/reg_account_ajax.htm',$par_link.'&_token='.$token);
//            $pageContents = HttpClient::quickPost('http://diandianzhe.com/zhe/remote/api/reg_account_ajax.htm',$par_link.'&_token='.$token);

            $data=json_decode($pageContents,true);
            echo($data['json']['code']);
        }else{
            echo('error');
        }


        //echo $pageContents;
       //echo "http://test.diandianzhe.com/zhe/remote/api/reg_account_ajax.htm?".$par_link.'&_token='.$token;

    }

    public function test_action()
    {
        require_once("system/alipay/alipay_submit.class.php");
        require_once('system/HttpClient.class.php');

        $key = '6E73E4BA89BA4F58A65BF644D69CA6E2';
        $par = array('alipayId' => 'bbcc@ddz.com', 'spm' => 'a.szu.dm', 'source' => 'weixin.dm', 'ts' => time());
        $sort_par=argSort($par);
        $par_link=createLinkstring($sort_par);
        $token=md5Sign($par_link,$key);
        $pageContents = HttpClient::quickPost('http://test.diandianzhe.com/zhe/remote/api/reg_account_ajax.htm',$par_link.'&_token='.$token);
        $data=json_decode($pageContents,true);
//        echo($data['json']['code']);
        echo $pageContents;


    }


    public function mn_action(){
        $json='{"json":{"code":"success","success":true}}';
        $data=json_decode($json,true);
        echo($data['json']['success']);
    }


}