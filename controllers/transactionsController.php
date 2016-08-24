<?php 

class Transactions extends AppController
{
	public function index(){	
		$conditions = array(
			"conditions"=>"transactions.category_id=categories.id and transactions.account_id=accounts.id");
		$transactions = $this->db->find(
			"transactions,categories,accounts","all",
			$conditions
			);
		$transactions = $transactions->fetchAll(PDO::FETCH_NUM);
		$this->set("transactions",$transactions);
	}
	public function add(){	
		if ($_POST){
			if ($this->db->save("transactions", $_POST)) {
				$this->redirect(
					array(
					"controller"=>"transactions"
					   )
					);
			}else{
				$this->redirect(
                     array(
                     	"controller"=>"transactions",
                     	"action"    =>"add"
                     	)
					);
			}
		}
		$categories = $this->db->find("categories");
		$accounts = $this->db->find("accounts");
		$this->set("categories",$categories);
		$this->set("accounts", $accounts);
	}
	public function edit($args){	
		if ($_POST) {
			$this->db->update("transactions", $_POST);
			$this->redirect(array("controller"=>"transactions"));
		}
		$transaction = $this->db->find("transactions", "first", array("conditions"=>"id=".$args[0]));
		$this->set("transaction", $transaction);
		$categories = $this->db->find("categories", "all", array());
		$this->set("categories", $categories);
	}
	public function delete($args){
		if (!empty($args[0])) {
			$conditions = "id=" .$args[0];
			$this->db->delete("transactions", $conditions);
			if ($this->db->numberRows > 0) {
			} else{
				echo "Registro eliminado";
			}
		}
	}
}