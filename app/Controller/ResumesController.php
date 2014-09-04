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
					"controller" => "Users",
					"action" => "message",
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
					"controller" => "Pages",
						"action" => "display",
						"index"
				));
			}
		} else {
			$this->Session->setFlash("对不起，您不是当前用户！");
			$this->redirect(array(
					"controller" => "Users",
					"action" => "message",
					$uid
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
						"controller" => "Users",
						"action" => "message",
						$uid
				));
			} else {
				$this->Session->setFlash ( "出错啦！" );
			}
		}
		
	}
	
	public function edit($res_id = null) {
		if ($res_id == null) {
			$this->redirect(array(
					"controller" => "Pages",
					"action" => "display",
					"index"
						
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
				$this->Session->setFlash ( "已经成功保存信息！" );		
				$this->redirect (array(
						"controller" => "Users",
						"action" => "message",
						$res["Resume"]["user_id"]
				));
			} else {
				$this->Session->setFlash ( "出错啦！" );
			}
		}
		
		
	}
	
	public function show() {
		$pub_resume = $this->Resume->find("all", array(
				"conditions" => array("Resume.ispublic" => true)
		));
		$this->set("resumes", $pub_resume);
	}
	
	public function search(){
	
	}
}
?>