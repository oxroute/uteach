<?php
/*
 * 组卷控制器
 */
namespace Home\Controller;
use Think\Controller;
header('Content-type: text/html;charset=UTF-8');
class VolumeController extends CommonController {
    public function index(){
    	
    	session('testid',null);
    	session('pid',null);
    	session('Folder_top_id',null); 
    	session('epaperId',null);
    	
    	session('downId',I('downId'));
    	//dump($_SESSION);
    	$folder=M('Folder')->where(array('status'=>Y,'pid'=>0,'tid'=>$_SESSION['uid']))->select();
    	$folderTop=M('Folder_top')->where(array('status'=>Y,'pid'=>0))->select();
     	$file=M('epaper')->where(array('status'=>Y,pid=>0))->select(); 

                // dump($folder);

    	$this->assign('folder',$folder);
      	$this->assign('folderTop',$folderTop);  
    	$this->assign('file',$file);
      	$this->display();
    }
    //黄色文件夹  里面一层
    public function zhujuanin(){
        $pid = I('get.pid', 0, 'intval');
    	session('pid',$pid); 

    	$file=M('epaper')->where(array('pid'=>$pid,'status'=>Y,'tid'=>$_SESSION['uid']))->select();
    	$this->name=M('Folder')->where(array('id'=>$pid))->getField('name');
    	$folder=M('Folder')->where(array('status'=>Y,'pid'=>$pid,'tid'=>$_SESSION['uid']))->select();
    	$this->assign('folder',$folder);
    	$this->assign('file',$file);
    	$this->display(); 
    }
    //绿色文件夹里面一层
    public function Folder_top(){
    	
        $pid = I('get.folder_top_id', 0, 'intval');
    	session('Folder_top_id',$pid);
    	//dump($_SESSION);
    	$folder=M('Folder_top')->where(array('status'=>Y,'pid'=>$pid))->select(); 
    	$this->name=M('Folder_top')->where(array('id'=>$pid))->getField('name');
    	$file=M('epaper')->where(array('top_pid'=>$pid,'status'=>Y))->select();
    	$this->assign('folder',$folder);
    	$this->assign('file',$file);
    	$this->display();
    }
    //异步发布文件夹
    public function addFolder(){
    	
    	if(!IS_AJAX) E('ye');
    	if(I('folder_top_id') !==""){
    		$data=array(
    				'name'=>I('name'),
    				'status'=>Y,
    				'tid'=>$_SESSION['uid'],
    				'pid'=>I('folder_top_id')
    		);
    		$topId=M('Folder_top')->data($data)->add();
    		$node = M('Folder_top')->where(array('id'=>I('folder_top_id')))->getField('node');
    		$node1=$node.$topId.',';
    		$node = M('Folder_top')->where(array('id'=>$topId))->setField('node',$node1);
    		
    	}
    	if(I('pid')!==""){ // 当pid=‘’的时候，pid应默认为0，是int类型
    		$data=array(
    				'time'=>time(),
    				'name'=>I('name'),
    				'type'=>0,
    				'status'=>Y,
    				'tid'=>$_SESSION['uid'],
    				'pid'=>I('pid')
    		);

    		
    	$node = M('Folder')->where(array('id'=>I('pid')))->getField('node');
                 // if (!$node) $this->error('fff');
                $Fid=M('Folder')->data($data)->add();
    		$node1=$node.$Fid.',';
    		$node = M('Folder')->where(array('id'=>$Fid))->setField('node',$node1);
                                $data['id'] = $Fid;
    	}

	if(I('folder_top_id')=="" && I('pid')==""){
		$data=array(
				'time'=>time(),
				'name'=>I('name'),
				'tid'=>$_SESSION['uid'],
				'type'=>0
		);
		$id=M('Folder')->data($data)->add();
		$pid = M('Folder')->where(array('id'=>$id))->getField('pid');
		$node=$pid.','.$id.',';
		$node = M('Folder')->where(array('id'=>$id))->setField('node',$node);
                                $data['id'] = $id; 
                                $data['pid'] = I('pid');
	}

    	 // if($topId || $Fid){
    		$data['status']=1;
    		$this->ajaxReturn($data,'json');
       	// }else{
    		// $this->ajaxReturn(array('status'=>0),'json');
    	// } 
    }  
    //异步修改文件夹/文件
    public function editFolder(){
    	if(!IS_AJAX) E('ye');
    	$data=array(
    			'id'=>I('id'),
    			'name'=>I('name')
    	);
    	if(M('Folder')->save($data)){
    		$data['status']=1;
    		$this->ajaxReturn($data,'json');
    	}else{
    		$this->ajaxReturn(array('status'=>0),'json');
    	}
    }
    
    
    //异步删除文件夹/文件（标记删除）
    public function delFile(){
    	if(IS_AJAX){
    		if(I('type')==""){
    			$del_file=M('epaper')->where(array('id'=>I('id')))->setField('status','N');
    		}else{
    			$del_floder=M('Folder')->where(array('id'=>I('id')))->setField('status','N');
    		}

    		if($del_file !== false || $del_floder !== false){
    			$data['status']=1;
    			$this->ajaxReturn($data,'json');
    		}else{
    			$this->ajaxReturn(array('status'=>0),'json');
    		}
    	}else{
    		E('请求错误！');
    	}
    }
	
    public function install(){
    	if(IS_POST){
    		$epaper=M('epaper');
    		if (!$epaper->create()){
    			$this->error($write->getError());
    		}else{
    		$epaper->tid=$_SESSION['uid'];
    		$epaper->header=I('header_y').I('header_q').I('header_f');
    		$epaper->crtime=time();
    		$id=$epaper->add();
                                // exit;
                                // dump($_SESSION);exit;
    		if($id!==false){
    			session('epaperId',$id);
    			if(session('?pid')){
    			
    				$file=M('Folder')->where(array('id'=>$_SESSION['pid']))->find();
    				$str=explode(',', trim($file['node'], ","));
    				foreach($str as $n =>$v){
    					$test=M('Folder')->where(array('status'=>0,'id'=>$v))->find();
    					$all[$n]=$test;
    					$all[$n]['fileid']=$test['fileid'].$id.',' ;
    					M('Folder')->where(array('id'=>$v))->setField('fileId',$all[$n]['fileid']);
    					
    				}
                                                                $pid = session('pid') ? : 0;
    			 	$epaper->where(array('id'=>$id))->setField('pid', 0); 
    				
    			}else{
    				$file=M('Folder_top')->where(array('id'=>$_SESSION['Folder_top_id']))->find();
    				$str=explode(',', trim($file['node'], ","));
                    // dump($str);exit;
    				foreach($str as $n =>$v){
    					$test=M('Folder_top')->where(array('status'=>0,'id'=>$v))->find();
    					$all[$n]=$test;
    					$all[$n]['fileid']=$test['fileid'].$id.',' ;
                        
    					M('Folder_top')->where(array('id'=>$v))->setField('fileId',$all[$n]['fileid']);
    						
    				}
                    // exit;
                    // dump($all);
    				$Folder_top_id = session('Folder_top_id') ? : 0;
    				$epaper->where(array('id'=>$id))->setField('top_pid', $Folder_top_id);
    			}
    			
    			echo"<script>parent.close(top.location='" .__APP__."/home/Choose/index/id/$id')</script>"; 
    		}
    	}
    	
    	}
    	$this->display();
    	
    }

    
    
   

}