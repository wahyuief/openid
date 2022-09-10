# OpenID
Simple encrypt decrypt ID powered by openssl

## How to use?
### Simple using
```
$openid = new OpenID();
$openid->id = 1;
echo $openid->encrypt();
```
### Custom your own key
```
$openid = new OpenID();
$openid->id = 1;
$openid->key = 'my_secret_key';
echo $openid->encrypt();
```
### Custom key & cipher method
```
$openid = new OpenID();
$openid->id = 1;
$openid->key = 'my_secret_key';
$openid->cipher = 'aes-128-cbc';
echo $openid->encrypt();
```
You can find out [openssl_get_cipher_methods](https://www.php.net/manual/en/function.openssl-get-cipher-methods.php)
