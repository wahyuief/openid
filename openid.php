<?php

class OpenID
{
    public $id;
    
    public $key;

    public $cipher;

    private $ivlen;

    private $iv;
    
    public function __construct()
    {
        $this->key = ($this->key ? $this->key : uniqid());
        $this->cipher = ($this->cipher ? $this->cipher : 'BF-CBC');
        $this->ivlen = openssl_cipher_iv_length($this->cipher);
        $this->iv = openssl_random_pseudo_bytes($this->ivlen);
    }

    public function encrypt()
    {
        return bin2hex(openssl_encrypt(base_convert($this->id, 10, 36), $this->cipher, $this->key, OPENSSL_RAW_DATA, $this->iv));
    }

    public function decrypt()
    {
        return base_convert(openssl_decrypt(pack('H*', $this->id), $this->cipher, $this->key, OPENSSL_RAW_DATA, $this->iv), 36, 10);
    }   
}