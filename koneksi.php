<?php
//Connect database
$koneksi = mysqli_connect('10.0.0.60', 'fariz', 'Fariz123!', 'simp', 3306);

//Check connection
if(!$koneksi){
    echo 'Connection error: '. mysqli_connect_error();
}
?>