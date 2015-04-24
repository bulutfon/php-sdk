# Bulutfon SDK

Bulutfon API'ye erişmek için [Php oauth2-client](https://github.com/thephpleague/oauth2-client) provider'ı. 

* [Dökümantasyon](https://github.com/bulutfon/documents/tree/master/API)
* [Örnek Uygulama](https://github.com/bulutfon/php-sdk/tree/master/examples)

## Kullanım

Sdk'yı composer.json dosyanızın içerisine.

	require: "bulutfon/php-sdk"
	
komutunu ekledikten sonra,

	composer install

komutunu koşarak projenize dahil ettikten sonra kullanmaya başlayabilirsiniz.

```php
	$provider = new \Bulutfon\OAuth2\Client\Provider\Bulutfon([
    	'clientId'          => '{client-id}',
    	'clientSecret'      => '{client-secret}',
    	'redirectUri'       => 'https://example.com/callback-url'
	]); 
```

Şeklinde provider'ınızı tanımladıktan sonra, kullanıcıdan izin istemek için

```php
 $authUrl = $provider->getAuthorizationUrl();
 header('Location: '.$authUrl);
```
ile kullanıcıyı uygulama izin sayfasına yönlendirebilirsiniz. Kullanıcı uygulama izni verdikten sonra, callback olarak tanımladığınız sayfada

```php
	$token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);
```

şeklinde access_tokenınızı alabilir veya

```php
	$token = $provider->getAccessToken('refresh_token', [
        'refresh_token' => $refreshToken
    ]);
```

şeklinde expire olmuş token'ınızı yenileyebilirsiniz. İstek sırasında token expire olduysa tekrar tanımladığınız callback_url'e `refresh_token=true` ve `back=istek yapılan url` parametreleri ile yönlenecektir. bu parametreleri yakalayıp tokenınızı yenileyebilirsiniz.


## İşlevler

### Kullanıcı bilgilerine erişme

SDK ile Kullanıcı bilgileriniz, panel bilgileriniz ve kalan kredinize erişebilirsiniz.
Bunun için 

```php
	$provider->getUser($token);
```

methodunu kullanabilirsiniz.

### Telefon numaraları ve telefon numara detaylarına erişme

Bunun için;

```php
	$provider->getDids($token); // Santral listesine erişir
	$provider->getDid($token, $id) // Id'si verilen santral detayını döndürür
```

methodlarını kullanabilirsiniz.

### Dahililere ve dahili detaylarına erişme

Bunun için;

```php
	$provider->getExtensions($token); // Dahili listesine erişir
	$provider->getExtension($token, $id) // Id'si verilen dahili detayını döndürür
```

methodlarını kullanabilirsiniz.

### Gruplara ve grup detaylarına erişme

Bunun için;

```php
	$provider->getGroups($token); // Grup listesine erişir
	$provider->getGroup($token, $id) // Id'si verilen grup detayını döndürür
```

methodlarını kullanabilirsiniz.

### Arama kayıtlarına ve arama detaylarına erişme

Bunun için;

```php
	$provider->getCdrs($token, $params, $page); // Cdr listesine erişir
	$provider->getCdr($token, $uid) // Uid'si verilen cdr detayını döndürür
```

methodlarını kullanabilirsiniz.

burada `$params` değişkeni array olup, filtreleme yapmak isterseniz kullanacağınız filtreleri buraya ekleyebilirsiniz. Filtrelerin detayını [dökümantasyondan](https://github.com/bulutfon/documents/blob/master/API/endpoints/cdr.md#filtreler) öğrenebilirsiniz.

`$page` değişkeni ise erişmek istediğiniz sayfayı belirtir.

Örnek kullanımları görmek için ve erişebileceğiniz değişkenler için [örnek uygulamamızı](https://github.com/bulutfon/php-sdk/tree/master/examples) inceleyebilirsiniz.
    
