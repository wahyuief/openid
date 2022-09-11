# OpenID
Simple encrypt decrypt ID powered by openssl

## How to use?
### Simple using
```
$openid = new OpenID();
echo $openid->encrypt(1337);
```
### Custom your own key
```
$openid = new OpenID();
$openid->secret_key = 'my_secret_key';
$openid->salt_key = 'my_salt_key';
echo $openid->encrypt(1337);
```
### Custom cipher method
```
$openid = new OpenID('aes-128-cbc');
echo $openid->encrypt(1337);
```