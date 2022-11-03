<?php
require_once "database/Crud.php";
include_once "models/classes/User.php";
class UserCrud
{
    private $crud;
    public function __construct()
    {
        $this->crud = new Crud();
    }
    public function readUsers()
    {
        $sql = "Select * from users where :condition";
        $params['condition'] = 1;
        return $this->crud->readMoreRow(sql: $sql, params: $params, class: "User");
    }
    public function readUserById($id)
    {
        $sql = "Select * from users where id= :id";
        $params['id'] = $id;
        $SelectedUsers = $this->crud->readMoreRow(sql: $sql, params: $params, class: "User");
        return sizeof($SelectedUsers) == 1 ? $SelectedUsers[0] : false;
    }
    public function readUserByEmail($id)
    {
        $sql = "Select * from users where email= :email";
        $params['email'] = $id;
        $SelectedUsers = $this->crud->readMoreRow(sql: $sql, params: $params, class: "User");
        return sizeof($SelectedUsers) == 1 ? $SelectedUsers[0] : false;
    }
    public function createUser($user = new User())
    {
        $sql = "INSERT INTO users(`name`,`email`,`password`) VALUES( :name,:email,:password)";
        $params['email'] = $user->getEmail();
        $params['name'] = $user->getName();
        $params['password'] = $user->getPassword();
        $user_id = $this->crud->createOne(sql: $sql, params: $params);
        return $user_id>=1 ? $user_id : false;
    }
    public function updateUser($name, $email,$password , $id)
    {
        $sql = "UPDATE users SET email=:email , name=:name , password=:password WHERE id=:id";
        $params['id'] = $id;
        $params['email'] = $email;
        $params['name'] = $name;
        $params['password'] = $password;
        $updeted = $this->crud->updateRow(sql: $sql, params:$params);
        return $updeted>=1 ? $updeted: false;
    }
    public function deleteUser( $id)
    {
        $sql = "DELETE FROM users WHERE id=:id";
        $params['id'] = $id;        
        $updeted = $this->crud->updateRow(sql: $sql, params:$params);
        return $updeted>=1 ? $updeted: false;
    }

}
