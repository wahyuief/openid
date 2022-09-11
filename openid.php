<?php

class OpenID
{
    public $secret_key;

    public $salt_key;

    public $cipher;

    private $ivlen;

    private $iv;
    
    public function __construct($cipher_method = 'bf-cbc')
    {
        $this->secret_key = 'd3f4ult_s3c2Et_k3y';
        $this->salt_key = base64_encode(openssl_random_pseudo_bytes(32));
        $this->cipher = $cipher_method;
        $this->ivlen = openssl_cipher_iv_length($this->cipher);
        $this->iv = openssl_random_pseudo_bytes($this->ivlen);
    }

    public function encrypt($id)
    {
        $encrypted = openssl_encrypt(base_convert($id, 10, 36), $this->cipher, $this->secret_key, OPENSSL_RAW_DATA, $this->iv);
        $salt = hash_hmac('md5', $encrypted, $this->salt_key, true);
        return bin2hex($this->iv.$salt.$encrypted);
    }

    public function decrypt($hash)
    {
        $hash = pack('H*', $hash);
        $this->iv = substr($hash, 0, $this->ivlen);
        $encrypted = substr($hash, $this->ivlen+16);
        $salt = substr($hash, $this->ivlen, 16);
        $new_salt = hash_hmac('md5', $encrypted, $this->salt_key, true);
        $id = base_convert(openssl_decrypt($encrypted, $this->cipher, $this->secret_key, OPENSSL_RAW_DATA, $this->iv), 36, 10);
        return (hash_equals($salt, $new_salt) ? $id : false);
    }
}