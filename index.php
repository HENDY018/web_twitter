<?php
	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'data-table':
				include "data-table.php";
				break;        
			case 'data-grafik':
				include "data-grafik.php";
				break;
		}
	}
	else
	{
	include "data-table.php";}
 
?>
