# Bulutfon Php SDK

Bulutfon API'ye erişmek için [Php oauth2-client](https://github.com/thephpleague/oauth2-client) provider'ı. 

* [Dokümantasyon](https://github.com/bulutfon/documents/tree/master/API)
* [Örnek Uygulama](https://github.com/bulutfon/php-sdk/tree/master/examples)

## Kullanım

### Master Token ile

Sdk'yı composer.json dosyanızın içerisine.

	require: "bulutfon/php-sdk"
	
komutunu ekledikten sonra,

	composer install

komutunu koşarak projenize dahil ettikten sonra kullanmaya başlayabilirsiniz.

```php
	$provider = new \Bulutfon\OAuth2\Client\Provider\Bulutfon([
    	'verifySSL'        => false  // (Varsayılan olarak true'dur eğer ssl doğrulaması istenmiyorsa eklenmelidir.
	]); 
```

Şeklinde provider'ınızı tanımladıktan sonra, master token ile bir token objesi oluşturmak gerekmektedir. Bunu da

```php
    $token = new \League\OAuth2\Client\Token\AccessToken(['access_token' => "xxxxxx"]);
```

şeklinde oluşturabilir, ardından oluşturulan provider ve token nesneleri ile api erişimi sağlayabilirsiniz.

### OAUTH2 ile

Sdk'yı composer.json dosyanızın içerisine.

	require: "bulutfon/php-sdk"
	
komutunu ekledikten sonra,

	composer install

komutunu koşarak projenize dahil ettikten sonra kullanmaya başlayabilirsiniz.

```php
	$provider = new \Bulutfon\OAuth2\Client\Provider\Bulutfon([
    	'clientId'          => '{client-id}',
    	'clientSecret'      => '{client-secret}',
    	'redirectUri'       => 'https://example.com/callback-url',
    	//'verifySSL        => false (Varsayılan olarak true'dur eğer ssl doğrulaması istenmiyorsa eklenmelidir.
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

### Dahililere ve dahili detaylarına erişme, dahili oluşturma, güncelleme ve silme

Bunun için;

```php
	$provider->getExtensions($token); // Dahili listesine erişir
	$provider->getExtension($token, $id) // Id'si verilen dahili detayını döndürür
	$params = array(
        'full_name' => $_POST['full_name'], #required
        'email' => $_POST['email'], #required
        'did' => $_POST['did'], #required
        'number' => $_POST['number'], #required
        'voicemail' => $_POST['voicemail'], #required
        'acl' => $_POST['acl'], #required
        'redirection_type' => $_POST['redirection_type'], #required
        'destination_type' => $_POST['destination_type'], #required unless redirection_type is not NONE or EXTERNAL
        'destination_number' => $_POST['destination_number'], #required unless redirection_type is not NONE or EXTERNAL
        'external_number' => $_POST['external_number'] #required if redirection_type is EXTERNAL
    );
	$provider->createExtension($token, $params) // Verilen parametrelere göre yeni dahili oluşturur.
	$provider->updateExtension($token, $id, $params) // Verilen parametrelere göre dahiliyi günceller
	$provider->deleteExtension($token, $id) // Dahiliyi siler
```

methodlarını kullanabilirsiniz.

### Gruplara ve grup detaylarına erişme

Bunun için;

```php
	$provider->getGroups($token); // Grup listesine erişir
	$provider->getGroup($token, $id) // Id'si verilen grup detayını döndürür
```

methodlarını kullanabilirsiniz.

### Arama kayıtlarına ve arama detaylarına erişme ve ses kayıtlarını indirme

Bunun için;

```php
	$provider->getCdrs($token, $params, $page); // Cdr listesine erişir
	$provider->getCdr($token, $uid) // Uid'si verilen cdr detayını döndürür
	# Arama kaydını indirmek için
	$filename = $id.'.wav';
    $save_path = getcwd().'/'.$filename;
    $call_record = $provider->getCallRecord($token, $id, $save_path); # $save_path değişkeni ile verilen pathe ses kaydını kaydeder. (Dosya yazma izinlerinin doğru ayarlandığına emin olunuz.)
    $provider->getCallRecordStreamUrl($token, $id); // Ses Kaydını stream etmek için gerekli url i döndürür
```

methodlarını kullanabilirsiniz.

burada `$params` değişkeni array olup, filtreleme yapmak isterseniz kullanacağınız filtreleri buraya ekleyebilirsiniz. Filtrelerin detayını [dokümantasyondan](https://github.com/bulutfon/documents/blob/master/API/endpoints/cdr.md#filtreler) öğrenebilirsiniz.

`$page` değişkeni ise erişmek istediğiniz sayfayı belirtir.


### Gelen fakslara erişme ve faks dosyasını indirme

Bunun için;

```php
	$provider->getIncomingFaxes($token); // Gelen faksları listeler
	# Faks dökümanını indirmek için
    $filename = $id.'.tiff';
    $save_path = getcwd().'/'.$filename;
    $incomingFax = $provider->getIncomingFax($token, $id, $save_path); # $save_path değişkeni ile verilen pathe faks dökğmanını tiff dosyası olarak. (Dosya yazma izinlerinin doğru ayarlandığına emin olunuz.)
```

methodlarını kullanabilirsiniz.

### Giden fakslara erişme ve faks gönderme

Bunun için;

```php
	$provider->getOutgoingFaxes($token); // Giden faksları listeler
	$provider->getOutgoingFax($token, $id); // Giden faks detayını gösterir
	# Faks Göndermek için
    $file_path = getcwd().'/../incoming_faxes/abc.pdf';
    $arr = array('title' => 'API TEST', 'receivers' => '90850885xxxx,90850885yyyy', 'did' => "90850885xxxx", 'attachment' => $file_path);
    $resp = $provider->sendFax($token, $arr); # $file_path değişkeni ile dosya yolu verilen belgeyi, receivers parametresindeki alıcılara faks olarak gönderir. (Dosya okuma izinlerinin doğru ayarlandığına emin olunuz.)
```

methodlarını kullanabilirsiniz.
    
### Ses Dosyalarını listeleme ve indirme, oluşturma ve silme

Bunun için;

```php
	$provider->getAnnouncements($token); // Ses Dosyalarını listeler
	$provider->getAnnouncement($token, $id, $path); // Ses Dosyasını verilen pathe kaydeder
	$provider->getAnnouncementStreamUrl($token, $id); // Ses Dosyasını stream etmek için gerekli url i döndürür
	/* Ses Dosyası oluşturma */
	$file_path = getcwd().'/test.wav';
    $arr = array('name' => 'API TEST', 'announcement' => $file_path);
    $provider->createAnnouncement($token, $arr);
	/* Ses Dosyası silme */
	$provider->deleteAnnouncement($token, $id);
```

methodlarını kullanabilirsiniz.

### Otomatik Aramaları listeleme ve oluşturma

Bunun için;

```php
	$provider->getAutomaticCalls($token); // Daha önce yapılmış otomatik aramaları listeler
	$provider->getAutomaticCall($token, $id); // Otomatik arama detaylarını görüntüler 
	# Yeni otomatik arama oluşturmak için
    $arr = array('title' => 'API ARAMA TEST', 'receivers' => '90850885xxxx,90850885yyyy',
        'did' => "90850885xxxx", 'gather' => true, 'announcement_id' => 'yyy',

        // Tarih ve saatler opsiyonel varsayılan olarak aktif => true start => 09:00 finish => 18:00 olacaktır
        'mon_active' => true, 'mon_start' => '12:15', 'mon_finish' => '12:15',
        'tue_active' => true, 'tue_start' => '12:15', 'tue_finish' => '12:15',
        'wed_active' => true, 'wed_start' => '12:15', 'wed_finish' => '12:15',
        'fri_active' => true, 'fri_start' => '12:15', 'fri_finish' => '12:15',
        'thu_active' => true, 'thu_start' => '12:15', 'thu_finish' => '12:15',
        'sat_active' => true, 'sat_start' => '12:15', 'sat_finish' => '12:15',
        'sun_active' => true, 'sun_start' => '12:15', 'sun_finish' => '12:15'
    );
    $provider->createAutomaticCall($token, $arr);
```

methodlarını kullanabilirsiniz.

### Sms Başlıklarını Listeleme

Bunun için;

```php
	$provider->getMessageTitles($token); // Panelden oluşturduğunuz sms başlıklarını listeler
```

methodlarını kullanabilirsiniz.

### Mesajları Listeleme ve Mesaj Gönderme

Bunun için;

```php
	$provider->getMessages($token); // Gönderilen mesajları listeler
	$parameters = array("limit" => n, "page" => m); // m. sayfadaki n mesajı görüntüler.
	$provider->getMessages($token, $parameters); // Verilen parametrelere göre Gönderilen mesajları listeler
	$provider->getMessage($token, $id); // Gönderilen mesaj detaylarını görüntüler 
	# Yeni mesaj göndermek için
    $arr = array(
        'title' => 'TEST',
        'content' => 'Test Message',
        'receivers' => "905xxxxxxxxx,905xxxxxxxxx",
        'is_single_sms' => true, # OPSIYONEL, VARSAYILAN false
        'is_future_sms' => true, # OPSIYONEL, VARSAYILAN false
        'send_date' => '21/06/2015 20:22' # OPTIONAL (Eğer is_future_sms true olarak setlendiyse zorunlu)
    );
    $resp = $provider->sendMessage($token, $arr);
```

methodlarını kullanabilirsiniz.

### Token Bilgisi Alma

Bunun için;

```php
	$provider->getTokenInfo($token);
```

methodunu kullanabilirsiniz

Örnek kullanımları görmek için ve erişebileceğiniz değişkenler için [örnek uygulamamızı](https://github.com/bulutfon/php-sdk/tree/master/examples) inceleyebilirsiniz.

## Blog Yazıları & Videolu Anlatımlar

### Videolar

* [Ngrok nedir? Nasıl kullanılır?](https://www.youtube.com/watch?v=bnIs7q_-Olc)
* [Composer Paket Yöneticisi](https://www.youtube.com/watch?v=Qqg6DS1x4Js)
* [Bulutfon PHP-SDK ile SMS nasıl gönderilir?](https://www.youtube.com/watch?v=5svLpM-fY18)
* [Bulutfon PHP-SDK ile Dahililerin Listelenmesi](https://www.youtube.com/watch?v=khuqfHynEH0)
