<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");

class WordController extends Controller
{
	public function index ()
	{
		$array=M('Epaper')->where(array('id'=>I('id')))->find();
		/* $test=M('Write')->where(array('id'=> array('in',$array['testid'])))->order('weight desc')->select();
		foreach ($test as $n=>$v){
			$test[$n]['test']=htmlspecialchars_decode($v['test']);
		} */
		$str=explode(',', trim($array['testid'], ","));
		foreach($str as $n =>$v){
			$test=M('write')->where(array('status'=>0,'id'=>$v))->find();
			$all[$n]=$test;
			$all[$n]['test']=htmlspecialchars_decode($test['test']);
		}
		$this->all = $all;
		$this->array = $array;
		$content = $this->fetch('word');
		$fileContent = wordMake($content);
		//echo $fileContent;
		//exit;
		$name = iconv("utf-8", "GBK", 'test');//转换好生成的word文件名编码
		$fp = fopen('Uploads/'.$name.".doc", 'w');//打开生成的文档
		fwrite($fp, $fileContent);//写入包保存文件
		fclose($fp);

		// $file_sub_path = $_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Uploads/';
		// echo $file = $file_sub_path . 'test.doc';

		$file =  'Uploads/test.doc';
		if(!file_exists($file)){ 
			echo "没有该文件文件"; 
			return ; 
		}

		$fp=fopen($file,"r"); 
		$file_size=filesize($file); 

		// header("Content-Type:   application/msword");
		Header("Content-type: application/octet-stream"); 
		Header("Accept-Ranges: bytes"); 
		Header("Accept-Length:".$file_size); 
		header("Content-Disposition:   attachment;   filename=test.doc"); //指定文件名称
		header("Pragma:   no-cache");
		header("Expires:   0");
		$buffer=1024; 
		$file_count=0; 
		while(!feof($fp) && $file_count<$file_size){ 
			$file_con=fread($fp,$buffer); 
			$file_count+=$buffer; 
			echo $file_con; 
		} 
		fclose($fp); 
	}
}