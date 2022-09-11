<?php

require_once 'openid.php';

$openid = new OpenID();
$hash = $openid->encrypt(1337);
echo 'Encrypted: ' . $hash . PHP_EOL;
echo 'Decrypted: ' . $openid->decrypt($hash);