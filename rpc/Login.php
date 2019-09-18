<?php

/**
 * 服务一
 */
class Login
{
    public function userLogin(array $parameter)
    {
        [$name, $password] = array_values($parameter);
        return '您的账号是' . $name . ',您的密码是' . $password . PHP_EOL;
    }
}
