<?php
$str = "Lorem ipsum (050)66-57-777 lorem ispud (050)66 57 777 fbfd s sdv +380 44 122 12 21
  loremsada +38050 dsdasd 3455 (044)122 12 21, 
  ffdfsdf: = +380(44)1221221, sdasdas: +380(44)12-21-221. Tel: 0676411212. 
  050 651 52 35 csdcsdcs +38 02356 2-32-31";

$strIP = "Адреса для внутреннего использования:
127.0.0.0/8 — используется для коммуникаций внутри хоста (см. localhost).
блок с 169.254.1.0 по 169.254.254.255 (подсеть 169.254.0.0/16 за исключением подсетей 169.254.0.0/24 и 169.254.255.0/24) — используется для автоматической настройки сетевого интерфейса в случае отсутствия DHCP (см. link-local).
Полный список описания сетей для IPv4 представлен в RFC 6890.";

function getPhoneFromText($str){
    $pattern = '/(([0])([1-9][0-9])(\s|)?([0-9](\-|\s|)){7})|((\+|\()\d{2,3}(\s|\)|)((\s|\(|)\d{2,5}(\)|\s))?)([0-9](\-|\s|)){5,7}/';
    preg_match_all($pattern,$str,$arr);
    return $arr[0];
}
function getIPAdressFromText($strIP){
    $pattern = '/(\d{1,3}\.){3}[0-255]((\/)\d{1,3})?/';
    preg_match_all($pattern,$strIP,$arr);
    return $arr[0];
}
print_r(getPhoneFromText($str));
echo "<br/>";
print_r(getIPAdressFromText($strIP));
