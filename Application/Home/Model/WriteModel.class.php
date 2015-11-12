<?php
namespace Home\Model;
use Think\Model\RelationModel;
class WriteModel extends RelationModel{
	protected $_validate = array(
		array('questions','require','请选择题型'),
		array('difficulty', 'require', '请选择难度'),
		array('test_people', 'require', '请选择出题人'),
		array('test', 'require', '请填写题干'),
		//array('answer', 'require', '请选择答案'),
		array('analytical', 'require', '请填写解析'),
		//array('source', 'require', '请填写来源'),
		);

	/*
	 * 判断是否是选修的，如果是就分开显示出来
	 */
	public static function isElective($fid = null){
		if(!empty($fid)) {
			$data = WriteModel::getCategory($fid);
			return $data['type'] == 1 ? true : false;

		}
		return false;
	}

	/*
	 * 获取科目分级ID
	 */
	public static function getFname($fid){
		if(!empty($fid)) {
			$data = WriteModel::getCategory($fid);
			return $data['name'];
		}
		return null;
	}

	private static function getCategory($id) {
		$category=M('category');
		$data = $category->where(array('id'=>$id))->find();
		return $data;

	}
}