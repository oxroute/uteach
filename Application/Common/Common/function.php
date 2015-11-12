<?php
function explodeStr0($str){
	if($str!=''){
		$arr=explode('|',$str);
		return $arr[0];
	}
}
function explodeStr1($str){
	if($str!=''){
		$arr=explode('|',$str);
		return $arr[1];
	}
}
function explodeStr2($str){
	if($str!=''){
		$arr=explode('|',$str);
		return $arr[2];
	}
}
function explodeStr3($str){
	if($str!=''){
		$arr=explode('|',$str);
		return $arr[3];
	}
}
function explodeStr4($str){
	if($str!=''){
		$arr=explode('|',$str);
		return $arr[4];
	}
}

function getKid($str){
	if($str!=''){
    	$kid=M('subject')->where(array('id'=>$str))->getField('name');
		return $kid;
	}
}

function getZid($str){
	if($str!=''){
		$kid=M('chapter')->where(array('id'=>$str))->getField('name');
		return $kid;
	}
}
function getFid($str){
	if($str!=''){
		$kid=M('category')->where(array('id'=>$str))->getField('name');
		return $kid;
	}
}
function getZsid($str){
	if($str!=''){
		$kid=M('knowledge')->where(array('id'=>$str))->getField('name');
		return $kid;
	}
}

function getNum($id, $fileid, $color = 'yellow'){
	$model = $color == 'yellow' ? M('Folder') : M('FolderTop');

	$file_num = 0;

	switch ($color) {
		case 'yellow':
			$where = array('pid' => $id, 'tid' => session('uid'), 'status' => 'Y');
			// $file_num = count(array_filter(explode(',', $fileid)));
			$file_num = M('Epaper')->where(array('pid' => $id, 'status' => 'Y', 'tid' => session('uid')))->count();
			break;
		case 'green':
			// $tids = M('Teacher')->where(array('sid' => session('schoolid')))->getField('id',true);
			$where = array('pid' => $id);
			$file_num = M('Epaper')->where(array('top_pid' => $id, 'status' => 'Y'))->count();
			break;
		default:
			$where = array('pid' => $id, 'tid' => session('uid'), 'status' => 'Y');
			break;
	}
	// dump($where);exit;
	// 获取目录个数
	$folder_num = $model->where($where)->count();

	// echo $file_num;
	return $folder_num + $file_num;
	// if($str!=''){
	// $num=explode(',', trim($str,','));

	// foreach($num as $n =>$v){
 //    		$fileId=M('Folder')->where(array('status'=>0,'id'=>$v))->getField('fileid');
 //    		$all[$n]=count(explode(',', $fileId,-1));
 //    }
 //  return $all ;
	// }


}

function dirs ($folderid = 0, $top_pid = 0)
{
	if ($folderid ===  '0' && $top_pid === '0') {
		return false;
	}

	if ($id =   I('get.pid', 0, 'intval')) {
		$model = M('Folder');
		$where = array('tid' => session('uid'), 'id' => $id);
		$map = array('tid' => session('uid'));
		$pid = 'pid';
		$action = 'zhujuanin';
	} else if ($top_id =  I('get.folder_top_id', 0, 'intval')) {
		$model = M('FolderTop');
		$where = array('id' => $top_id);
		$pid = 'folder_top_id';
		$action = 'folder_top';
		// $map = array('tid' => session('uid'));
	} else {
		// $eid = I('epaperId', 0, 'intval');
		if ($folderid) {
			$model = M('Folder');
			$where = array('tid' => session('uid'), 'id' => $folderid);
			$map = array('tid' => session('uid'));
			$pid = 'pid';
			$action = 'zhujuanin';
		}else if ($top_pid) {
			$model = M('FolderTop');
			$where = array('id' => $top_pid);
			$pid = 'folder_top_id';
			$action = 'folder_top';
		}
	}

	$row = $model->where($where)->find();
	$data = $model->where($map)->select();
	$arr = list_to_tree($data, $row['pid']);

	$row['level'] = 0;
	$arr[] = $row;

	$levels = array();
	foreach ($arr as $v) {
		$levels[] = $v['level'];
	}
	array_multisort($levels, SORT_DESC, $arr);

	$html = '<li class="grasj"></li>';
	foreach ($arr as $v) {
		$html .= '<li><a href="' . U('Volume/'. $action, array($pid => $v['id'])).'">'.$v['name'] . '</a></li><li class="grasj"></li>';
	}
	return $html = substr($html, 0, -23);
}

function list_to_tree ($data, $pid, $level = 0, $repeat = '--') {

    $arr = array();

    foreach ($data as $k => $v) {

        if ($v['id'] == $pid) {

            $v['level'] = $level + 1;

            $v['repeat'] = $v['level'] == 1 ? '' : str_repeat($repeat, $v['level']);

            $arr[] = $v;

            $arr = array_merge($arr, list_to_tree($data, $v['pid'], $v['level'], $repeat));

        }

    }

    return $arr;

}

function wordMake( $content , $absolutePath = "" , $isEraseLink = true )
{
	$mht = new \Common\Wordmaker();

	if ($isEraseLink)
	{
		$content = preg_replace('/<a\s*.*?\s*>(\s*.*?\s*)<\/a>/i' , '$1' , $content);   //去掉链接
	}

	$images = array();
	$files = array();
	$matches = array();

	//这个算法要求src后的属性值必须使用引号括起来

	if ( preg_match_all('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/iU',$content ,$matches ) ){
		$arrPath = $matches[1];
		for ( $i=0;$i<count($arrPath);$i++)
		{
			$path = $arrPath[$i];
			$imgPath = trim(trim( $path ), '"');
			if ( $imgPath != "" )
			{
				$files[] = $imgPath;
				if( substr($imgPath,0,7) == 'http://')
				{
					//绝对链接，不加前缀
				}
				else
				{
					$imgPath = $absolutePath.$imgPath;
				}
				$images[] = $imgPath;
			}
		}
	}

	$mht->AddContents("tmp.html",$mht->GetMimeType("tmp.html"),$content);
	for ( $i=0;$i<count($images);$i++)
	{
		$image = $images[$i];
		if ( @fopen($image , 'r') )
		{
			$imgcontent = @file_get_contents( $image );
			if ( $content )
				$mht->AddContents($files[$i],$mht->GetMimeType($image),$imgcontent);
		}
		else
		{
			echo "file:".$image." not exist!<br />";
		}
	}

	return $mht->GetFile();
}