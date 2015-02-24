<?php
/**
 * Created by PhpStorm.
 * User: Hasee
 * Date: 2015/2/24
 * Time: 16:12
 */

class UserInfo {
    public static  $UserList;//列表框的用法4-5
//    public static $WantList;

    public static function getUserInfo($con){   //列表框的用法5-5

        if(!self::$UserList){
            $ret=array();
            $sql ="select id,nickname from  user";
            $result = mysqli_query($con, $sql);
            $html='';
            while($data=mysqli_fetch_array($result))
            {
                $ret[$data["id"]]=$data["nickname"];

            }
            self::$UserList = $ret;
        }
        return  self::$UserList ;
    }

//    public static function getWantInfo($con){
//
//        if(!self::$WantList){
//            $ret=array();
//            $sql = "select id,r_b from r_b";
//            $result = mysqli_query($con, $sql);
//            $html='';
//            while($data=mysqli_fetch_array($result))
//            {
//                $ret[$data["id"]]=$data["r_b"];
//
//            }
//            self::$WantList = $ret;
//        }
//        return  self::$WantList ;
//    }



} 