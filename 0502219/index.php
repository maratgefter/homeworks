<pre>
<?php
$arr = array(2, 1, 5, 6, 4,);
//пользовательская функция суммирования
function my_sum ($arr) {
    $sum = 0;
    for($i=0; $i < count($arr); $i++){
        $sum = $sum + $arr[$i];
    }
    return $sum;
}
$start1 = microtime(1);
for ($j = 0; $j < 1000000; $j++) {
    my_sum($arr);
}
$end1 = microtime(1);
$time1= $end1 - $start1;
$sum1 = my_sum($arr);
//завершение пользовательской функции суммирования

//array_sum начало
$start2 = microtime(1);
for ($i = 0; $i < 1000000; $i++) {
$d = array_sum($arr);
}
$end2 = microtime(1);
$time2= $end2 - $start2;
$more1 = $time1/$time2;
//array_sum завершение

//пользовательская функция вычисления произведения элементов массива
function my_composition ($arr) {
    $com = 1;
    for($i=0; $i < count($arr); $i++){
        $com = $com * $arr[$i];
    }
    return $com;
}
$start3 = microtime(1);
for ($j = 0; $j < 1000000; $j++) {
    my_composition($arr);
}
$end3 = microtime(1);
$time3= $end3 - $start3;
$pro1 = my_composition($arr);
//завершение пользовательской функции вычисления произведения элементов массива

//array_product начало
$start4 = microtime(1);
for ($i = 0; $i < 1000000; $i++) {
$p = array_product($arr);
}
$end4 = microtime(1);
$time4= $end4 - $start4;
$more2 = $time3/$time4;
//array_product завершение

//пользовательская функция проверки наличия элемента
function my_in ($q, $arr) {
    for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] == $q) {
                return 1;
        }
    }
}
$start5 = microtime(1);
for ($j = 0; $j < 1000000; $j++) {
    my_in(5,$arr);
}
$end5 = microtime(1);
$time5= $end5 - $start5;
$search = my_in(5,$arr);
//завершение пользовательской функции проверки наличия элемента

//функция in_array
$start6 = microtime(1);
for ($i = 0; $i < 1000000; $i++) {
$q = in_array(5, $arr);
}
$end6 = microtime(1);
$time6= $end6 - $start6;
$more3 = $time5/$time6;
//функция in_array завершение

//пользовательская функция вывода массива в обратном порядке
$start7 = microtime(1);
    function my_rev($arr) {
        for ($i = count($arr) - 1; $i >= 0; $i--) {
            $arr1[] = $arr[$i];
        }
        return $arr1;
    }
    $arr3 = my_rev($arr);
    for ($i = 0; $i < 1000000; $i++) {
        my_rev($arr);
    }
    $end7 = microtime(1);
    $time7 = $end7 - $start7;
    $back = my_rev($arr);
//завершение пользовательской функция вывода массива в обратном порядке

//функция array_reverse
$start8 = microtime(1);
for ($i = 0; $i < 1000000; $i++) {
$revese = array_reverse($arr);
}
$end8 = microtime(1);
$time8= $end8 - $start8;
$more4 = $time7/$time8;
//завершение функции array_reverse

//пользовательская функция поиска
$start9 = microtime(1);
    function my_search ($v, $array) {
        foreach ($array as $k => $i) {
            if ($i == $v) {
                return $k;
            }
        }
    }
    for ($i = 0; $i < 1000000; $i++) {
        my_search(5, $arr);
    }
    $end9 = microtime(1);
    $time9 = $end9 - $start9;
    $sea12 = my_search(5, $arr);
//завершение пользовательской функции поиска

//array_search
$start10 = microtime(1);
for ($i = 0; $i < 1000000; $i++) {
$sea11 = array_search(5, $arr);
}
$end10 = microtime(1);
$time10= $end10 - $start10;
$more5 = $time9/$time10;
//завершение array_search

//пользовательская функция вывода ключей
$time_start11 = microtime(1);
function my_keys ($arr) {
        foreach ($arr as $k => $v) {
            $arr4[] = $k;
            }
        return $arr4;
        }   
for ($i = 0; $i < 1000000; $i++) {
    my_keys($arr);
}
$time_end11 = microtime(1);
$time11 = $time_end11 - $time_start11;
$key5 = my_keys($arr);
//завершение пользовательская функция вывода ключей

//array_keys
$start12 = microtime(1);
for ($i = 0; $i < 1000000; $i++) {
$key6 = array_keys($arr);
}
$end12 = microtime(1);
$time12= $end12 - $start12;
$more6 = $time11/$time12;
//завершение array_keys

//проверка присутствия в массиве ключа или индекса
$start13 = microtime(1);
function my_keys_ex ($z, $arr) {
    foreach ($arr as $k => $v) {
        if ($k == $z){
            return 1;
        }
    }
}   
for ($i = 0; $i < 1000000; $i++) {
    my_keys_ex(4,$arr);
}
$end13 = microtime(1);
$time13 = $end13 - $start13;
$index1 = my_keys_ex(4,$arr);
//завершение проверки присутствия в массиве ключа или индекса

//array_key_exists
$start14 = microtime(1);
for ($i = 0; $i < 1000000; $i++) {
$index2 = array_key_exists(4, $arr);
}
$end14 = microtime(1);
$time14= $end14 - $start14;
$more7 = $time13/$time14;
//завершение array_key_exists

//пользовательская функция аналог array_flip
$time_start15 = microtime(1);
function my_array_flip ($arr) {
    foreach ($arr as $k => $v) {
        $arr5[$v] = $k;
    }
    return $arr5;
}   
for ($i = 0; $i < 1000000; $i++) {
    my_array_flip($arr);
}
$time_end15 = microtime(1);
$time15 = $time_end15 - $time_start15;
$flip1 = my_array_flip($arr);
//завершение пользовательской функции аналога array_flip

//array_flip
$start16 = microtime(1);
for ($i = 0; $i < 1000000; $i++) {
$flip2 = array_flip($arr);
}
$end16 = microtime(1);
$time16= $end16 - $start16;
$more8 = $time15/$time16;
//завершение array_flip
include 'result.php';
?>
</pre>