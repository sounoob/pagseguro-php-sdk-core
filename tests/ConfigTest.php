<?php

use PHPUnit\Framework\TestCase;
use Sounoob\pagseguro\config\Config;

class ConfigTest extends TestCase
{
    public function testEnv()
    {
        Config::setProduction();
        $this->assertEquals(false, Config::isSandbox());

        Config::setSandbox();
        $this->assertEquals(true, Config::isSandbox());
    }
    public function testToken()
    {
        Config::setProduction();
        $this->assertEquals(32, strlen(Config::getToken()));

        Config::setSandbox();
        $this->assertEquals(32, strlen(Config::getToken()));
    }
}
