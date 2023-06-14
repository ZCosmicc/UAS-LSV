<?php
//Connect database
$koneksi = mysqli_connect('150.136.247.113', 'fariz', 'Fariz123!', 'simp');

//Check connection
if(!$koneksi){
    echo 'Connection error: '. mysqli_connect_error();
}
?>