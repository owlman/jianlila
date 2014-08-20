<?php
class ExperiencesController extends AppController {
	public $name = "Experiences";
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
					"action" => "explist",
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
	
	public function explist($uid = null)
	{
		$this->set("uid",$uid);
		if ($this->Session->check("uid")) {
			$sid = $this->Session->read("uid");			
			if($uid === $sid || $this->Session->read("isadmin")) {
				$this->set("exps", $this->Experience->findAllByUser_id($uid));				
			} else {
				$this->redirect(array("action" => "index"));
			}
		} else {
			$this->Session->setFlash("对不起，您还没有登录！");
			$this->redirect(array(
					"controller" => "Users",
					"action"     => "login"
			));
		}
	}
		
	public function expadd($uid = null) {
				
		if ($this->Session->check("uid")) {
			$this->set("uid",$uid);
			$sid = $this->Session->read("uid");
			if(($uid === $sid || $this->Session->read("isadmin"))
					&& $this->request->is("post")) {
				$this->request->data["Experience"]["user_id"] = $uid;
				//print_r($this->request->data);			
				if ($this->Experience->save($this->request->data)) {
					$this->Session->setFlash("信息已成功添加！");
					$this->redirect(array(
							"action" => "explist",
							$this->request->data["Experience"]["user_id"]
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
	
	public function expedit($expid = null)
	{
		if ($expid == null) { $this->redirect(array("action" => "explist"));	}
		$Exp = null; 
		// 检查用户状态
		if ($this->Session->check("uid")) {
			$this->Experience->id = $expid;
			$Exp = $this->Experience->read();
			if (empty($Exp)){
				$this->Session->setFlash("该信息不存在！");
				$this->redirect(array("action" => "index"));
			} elseif($Exp["Experience"]["user_id"] !== $this->Session->read("uid")
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
		$this->set("uid", $Exp["Experience"]["user_id"]);
		if ($this->request->is( "get" )) {
			$this->request->data = $Exp;
		} else {
			if ($this->Experience->save($this->request->data)) {
				$this->Session->setFlash ( "已经成功保存信息！" );
				
				$this->redirect (array(
						"action" => "explist",
						$Exp["Experience"]["user_id"]
				));
			} else {
				$this->Session->setFlash ( "出错啦！" );
			}
		}
	}
	
	public function expremove($expid = null)
	{
		if ($expid == null) { $this->redirect(array("action" => "explist"));	}
		// 检查用户状态
		if ($this->Session->check("uid")) {
			$this->Experience->id = $expid;
			$Exp = $this->Experience->read();
			if (empty($Exp)){
				$this->Session->setFlash("该信息不存在！");
				$this->redirect(array("action" => "index"));
			} elseif($Exp["Experience"]["user_id"] !== $this->Session->read("uid")
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
		 
		
		if ($this->Experience->delete($expid)) {
			$this->Session->setFlash("职务：".$Exp["Experience"]["title"]."的信息已被删除！");
			$this->redirect(array(
					"action" => "explist",
					$Exp["Experience"]["user_id"]
			));
		}
	}	
};
?>