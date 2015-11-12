<?php
	$ip = GetHostByName($_SERVER['SERVER_NAME']);//获取本机IP
	require_once("http://".$ip.":8080/JavaBridge/java/Java.inc");//此行必须
	$fs = new Java("com.zhuozhengsoft.pageoffice.FileSaverPHP");//此行必须
    $fs->load(file_get_contents("php://input"));//此行必须
	
	java_set_file_encoding("GBK");//设置编码格式    
	
	$filepath=dirname($_SERVER["SCRIPT_FILENAME"]);

    $fs->saveToFile($filepath."/doc/9/20151028/question".$fs->getFileExtName());
    //$fs->saveToFile($filepath."/doc/qq2.doc"); //保存文件
    //$fs->saveToFile($filepath."/doc/qq2.html".$fs->getFileExtName() ); //保存文件
   // $fs->saveToFile($filepath."/doc/".$_SESSION['uid']."/".date('Ymd',time())."/answer.doc"); //保存文件
    //$fs->saveToFile($filepath."/doc/".$_SESSION['uid']."/".date('Ymd',time())."/jiexi.doc"); //保存文件
    echo $fs->close();//此行必须
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    
    <title></title>
    
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->

  </head>
  
  <body>
     <br>
  </body>
</html>
