<?php
namespace Common\Model;
use Think\Model\RelationModel;

class TeacherModel extends RelationModel{
	protected $_validate = array(
			array('username','require','用户名必须！'),
			array('oldpassword','require','原密码必须！'),
			array('password','require','密码必须！'),
			array('repassword','require','确认密码必须！'),
			array('repassword','password','确认密码跟密码不一致！',0,'confirm'), // 验证确认密码是否和密码一致
	);
}	
