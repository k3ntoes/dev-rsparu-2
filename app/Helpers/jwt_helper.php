<?php

use App\Models\UserModel;
use Config\Services;
use Firebase\JWT\JWT;

function getJWTFromRequest($authenticationHeader): string
{
    if (is_null($authenticationHeader)) throw new Exception('Missing or invalid JWT in request');
    // return $authenticationHeader;
    return explode(' ', $authenticationHeader)[1];
}

function validateJWTFromRequest(string $encodedToken)
{
    $key = Services::getSecretKey();
    $decodeToken = JWT::decode($encodedToken, $key, ['HS256']);
    $userModel = new UserModel();
    $userModel->find($decodeToken->id);
}

function getSignedForUser(string $id)
{
    $userModel = new UserModel();
    $user = $userModel->find($id);

    return $user->getJwtHash();
}
