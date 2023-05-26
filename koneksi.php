<?php
//Connect database
$koneksi = mysqli_connect('localhost', 'root', '', 'simp');

//Check connection
if(!$koneksi){
    echo 'Connection error: '. mysqli_connect_error();
}
?>