<?php

require_once 'openid.php';

$openid = new OpenID();

$openid->id = 100;
echo 'Encrypted: ' . $openid->encrypt() . PHP_EOL;

$openid->id = $openid->encrypt();
echo 'Decrypted: ' . $openid->decrypt();