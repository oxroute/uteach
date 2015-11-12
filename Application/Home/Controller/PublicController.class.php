<?php
/*
 * 个人中心控制器
*/
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class PublicController extends CommonController {
    public function main_content(){
    	if($_GET!==""){
    		$tid=M('tech_jys')->where(array('jys_id'=>$_SESSION['jys_id']))->getField('tid');
    		$name=M('teacher')->where(array('id'=>array('in',$tid)))->getField('name',true);
    		$namestr=implode(',',$name);
    		import('ORG.Util.Page');
    		$write=M('write');
    		$map['status']=0;
    		if($_GET['fid']!=""){
    			$map['fid']=I('fid');
    		}
    		if(I('zid')!=""){
    			$map['zid']=I('zid');
    		}
    		if(I('difficulty')!==""){
    			if(I('difficulty')=="全部"){
    				$map['difficulty']=array('in','A,B,C');
    			}else{
    				$map['difficulty']=I('difficulty');
    			}
    			
    		}
    		// 此处传递姓名作为查询条件,是否能保证姓名唯一呢, 重名的呢.
    		if(I('test_people')!==""){
	    		$map['test_people']=I('test_people');
	    			if(I('test_people')=="全部"){
	    				$map['test_people']=array('in',$namestr);
	    			}
    		}else{
    			$map['test_people']=$_SESSION['username'];
    		}
    		if(I('questions')!=""){
    			if(I('questions')=="全部"){
    				$map['questions']=array('in','简答题,填空题,选择题');
    			}else{
    				$map['questions']=I('questions');
    			}
    		}
    		if(I('zsid')!=""){
    			$map['zsid']=I('zsid');
    		}
    		if(I('source')!=""){
    			$map['source']=I('source');
    		}
    		// dump($map);exit;

    		/**
    		 *  严格限制到本学校下
    		 */
    		$map['sid'] = session('schoolid');


    		$count      = $write->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
    		$this->count=$write->where($map)->count();
    		$Page = new  \Think\Page($count,10);
    		$Page->setConfig('prev','上一页');
    		$Page->setConfig('next','下一页');
    		$Page->setConfig('first','首页');
    		$Page->setConfig('last','末页');
    		$Page->setConfig('theme', '%HEADER%  %FIRST% %UP_PAGE%  %LINK_PAGE% %DOWN_PAGE% %END%');
    		$Page->lastSuffix = false;
    		//dump($map);
    		//dump($_SESSION);
    		$test = $write->where($map)->order('wtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    		foreach ($test as $n=>$v){
    			$test[$n]['test']=htmlspecialchars_decode($v['test']);
    		}
    		$p = $Page->show();
    		$this->assign('test',$test);
    		$this->assign('page',$p);
    		$this->display();
    	}
    	
		
}

/* 点击预览方法 */
public function show(){
	$id=I('id');
	$write=M('Write');
	$date = $write->where(array('id'=>$id))->find();
	 
	$date['test']=htmlspecialchars_decode($date['test']);
	$date['analytical']=htmlspecialchars_decode($date['analytical']);
	$date['remarks']=strip_tags(htmlspecialchars_decode($date['remarks']));
	$this->fid=M('category')->where(array('id'=>$date["fid"]))->getField('name');
	$this->zid=M('chapter')->where(array('id'=>$date["zid"]))->getField('name');
	$this->zsid =M('knowledge')->where(array('id'=>$date["zsid"]))->getField('name');
	$this->assign('date',$date);
	$this->display('Write/show');
	 
}


/* 标记删除方法 */
public function del(){
	if(IS_POST){
		$id = I('id');
		$write=M('Write');
		$tid=$write->where(array('id' => $id))->getField('tid');
		if($tid!=$_SESSION['uid']){
			$this->ajaxReturn(0,'json');
		}else{
			$aa=$write->where(array('id' => $id))->setField('status',1);
			$this->ajaxReturn(1,'json');
			
		}

	}

}

/* 点击修改方法 */
public function update(){

    if(!is_dir(WORD_PATH.$_SESSION['uid']."/".date('Ymd',time()))){
        $path = WORD_PATH.$_SESSION['uid']."/".date('Ymd',time());
        $res=mkdir(iconv("UTF-8", "GBK", $path),0777,true);

        if (!$res){
            $this->error("请修改Word目录权限！");
        }
    }
    if(!is_file(WORD_PATH.$_SESSION['uid']."/".date('Ymd',time())."/qq.doc")) {
        $docPath = WORD_PATH.$_SESSION['uid']."/".date('Ymd',time())."/qq.doc";
        copy(WORD_PATH."/q.doc",$docPath);
        chmod($docPath,0755);

    }
    $this->assign("questionDocPath",__ROOT__."/Word/doc/".$_SESSION['uid']."/".date('Ymd',time())."/qq.doc");


    if(IS_POST){
		$write=M('Write');
			$write->create();
			$id=$write->where(array('id'=>I('id')))->save();
			if($id){
    				$this->ajaxReturn(1,'json');
    			}else{
    				$this->ajaxReturn(0,'json');
    			}
	}else{
		$id=I('id');
		$date=M('Write')->find($id);
		/* $date['analytical']=strip_tags(htmlspecialchars_decode($date['analytical'])); */
		/* $date['remarks']=strip_tags(htmlspecialchars_decode($date['remarks'])); */
		
		
		//dump($date);die;
		$this->fid=M('category')->where(array('id'=>$date["fid"]))->getField('name');
		$this->zid=M('chapter')->where(array('id'=>$date["zid"]))->getField('name');
		$this->zsid =M('knowledge')->where(array('id'=>$date["zsid"]))->getField('name');
		
		$category=M('category');
		$category=$category->where(array('id'=>$date["fid"]))->select();
		
		/* 查询章节表 */
		$chapter=M('chapter');
		$chapter=$chapter->where(array('fid'=>$date["fid"]))->select();

		foreach($chapter as $n=>$v){
			$chapter[$n]['pid'] = M('knowledge')->where(array('zid'=>$v['id']))->select();
			// $chapter[$n]['count']=M('write')->where(array('zid'=>$v['id'],'status'=>0, 'tid' => session('uid')))->count();
			foreach($chapter[$n]['pid'] as $nn=>$vv){
				$chapter[$n]['pid'][$nn]['count'] = M('write')->where(array('zsid'=>$vv['id'],'status'=>0, 'tid' => session('uid'), 'sid' => session('schoolid')))->count();
				$chapter[$n]['count'] += $chapter[$n]['pid'][$nn]['count'];
			}
		}
		
		/* 查询科目表 */
		$this->assign('chapter',$chapter);
		$this->assign('category',$category);
		
		
		
		
		
		$this->assign('date',$date);
		$this->display('Write/update');
	}

}
   
}
