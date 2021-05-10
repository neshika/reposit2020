<?php
//подключение файлов
require_once(__DIR__ . '/libs/up.php');
require_once(__DIR__ . '/includes/func.php');

     
?>
<style>
    .border{
        -webkit-box-shadow: 5px 5px 15px 5px #000000, 5px 5px 15px 5px #000000; 
        box-shadow: 5px 5px 15px 5px #000000, 5px 5px 15px 5px #000000;
    }
    .border2{
        padding: 5px;
        margin: 25px;
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        border-radius: 15px;
        
    }
     .border_pic{
        padding: 10px;
        margin: 25px;
        width: 300px;
        height: 300px;
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        border-radius: 15px;
    .border_text{
        padding: 5px;
        margin: 25px;
        width: 800px;
        height: 500px;
        
        -webkit-box-shadow: 5px 5px 15px 5px #727272; 
        box-shadow: 5px 5px 15px 5px #727272;
        border-radius: 15px;
        
    }
    table{
        width: 100%;
        border-collapse:collapse;
        border-spacing:0
            
    }
    table, td, th{
        border: 1px solid #595959;
    }
    td, th{
        padding: 3px;
        width: 30px;
        height: 25px;
    }
    th{
        background-color: #7accee!important;
    }
    .stroka1{
        width: 800px;
    }
}


</style>    
<?php    
  if(!isset($_GET['id']) || !isset($_GET['owner'])){
     $id = $_SESSION['Dog'];
     $dog = new PrintDog();
     $owner = $dog->retOwner($id);
    // $owner = $_SESSION['owner'];
    }
    else{
        $id = $_GET['id'];
        $owner = $_GET['owner'];
    }
    
    
    
?>
<div class="border2">
<?php
   // echo $id . '<br>' . $owner;
    //$dog = new PrintDog();
    $new_dog = new GreateNewDog();
    $dna = new Dna();
    $dog = new PrintDog();
    $dna_id=$dog->retDnaId($id);
    
    
?>
   
<div class="table-responsive"><table>
       <tbody>
		<tr class="stroka1">
                    <td class="текст"><div class="border_text">
                        <button type="button" class="btn btn-dark">Есть <i class="fa fa-cutlery" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-dark">Пить <i class="fa fa-tint" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-dark">Чесать <i class="fa fa-bath" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-dark">Гулять <i class="fa fa-umbrella" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-dark">Спать <i class="fa fa-bed" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-dark">Растить <i class="fa fa-line-chart" aria-hidden="true"></i></button><br>
                        </div>
                        <br>Кличка: <strong> <?php echo $dog->retName($id) . " " . $dog->retKennel($id) . $dog->picSex($id);?></strong>
                                <hr>
                            


                       <li>Заводчик: <?php echo $dog->retBreeder($id);?></li>    
                       <li>Хозяин: <?php echo $owner;?></li>
                       <li>Происхождение: <?php echo $dog->retOrignText($id);?></li>
                       <li>Оценка: <?php echo $dog->retMarkText($id) ?></li>
                        <hr>
                       <li>ID собаки: <?php echo $id;?></li>

                       <li>пол: <?php echo $dna->retSexText($dna_id);?></li>
                       <li>Возраст: <?php echo $dog->retAgeText($id);?></li>
                       <li>Вязок: <?php echo $dog->retLitter($id);?></li>
                       <li>Щенков: <?php echo $dog->retPuppy($id);?></li>
                       <li>Состояние:  <?php echo $dog->retEstrusText($id);?></li>
                       <li>Голая/пуховая:  <?php echo $dna->retGolPooh($dna_id)?></li>
                       <li>Шокоген:  <?php echo $dna->retShocoGen($dna_id)?></li>
                       <a href="#" class="btn btn btn-dark" role="button" aria-pressed="true">Ссылка</a><br>
                      
                     </td>
			<td class="пусто"></td>
			<td class="картинка"><div class="border_pic"> <?php $dog->picLink($id, 220);?>
                            
                            </div><button type="button" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Добавки +Энергия"><i class="fa fa-leaf fa-2x" aria-hidden="true"></i><i class="fa fa-bolt" aria-hidden="true"></i>+</button>
                        <button type="button" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Спа уход +Счастье" ><i class="fa fa-umbrella fa-2x" aria-hidden="true"></i> <i class="fa fa-certificate" aria-hidden="true"></i>+</button>
                        <button type="button" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Ветеринар +Здоровье"><i class="fa fa-medkit fa-2x" aria-hidden="true"></i> <i class="fa fa-heart" aria-hidden="true"></i>+</button>
                        <button type="button" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Тренировка -Энергия+Счастье"><i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i> <i class="fa fa-bolt" aria-hidden="true"></i>-<i class="fa fa-certificate" aria-hidden="true"></i>+</button>
                        <br></td>
                             
		</tr>
		<tr class="stroka2">
			<td class="пусто"></td>
			<td class="статус бары" colspan="2">
                <li>Генетический код: <?php echo $dna->retDna($dna_id);?></li>
                      
                             <table width="100%">
                                <tbody>
                                    <tr>
                                            <td><i class="fa fa-tachometer" aria-hidden="true"></i> Энергия</td>

                                            <td width="66%"><div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $dog->retVitality($id) . '%';?>" aria-valuenow="75" aria-valuemin="0"                                                      aria-valuemax="100"><?php echo $dog->retVitality($id);?></div>
                                            </div></td>
                                            
                                    </tr>
                                    <tr>
                                            <td><i class="fa fa-sun-o" aria-hidden="true"></i> Счастье</td>
                                            <td><div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $dog->retJoy($id) . '%';?>" aria-valuenow="75" aria-valuemin="0"                                                      aria-valuemax="100"><?php echo $dog->retJoy($id);?></div>
                                          </div></td>
                                          
                                    </tr>
                                     <tr>
                                            <td><i class="fa fa-heartbeat" aria-hidden="true"></i> Здоровье</td>
                                            <td><div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $dog->retHP($id) . '%';?>" aria-valuenow="75" aria-valuemin="0"                                                      aria-valuemax="100"><?php echo $dog->retHp($id);?></div>
                                          </div></td>
                                            
                                    </tr>
                                </tbody>
                        </table>   
                        </td>
		</tr>
	</tbody>
</table></div>
</div>    
<?php 
require_once(__DIR__ . '/html/footer.html');    
 