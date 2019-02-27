<?php

namespace Sounoob\pagseguro\core;

/**
 * Class Utils
 * @package Sounoob\pagseguro\core
 */
class Utils
{

    /**
     * @param int $number
     * @return int
     */
    static public function onlyNumbers($number)
    {
        return (int)preg_replace('/[^0-9]/', '', $number);
    }

    /**
     * @param string $email
     * @return string|bool
     */
    static public function getDomainFromEmail($email)
    {
        $domain = explode('@', $email);

        if (count($domain) != 2) {
            return false;
        }
        return end($domain);
    }

    /**
     * @param int $cpf
     * @return bool
     */
    static public function checkCPF($cpf)
    {
        if (empty($cpf)) {
            return false;
        }
        $cpf = self::onlyNumbers($cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        for ($verifier = 9; $verifier < 11; $verifier++) {
            for ($digit = 0, $position = 0; $position < $verifier; $position++) {
                $digit += $cpf{$position} * (($verifier + 1) - $position);
            }
            $digit = ((10 * $digit) % 11) % 10;
            if ($cpf{$position} != $digit) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param int $cnpj
     * @return bool
     */
    static public function checkCNPJ($cnpj)
    {
        if (empty($cnpj)) {
            return false;
        }
        $cnpj = self::onlyNumbers($cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

        if (strlen($cnpj) != 14 || preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
            $sum += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $verifier = $sum % 11;
        if ($cnpj{12} != ($verifier < 2 ? 0 : 11 - $verifier))
            return false;
        for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
            $sum += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $verifier = $sum % 11;
        return $cnpj{13} == ($verifier < 2 ? 0 : 11 - $verifier);
    }

}