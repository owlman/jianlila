<?php
class EducationsController extends AppController {
	public $name = "Educations";
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
			
	public function eduadd($uid = null) {
				
		if ($this->Session->check("uid")) {
			$this->set("uid",$uid);
			$sid = $this->Session->read("uid");
			if(($uid === $sid || $this->Session->read("isadmin"))
					&& $this->request->is("post")) {
				$this->request->data["Education"]["user_id"] = $uid;
				//print_r($this->request->data);			
				if ($this->Education->save($this->request->data)) {
					$this->Session->setFlash("信息已成功添加！");
					$this->redirect(array(
						"controller" => "Users",
						"action" => "message",
						$this->request->data["Education"]["user_id"]
					));
				} else {
					$this->Session->setFlash("信息添加错误，请再试一次！");
				}						
			}
		} else {
			$this->Session->setFlash("对不起，您还没有登录！");
			$this->redirect(array(
					"controller" => "Users",
					"action"     => "login"
			));
		}		
	}
	
	public function eduedit($eid = null)
	{
		if ($eid == null) { 
			$this->redirect(array(
					"controller" => "Users",
					"action" => "ulist",
					
			));
		}
		$edu = null;
		// 检查用户状态
		if ($this->Session->check("uid")) {
			$this->Education->id = $eid;
			$edu = $this->Education->read();
			if (empty($edu)){
				$this->Session->setFlash("该信息不存在！");
				$this->redirect(array("action" => "index"));
			} elseif($edu["Education"]["user_id"] !== $this->Session->read("uid")
					&& !$this->Session->read("isadmin")) {
				$this->Session->setFlash("对不起，您没有编辑该信息的权限！");
				$this->redirect(array("action" => "index"));
			}
		} else {
			$this->Session->setFlash("对不起，您还没有登陆！");
			$this->redirect(array(
					"controller" => "Users",
					"action"     => "login"
			));
		}		
		$this->set("uid", $edu["Education"]["user_id"]);
		if ($this->request->is( "get" )) {
			$this->request->data = $edu;
		} else {
			if ($this->Education->save($this->request->data)) {
				$this->Session->setFlash ( "已经成功保存信息！" );
				
				$this->redirect (array(
						"controller" => "Users",
						"action" => "message",
						$edu["Education"]["user_id"]
				));
			} else {
				$this->Session->setFlash ( "出错啦！" );
			}
		}
	}
	
	public function eduremove($eid = null)
	{
		if ($eid == null) { 
			$this->redirect(array(
					"controller" => "Users",
					"action" => "ulist",
					
			));
		}
		// 检查用户状态
		if ($this->Session->check("uid")) {
			$this->Education->id = $eid;
			$edu = $this->Education->read();
			if (empty($edu)){
				$this->Session->setFlash("该信息不存在！");
				$this->redirect(array("action" => "index"));
			} elseif($edu["Education"]["user_id"] !== $this->Session->read("uid")
				    || !$this->Session->read("isadmin")) {
				$this->Session->setFlash("对不起，您没有删除该信息的权限！");
				$this->redirect(array("action" => "index"));
			}
		} else {
			$this->Session->setFlash("对不起，您还没有登陆！");
			$this->redirect(array(
					"controller" => "Users",
					"action"     => "login"
			));
		}		
		 
		
		if ($this->Education->delete($eid)) {
			$this->Session->setFlash("学历：".$edu["Education"]["degree"]."的信息已被删除！");
			$this->redirect(array(
					"controller" => "Users",
					"action" => "message",
					$edu["Education"]["user_id"]
			));
		}
	}	
};
?>