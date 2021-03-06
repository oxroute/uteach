<?php
namespace Home\Controller;

class UeditorController extends CommonController
{
	function _initialize () {
		parent::_initialize();
		$config_path =  'Public/ueditor/config.json';
		$this->path = __ROOT__ . '/Uploads/';
		$this->CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents($config_path)), true);
	}

	function index () {
		$action = I('get.action');
		switch ($action) {
		    case 'config':
		        $result =  json_encode($this->CONFIG);
		        break;

		    /* 上传图片 */
		    case 'uploadimage':
		    /* 上传涂鸦 */
		    case 'uploadscrawl':
		    /* 上传视频 */
		    case 'uploadvideo':
		    /* 上传文件 */
		    case 'uploadfile':
		        $result = $this->upload();
		        break;

		    /* 列出图片 */
		    case 'listimage':
		        $result = $this->lists();
		        break;
		    /* 列出文件 */
		    case 'listfile':
		        $result = $this->lists();
		        break;

		    /* 抓取远程文件 */
		    case 'catchimage':
		        $result = $this->catcher();
		        break;

		    default:
		        $result = json_encode(array(
		            'state'=> '请求地址出错'
		        ));
		        break;
		}

		/* 输出结果 */
		if (isset($_GET["callback"])) {
		    echo $_GET["callback"] . '(' . $result . ')';
		} else {
		    echo $result;
		}
	}

	// 上传方法
	function upload () {
		/* 上传配置 */
		$base64 = "upload";
		switch ($_GET['action']) {
		    case 'uploadimage':
		        $config = array(
		            "pathFormat" => $this->path . 'images/'.date('Ymd',time()).'/'.time().rand(1000,9999),
		            "maxSize" => $this->CONFIG['imageMaxSize'],
		            "allowFiles" => $this->CONFIG['imageAllowFiles'],
		        );
		        $fieldName = $this->CONFIG['imageFieldName'];
		        break;
		    case 'uploadscrawl':
		        $config = array(
		            "pathFormat" => $this->path . 'images/'.date('Ymd',time()).'/'.time().rand(1000,9999),
		            "maxSize" => $this->CONFIG['scrawlMaxSize'],
		            "allowFiles" => $this->CONFIG['scrawlAllowFiles'],
		            "oriName" => "scrawl.png"
		        );
		        $fieldName = $this->CONFIG['scrawlFieldName'];
		        $base64 = "base64";
		        break;
		    case 'uploadvideo':
		        $config = array(
		            "pathFormat" => $this->path . 'video/'.date('Ymd',time()).'/'.time().rand(1000,9999),
		            "maxSize" => $this->CONFIG['videoMaxSize'],
		            "allowFiles" => $this->CONFIG['videoAllowFiles']
		        );
		        $fieldName = $this->CONFIG['videoFieldName'];
		        break;
		    case 'uploadfile':
		    default:
		        $config = array(
		            "pathFormat" => $this->path . 'files/'.date('Ymd',time()).'/'.time().rand(1000,9999),
		            "maxSize" => $this->CONFIG['fileMaxSize'],
		            "allowFiles" => $this->CONFIG['fileAllowFiles']
		        );
		        $fieldName = $this->CONFIG['fileFieldName'];
		        break;
		}
		/* 生成上传实例对象并完成上传 */
		$up = new \Common\Ueditor\Uploader($fieldName, $config, $base64);

		/**
		 * 得到上传文件所对应的各个参数,数组结构
		 * array(
		 *     "state" => "",          //上传状态，上传成功时必须返回"SUCCESS"
		 *     "url" => "",            //返回的地址
		 *     "title" => "",          //新文件名
		 *     "original" => "",       //原始文件名
		 *     "type" => ""            //文件类型
		 *     "size" => "",           //文件大小
		 * )
		 */

		/* 返回数据 */
		$result = $up->getfileInfo();
		$result['url']  = 'http://' . $_SERVER['HTTP_HOST']  . $result['url'];
		return json_encode($result);
	}

	// 图片列表方法
	function lists () {
		/* 判断类型 */
		switch ($_GET['action']) {
		    /* 列出文件 */
		    case 'listfile':
		        $allowFiles = $this->CONFIG['fileManagerAllowFiles'];
		        $listSize = $this->CONFIG['fileManagerListSize'];
		        $path = $this->path . 'files/';
		        break;
		    /* 列出图片 */
		    case 'listimage':
		    default:
		        $allowFiles = $this->CONFIG['imageManagerAllowFiles'];
		        $listSize = $this->CONFIG['imageManagerListSize'];
		        $path = $this->path . 'images/';
		}
		$allowFiles = substr(str_replace(".", "|", join("", $allowFiles)), 1);

		/* 获取参数 */
		$size = isset($_GET['size']) ? $_GET['size'] : $listSize;
		$start = isset($_GET['start']) ? $_GET['start'] : 0;
		$end = $start + $size;

		/* 获取文件列表 */
		$path = $_SERVER['DOCUMENT_ROOT'] . (substr($path, 0, 1) == "/" ? "":"/") . $path;
		$files = getfiles($path, $allowFiles);
		if (!count($files)) {
		    return json_encode(array(
		        "state" => "no match file",
		        "list" => array(),
		        "start" => $start,
		        "total" => count($files)
		    ));
		}

		/* 获取指定范围的列表 */
		$len = count($files);
		for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
		    $list[] = $files[$i];
		}
		//倒序
		//for ($i = $end, $list = array(); $i < $len && $i < $end; $i++){
		//    $list[] = $files[$i];
		//}

		/* 返回数据 */
		$result = json_encode(array(
		    "state" => "SUCCESS",
		    "list" => $list,
		    "start" => $start,
		    "total" => count($files)
		));

		return $result;
	}

	// 抓取远程文件方法
	function catcher () {
		/* 上传配置 */
		$config = array(
		    "pathFormat" => $this->path . 'files/'.date('Ymd',time()).'/'.time().rand(1000,9999),
		    "maxSize" => $this->CONFIG['catcherMaxSize'],
		    "allowFiles" => $this->CONFIG['catcherAllowFiles'],
		    "oriName" => "remote.png"
		);
		$fieldName = $this->CONFIG['catcherFieldName'];

		/* 抓取远程图片 */
		$list = array();
		if (isset($_POST[$fieldName])) {
		    $source = $_POST[$fieldName];
		} else {
		    $source = $_GET[$fieldName];
		}
		foreach ($source as $imgUrl) {
		    $item = new \Api\Uploader($imgUrl, $config, "remote");
		    $info = $item->getFileInfo();
		    array_push($list, array(
		        "state" => $info["state"],
		        "url" => $info["url"],
		        "source" => $imgUrl
		    ));
		}

		/* 返回抓取数据 */
		return json_encode(array(
		    'state'=> count($list) ? 'SUCCESS':'ERROR',
		    'list'=> $list
		));
	}
}