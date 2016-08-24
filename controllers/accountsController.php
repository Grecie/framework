<?php 

class Accounts extends AppController
{
	public function index(){
		$accounts = $this->db->find("accounts, users", "all",array("conditions"=>"accounts.user_id=users.id"));
		$accounts = $accounts->fetchAll(PDO::FETCH_NUM);
		$this->set("accounts", $accounts);
	}
	public function add(){	
		if ($_POST){
			if ($this->db->save("accounts", $_POST)) {
				$this->redirect(
					array(
						"controller"=>"accounts"
						)
					);
			}else{
				$this->redirect(
					array(
						"controller"=>"accounts",
						"action"    =>"add"
						)
					);
			}
		}
		$users = $this->db->find("users", "all");
		$this->set("users", $users);
	}
	public function edit($args){	
		if ($_POST) {
			$this->db->update("accounts", $_POST);
			$this->redirect(array("controller"=>"accounts"));
		}
		$category = $this->db->find("accounts", "first", array("conditions"=>"id=".$args[0]));
		$this->set("account", $category);
		$users = $this->db->find("users", "all");
		$this->set("users", $users);
	}
	public function delete($args){
		if (@!empty($args[0])) {
			if (!empty($args[0])) {
				$condition = "id=".$args[0];
				try { 
					$this->db->delete("accounts", $condition);
					if ($this->db->numberRows>0) {
						echo "Registro eliminado!";
					}
					else{
						echo "nose a eliminado";
					}
				} catch (PDOException $e) {
					echo "El Resgistro esta en uso";
				}
			}
		}
	}
}