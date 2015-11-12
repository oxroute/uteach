<?php
/*
 * 编题控制器
*/
namespace Home\Controller;
use Home\Model\WriteModel;
use Think\Controller;
header('Content-type: text/html;charset=UTF-8');
class WriteController extends CommonController {
	public function index(){

		$test = null;
		$answer = null;
		$analytical = null;
		if(isset($_GET['reQuestion'])) {
			$de = $_GET['reQuestion'];
			$question = explode('-',$de);
			$test=$question[0];
			$answer=$question[1];
			$analytical=$question[2];
		}
		$this->assign('test',$test);
		$this->assign('answer',$answer);
		$this->assign('analytical',$analytical);

		$this->display();
	}
	public function showLeft(){
		$chapter=M('chapter');
		if($_GET['fid']!=''){
			$chapter=$chapter->where(array('fid'=>$_GET['fid']))->select();

                                                

			foreach($chapter as $n=>$v){
				$chapter[$n]['pid'] = M('knowledge')->where(array('zid'=>$v['id']))->select();
				// $chapter[$n]['count']=M('write')->where(array('zid'=>$v['id'],'status'=>0, 'tid' => session('uid')))->count();
				foreach($chapter[$n]['pid'] as $nn=>$vv){
					$chapter[$n]['pid'][$nn]['count'] = M('write')->where(array('zsid'=>$vv['id'],'status'=>0, 'tid' => session('uid'), 'sid' => session('schoolid')))->count();
                                                                                $chapter[$n]['count'] += $chapter[$n]['pid'][$nn]['count'];
				}
			}
			$data=array("chapter"=>$chapter);
			echo json_encode($data);
		}
	}
   
    /*
     * 编题方法 注：3.2.2 D()方法必须配合if语句
     */
    public function write(){

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
    		if (!$write->create()){
    			$this->error($write->getError());
    		}else{

    			$data=unserialize($_POST);
				$de = $_GET['reQuestion'];
				$question = explode('-',$de);
                $write->sid = session('schoolid');

    			$id=$write->add($data);
    			$data = array('wtime'=>time(),'tid'=>$_SESSION['uid'],'weight'=>$id,'test'=>$question[0],'answer'=>$question[1],'analytical'=>$question[2]);
    			$weight=$write->where(array('id'=>$id))->setField($data);
    			if($weight!==FALSE){
    				$this->ajaxReturn(1,'json');
    			}else{
    				$this->ajaxReturn(0,'json');
    			}
    			 
    		}
    	}else{
    		$this->display();
    	}
    	 
    }

    public function mathdialog ()
    {
        $this->display();
    }
}
    	