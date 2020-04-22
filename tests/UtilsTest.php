<?php
class UtilsTest extends \PHPUnit\Framework\TestCase
{
    public function testNumbers()
    {
        $this->assertEquals('1156731493', \Sounoob\pagseguro\core\Utils::onlyNumbers('(11) 5673-1493'));
        $this->assertEquals('01234567890', \Sounoob\pagseguro\core\Utils::onlyNumbers('012.345.678-90'));
        $this->assertEquals('12031990', \Sounoob\pagseguro\core\Utils::onlyNumbers('12/03/1990'));
    }

    public function testCPF()
    {
        $this->assertEquals(true, \Sounoob\pagseguro\core\Utils::checkCPF('527.574.181-22'));
        $this->assertEquals(true, \Sounoob\pagseguro\core\Utils::checkCPF('20021855145'));
        $this->assertEquals(false, \Sounoob\pagseguro\core\Utils::checkCPF('012.345.678-91'));
        $this->assertEquals(false, \Sounoob\pagseguro\core\Utils::checkCPF('000.000.000-00'));
        $this->assertEquals(false, \Sounoob\pagseguro\core\Utils::checkCPF('00000000000'));
    }

    public function testCNPJ()
    {
        $this->assertEquals(true, \Sounoob\pagseguro\core\Utils::checkCNPJ('02.287.830/0001-77'));
        $this->assertEquals(true, \Sounoob\pagseguro\core\Utils::checkCNPJ('25936072000176'));
        $this->assertEquals(false, \Sounoob\pagseguro\core\Utils::checkCNPJ('02.288.703/0001-77'));
        $this->assertEquals(false, \Sounoob\pagseguro\core\Utils::checkCNPJ('00.000.000/0000-00'));
        $this->assertEquals(false, \Sounoob\pagseguro\core\Utils::checkCNPJ('00000000000000'));
    }

    public function testEmailDomain()
    {
        $this->assertEquals('sounoob.com.br', \Sounoob\pagseguro\core\Utils::getDomainFromEmail('contato@sounoob.com.br'));
        $this->assertEquals(false, \Sounoob\pagseguro\core\Utils::getDomainFromEmail('contato@sou@noob.com.br'));
        $this->assertEquals(false, \Sounoob\pagseguro\core\Utils::getDomainFromEmail('sounoob.com.br'));
    }
}
