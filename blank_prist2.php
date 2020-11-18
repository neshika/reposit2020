<?php 
require "db.php";
require "includes/functions.php";

?>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<link rel="stylesheet" href="/css/radio.css" type="text/css" />
<form action="rand_dog.php" method="POST">
<button type="submit" class="knopka" name="rand">назад</button>
 </form>
 <form action="index.php" method="POST">
    <button type="submit" class="knopka" name="singup">Войти</button>
    </form>

<img src="<?php echo do_url($_SESSION['url'])?>"><br>
<img src="<?php echo do_url($_SESSION['url2'])?>"><br>

 
<?php

$data = $_POST;
debug($data);

if (isset ($data['do_sighup'])){  //если кнопка нажата
  //регистрируем
  $errors = array();    //массив ошибки в него помещает название ошибок
  if(''==trim($data['login'])){ //TRIM убирает все пробелы Если логин пустой
    $errors [] = 'поле логина не заполнено';
  }
  if(''==trim($data['kennel'])){  //TRIM убирает все пробелы Если питомник пустой
    $errors [] = 'название питомника не заполнено';
  }
  if(''==($data['password'])){  // Если Пароль пустой   ПАРОЛЬ НЕ ТРИМАЕМ
    $errors [] = 'поле  password не заполнено';
  }
  if($data['password2']!= $data['password']){ // Проверка на второй пароль.
    $errors [] = 'пароли не совпадают';
  }
  if(''==trim($data['email'])){ //TRIM убирает все пробелы Если почта пустая
    $errors [] = 'не введена почта';
  }
    //проверка есть ли такой же пользователь
  
  if(R::count('users', "login = ?", array($data['login']))>0){
    $errors [] = 'такой логин уже есть';
  }
  if(R::count('users', "email = ?", array($data['email']))>0){
    $errors [] = 'уже есть такая почта';
  }
  if(R::count('users', "kennel = ?", array($data['kennel']))>0){
    $errors [] = 'такой питомник уже есть';
  }
  if (empty($errors)){
    //все хорошо, регистрируем 
    /*  создаем базу через REdBeen*/
    echo "<br>создаем пользователя";
    $user = R::dispense('users');
    $user->login = $data ['login'];
    $user->email = $data ['email'];
    $user->kennel = $data ['kennel'];
    $user->f_time = date('d.m.Y');
    $user->password = password_hash($data ['password'], PASSWORD_DEFAULT); //зашифровываем пароль
    R::store ($user);
   
        echo "<br>создаем питомник";         
        $ken = R::dispense('kennels');
        $ken->name_k = $data ['kennel'];
        $ken->owner_k = $data ['login'];
        $ken->date = date('d.m.Y');
        $ken->email = $data ['email'];
        $ken->dogs = '2';
        R::store ($ken);
       
        echo "<br>вносим генетический код"; //randodna
        
//создаем первую собаку        
 $arr [] = ret_Row(1, 'randodna');            
//debug($arr);
$dog = R::dispense('randodna');
$dog->hr = $arr[0]['hr'];
$dog->ww = $arr[0]['ww'];
$dog->ff = $arr[0]['ff'];
$dog->bb = $arr[0]['bb'];
$dog->tt = $arr[0]['tt'];
$dog->mm = $arr[0]['mm'];
$dog->sex = $arr[0]['sex'];
$dog->lucky = $arr[0]['lucky'];
$dog->spd = $arr[0]['spd'];
$dog->agl = $arr[0]['agl'];
$dog->tch = $arr[0]['tch'];
$dog->jmp = $arr[0]['jmp'];
$dog->nuh = $arr[0]['nuh'];
$dog->fnd = $arr[0]['fnd'];
$dog->mut = $arr[0]['mut'];
$dog->dna = $arr[0]['dna'];
$dog->about = $arr[0]['about'];
 echo R::store($dog);
 
 //создаем вторую собаку
$arr2 [] = ret_Row(2, 'randodna');            
//debug($arr);
$dog2 = R::dispense('randodna');
$dog2->hr = $arr2[0]['hr'];
$dog2->ww = $arr2[0]['ww'];
$dog2->ff = $arr2[0]['ff'];
$dog2->bb = $arr2[0]['bb'];
$dog2->tt = $arr2[0]['tt'];
$dog2->mm = $arr2[0]['mm'];
$dog2->sex = $arr2[0]['sex'];
$dog2->lucky = $arr2[0]['lucky'];
$dog2->spd = $arr2[0]['spd'];
$dog2->agl = $arr2[0]['agl'];
$dog2->tch = $arr2[0]['tch'];
$dog2->jmp = $arr2[0]['jmp'];
$dog2->nuh = $arr2[0]['nuh'];
$dog2->fnd = $arr2[0]['fnd'];
$dog2->mut = $arr2[0]['mut'];
$dog2->dna = $arr2[0]['dna'];
$dog2->about = $arr2[0]['about'];
echo R::store($dog2);
     echo "<br>создаем собак:";
     
     $dogs = R::dispense('animals');
     $dogs->name='Без имени';
     $dogs->race='КХС';
     $dogs->origin='1';
     $dogs->breeder='не известен';
     $dogs->owner=$data ['login'];
     $dogs->kennel=$data ['kennel'];
     echo R::store($dogs);
       

    echo '<div style="color:green;">Добро пожаловать, все успешно!</div>';  
    $_SESSION['logged_user']->login=$data['login'];
   
  
 

  } else{
                         
      //echo '<div id="okno">' . array_shift($errors) . '<a href="#" class="close">Закрыть окно</a></div>';
                            echo array_shift($errors) ;
               
  }
}


