<?php
require_once("../../prelude.php");
require_once("../../src/sqlite3.php");
require_once("../../src/util.php");

request_method("POST");
request_params(["bio"]);
$params["username"] = $_SESSION["identity"];
\util\member_only();

\sqlite3\execute("UPDATE users SET bio = :bio WHERE username = :username", $params);
ok();
