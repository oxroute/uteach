<?php
/*
 * 选择试题控制器
 */
namespace Home\Controller;
use Home\Model\WriteModel;
use Think\Controller;
header('Content-type: text/html;charset=UTF-8');
class ChooseController extends CommonController {
	public function main_content(){
		if($_GET!==""){
			//dump($_SESSION);
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
    			if(I('source')!=="来源"){
    				$map['source']=I('source');
    			}
    			
    		}

    		/**
    		 * 严格限制到本学校下
    		 */
    		$map['sid'] = session('schoolid');

    		//dump($map);
    		$count      = $write->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
    		$this->count=$write->where($map)->count();
    		$Page = new  \Think\Page($count,10);
    		$Page->setConfig('prev','上一页');
    		$Page->setConfig('next','下一页');
    		$Page->setConfig('first','首页');
    		$Page->setConfig('last','末页');
    		$Page->setConfig('theme', '%HEADER%  %FIRST% %UP_PAGE%  %LINK_PAGE% %DOWN_PAGE% %END%');
    		$Page->lastSuffix = false;
    		$test = $write->where($map)->order('wtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    		foreach ($test as $n=>$v){
    			$test[$n]['test']=htmlspecialchars_decode($v['test']);
    		}
    		
    		$page = $Page->show();
    		$this->assign('list', $test);
		    $this->assign('page',$page);
			$this->display();
	}
}
	public function show_ChLeft(){
		$chapter=M('chapter');
		if($_GET['fid']!=''){
			$chapter=$chapter->where(array('fid'=>$_GET['fid']))->select();
			foreach($chapter as $n=>$v){
				$chapter[$n]['pid'] = M('knowledge')->where(array('zid'=>$v['id']))->select();
			}
			$data=array("chapter"=>$chapter);
			echo json_encode($data);
				
		}
	}
	
	public function index(){
		//dump($_SESSION);
		if(I('id')!=''){
			$this->epaperId=$_GET['id'];
			$this->row = M('Epaper')->where(array('id' => I('get.id', 0, 'intval')))->find();
			// dump($this->row);exit;
			session('epaperId',$_GET['id']);
		}
		if(I('epaperId')!=''){
			$this->epaperId=I('epaperId');
			$this->row = M('Epaper')->where(array('id' => I('get.epaperId', 0, 'intval')))->find();
			session('epaperId',I('epaperId'));
		}
	
		
	
		
		
		$this->display();
	}
	
	public function get_all_id(){
		session('testid',$_POST['all_id']);
		$epaper=M('epaper')->where(array('id'=>$_SESSION['epaperId']))->setField('testid',$_SESSION['testid']);
		if($epaper){
			$this->ajaxReturn(1,'json');
		}else{
			$this->ajaxReturn(0,'json');
		}
	}

	//删除选中试题！！！！
	public function editId(){
		// if(!IS_AJAX) E('ye');
		// $id=I('id').',';
		// $testid=strpos($_SESSION['testid'],$id);
		// $len=strlen($id);
		// $str=substr_replace($_SESSION['testid'],"",$testid,$len);
		// if($id){
		// 	session('testid',$str);
		// 	$this->ajaxReturn(1,'json');
		// }else{
		// 	$this->ajaxReturn(0,'json');
		// }
		$status = 0;

		if (IS_AJAX)
		{
			if ( $id = I('id', 0, 'intval') )
			{
				$testids = M('epaper')->where(array('id' => session('epaperId')))->getField('testid');
				$arr = explode(',', $testids);
				foreach ($arr as $k => $v)
				{
					if ($v == $id)
					{
						unset($arr[$k]);
					}
				}
				if ($testids = is_array($arr) ? implode(',', array_values($arr)) : '')
				{
					session('testid', $testids);
					$data['count'] = M('Write')->where(array('id' => array('IN', session('testid'))))->count();
					$data['xcount'] = M('Write')->where(array('id' => array('IN', session('testid')), 'questions' => '选择题'))->count();
				}
				else
				{
					session('testid', null);
				}

				$res = M('epaper')->where(array('id' => session('epaperId')))->setField('testid',$testids);
				if (false !== $res)
				{
					$status = 1;
				}
			}
			$this->ajaxReturn(array('status' => $status, 'data' => $data));
		}
	}
	
	//选中试题！！！！
	public function addId(){
		// if(!IS_AJAX) E('ye');
		// $testid=$_SESSION['testid'].I('id').',';
		// if($testid){
		// 	session('testid',$testid);
		// 	$this->ajaxReturn(1,'json');
		// }else{
		// 	$this->ajaxReturn(0,'json');
		// }
		$status = 0;

		if (IS_AJAX)
		{
			if ( $id = I('id', 0, 'intval') )
			{
				$testids = M('epaper')->where(array('id' => session('epaperId')))->getField('testid');
				$testids .= $id . ',';

				// 防止重复
				$arr = array_unique(explode(',', $testids));
				$testids = implode(',', $arr);

				session('testid', $testids);
				$res = M('epaper')->where(array('id' => session('epaperId')))->setField('testid',$testids);
				if (false !== $res)
				{
					$status = 1;
					$data['count'] = M('Write')->where(array('id' => array('IN', session('testid'))))->count();
					$data['xcount'] = M('Write')->where(array('id' => array('IN', session('testid')), 'questions' => '选择题'))->count();
				}
			}
			$this->ajaxReturn(array('status' => $status, 'data' => $data));
		}
	}
	
	/* 删除选中试题弹窗*/
	public function alert_edit(){
		$id=I('id');
		$model=M('write');
		$test=$model->where(array('id'=>$id))->select();
		foreach ($test as $n=>$v){
			$test[$n]['test']=htmlspecialchars_decode($v['test']);
		}
		$this->assign('list',$test);
		$this->display();
	}
	
	/* 选中试题弹窗 */
	public function alert_preview(){
		$id=I('id', 0, 'intval');
		$model=M('write');
		$test=$model->where(array('id'=>$id))->select();
		foreach ($test as $n=>$v){
			$test[$n]['test']=htmlspecialchars_decode($v['test']);
		}
		$this->assign('list',$test);
		$this->display('Choose/alert_preview');
		
	}
	
	/* 试卷头 设置 */
	public function save_head(){
		
		$header=I('head');
		$subject=I('subject');
		$header=M('epaper')->where(array('id'=>$_SESSION['epaperId']))->setField('header',$header);
		$subject=M('epaper')->where(array('id'=>$_SESSION['epaperId']))->setField('subject',$subject);
		
	 if($header && $subject){
			$this->ajaxReturn(1,'json');
		}else{
			$this->ajaxReturn(0,'json');
		}
	} 
	

	//考生须知
	public function know(){
		if(IS_POST){
			$data=array(
					'know'=>I('know1').'|'.I('know2').'|'.I('know3').'|'.I('know4'),
					'note'=>I('note')
			);
			
			if(M('epaper')->where(array('id'=>I('id')))->save($data)){
				if($data['status']=1)
					$this->ajaxReturn($data,'json');
			}else{
				$this->ajaxReturn(array('status'=>0),'json');
			}
	
		}else{
			$this->id=I('id');
			$this->know=M('epaper')->where(array('id'=>I('id')))->getField('know');
			$this->note=M('epaper')->where(array('id'=>I('id')))->getField('note');
			$this->display();
		}
	}
	 
	//点击第一部分 题型 效果弹窗
	public function alert_type(){
		if(IS_POST){
			$data=array(
					'one_type'=>I('title').'|'.I('note1').'|'.I('all_score').'|'.I('one_score').'|'.I('note2')
			);
			if(M('epaper')->where(array('id'=>I('id')))->save($data)){
				if($data['status']=1)
					$this->ajaxReturn($data,'json');
			}else{
				$this->ajaxReturn(array('status'=>0),'json');
			}
			
		}else{
			$this->id=I('id');
			$this->type=M('epaper')->where(array('id'=>I('id')))->getField('one_type');
		}
		$this->display();
	}
	
	//点击第二部分 题型 效果弹窗
	public function alert_type2(){
		if(IS_POST){
			$data=array(
					'two_type'=>I('title').'|'.I('note1').'|'.I('all_score').'|'.I('one_score').'|'.I('note2')
			);
			if(M('epaper')->where(array('id'=>I('id')))->save($data)){
				if($data['status']=1)
					$this->ajaxReturn($data,'json');
			}else{
				$this->ajaxReturn(array('status'=>0),'json');
			}
				
		}else{
			$this->id=I('id');
			$this->type=M('epaper')->where(array('id'=>I('id')))->getField('two_type');
		}
		$this->display();
	}

    //显示选择好的试题
    public function show(){
        if(!is_dir(WORD_PAGE.$_SESSION['uid'])){
            $path = WORD_PAGE.$_SESSION['uid'];
            $res=mkdir(iconv("UTF-8", "GBK", $path),0777,true);
            if (!$res){
                $this->error("请修改Word目录权限！");
            }
        }
        if(!is_file(WORD_PAGE.$_SESSION['uid']."/".I('epaperId').".doc")) {
            $docPath = WORD_PAGE.$_SESSION['uid']."/".I('epaperId').".doc";
            copy(WORD_PAGE."/expage.doc",$docPath);
            chmod($docPath,0755);
        }

//        $this->assign("pagePath",__ROOT__."/Word/page/".$_SESSION['uid']."/".I('epaperId').".doc");

    	// dump($_SESSION);
    	$array=$this->epaper=M('epaper')->where(array('id'=>I('epaperId')))->find();
    	session('testid',$array['testid']);
    	session('epaperId',I('epaperId'));
    	/* session('testid',trim($array['testid'], ",")); */
    	$str=explode(',', trim($array['testid'], ","));

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

    	foreach($str as $n =>$v){
    		$test=M('write')->where(array('status'=>0,'id'=>$v))->find();
			if(!empty($test)) {
				$test['fname'] = WriteModel::getFname($test['fid']);
				if ($test['questions'] == "选择题") {
					$all['select'][] = $test;
				} elseif (WriteModel::isElective($test['fid'])) {
					$all['xuanxiu'][$test['fid']][] = $test;
				} else {
					$all['notselect'][] = $test;
				}
			}
    		/*$all[$n]=$test;
    		$all[$n]['test']=htmlspecialchars_decode($test['test']);*/
    	}
    	$this->assign('list',$all);
    	$this->display();
    	}
    
    //替换试题
    public function alert_replace(){
    		import('ORG.Util.Page');
    		$info=M('write')->where(array('id'=>I('id')))->find();
    		$where = array('status'=>'0','questions'=>$info['questions'], 'zsid' => $info['zsid'], 'sid' => session('schoolid'), 'id' => array('neq' , $info['id']));
    		$count= M('write')->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
    		$Page = new  \Think\Page($count, 1);
    		$test = M('write')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

    		foreach ($test as $n=>$v){
    			$test[$n]['test']=htmlspecialchars_decode($v['test']);
    		}
    		$p = $Page->show();
    		$this->zsd = M('knowledge')->where(array('id' => $info['zsid']))->getField('name');
    		$this->id=I('id');
    		$this->assign('list',$test);
    		$this->assign('page',$p);
    	
    	
    	$this->display();
    }
    
	//试卷生成
	public function epaper(){
		if(IS_POST){
			$epaper=M('epaper')->where(array('id'=>$_SESSION['epaperId']))->setField('testid',$_SESSION['testid']);;
			if($epaper!==null){
				 //session('testid',null);
				 session('folderID',null);
				 $row = M('Epaper')->where(array('id' => session('epaperId'), 'tid' => session('uid')))->find();

				 if ($row['top_pid']) {
				 	$url = U('Volume/folder_top', array('folder_top_id' => $row['top_pid']));
				 } else if ($row['pid']){
				 	$url = U('Volume/zhujuanin', array('pid' => $row['pid']));
				 } else {
				 	$url = U('Volume/index');
				 }
				 // $this->success('操作成功', $url);
				 $data = array('url' => $url, 'status' => 1);
	    		// $this->ajaxReturn(1,'json');
	    	}else{
	    		$data = array('status' => 0);
	    		// $this->ajaxReturn(0,'json');
	    	}
	    	$this->ajaxReturn($data);
		}else{
			$epaper=M('epaper')->where(array('id'=>$_SESSION['epaperId']))->setField('testid',$_SESSION['testid']);;
			if($epaper){
				$this->ajaxReturn(1,'json');
			}else{
				$this->ajaxReturn(0,'json');
			}
		
		}
		
	}
	
	//下载
public function down(){
		$array=M('Epaper')->where(array('id'=>I('id')))->find();
		/* $test=M('Write')->where(array('id'=> array('in',$array['testid'])))->order('weight desc')->select();
		foreach ($test as $n=>$v){
			$test[$n]['test']=htmlspecialchars_decode($v['test']);
		} */
		$str=explode(',', trim($array['testid'], ","));
		foreach($str as $n =>$v){
			$test=M('write')->where(array('status'=>0,'id'=>$v))->find();
			$all[$n]=$test;
			$all[$n]['test']=htmlspecialchars_decode($test['test']);
		}
		/* $array=$this->epaper=M('epaper')->where(array('id'=>I('epaperId')))->find();
		 session('testid',$array['testid']);
		
		 $str=explode(',', trim($array['testid'], ","));
		 	
		 foreach($str as $n =>$v){
		 $test=M('write')->where(array('status'=>0,'id'=>$v))->find();
		 $all[$n]=$test;
		 $all[$n]['test']=htmlspecialchars_decode($test['test']);
		 }
		 } */
		
		// $content = file_get_contents('./Public/word.html');
		// file_put_contents('test.txt', $content);
		// echo $content;exit;
		
		$count=M('Write')->where(array('id'=> array('in',$array['testid']),'questions'=>'选择题'))->count();
		$count1=M('Write')->where(array('id'=> array('in',$array['testid']),'questions'=>array('neq','选择题')))->count();
		header("Content-Type:   application/msword");
		header("Content-Disposition:   attachment;   filename=$array[header].doc"); //指定文件名称
		header("Pragma:   no-cache");
		header("Expires:   0");
		$html = file_get_contents('./Public/word.html');
		$html .='<p style="text-align:center;line-height:150%"><span style=";font-family:&#39;Times New Roman&#39;;font-size:14.0pt">'.$array[header].'</span></p>';
		$html .='<p style=";text-align:center;line-height:150%"><span style=";font-family:&#39;Times New Roman&#39;;font-size:22.0pt">'.$array[subject].'</span></p>';
		$html .='<table style="border-collapse:collapse;width:100%;margin-left:9px">';
		$html .='<tr>';
		$html .='<td style="width:28px;border-left:1px solid windowtext;border-right:1px solid windowtext;border-top:1px solid windowtext;border-bottom:1px solid windowtext" valign="center">';
		$html .=' <p style=";text-align:center;line-height:80%"><span style="font-family:&#39;Times New Roman&#39;;font-size:14px">考</span></p>';
		$html .=' <p style=";text-align:center;line-height:80%"><span style="font-family:&#39;Times New Roman&#39;;font-size:14px">生</span></p>';
		$html .=' <p style=";text-align:center;line-height:80%"><span style="font-family:&#39;Times New Roman&#39;;font-size:14px">须</span></p>';
		$html .=' <p style=";text-align:center;line-height:80%"><span style="font-family:&#39;Times New Roman&#39;;font-size:14px">知</span></p>';
		$html .='</td>';
		
		$html .='<td style="width:503px;padding:0 7px 0 7px ;border:1px solid #000;border-left:none" valign="center"> ';
		$html .='<p style=";line-height:80%"><span style="font-family:宋体; font-size:14px"">'.explodeStr0($array[know]).'</span></p>';
		$html .='<p style=";line-height:80%"><span style="font-family:宋体; font-size:14px"">'.explodeStr1($array[know]).'</span></p>';
		$html .='<p style=";line-height:80%"><span style="font-family:宋体; font-size:14px"">'.explodeStr2($array[know]).'</span></p>';
		$html .='<p style=";line-height:80%"><span style="font-family:宋体; font-size:14px"">'.explodeStr3($array[know]).'</span></p>';
		$html .='</td>';
		$html .='</tr>';
		$html .='</table>';
		
		// $html .='<span>可能用到的相对原子质量:'.$array[note].'</span><br/>';
		$html .='<p style="line-height:114%;text-align:center;"><span style=";font-family:&#39;Times New Roman&#39;;font-size:14px">'.$array[note].'</span></p>';
		
		$html .='<p style="text-align:center;line-height:114%"><span style=";font-family:黑体;font-weight:bold;font-size:19px">'.explodeStr0($array[one_type]).explodeStr2($array[one_type]).'</span></p>';
		/* $html .='<p><span style=";font-family:宋体;font-weight:bold;font-size:14px">'.explodeStr2($array[one_type]).'</span></p>'; */
		// $html .='<span>'.explodeStr0($array[one_type]).explodeStr2($array[one_type]).'<br/></span>';
		// $html .='<span>'.explodeStr1($array[one_type]).explodeStr3($array[one_type]).'</span><br/>';

		$html .='<p style="line-height:114%"><span style=";font-family:宋体;font-weight:bold;font-size:14px">'.explodeStr1($array[one_type]).explodeStr3($array[one_type]) . '</span></p>';
		// $html .= "<p>1. &nbsp;" ;
		$i = 1;
		
		/* $array=$this->epaper=M('epaper')->where(array('id'=>I('epaperId')))->find();
		session('testid',$array['testid']);
	
		$str=explode(',', trim($array['testid'], ","));
		 
		foreach($str as $n =>$v){
			$test=M('write')->where(array('status'=>0,'id'=>$v))->find();
			$all[$n]=$test;
			$all[$n]['test']=htmlspecialchars_decode($test['test']);
		}
		} */

		 foreach ($all as $key=>$val) {
		 	if($val['questions'] == '选择题'){
				$html .='<p class=p  style="margin-bottom:12.0000pt; mso-pagination:widow-orphan; " ><span style="mso-spacerun:\'yes\'; font-family:宋体; font-size:12.0000pt; mso-font-kerning:0.0000pt; " >' . $i . '.&nbsp;' .  $this->strip_selected_tags(htmlspecialchars_decode($val['test']), 'p') .'</span></p>';
				$i++;
			}
		}

		// $i=1;
		$html .='<p style=";text-align:center; line-height:150%; "><span style="mso-fareast-font-family:黑体;font-weight:bold;font-size:19px;">'.explodeStr0($array[two_type]).explodeStr2($array[two_type]).'</span><p>';
		 foreach ($all as $key=>$val) {
			if($val[questions]!=='选择题'){
				$html .='<p class=p  style="margin-bottom:12.0000pt; mso-pagination:widow-orphan; " ><span style="mso-spacerun:\'yes\'; font-family:宋体; font-size:12.0000pt; mso-font-kerning:0.0000pt; " >' . $i . '.&nbsp;' .  $this->strip_selected_tags(htmlspecialchars_decode($val['test']), 'p')  . '</span></p>';
				$i++;
			}
		}  
		
		
		
		$html .='</body></html>';
		echo  $html;
	}

	public function strip_selected_tags($text, $tags = array())
   {
       $args = func_get_args();
       $text = array_shift($args);
       $tags = func_num_args() > 2 ? array_diff($args,array($text))  : (array)$tags;
       foreach ($tags as $tag){
         //   if(preg_match_all('/<'.$tag.'[^>]*>(.*)<\/'.$tag.'>/iU', $text, $found)){
         //       $text = str_replace($found[0],$found[1],$text);
         // }
       		$text = preg_replace('/<'.$tag.'[^>]*>(.*)<\/'.$tag.'>/iU', '$1<br>', $text);
         // dump($found);
       }
       return $text;
   }
	
}
 
