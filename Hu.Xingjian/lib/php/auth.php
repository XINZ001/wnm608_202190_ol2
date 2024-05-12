<?php
function MYSQLIAuth(){
	return [
		"localhost",
		"Xingjian_Hu",
		"huzi.AJIAN1313",
		"xingjian_hu_wnm_608"
	];
}

function PDOAuth(){
	return [
		"mysql:host=localhost;dbname=xingjian_hu_wnm_608",
		"Xingjian_Hu",
		"huzi.AJIAN1313",
		[PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"]
	];
}




?>