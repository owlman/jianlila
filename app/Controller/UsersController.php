<?php
class UsersController extends AppController {
	public $name = "Users";
	public $helper = array (
			"Html",
			"Form" 
	);
	public $components = array (
			"Session" 
	);
	
	// 用户列表
	public function ulist() {
		if ($this->Session->check("uid")) {
			$sid = $this->Session->read("uid");
			$this->set("uid",$sid);
			
			if ($this->Session->read("isadmin")) {
				$this->set ( "users", $this->User->find( "all" ));
			} else {
				$this->redirect(array (
						"action" => "message",
						$sid 
				) );
			}
		} else {
			$this->redirect(array("action" => "login"));
		}
	}
	
	// 用户信息
	public function message($id = null) {
		if ($this->Session->check("uid")) {
			$sid = $this->Session->read("uid");
			$this->set("uid", $sid);
			
			if ($this->Session->read("isadmin") || $id === $sid) {
				$this->set("isadmin", $this->Session->read("isadmin"));
				$this->User->id = $id;
				$t = $this->User->read();
				if (!empty($t)) {
					$this->set("user",$t);
				} else {
					$this->Session->setFlash("对不起，您所访问的用户不存在！");
					$this->redirect(array("action" => "ulist"));
				}
			} else {
				$this->Session->setFlash("对不起，你没有管理员权限！");
				$this->redirect(array (
						"action" => "message",
						$sid 
				));
			}
		} else {
			$this->Session->setFlash("对不起，您还没有登录！");				
			$this->redirect(array("action" => "login"));
		}
	}
	
	// 用户注册
	public function add() {
		$sid = null;
		$this->set("isadmin", false);
		if ($this->Session->check("uid")) {
			$sid = $this->Session->read("uid");
			$this->set("isadmin", $this->Session->read("isadmin"));
		} 
		
		if ($this->request->is("post")) {
			if ($this->request->data["User"]["password"] 
					!== $this->request->data["User"]["password2"]){
				$this->Session->setFlash("您输入的密码不一致，请重新输入!");
				return ;
			}
			
			if ($this->User->save($this->request->data)) {
				if($id!=null && $isadmin==false) {
					$this->Session->setFlash("注册成功，请重新登录！");
					$this->logout();					
				} else {
					$this->Session->setFlash("注册成功！");
				}
				$this->redirect(array("action" => "ulist"));
			} else {
				$this->Session->setFlash("注册错误，请再试一次！");
			}
		}
	}
	
	// 编辑用户信息
	public function edit($id = null) {
		if ($this->Session->check("uid")) {
			$sid = $this->Session->read("uid");
			$this->set("isadmin", $this->Session->read("isadmin"));
			if ($sid !== $id && !$this->Session->read("isadmin")) {
				$this->Session->setFlash("对不起， 您没有管理员权限！");
				$this->redirect( array (
						"action" => "edit",
						$sid 
				));
			}
		} else {
			$this->Session->setFlash("对不起，您还没有登录！");				
			$this->redirect(array("action" => "login"));
		}
		
		$this->User->id = $id;
		$t = $this->User->read();
		if (!empty($t)) {
			$this->set("user",$t);
		} else {
			$this->Session->setFlash("对不起，您所访问的用户不存在！");
			$this->redirect(array("action" => "ulist"));
		}
		
		if ($this->request->is( "get" )) {
			$this->request->data = $this->User->read();
		} else {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash ( "已经成功保存信息！" );
				$this->redirect (array("action" => "ulist"));
			} else {
				$this->Session->setFlash ( "出错啦！" );
			}
		}
	}
	
	// 删除用户
	public function remove($id = null) {
		if ($id == null) { $this->redirect(array("action" => "ulist"));	}
		// 检查用户状态
		if ($this->Session->check("uid")) {
			if (!$this->Session->read("isadmin")) {
				$this->Session->setFlash("对不起，您没有删除用户的权限！");
				return ;
			}
		}				
		
		$this->User->id = $id;
		$user = $this->User->read();
		if (empty($user)){
			$this->Session->setFlash("该用户不存在！");
			$this->redirect(array("action" => "ulist"));
		}
		
		if ($this->User->delete($id)) {
			$this->Session->setFlash("用户：".$user["User"]["username"]."已被删除！");
			$this->redirect(array("action" => "ulist"));	
		}
	}
	
	// 用户登录
	public function login() {
		if ($this->request->is("post")) {
			if (!empty($this->data)) {
				$someone = $this->User->findByUsername($this->data["User"]["username"]);
				
				if (!empty($someone["User"]["password"]) 
					&& $someone["User"]["password"] === $this->data["User"]["password"])
				{
					$this->Session->write("uid", $someone["User"]["id"]);
					$this->Session->write("isadmin",$someone["User"]["isadmin"]);
					$this->Session->write("username",$someone["User"]["username"]);
						
					$this->redirect( array (
							"action" => "message",
							$someone["User"]["id"] 
					));
				} else {
					$this->Session->setFlash("用户名或密码错误！");
				}
			}
		}
	}
	
	// 用户登出
	public function logout() {
		if ($this->Session->check("uid")) {
			$this->Session->delete("isadmin");
			$this->Session->delete("username");
			$this->Session->delete("uid");
			$this->Session->destroy();
			$this->redirect ( array (
					"action" => "index" 
			));
		}
	}
	
	public function index() {
		if ($this->Session->check("uid")) {
			$this->redirect( array (
					"action" => "message",
					$this->Session->read("uid") 
			));
		} else {
			$this->redirect (array("action" => "login"));
		}
	}
	

	public function getjson() {
		$users = $this->User->find('all');
		$this->response->body(json_encode($users));
		return $this->response;
	}	
	
	
};
?>