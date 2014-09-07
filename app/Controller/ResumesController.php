<?php
class ResumesController extends AppController {
	public $name = "Resumes";
	
	public $helper = array (
			"Html",
			"Form"			
	);
	
	public $components = array (
			"Session"
	);
	
	public function index() {
		if ($this->Session->check("uid")) {
			$this->redirect(array(
					"action" => "reslist",
					$this->Session->read("uid")
			));
		} else {
			$this->Session->setFlash("对不起，您还没有登录！");
			$this->redirect(array(
					"controller" => "Users",
					"action"     => "login"
			));
		}
	}
	
	// 显示个人简历列表
	public function reslist($uid = null) {
		if ($this->Session->check("uid") 
			&& $uid===$this->Session->read("uid")) {
			$this->set("uid",$uid);
				
			$this->set("resumes", $this->Resume->findAllByUser_id($uid));			
		} else {
			$this->Session->setFlash("对不起，您还没有登录！");				
			$this->redirect(array(
					"controller" => "Users",
					"action" => "login"
			));
		}
	}
	
	// 写简历
	public function write($uid = null)	{
		if ($this->Session->check("uid")) {
			$sid = $this->Session->read("uid");
			$isadmin = $this->Session->read("isadmin");			
		} else {
			$this->Session->setFlash("对不起，您还没有登录！");
			$this->redirect(array(
					"controller" => "Users",
					"action"     => "login"
			));
		}

		if ($sid === $uid) {
			$this->loadModel("User");
			$this->User->id = $uid;			
			$user = $this->User->read();
			$this->set("uid", $uid);
			if (!empty($user)) {
				$this->loadModel("Skill");
				$this->loadModel("Education");
				$this->loadModel("Experience");
				$this->loadModel("Book");
					
				$skills = $this->Skill->findAllByUser_id($uid);
				$educations = $this->Education->findAllByUser_id($uid);
				$experiences = $this->Experience->findAllByUser_id($uid);
				$books = $this->Book->findAllByUser_id($uid);												
			} else {
				$this->Session->setFlash("对不起，您所访问的用户不存在！");
				$this->redirect(array(
						"action" => "index",						
				));
			}
		} else {
			$this->Session->setFlash("对不起，您不是当前用户！");
			$this->redirect(array(
					"action" => "index",						
			));
		}

		if ($this->request->is( "get" )) {
			$this->request->data["Resume"]["resume_label"] 
				= $user["User"]["first_name"].$user["User"]["last_name"].
				"新简历".$this->Resume->find("count", array(
						"conditions" => array("Resume.user_id" => $uid
				)
			));
			$this->request->data["Resume"]["email"] = $user["User"]["email"];
			$this->request->data["Resume"]["first_name"] = $user["User"]["first_name"];
			$this->request->data["Resume"]["last_name"] = $user["User"]["last_name"];
			
			//设置教育选项
			$arr = array();
			foreach ($educations as $t)
			{
				$arr[$t["Education"]["id"]] 
					= $t["Education"]["school"]."：". $t["Education"]["degree"];	
			}
			$this->set("educations", $arr);
			
			//设置职业选项
			$arr = array();
			foreach ($experiences as $t)
			{
				$arr[$t["Experience"]["id"]] 
					= $t["Experience"]["company"]."：".$t["Experience"]["title"];
			}
			$this->set("experiences", $arr);
			
			//设置技能选项
			$arr = array();
			foreach ($skills as $t)
			{
				$arr[$t["Skill"]["id"]] 
					= $t["Skill"]["skillname"]."：".$t["Skill"]["level"];
			}
			$this->set("skills", $arr);
			
			//设置书籍选项
			$arr = array();
			foreach ($books as $t)
			{
				$arr[$t["Book"]["id"]] = $t["Book"]["bookname"];
			}			
			$this->set("books", $arr);			
		} else {
			$this->request->data["Resume"]["educations"]
				= json_encode($this->request->data["Resume"]["educations"]);
			$this->request->data["Resume"]["experiences"] 
				= json_encode($this->request->data["Resume"]["experiences"]);
			$this->request->data["Resume"]["skills"] 
				= json_encode($this->request->data["Resume"]["skills"]);
			$this->request->data["Resume"]["books"]
				= json_encode($this->request->data["Resume"]["books"]);
			$this->request->data["Resume"]["user_id"] = $uid;
				
			if ($this->Resume->save($this->request->data)) {
				$this->Session->setFlash ( "已经成功保存信息！" );
		
				$this->redirect (array(
						"controller" => "Resumes",
						"action" => "reslist",
						$uid
				));
			} else {
				$this->Session->setFlash ( "出错啦！" );
			}
		}
		
	}
	
	// 修改简历
	public function edit($res_id = null) {
		if ($res_id == null) {
			$this->redirect(array(
					"action" => "index",						
			));
		}
		$res = null;
		// 检查用户状态
		if ($this->Session->check("uid")) {
			$uid = $this->Session->read("uid");				
			$this->Resume->id = $res_id;
			$res = $this->Resume->read();
			if (empty($res)){
				$this->Session->setFlash("该简历不存在！");
				$this->redirect(array("action" => "index"));
			} elseif($res["Resume"]["user_id"] !== $this->Session->read("uid")) {
				$this->Session->setFlash("对不起，您没有编辑该简历的权限！");
				$this->redirect(array("action" => "index"));
			}
		} else {
			$this->Session->setFlash("对不起，您还没有登录！");
			$this->redirect(array(
					"controller" => "Users",
					"action"     => "login"
			));
		}
		//保存信息
		$this->set("uid", $res["Resume"]["user_id"]);
		if ($this->request->is( "get" )) {
			$this->request->data = $res;
			
			$this->loadModel("Skill");
			$this->loadModel("Education");
			$this->loadModel("Experience");
			$this->loadModel("Book");
			$skills = $this->Skill->findAllByUser_id($uid);
			$educations = $this->Education->findAllByUser_id($uid);
			$experiences = $this->Experience->findAllByUser_id($uid);
			$books = $this->Book->findAllByUser_id($uid);
			
			//设置教育选项
			$arr = array();
			foreach ($educations as $t)
			{
				$arr[$t["Education"]["id"]]
				= $t["Education"]["school"]."：". $t["Education"]["degree"];
			}
			$this->set("educations", $arr);
			$this->set("showEdu", json_decode($res["Resume"]["educations"]));
			
			//设置职业选项
			$arr = array();
			foreach ($experiences as $t)
			{
				$arr[$t["Experience"]["id"]]
				= $t["Experience"]["company"]."：".$t["Experience"]["title"];
			}
			$this->set("experiences", $arr);
			$this->set("showExp", json_decode($res["Resume"]["experiences"]));

			//设置技能选项
			$arr = array();
			foreach ($skills as $t)
			{
				$arr[$t["Skill"]["id"]]
				= $t["Skill"]["skillname"]."：".$t["Skill"]["level"];
			}
			$this->set("skills", $arr);
			$this->set("showSk", json_decode($res["Resume"]["skills"]));
			
			//设置书籍选项
			$arr = array();
			foreach ($books as $t)
			{
				$arr[$t["Book"]["id"]] = $t["Book"]["bookname"];
			}
			$this->set("books", $arr);
			$this->set("showBk", json_decode($res["Resume"]["books"]));
		} else {
			$this->request->data["Resume"]["educations"]
				= json_encode($this->request->data["Resume"]["educations"]);
			$this->request->data["Resume"]["experiences"]
				= json_encode($this->request->data["Resume"]["experiences"]);
			$this->request->data["Resume"]["skills"]
				= json_encode($this->request->data["Resume"]["skills"]);
			$this->request->data["Resume"]["books"]
				= json_encode($this->request->data["Resume"]["books"]);
				
			if ($this->Resume->save($this->request->data)) {
				$this->Session->setFlash ( "已经成功保存简历！" );		
				$this->redirect (array(
						"controller" => "Resumes",
						"action" => "reslist",
						$res["Resume"]["user_id"]
				));
			} else {
				$this->Session->setFlash ( "出错啦！" );
			}
		}		
	}
	
	// 删除简历
	public function remove($rid = null)
	{
		if ($rid == null) {
			$this->redirect(array(
					"action" => "index",
						
			));
		}
		$res = null;
		// 检查用户状态
		if ($this->Session->check("uid")) {
			$this->Resume->id = $rid;
			$res = $this->Resume->read();
			if (empty($res)){
				$this->Session->setFlash("该简历不存在！");
				$this->redirect(array("action" => "index"));
			} elseif($res["Resume"]["user_id"] !== $this->Session->read("uid")) {
				$this->Session->setFlash("对不起，您没有删除该简历的权限！");
				$this->redirect(array("action" => "index"));
			}
		} else {
			$this->Session->setFlash("对不起，您还没有登陆！");
			$this->redirect(array(
					"controller" => "Users",
					"action"     => "login"
			));
		}
			
		
		if ($this->Resume->delete($rid)) {
			$this->Session->setFlash("简历：".$res["Resume"]["resume_label"]."已被删除！");
			$this->redirect(array(
					"controller" => "Resumes",
					"action" => "reslist",
					$res["Resume"]["user_id"]
			));
		}
	}	
	
	// 显示公开简历列表
	public function show() {
		$pub_resume = $this->Resume->find("all", array(
				"conditions" => array("Resume.ispublic" => true)
		));
		$this->set("resumes", $pub_resume);
	}
	
	// 搜索公开简历
	public function search(){
		if ($this->request->is( "post" )) {
			switch($this->data["Resume"]["searchlist"]) {
				case 0:
					$rs = self::searchStudy($this->data["Resume"]["searchbox"]);
					break;
				case 1:
					$rs = self::searchSkill($this->data["Resume"]["searchbox"]);
					break;					
				case 2:
					$rs = self::searchTitle($this->data["Resume"]["searchbox"]);						
					break;
			}
			$this->set("resumes", $rs);
			if ($rs == array()) {
				$this->set("notfind","对不起，没有找到您所需要的简历。。");
			}
			
		}
	}
	
	private function searchStudy($key = null)
	{
		if ($key == null) {return null;}
		$rs = array();
		$this->loadModel("Education");
		$temp = $this->Education->find("all", array(
				"conditions" => array("Education.study LIKE" => "%".$key."%")
		));
		foreach ($temp as $i){
			$trs = $this->Resume->find("all", array(
					"conditions" => array(
							"Resume.ispublic" => true,
							"Resume.educations LIKE" => '%"'.$i["Education"]["id"].'"%'
					)
			));
			$rs = array_merge($rs,$trs);
		}
		return $rs;
		
	}
	
	private function searchSkill($key = null)
	{
		if ($key == null) {return null;}
		$rs = array();
		$this->loadModel("Skill");
		$temp = $this->Skill->find("all", array(
				"conditions" => array("Skill.skillname LIKE" => "%".$key."%")
		));
		foreach ($temp as $i){
			$trs = $this->Resume->find("all", array(
					"conditions" => array(
							"Resume.ispublic" => true,
							"Resume.skills LIKE" => '%"'.$i["Skill"]["id"].'"%'
					)
			));
			$rs = array_merge($rs,$trs);
		}
		
		return $rs;
	}
	
	private function searchTitle($key = null)
	{
		if ($key == null) {return null;}
		$rs = array();
		$this->loadModel("Experience");
		$temp = $this->Experience->find("all", array(
				"conditions" => array("Experience.title LIKE" => "%".$key."%")
		));
		foreach ($temp as $i){
			$trs = $this->Resume->find("all", array(
					"conditions" => array(
							"Resume.ispublic" => true,
							"Resume.experiences LIKE" => '%"'.$i["Experience"]["id"].'"%'
					)
			));
			$rs = array_merge($rs,$trs);
		}
		
		return $rs;		
	}
	
	// 基本简历 
	public function baseResume($rid = null) {
		if($rid == null) {
			if($this->Session->check("uid")) {
				$this->redirect(array(
						"action" => "reslist",
						$this->Session->read("uid")
				));
			} else {
				$this->redirect(array("action" => "show"));
			}
		}
		$this->Resume->id = $rid;
		$res = $this->Resume->read();
		if(!empty($res)) {
			if ($this->Session->check("uid") 
				|| $res["Resume"]["ispublic"]) {
				$this->set("resume", $res);
				$this->loadModel("Skill");
				$this->loadModel("Education");
				$this->loadModel("Experience");
				$this->loadModel("Book");

				// 读取教育经历
				$temp = $this->Education->find("all", array(
					"conditions" => array(
						"Education.id" => json_decode($res["Resume"]["educations"]))
				));
				$this->set("edus", $temp);

				// 读取教育经历
				$temp = $this->Experience->find("all", array(
						"conditions" => array(
								"Experience.id" => json_decode($res["Resume"]["experiences"]))
				));
				$this->set("exps", $temp);
				
				// 读取教育经历
				$temp = $this->Skill->find("all", array(
						"conditions" => array(
								"Skill.id" => json_decode($res["Resume"]["skills"]))
				));
				$this->set("sks", $temp);
				
				// 读取教育经历
				$temp = $this->Book->find("all", array(
						"conditions" => array(
								"Book.id" => json_decode($res["Resume"]["books"]))
				));
				$this->set("bks", $temp);
				
			}
		} else {
			
			self::baseResume(null);
		}
	}
}
?>