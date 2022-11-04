<?php
require_once "database/Crud.php";
include_once "models/classes/User.php";
class UserCrud
{
    private $crud;
    public function __construct($crud)
    {
        $this->crud = $crud;
    }
    

        
    /**
     * readUsers
     *
     * @return array of Users Class 
     */
    public function readUsers()
    {
        $sql = "Select * from users where :condition";
        $params['condition'] = 1;
        return $this->crud->readMoreRow(sql: $sql, params: $params, class: "User");
    }
        
    /**
     * readUserById
     *
     * @param  number $id
     * @return User Class
     */

    public function readUserById($id)
    {
        $sql = "Select * from users where id= :id";
        $params['id'] = $id;
        $SelectedUsers = $this->crud->readMoreRow(sql: $sql, params: $params, class: "User");
        return sizeof($SelectedUsers) == 1 ? $SelectedUsers[0] : false;
    }
        
    /**
     * readUserByEmail
     *
     * @param  String  $email
     * @return User
     */
    public function readUserByEmail($email)
    {
        $sql = "Select * from users where email= :email";
        $params['email'] = $email;
        $SelectedUsers = $this->crud->readOneRow(sql: $sql, params: $params, class: "User");
        return sizeof($SelectedUsers) == 1 ? $SelectedUsers[0] : null;
    }
        
    /**
     * createUser
     *
     * @param  User $user
     * @return Number id of the addedUser
     */
    public function createUser($user = new User())
    {
        $sql = "INSERT INTO users(`name`,`email`,`password`) VALUES( :name,:email,:password)";
        $params['email'] = $user->getEmail();
        $params['name'] = $user->getName();
        $params['password'] = $user->getPassword();
        $user_id = $this->crud->createOne(sql: $sql, params: $params);
        return $user_id>=1 ? $user_id : false;
    }
        
    /**
     * updateUser
     *
     * @param  String $name
     * @param  String $email
     * @param  String $password
     * @param  Number $id
     * @return number of updated Users
     */
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
    /**
     * deleteUser
     *
     * @param  Number $id
     * @return Number of deleted Users
     */

    public function deleteUser( $id)
    {
        $sql = "DELETE FROM users WHERE id=:id";
        $params['id'] = $id;        
        $deleted = $this->crud->updateRow(sql: $sql, params:$params);
        return $deleted>=1 ? $deleted: false;
    }

}
