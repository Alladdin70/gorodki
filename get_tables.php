<?php
require_once 'db.php';
$db = new DB();
$db->sql = 'SELECT name FROM tables WHERE date >= NOW() OR date IS NULL';
echo (json_encode($db->getArrayASSOC(),JSON_UNESCAPED_UNICODE));