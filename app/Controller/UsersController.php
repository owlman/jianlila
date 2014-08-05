<?php
	class UsersController extends AppController{
		public $name = "Users";
		public $helper = array("Html","Form");	
	
		public function ulist(){
			$this->set("users",$this->User->find("all"));
		}

		public function message($id = null)
		{
			$this->User->id = $id;
			$this->set("user",$this->User->read());
		}
	
		public $components = array("Session");
		
		public function add() {
			if($this->request->is("post")) {
				if($this->User->save(($this->request->data))) {  
					$this->Session->setFlash("add user!");  
					$this->redirect(array("action" => "index"));  
				} else {  
					$this->Session->setFlash("add Error!");  
				}  
			}
		}
		public function edit($id = null){
     		$this->User->id = $id; 
			$this->set("user",$this->User->read());
			if ($this->request->is("get")) { 
				$this->request->data = $this->User->read(); 
			} else {
				if ($this->User->save($this->request->data)) { 
					$this->Session->setFlash("Save!"); 
					$this->redirect(array("action" => "index")); 
				} else { 
					$this->Session->setFlash("Edit Error!"); 
				}
			}
		}
		public function delete($id) {
			$this->User->id = $id; 
			$user = $this->User->read();
			if ($this->request->is("get")) { 
				throw new MethodNotAllowedException();
			} if ($this->User->delete($id)) { 
				$this->Session->setFlash("The user:" . $user["User"]["username"] . " has be remove!"); 
				$this->redirect(array("action" => "index")); 
			}
		}
		
		public function login(){
			$this->set("error",false);
			if($this->request->is("post")) {
				if(!empty($this->data)) {
					$someone = $this->User->findByUsername($this->data["User"]["username"]); 
					//$this->Session->setFlash($someone["User"]["password"]."=".$this->data["User"]["password"]);
				
					if(!empty($someone["User"]["password"]) && 
						$someone["User"]["password"] === $this->data["User"]["password"])
					{
						$this->Session->write("uid",$someone["User"]["id"]);
						$this->redirect(array("action" => "message",$someone["User"]["id"])); 
					} else {  
						$this->set("error",true);  
					}  
				}
			}
		}
		
		public function logout(){
			if($this->Session->check("uid"))
			{
				$this->Session->delete("uid");
				$this->redirect(array("action" => "index")); 
			}
		}
		
		public function index(){
			if($this->Session->check("uid"))
			{				
				$this->redirect(array("action" => "message",$this->Session->read("uid"))); 
			} else {
				$this->redirect(array("action" => "login"));
			}

		}
	};
?>
