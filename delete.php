<?php
require_once("../../prelude.php");
require_once("../../src/sqlite3.php");
require_once("../../src/util.php");

request_method("POST");
request_params(["username"]);
\util\admin_only();

$res = \sqlite3\query("SELECT * FROM user WHERE username = :username", $params);

if(sizeof($res) > 0){
	\sqlite3\execute("DELETE FROM user WHERE username = ：username", $params);
    ok();
}else{
	error_with("no_user");
}