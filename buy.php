<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');

ini_set('display_errors',1);
error_reporting(E_ALL);
?>
<style>
   #dogs {
        -webkit-box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35); 
        box-shadow: 5px 5px 5px 0px #000000, inset 4px 4px 15px 0px #000000, 22px 9px 13px -5px rgba(0,0,0,0.35);
        margin: 0 auto 0 auto;
        padding: 10px;
        border: 10px;
}
</style>
<form method="POST" action="buydog.php">
    <table border="0" cellpadding="25" text-align="center">
        <caption><h1>Aктуальные предложения на сегодня:</h1><br></caption>
    <td><div id="dogs">
        <?php 
       $obj3 = new RandDog;
       $obj3->InsertData(3);
       $url=$obj3->retUrl(3); //рисуте URL
       //echo ' Url ' . $url;
       $obj3->dogPic($url);
       $url_pup=$obj3->retUrlPuppy(3);
      // echo " url_pup " . $url_pup;
       echo '<br>' . $obj3->dogPic($url_pup);
       echo $obj3->picSex(3);  //рисует пол собаки
       echo '  ' . $obj3->dogPrice(3); // проверка цены ........
        ?><button type="submit" class="knopka" name="buy1" >Купить</button></div></td>
    </td>
     <td><div id="dogs">
        <?php 
       $obj4 = new RandDog;
       $obj4->InsertData(4);
       $url4=$obj4->retUrl(4); //рисуте URL
       //echo ' Url ' . $url;
       $obj4->dogPic($url4);
       $url_pup4=$obj4->retUrlPuppy(4);
      // echo " url_pup " . $url_pup;
       echo '<br>' . $obj4->dogPic($url_pup4);
       echo $obj4->picSex(4);  //рисует пол собаки
       echo '  ' . $obj4->dogPrice(4); // проверка цены ........
        ?><button type="submit" class="knopka" name="buy2" >Купить</button></div></td>
    </td>
    <td><div id="dogs">
        <?php 
       $obj5 = new RandDog;
       $obj5->InsertData(5);
       $url5=$obj5->retUrl(5); //рисуте URL
       //echo ' Url ' . $url;
       $obj5->dogPic($url5);
       $url_pup5=$obj5->retUrlPuppy(5);
      // echo " url_pup " . $url_pup;
       echo '<br>' . $obj5->dogPic($url_pup5);
       echo $obj5->picSex(5);  //рисует пол собаки
       echo '  ' . $obj5->dogPrice(5); // проверка цены ........
        ?><button type="submit" class="knopka" name="buy3" >Купить</button></div></td>
    </td>
   
 </table>
</form>


    
