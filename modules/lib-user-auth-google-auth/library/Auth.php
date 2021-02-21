<?php
/**
 * Auth
 * @package lib-user-auth-google-auth
 * @version 0.0.2
 */

namespace LibUserAuthGoogleAuth\Library;

use LibUserAuthGoogleAuth\Model\GoogleAuth;
use Sonata\GoogleAuthenticator\GoogleAuthenticator;
use Sonata\GoogleAuthenticator\GoogleQrUrl;

class Auth
{
    private static $g;

    private static function getGAuth() {
        if(self::$g)
            return self::$g;

        self::$g = new GoogleAuthenticator();

        return self::$g;
    }

    public static function getUserSecret(object $user): string
    {
        $d_secret = GoogleAuth::getOne(['user' => $user->id]);
        if($d_secret)
            return $d_secret->secret;

        $g = self::getGAuth();

        $secret = $g->generateSecret();

        GoogleAuth::create(['user' => $user->id, 'secret' => $secret]);

        return $secret;
    }

    public static function getQRUrl(object $user): string
    {
        $g = self::getGAuth();
        $secret = self::getUserSecret($user);
        $issuer = \Mim::$app->config->name;

        return GoogleQrUrl::generate($user->id, $secret, $issuer);
    }

    public static function validate(object $user, string $code): bool
    {
        $g = self::getGAuth();
        $secret = self::getUserSecret($user);

        return !!$g->checkCode($secret, $code);
    }
}
