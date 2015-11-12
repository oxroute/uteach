<?php
/*
 * 登录
*/
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class LoginController extends Controller {

    public function login(){  
	if(!empty($_POST)){
		
/* 		$verify=new\Think\Verify();
		if(!$verify->check($_POST['code'])){
			$this->error('验证码错误！');
		}else{ */
			//判断用户名和密码
			$name=I('username');
			$pwd=I('password','','md5');
			$where=array('name'=>I('username'));
			$teacher=M('Teacher')->where($where)->find();
			if($teacher){
				if($pwd ==$teacher['password']){
					session('uid',$teacher['id']);
					session('jys_id',$teacher['jys_id']);
					session('subject',$teacher['subject']);
					session('username',$teacher['name']);
					session('schoolid', $teacher['sid']);
					$this->redirect('Index/index');
				}else{
					$this->error('用户名或密码错误！');
				}
			}else{
				$this->error('用户名或密码错误！');
			}
	}else{
		//获取域名
		$domain = $_SERVER['SERVER_NAME'];
		$domain_info = explode('.',$domain);
		if($domain_info[0]=='www'){
			//读取默认学校壁纸
			$map = array('id'=>1);
		}else{
			//读取对应学校壁纸
			$domain_info[0] = strtolower($domain_info[0]);
			$map = array('domain'=>$domain_info[0]);
		}
		$this->school_infos = M('school')->where($map)->find();
		if(!$this->school_infos){
			/* redirect('http://www.uteach.top'); */
		}
		$this->display();
	}
	
 }
 
     public function logout(){
        // 清楚所有session
        session(null);
        redirect(U('Login/login'));
    }
         
    
	
 	/* 验证码方法 */
/*	public function verify(){
		$config = array(
				'imageH' => 50,
				'imageW' => 180,
				'length' => 4,
				'fontSize' => 25,
				'useCurve' => false,
				'useNoise' => false,
				'bg' => array(255,255,255),
		);
		$verify = new \Think\Verify($config);
		$verify->entry();
	}
	
	 */
   
	
   
}
    	