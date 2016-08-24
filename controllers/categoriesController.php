<?php 

class Categories extends AppController
{
	public function index(){
		$categories = $this->db->find("categories", "all");
		$this->set("categories", $categories);	
	}
	public function add(){
		if ($_POST){
			if ($this->db->save("categories", $_POST)) {
				$this->redirect(
					array(
						"controller"=>"categories"
						)
					);
			}else{
				$this->redirect(
					array(
						"controller"=>"categories",
						"action"    =>"add"
						)
					);
			}
		}	
	}
	public function edit($args){		
		if ($_POST) {
			$this->db->update("categories", $_POST);
			$this->redirect(array("controller"=>"categories"));
		}
		$category = $this->db->find("categories", "first", array("conditions"=>"id=".$args[0]));
		$this->set("category", $category);
	}
	public function delete($args){
		if (@!empty($args[0])) {
			if (!empty($args[0])) {
				$condition = "id=".$args[0];
				try { 
					$this->db->delete("categories", $condition);
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