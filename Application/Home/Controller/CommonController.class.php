<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function _initialize(){
		$this->count = 0;
		$this->Xcount = 0;
		if (session('testid')) 
		{
			$this->count = M('Write')->where(array('id'=>array(in,$_SESSION['testid'])))->count();
			// $this->Jcount = M('Write')->where(array('id'=>array(in,$_SESSION['testid']),'questions'=>'简答题'))->count();
			$this->Xcount = M('Write')->where(array('id'=>array(in,$_SESSION['testid']),'questions'=>'选择题'))->count();
			// $this->Tcount = M('Write')->where(array('id'=>array(in,$_SESSION['testid']),'questions'=>'填空题'))->count();
			// $this->TCount = count(session('testid')) - $this->
		}

		if (session('jys_id'))
		{
			$this->tid=M('tech_jys')->where(array('jys_id'=>$_SESSION['jys_id']))->getField('tid');
			$teacher=M('teacher')->select();
			$this->assign('teacher',$teacher);
		}


		/*显示公共左侧方法*/
		$subject=M('subject');
		$subject=$subject->limit(1)->select();
		/* 查询科目分级表 */
		$category=M('category');
		$category=$category->select();
		/* 查询章节表 */
		$chapter=M('chapter');
		$chapter=$chapter->select();
		foreach($chapter as $n=>$v){
			$chapter[$n]['pid'] = M('knowledge')->where(array('zid'=>$v['id']))->select();
			foreach($chapter[$n]['pid'] as $nn=>$vv){
				$chapter[$n]['pid'][$nn]['count'] = M('write')->where(array('zsid'=>$vv['id'],'status'=>0, 'tid' => session('uid'), 'sid' => session('schoolid')))->count();
				$chapter[$n]['count'] += $chapter[$n]['pid'][$nn]['count'];
			}
		}

		/* 查询科目表 */
		$this->assign('chapter',$chapter);
		$this->assign('category',$category);
		$this->assign('subject',$subject);

		/* 解决上传图片firefox浏览器无法通过flash传递session导致302问题 */
		$session_name = session_name();
		if (!isset($_POST[$session_name]))  {
			if(!isset($_SESSION['uid']) || !isset($_SESSION['username'])){
				$this->redirect('Login/login');
			}
		}
	}
		
		/**
		 * @parma $model 模型
		 * @parma $map 条件
		 * @parma $field 字段
		 * @parma $field_type 字段类型， true为排除
		 * @parma $sortBy 排序字段
		 * @parma $asc 排序类型 false为倒叙 true为正序
		 */
		protected function _list($model, $map, $field = '*', $field_type = false, $sortBy = '', $asc = false) {
			//排序字段 默认为主键名
			if (isset($_REQUEST ['_order'])) {
				$order = $_REQUEST ['_order'];
			} else {
				$order = !empty($sortBy) ? $sortBy : $model->getPk();
			}
			//排序方式默认按照倒序排列
			//接受 sost参数 0 表示倒序 非0都 表示正序
			if (isset($_REQUEST ['_sort'])) {
				$sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
			} else {
				$sort = $asc ? 'asc' : 'desc';
			}
			import("ORG.Util.Page");
			$count = $model->where($map)->count('id'); //计算记录数
			if ($count > 0) {
				if (!empty($_REQUEST ['listRows'])) {
					$limitRows = $_REQUEST ['listRows'];
				} else {
					$limitRows = '7';//设置每页记录数
				}
				$p = new  \Think\Page($count,$limitRows);//第三个参数是你需要调用换页的ajax函数名
				 $p->lastSuffix=false;
				//$p->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
				$p->setConfig('prev','上一页');
				$p->setConfig('next','下一页');
				$p->setConfig('last','末页');
				$p->setConfig('first','首页');
				//$p->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');

				$limit_value = $p->firstRow . "," . $p->listRows;
				$voList = $model->where($map)->order("`" . $order . "` " . $sort)->limit($limit_value)->select();
				foreach ($voList as $n=>$v){
					$voList[$n]['test']=htmlspecialchars_decode($v['test']);
				}
				$page = $p->show();
				$this->assign('list', $voList);
				$this->assign('page',$page);
			}
			
			

			cookie('__listpage__', __SELF__);
			return;
		}
		
}

		
