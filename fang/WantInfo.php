<?php
class WantInfo
{
    public static $WantList;
    public static function getWantInfo($con){

        if(!self::$WantList){
            $ret=array();
            $sql = "select id,r_s from r_s";
            $result = mysqli_query($con, $sql);
            $html='';
            while($data=mysqli_fetch_array($result))
            {
                $ret[$data["id"]]=$data["r_s"];
            }
            self::$WantList = $ret;
        }
        return  self::$WantList ;
    }
}

