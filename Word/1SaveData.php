<?php
	$ip = GetHostByName($_SERVER['SERVER_NAME']);//获取本机IP
	require_once("http://".$ip.":8080/JavaBridge/java/Java.inc");//此行必须 
	java_set_file_encoding("GBK");
	
	$doc = new Java("com.zhuozhengsoft.pageoffice.wordreader.WordDocumentPHP");
	$doc->load(file_get_contents("php://input"));
    $filename = dirname($_SERVER["SCRIPT_FILENAME"])."/doc/87.doc";
    touch($filename);
    // 首先我们要确定文件存在并且可写。
    if (is_writable($filename)) {

    // 在这个例子里，我们将使用添加模式打开$filename，
    // 因此，文件指针将会在文件的末尾，
    // 那就是当我们使用fwrite()的时候，$somecontent将要写入的地方。
    if (!$handle = fopen($filename, 'a')) {
        echo "不能打开文件 $filename";
        exit;
    }

    // 将$somecontent写入到我们打开的文件中。
    if (fwrite($handle, $doc->openDataRegion("PO_question")->getFileBytes()) === FALSE) {
        echo "不能写入到文件 $filename";
        exit;
    }

    echo "成功地将  写入到文件$filename";

    fclose($handle);

} else {
    echo "文件 $filename 不可写";
}
	$doc->showPage(500, 400);
	echo $doc->close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form id="form1">
			<div style="border: solid 1px gray;">
				<div class="errTopArea"
					style="text-align: left; border-bottom: solid 1px gray;">
					[提示标题：这是一个开发人员可自定义的对话框]
				</div>
				<div class="errTxtArea" style="height: 150px; text-align: left">
					<b class="txt_title">
						<div style="color: #FF0000;">
							提交的信息如下：
						</div> <?php echo $content;?> </b>
				</div>
				<div class="errBtmArea" style="text-align: center;">
					<input type="button" class="btnFn" value=" 关闭 "
						onclick="window.opener=null;window.open('','_self');window.close();" />
				</div>
			</div>
		</form>
	</body>
</html>