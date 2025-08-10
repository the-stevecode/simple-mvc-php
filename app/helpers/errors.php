<?php
class Errors
{
    const ERROR_LOGIN_AUTHENTICATE = "44d54e16f2bb9bfaf690aa67b2e83c61"; // 'LOGIN_AUTHENTICATE'
    const ERROR_LOGIN_AUTHENTICATE_EMPTY = "de9b94913f37ed0200b2f8996a7a5baf"; // 'LOGIN_AUTHENTICATE_EMPTY'
    const ERROR_LOGIN_AUTHENTICATE_DATA = "824d5ddf8a4cc76db8d9829ca47b9a1e"; // 'LOGIN_AUTHENTICATE_DATA'

    const ERROR_SIGNUP_INCOMPLETE = "f3c8b1d2e4a5b6c7d8e9f0a1b2c3d4e5"; // 'SIGNUP_INCOMPLETE'
    const ERROR_SIGNUP_EMPTY_FIELDS = "a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6"; // 'SIGNUP_EMPTY_FIELDS'
    const ERROR_SIGNUP_INVALID_EMAIL = "b1c2d3e4f5g6h7i8j9k0l1m2n3o4p5q6"; // 'SIGNUP_INVALID_EMAIL'
    const ERROR_SIGNUP_USER_EXISTS = "c1d2e3f4g5h6i7j8k9l0m1n2o3p4q5r6"; // 'SIGNUP_USER_EXISTS'

    private $errorsList = [];

    public function __construct()
    {
        $this->errorsList = [
            self::ERROR_LOGIN_AUTHENTICATE        => 'Hubo un problema al autenticarse',
            self::ERROR_LOGIN_AUTHENTICATE_EMPTY  => 'Los parámetros para autenticar no pueden estar vacíos',
            self::ERROR_LOGIN_AUTHENTICATE_DATA   => 'Usuario y/o clave incorrectos',

            self::ERROR_SIGNUP_INCOMPLETE         => 'Faltan datos para completar el registro',
            self::ERROR_SIGNUP_EMPTY_FIELDS       => 'Los campos de registro no pueden estar vacios',
            self::ERROR_SIGNUP_INVALID_EMAIL      => 'El correo electrónico proporcionado no es válido',
            self::ERROR_SIGNUP_USER_EXISTS        => 'El usuario ya existe, intenta con otro nombre de usuario o correo electrónico',
        ];
    }

    function get($hash)
    {
        return $this->errorsList[$hash];
    }

    function existsKey($key)
    {
        if (array_key_exists($key, $this->errorsList)) {
            return true;
        } else {
            return false;
        }
    }
}
