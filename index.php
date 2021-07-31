<?php
$url = 'https://jsonplaceholder.typicode.com/users/2';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);

$json = json_decode($res);
//var_dump($json);
foreach ($json as $key => $item){

    if(gettype($item) === 'object'){
        foreach ($item as $k => $value){
            if(gettype($value) === 'object'){
                foreach ($value as $e => $el){
                    echo "<div>User ".$e." is " . $el ."</div>";
                }
            } else {
                echo "<div>User ".$k." is " . $value ."</div>";
            }
        }
    } else {
        echo "<div>User ".$key." is " . $item ."</div>";
    }
}

//function call($item, $key)
//{
//    return "<div>".$key." + " . "$item";
//}
//
//$suc = array_walk_recursive($json, 'call');
//
//var_dump($suc);
