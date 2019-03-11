<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 05/03/2019
 * Time: 15:13
 */

namespace BachNguyen\Core\Helper;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class JWTHelper
{
    public static function createJWTToken($accountId, $userId)
    {
        $secondsOf60Days = 60 * 24 * 3600;
        $signer = new Sha256();
        $jwtBuilder = new Builder();
        $jwtBuilder->setIssuer('Thudo@Lyso');
        $jwtBuilder->setSubject('Thudo@Lyso');
        $jwtBuilder->setAudience('Lyso@Client');
        $jwtBuilder->setExpiration(time() + $secondsOf60Days);
        $jwtBuilder->setIssuedAt(time());
        $jwtBuilder->setNotBefore(time() + 1);
        $jwtBuilder->setId($accountId);
        $jwtBuilder->set('user_id', $userId);
        $jwtBuilder->sign($signer, 'QuangBach@123');
        return $jwtBuilder->getToken()->__toString();
    }

    public static function validateToken($token)
    {
        $signer = new Sha256();
        $token = (new Parser())->parse($token);
        if (!$token->verify($signer, 'QuangBach@123')) {
            return false;
        }
        $validator = new ValidationData();
        $validator->setIssuer('Thudo@Lyso');
        $validator->setAudience('Lyso@Client');
        if (!$token->validate($validator)) {
            return false;
        }
        return $token;
    }
}