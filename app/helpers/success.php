<?php
class Success
{
    const SUCCESS_USER_REGISTERED = "2f4f7c3790e9f9d0e3c8f45bd345d7a5";

    private $successList = [];

    public function __construct()
    {
        $this->successList = [
            self::SUCCESS_USER_REGISTERED => 'Registro completado correctamente',
        ];
    }

    public function get(string $key): ?string
    {
        return $this->successList[$key] ?? null;
    }

    public function existsKey(string $key): bool
    {
        return array_key_exists($key, $this->successList);
    }
}
?>