<?php
	$ip = GetHostByName($_SERVER['SERVER_NAME']);//获取本机IP
	require_once("http://".$ip.":8080/JavaBridge/java/Java.inc");//此行必须 
	java_set_file_encoding("GBK");
        $doc = new Java("com.zhuozhengsoft.pageoffice.wordreader.WordDocumentPHP");
        $doc->load(file_get_contents("php://input"));

        //获取通过Url传递过来的值
        $id = 0;
        $id = $_REQUEST["id"];
        $filepath=dirname($_SERVER["SCRIPT_FILENAME"])."/doc/".$id."/".date('Ymd',time());
        $content = "";
        $questionDoc = "question".date('YmdHis').rand(10000000,99999999);
        $answerDoc = "answer".date('YmdHis').rand(10000000,99999999);
        $jiexiDoc = "jiexi".date('YmdHis').rand(10000000,99999999);
        $questionFile = $filepath."/".$questionDoc.".doc";
        $answerFile = $filepath."/".$answerDoc.".doc";
        $jiexiFile = $filepath."/".$jiexiDoc.".doc";
        touch($questionFile);
        touch($answerFile);
        touch($jiexiFile);
        chmod($questionFile,0755);
        chmod($answerFile,0755);
        chmod($jiexiFile,0755);
        //题干存储
        if (!$handle = fopen($questionFile, 'a')) {
            $content .= "题干文件打不开！";
        } else {

            // 将$somecontent写入到我们打开的文件中。
            if (fwrite($handle, $doc->openDataRegion("PO_question")->getFileBytes()) === FALSE) {
                $content .= "不能写入到文件题干！";
            } else{
                $content .= "成功写入题干！";
                fclose($handle);

            }
        }
        //答案存储
        if (!$handle = fopen($answerFile, 'a')) {
            $content .= "答案文件打不开！";
        } else {
            // 将$somecontent写入到我们打开的文件中。
            if (fwrite($handle, $doc->openDataRegion("PO_answer")->getFileBytes()) === FALSE) {
                $content .= "不能写入到答案！";
            } else{
                $content .= "成功写入答案！";
                fclose($handle);

            }
        }
        //解析存储
        if (!$handle = fopen($jiexiFile, 'a')) {
            $content .= "解析文件打不开！";
        } else {
            // 将$somecontent写入到我们打开的文件中。
            if (fwrite($handle, $doc->openDataRegion("PO_jiexi")->getFileBytes()) === FALSE) {
                $content .= "不能写入到解析！";
            } else{
                $content .= "成功写入解析";
                fclose($handle);

            }
        }


        //$doc->showPage(500, 400);
        $doc->setCustomSaveResult($questionDoc."-".$answerDoc."-".$jiexiDoc);
        echo $doc->close();
/*$ch = curl_init("http://".$ip."/uteach/Word/FileMakerSingle.php?id=".$id."&type=question");
curl_exec($ch);
curl_close($ch);
$ch = curl_init("http://".$ip."/uteach/Word/FileMakerSingle.php?id=".$id."&type=answer");
curl_exec($ch);
curl_close($ch);
$ch = curl_init("http://".$ip."/uteach/Word/FileMakerSingle.php?id=".$id."&type=jiexi");
curl_exec($ch);
curl_close($ch);*/
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
					[上传成功]
				</div>
				<div class="errTxtArea" style="height: 150px; text-align: left">
					<b class="txt_title">
						<div style="color: #FF0000;">
							信息如下：
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