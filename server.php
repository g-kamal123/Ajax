<?php
$arr = array();
include 'config.php';
if(isset($_POST['info'])){
    $a= $_POST['info'];
    array_push($arr,$a);
    $b=array_count_values($arr);
    foreach($products as $val){
        foreach($b as $key=> $count){
        if($a==$val['name']&& $key==$val['name']){
            echo "<tr>";
            echo "<td style='text-align:center;'>".$val['name']."</td>";
            echo "<td style='text-align:center;'>".$val['price']."</td>";
            echo "<td style='text-align:center;'><img src =".$val['img']." width='30px' height='30px'></td>";
            echo "<td style='text-align:center;'>".$count."</td>";
            echo "<td style='text-align:center;'><button class='btn'>delete</button></td>";
            echo  "</tr>";
        }
        }
    }
 
}
?>