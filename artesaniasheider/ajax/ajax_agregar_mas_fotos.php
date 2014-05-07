<?php

require_once("../clases/beans/beans_fotos.php");

$targetFolder = '/fotos';
$verifyToken = md5('unique_salt' . $_POST['timestamp']);
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	$fileTypes = array('JPG','jpg','jpeg','JPEG','gif','GIF','png','PNG'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
        $obj_fot	=	new beans_fotos();
        
        $sql_con	=	$obj_fot->agregarFoto($_POST['post_id'], '../fotos/'.$_FILES['Filedata']['name'],0);
        if(is_numeric($sql_con['out_id'])){
           echo 'OK';
        }else{
            var_dump($sql_con);
        }	
	} else {
		echo 'Tipo de dato invalido';
	}
} 

?>