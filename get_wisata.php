<?php 
	require 'functions.php';
	$wisata = query("SELECT * FROM menu_wisata"); 
    echo json_encode($wisata);
?>