<?php
require_once('database.php');
Class User{
  public function get_all_users () {
    $db=db_connect();
    $statement=$db->prepare("select * from users;");
    $statement->execute();
    $rows=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }
  public function create_user($username, $password){
    $db=db_connect();
    $statement=$db->prepare("insert into users (username, password) values (:username, :password);");
    return $statement->execute([
      ':username' => $username,
      ':password' => $password
    ]);
  }
public function username_exists($username) {
    $db = db_connect();
    $statement = $db->prepare("SELECT COUNT(*) FROM users WHERE username = :username;");
    $statement->execute([':username' => $username]);
    return $statement->fetchColumn() > 0;
}
}
