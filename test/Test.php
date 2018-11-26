<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 22.11.2018
 * Time: 11:05
 */

use PHPUnit\Framework\TestCase;
include "../index.php";

$testText = "Lorem ipsum (050)66-57-777 lorem ispud (050)66 57 777 fbfd s sdv +380 44 122 12 21
  loremsada +38050 dsdasd 3455 (044)122 12 21, 
  ffdfsdf: = +380(44)1221221, sdasdas: +380(44)12-21-221. Tel: 0676411212. 
  050 651 52 35 csdcsdcs +38 02356 2-32-31";

$testTextIP = "Адреса для внутреннего использования:
127.0.0.0/8 — используется для коммуникаций внутри хоста (см. localhost).
блок с 169.254.1.0 по 169.254.254.255 (подсеть 169.254.0.0/16 за исключением подсетей 169.254.0.0/24 и 169.254.255.0/24) — используется для автоматической настройки сетевого интерфейса в случае отсутствия DHCP (см. link-local).
Полный список описания сетей для IPv4 представлен в RFC 6890.";

class getPhoneFromTextTest extends TestCase
    /*Phone number formats:
    1.first (050)66-57-777
    2.second (050)66 57 777
    3.third +380 44 122 12 21
    4.fourth +380(44)1221221
    5.fifth +380(44)12-21-221
    6.sixth 0676411212
    7.seventh 050 651 52 35
    8. eighth +38 02356 2-32-31
    */
{
    public function testFirstNum(){
        $testNum = "(050)66-57-777";
        $numbersArr=getPhoneFromText($GLOBALS["testText"]);
        for ($i=0;$i<count($numbersArr);$i++){
            if (trim($numbersArr[$i])===$testNum){
                $this->assertSame($testNum,trim($numbersArr[$i]));
            }
        }
    }
    public function testSecondNum(){
        $testNum = "(050)66 57 777";
        $numbersArr=getPhoneFromText($GLOBALS["testText"]);
        for ($i=0;$i<count($numbersArr);$i++){
            if (trim($numbersArr[$i])===$testNum){
                $this->assertSame($testNum,trim($numbersArr[$i]));
            }
        }
    }
    public function testThirdNum(){
        $testNum = "+380 44 122 12 21";
        $numbersArr=getPhoneFromText($GLOBALS["testText"]);
        for ($i=0;$i<count($numbersArr);$i++){
            if (trim($numbersArr[$i])===$testNum){
                $this->assertSame($testNum,trim($numbersArr[$i]));
            }
        }
    }
    public function testFourthNum(){
        $testNum = "+380(44)1221221";
        $numbersArr=getPhoneFromText($GLOBALS["testText"]);
        for ($i=0;$i<count($numbersArr);$i++){
            if (trim($numbersArr[$i])===$testNum){
                $this->assertSame($testNum,trim($numbersArr[$i]));
            }
        }
    }
    public function testFifthNum(){
        $testNum = "+380(44)12-21-221";
        $numbersArr=getPhoneFromText($GLOBALS["testText"]);
        for ($i=0;$i<count($numbersArr);$i++){
            if (trim($numbersArr[$i])===$testNum){
                $this->assertSame($testNum,trim($numbersArr[$i]));
            }
        }
    }
    public function testSixthNum(){
        $testNum = "0676411212";
        $numbersArr=getPhoneFromText($GLOBALS["testText"]);
        for ($i=0;$i<count($numbersArr);$i++){
            if (trim($numbersArr[$i])===$testNum){
                $this->assertSame($testNum,trim($numbersArr[$i]));
            }
        }
    }
    public function testSeventhNum(){
        $testNum = "050 651 52 35";
        $numbersArr=getPhoneFromText($GLOBALS["testText"]);
        for ($i=0;$i<count($numbersArr);$i++){
            if (trim($numbersArr[$i])===$testNum){
                $this->assertSame($testNum,trim($numbersArr[$i]));
            }
        }
    }
    public function testEighthNum(){
        $testNum = "+38 02356 2-32-31";
        $numbersArr=getPhoneFromText($GLOBALS["testText"]);
        for ($i=0;$i<count($numbersArr);$i++){
            if (trim($numbersArr[$i])===$testNum){
                $this->assertSame($testNum,trim($numbersArr[$i]));
            }
        }
    }
}

class getIpFromTextTest extends TestCase{

    public function testSimpleIp(){
        $testNum = "169.254.1.0";
        $ipArr=getIPAdressFromText($GLOBALS["testTextIP"]);
        for ($i=0;$i<count($ipArr);$i++){
            if (trim($ipArr[$i])===$testNum){
                $this->assertSame($testNum,trim($ipArr[$i]));
            }
        }
    }

    public function testSimpleIpWMask(){
        $testNum = "127.0.0.0/8";
        $ipArr=getIPAdressFromText($GLOBALS["testTextIP"]);
        for ($i=0;$i<count($ipArr);$i++){
            if (trim($ipArr[$i])===$testNum){
                $this->assertSame($testNum,trim($ipArr[$i]));
            }
        }
    }

}
