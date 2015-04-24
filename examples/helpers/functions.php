<?php
    function getAccessTokenFromSession($provider = null) {
        if(isset($_SESSION["accessToken"]) &&
            isset($_SESSION["refreshToken"]) &&
            isset($_SESSION["expires"]) ||
            isset($_SESSION["uid"])) {
            $token = new \League\OAuth2\Client\Token\AccessToken([
                'access_token' => $_SESSION["accessToken"],
                'refresh_token' => $_SESSION["refreshToken"],
                'expires' => $_SESSION["expires"],
                'uid' => $_SESSION["uid"],
            ]);
        } else {
            // Token yoksa kullanıcıdan yetki istemek için auth sayfasına yönlendiriyoruz
            $authUrl = $provider->getAuthorizationUrl();
            header('Location: '.$authUrl);
            exit;
        }

        return $token;
    }