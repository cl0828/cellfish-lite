<?php
require_once("../../prelude.php");
require_once("../../src/sqlite3.php");
require_once("../../src/util.php");

request_method("POST");
request_params(["old_password", "new_password"]);
$params["username"] = $_SESSION["identity"];
\util\member_only();

$res = \sqlite3\query("SELECT password FROM users
                          WHERE username = :username ", $params );

if($res == $params["old_password"]){
	\sqlite3\execute("UPDATE users SET password = :new_password WHERE username = :username", $params);
    ok();
}else{
	error_with("wrong_password");
}
