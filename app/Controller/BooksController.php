<?php
class BooksController extends AppController {
	public $name = "Books";
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
		
	public function badd($uid = null) {
				
		if ($this->Session->check("uid")) {
			$this->set("uid",$uid);
			$sid = $this->Session->read("uid");
			if(($uid === $sid || $this->Session->read("isadmin"))
					&& $this->request->is("post")) {
				$this->request->data["Book"]["user_id"] = $uid;
				//print_r($this->request->data);			
				if ($this->Book->save($this->request->data)) {
					$this->Session->setFlash("信息已成功添加！");
					$this->redirect(array(
							"controller" => "Users",
							"action" => "message",
							$this->request->data["Book"]["user_id"]
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
	
	public function bedit($bid = null)
	{
		if ($bid == null) { 
			$this->redirect(array(
					"controller" => "Users",
					"action" => "ulist"
			));	
		}
		$book = null; 
		// 检查用户状态
		if ($this->Session->check("uid")) {
			$this->Book->id = $bid;
			$book = $this->Book->read();
			if (empty($book)){
				$this->Session->setFlash("该信息不存在！");
				$this->redirect(array("action" => "index"));
			} elseif($book["Book"]["user_id"] !== $this->Session->read("uid")
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
		$this->set("uid", $book["Book"]["user_id"]);
		if ($this->request->is( "get" )) {
			$this->request->data = $book;
		} else {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash ( "已经成功保存信息！" );
				
				$this->redirect (array(
						"controller" => "Users",
						"action" => "message",
						$book["Book"]["user_id"]
				));
			} else {
				$this->Session->setFlash ( "出错啦！" );
			}
		}
	}
	
	public function bremove($bid = null)
	{
		if ($bid == null) { 
			$this->redirect(array(
					"controller" => "Users",
					"action" => "ulist"
			));	
		}
		// 检查用户状态
		if ($this->Session->check("uid")) {
			$this->Book->id = $bid;
			$book = $this->Book->read();
			if (empty($book)){
				$this->Session->setFlash("该信息不存在！");
				$this->redirect(array("action" => "index"));
			} elseif($book["Book"]["user_id"] !== $this->Session->read("uid")) {
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
		 
		
		if ($this->Book->delete($bid)) {
			$this->Session->setFlash("作品：".$book["Book"]["bookname"]."的信息已被删除！");
			$this->redirect(array(
					"controller" => "Users",
					"action" => "message",
					$book["Book"]["user_id"]
			));
		}
	}	
};
?>
