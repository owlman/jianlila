<?php
class ResumesController extends AppController {
	
	public $helper = array (
			"Html",
			"Form",
			"Js",
			"Jquery" => array("Jquery")
	);
	
	public $components = array (
			"Session"
	);
	
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

		if ($sid === $uid || $isadmin){
			$this->loadModel("User");
			$this->loadModel("Skill");
			$this->loadModel("Education");
			$this->loadModel("Experience");
			$this->loadModel("Book");
			
			$this->User->id = $uid;
			$user = $this->User->read();
			if (!empty($user)) {
				$this->set("uid", $uid);
				$this->set("isadmin", $isadmin);
				
				$this->set("user",$user);
				$this->set("skills", $this->Skill->findAllByUser_id($uid));
				$this->set("educations", $this->Education->findAllByUser_id($uid));
				$this->set("experiences", $this->Experience->findAllByUser_id($uid));
				$this->set("books", $this->Book->findAllByUser_id($uid));
			} else {
				$this->Session->setFlash("对不起，您所访问的用户不存在！");
				$this->redirect(array(
					"controller" => "Pages",
						"action" => "index"
				));
			}
		}
		$this->set("users",$this->User->find('all'));
		$this->set("skills",$this->Skill->find('all'));
		
	}
	
	public function show() {
	
	}
	
	public function search(){
	
	}
}
?>