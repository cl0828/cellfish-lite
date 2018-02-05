<?php
require_once("../../prelude.php");
require_once("../../src/sqlite3.php");

request_method("GET");
request_params([]);

ok_with(\sqlite3\query("SELECT id, title, created_at, updated_at FROM posts
    ORDER BY created_at DESC"));
