<?php
class Users extends AppController
{
	public function __construct(){
		parent::__construct();
	}
  public function index(){
  	$users = $this->db->find("users");
  	$this->set("users", $users);
  }
  public function add(){
  	if (true){
      if ($_POST){
        $filter = new Validations();
        $pass = new Password();
        $_POST["password"] = $filter->sanitizeText($_POST["password"]);
        $_POST["password"] = $pass->getPassword($_POST["password"]);
        if($this->db->save("users", $_POST)){
          $this->redirect(array("controller"=>"users")); 
        }
      } 
    } else {
      $this->redirect(array("controller"=>"users","action"=>"add"));
    }
    
  }
  
  public function edit($args){
    if ($_POST){
      $filter = new Validations();
      $pass = new Password();
      if (isset($_POST["password"])){
        unset($_POST["password"]);
      }
      if (!empty($_POST["new_password"])) {
        $_POST["password"] = $filter->sanitizeText($_POST["new_password"]);
        $_POST["password"] = $pass->getPassword($_POST["password"]);
      }
      if ($this->db->update("users", $_POST)){
        $this->redirect(array("controller" =>"users"));
      }
      else{
        $this->redirect(
          array(
            "controller"=>"users",
            "action"    =>"edit/".$args[0]
            ));
      }

    }
    $user = $this->db->find("users","first",array("conditions"=>"users.id=".$args[0]));
    $this->set("user", $user);

  }
  public function delete($args){
    if (@!empty($args[0])) {
     if (!empty($args[0])) {
      $condition = "id=".$args[0];
      try { 
        $this->db->delete("users", $condition);
        if ($this->db->numberRows>0) {
          echo "Registro eliminado!";
        }
        else{
          echo "nose a eliminado";
        }
      } catch (PDOException $e) {
        echo "El Registro esta en uso";
      }
    }
  }

}
public function login(){
 if ($_POST){
  $pass = new Password();
  $filter = new Validations();
  $auth = new Authorization();

  $username = $filter->sanitizeText($_POST["username"]);
  $password = $filter->sanitizeText($_POST["password"]);

  $options["conditions"] = "username = '$username'";
  $user = $this->db->find("users","first", $options);

  if ($pass->isValid($password, $user["password"])){
   $auth->login($user);
   $this->redirect(array("controller"=>"pages"));

 }
 else{
   echo "Usuario no valido";
 }

}

}
public function logout(){
 $auth = new Authorization();
 $auth->logout();
}
}