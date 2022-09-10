# OpenID
Simple encrypt decrypt ID powered by openssl

## How to use?
### Simple using
```
$openid = new OpenID();
echo $openid->encrypt(1);
```
### Custom your own key
```
$openid = new OpenID();
$openid->key = 'my_secret_key';
echo $openid->encrypt(1);
```