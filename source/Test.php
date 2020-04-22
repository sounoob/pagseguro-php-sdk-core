<?php

namespace Sounoob\pagseguro;

use Exception;
use SimpleXMLElement;
use Sounoob\pagseguro\core\PagSeguro;
use stdClass;

/**
 * Class Test
 * @package Sounoob\pagseguro
 */
class Test extends PagSeguro
{
    /**
     * @param string $reference
     * @return Test
     */
    public function setReference($reference)
    {
        $this->get['reference'] = $reference;
        return $this;
    }

    /**
     * @return SimpleXMLElement|stdClass
     * @throws Exception
     */
    public function send()
    {
        $this->url = 'v3/transactions/';
        return parent::send();
    }
}