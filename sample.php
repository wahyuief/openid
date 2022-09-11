<?php

require_once 'openid.php';

$openid = new OpenID('aes-128-cbc');
$openid->secret_key = 'my_secret_key';
$openid->salt_key = 'my_salt_key';
$hash = $openid->encrypt(1337);
echo 'Encrypted: ' . $hash . PHP_EOL;
echo 'Decrypted: ' . $openid->decrypt($hash);