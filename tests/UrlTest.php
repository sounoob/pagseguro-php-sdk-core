<?php

use PHPUnit\Framework\TestCase;
use Sounoob\pagseguro\config\Config;
use Sounoob\pagseguro\config\Url;

class UrlTest extends TestCase
{
    public function testProdUrl()
    {
        Config::setProduction();
        $this->assertEquals('https://ws.pagseguro.uol.com.br/', Url::getWs());
        $this->assertEquals('https://pagseguro.uol.com.br/', Url::getPage());
        $this->assertEquals('https://stc.pagseguro.uol.com.br/', Url::getStc());
    }
    public function testSandboxUrl()
    {
        Config::setSandbox();
        $this->assertEquals('https://ws.sandbox.pagseguro.uol.com.br/', Url::getWs());
        $this->assertEquals('https://sandbox.pagseguro.uol.com.br/', Url::getPage());
        $this->assertEquals('https://stc.sandbox.pagseguro.uol.com.br/', Url::getStc());
    }
}
