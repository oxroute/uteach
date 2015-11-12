<?php
/*
 * 个人中心控制器
*/
namespace Home\Controller;
use Think\Controller;
use Think\Upload;

header("Content-type: text/html; charset=utf-8");
class UserController extends CommonController {
    public function index(){  
		$teacher=M('Teacher');
		$id=$_SESSION['uid'];
		$info=$teacher->where(array('id'=>$id))->find();

		/**
		 * 获取年级
		 */
		$classid = M('Jys')->where(array('id' => $info['jys_id'], 'sid' => $info['sid']))->getField('class_id');
		$this->class = M('Class')->find($classid);

		$school=M('School');
		$this->sname=$school->where(array('id'=>1))->getField('name');
		$this->assign('info',$info);
		$this->display();
	}
	public function photo(){
		$school=M('School');
		$this->sname=$school->where(array('id'=>1))->getField('name');
		$teacher=M('Teacher');
		$id=$_SESSION['uid'];
		$data['id']=$id;
		$a=$teacher->where($data)->find();
		$this->assign('info',$a);
		$this->display('photo1');
	}
	//修改密码
	public function mypwd(){
			$teacher=D('Teacher');
			$data['password']=I('oldpassword','','strtolower,md5');
			$data['id']=I('id');
			$find=$teacher->where($data)->find();
			if(!$find){
				$this->error('原密码错误！');
			}
			$args['id']=I('id');
			$args['password']=I('password','','strtolower,md5');
			$save=$teacher->save($args);
			if(false!==$save){
				$this->success('修改成功！');
			}else{
				$this->error('修改失败！');
			}
	}
	

	//上传头像
	public function uploadImg(){
		$upload = new Upload(C('UPLOAD_CONFIG'));	// 实例化上传类
		//头像目录地址
		$path = './Uploads/Avatar/';
		if(!$upload->upload()) {						// 上传错误提示错误信息
			$this->ajaxReturn(array('status'=>0,'info'=>$upload->getError()));
		}else{											// 上传成功 获取上传文件信息
			$temp_size = getimagesize($path . 'temp_' . md5(session('uid')) . '.jpg');
			if($temp_size[0] < 100 || $temp_size[1] < 100){//判断宽和高是否符合头像要求
				$this->ajaxReturn(array('status'=>0,'info'=>'图片宽或高不得小于100px！'));
			}
			$this->ajaxReturn(array('status'=>1,'path'=>__ROOT__.'/Uploads/Avatar/temp_' . md5(session('uid')) . '.jpg'));
		}
	}

	//裁剪并保存用户头像
	public function cropImg(){
		//图片裁剪数据
		$params = I('post.');						//裁剪参数
		if(!isset($params) && empty($params)){
			$this->error('参数错误！');
		}

		//头像目录地址
		$path = './Uploads/Avatar/';
		//要保存的图片
		$real_path = $path . md5(session('uid')). '.jpg';
		//临时图片地址
		$pic_path = $path . 'temp_' .  md5(session('uid')) . '.jpg';
		//实例化裁剪类
		$Think_img = new \Common\ThinkImage\ThinkImage(THINKIMAGE_GD);
		//裁剪原图得到选中区域
		$Think_img->open($pic_path)->crop($params['w'],$params['h'],$params['x'],$params['y'])->save($real_path);
		//生成缩略图
		$Think_img->open($real_path)->thumb(100,100, 1)->save($path. md5(session('uid')) . '_100.jpg');
		$Think_img->open($real_path)->thumb(60,60, 1)->save($path.  md5(session('uid')) . '_60.jpg');
		$Think_img->open($real_path)->thumb(30,30, 1)->save($path. md5(session('uid')) . '_30.jpg');

		M('Teacher')->where(array('id' => session('uid')))->setField('img',  md5(session('uid')));
		$this->redirect('index');

		// if (M('Teacher')->where(array('id' => session('uid')))->setField('img', __ROOT__ . '/Uploads/Avatar/' . md5(session('uid')) .'.jpg') ) {
		// 	$this->success('上传头像成功');
		// }
	}

	// public function headUpload(){//头像上传
	// 	$upload = new \Think\Upload();
		
	// 	$upload->maxSize  = 3145728 ;
	// 	$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
	// 	$upload->rootPath='./Public/';
	// 	$upload->savePath = 'Uploads/';
	// 	$info   =    $upload->uploadOne($_FILES['hphoto']);
		
	// 	if(!$info) {
	// 		$this->error($upload->getError());
	// 	}else{
	// 		$img=$info['savepath'].$info['savename'];
			
	// 	}
	// 	 $Model = M("Teacher");
	// 	$id = I('id','','intval');
	// 	$Model->img=$img;
	// 	$save = $Model->where(array('id'=>$id))->save();
	// 	if($save!==false){
	// 		$this->success('头像上传成功！');
	// 	}else{
	// 		$this->error('头像上传失败！');
	// 	} 
		
	// }
}
