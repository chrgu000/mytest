<?php
//header("Content-type: text/html; charset=utf-8");
//1身份证;2.银行卡;3.姓名；4.支付宝；5.提现元宝; 6.游戏名字; vip0用户是不可以提现的;申请提现最低100元宝,扣除10%手续费;
//if(isset($_POST['idCard']) && $_POST['idCard'] != '' && isset($_POST['bankCard']) && $_POST['bankCard'] != ''
//&& isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['nickName']) && $_POST['nickName'] !='' && isset($_POST['alipay']) && $_POST['alipay'] != '' && isset($_POST['diamond']) && $_POST['diamond'] != ''){
//    $idCard = $_POST['idCard'];
//    $bankCard = $_POST['bankCard'];
//    $userName = $_POST['userName'];
//    $nickName = $_POST['nickName'];
//    $aliPay = $_POST['alipay'];
//    $diamond = $_POST['diamond'];
//
//}else{
//    echo json_encode(array('code'=>0,'msg'=>'请传入正确的请求参数'));
//}
$nickName = $_POST['nickName'];
//if(checkCash($nickName)){
    echo json_encode(array('code'=>1,'msg'=>'你可以提现'));
//}
die;
$idCard = '441624198912202311';
$bankCard = '7854454545454545';
$userName = '黄大仙';
//$nickName = 's1.我很美';
$aliPay = '273218496@qq.com';
$diamond = 500;





/**
 * 申请提现信息写入;
 * @param $nickName
 * @param $userName
 * @param $idCard
 * @param $bankCard
 * @param $aliPay
 * @param $diamond
 * @return int
 */
function tiXianInfo($nickName,$userName,$idCard,$bankCard,$aliPay,$diamond){
    $applyTime = date('Y-m-d H:i:s',time());
    $sql = 'INSERT INTO `uw_cash`(`nickName`,`userName`,`idCard`,`bankCard`,`alipay`,`diamond`,`isCash`,`applyTime`)
            VALUES("'.$nickName.'","'.$userName.'","'.$idCard.'","'.$bankCard.'","'.$aliPay.'","'.$diamond.'",0,"'.$applyTime.'")';
    $result = conectDb()->query($sql);
    if($result){
        return 1;
    }else{
        return 0;
    }
}


/**
 * 查询最近10天是否有提现记录;
 * @param $nickName 玩家角色名;
 * @return int bool
 *
 */
function checkCash($nickName){
    $sql = 'select `applyTime` from `uw_cash` where `nickName`= "'.$nickName.'" order by (`applyTime`) desc  limit 1 ';
    $result = conectDb()->query($sql);
    $getTime = $result->fetch_assoc();
    if($getTime){
        $applyTime = strtotime('+ 10 days', strtotime($getTime['applyTime']));
        $time = time();
        if($time > $applyTime){
            return 1;//可以提现;
        }else{
            return 0;//不可以提现;
        }
    }else{
        return 1;
    }
}


/** 查询提现玩家的元宝;
 * @param $nickName 玩家角色名;
 * @return mixed 返回元宝数;
 */
function checkDiamond($nickName){
    $sql = 'select `diamond` from `uw_user` where `nickName` = "'.$nickName.'"';
    $result = conectDb()->query($sql);
    $diamond = $result->fetch_assoc();
    if($diamond){
        return $diamond['diamond'];
    }
}

/**
 * 申请提现成功后，玩家角色元宝变更，即现在拥有的元宝 = 提现前的元宝 - 申请提现的元宝数量;
 * @param $nickName 玩家角色名;
 * @param $diamond 玩家提现元宝数；
 * @return int 返回值 bool true;
 */
function updateDiamond($nickName,$diamond){
    $bDiamond = checkDiamond($nickName);//提现前的元宝数量;
    $aDiamond = $bDiamond - $diamond;
    $sql = 'update `uw_user` set `diamond` = "'.$aDiamond.'" where `nickName` = "'.$nickName.'"';
    $result = conectDb()->query($sql);
    if($result){
        return 1;
    }
}

/**
 * 链接数据库操作;
 * @return mysqli
 */
function conectDb(){
    $dbhost = "127.0.0.1";
    $username = 'root';
    $password = 'root';
    $database = 'chuanqi_qingbiao';
    $db = new mysqli($dbhost,$username,$password,$database);
    return $db;
}