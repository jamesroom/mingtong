<?php
class AddressInfo
{
    public static $AddressList;
    public static function getAddressInfo($con)
    {
        if (!self::$AddressList) {
            $ret = array();
            $sql = "select id,address from address";
            $result = mysqli_query($con, $sql);
            $html = '';
            while ($data = mysqli_fetch_array($result)) {
                $ret[$data["id"]] = $data["address"];
            }
            self::$AddressList = $ret;
        }
        return self::$AddressList;
    }
}
