<?php

require_once 'openid.php';

$openid = new OpenID();
$openid->key = 'my_secret_key';
$hashid = $openid->encrypt(1);
echo 'Encrypted: ' . $hashid . PHP_EOL;
echo 'Decrypted: ' . $openid->decrypt($hashid);