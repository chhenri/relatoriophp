<?php

include 'conexao.php';

$listarSQL = mysqli_query($connectionBD, "SELECT * FROM produtos");

?>