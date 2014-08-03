<?php
class UsersController extends AppController{
	public $name = "Users";
	public $helper = array("Html","Form");	
	
	public function index(){
		$this->set("users",$this->User->find("all"));
	}
	public function usermsg($id = null)
	{
		$this->User->id = $id;
		$this->set("user",$this->User->read());
	}
	
	public $components = array('Session');
		
	public function adduser() {
		if($this->request->is("post")) {
			if($this->User->save(($this->request->data))) {  
				$this->Session->setFlash('add user!');  
				$this->redirect(array('action' => 'index'));  
			} else {  
				$this->Session->setFlash('add Error!');  
			}  
		}
	}
	public function edituser($id = null){
     	$this->User->id = $id; 
		$this->set("user",$this->User->read());
		if ($this->request->is('get')) { 
			$this->request->data = $this->User->read(); 
		} else {
			if ($this->User->save($this->request->data)) { 
				$this->Session->setFlash('Save!'); 
				$this->redirect(array('action' => 'index')); 
			} else { 
				$this->Session->setFlash('Edit Error!'); 
			}
		}
	}
	public function deleteuser($id) {
		$this->User->id = $id; 
		$user = $this->User->read();
		if ($this->request->is('get')) { 
			throw new MethodNotAllowedException();
		} if ($this->User->delete($id)) { 
			$this->Session->setFlash('The user:' . $user["User"]["username"] . ' has be remove!'); 
			$this->redirect(array('action' => 'index')); 
		}
	}
//	public function login(){
//		$this->set("error",false);
		
//	}
};
?>
