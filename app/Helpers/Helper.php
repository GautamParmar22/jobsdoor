<?php

namespace App\Helpers;

class Helper
{
    /**
     * Prints the given data and exits if $exit is set to true
     *
     * @param array $data The data to be printed
     * @param bool $exit Whether the script should exit after printing
     * @return void
     */
    public static function pr($data = array(),$exit = false)
    {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
        if($exit)
            exit;
    }


    /**
     * Encrypts or decrypts a given string
     *
     * @param string $action 'encrypt' or 'decrypt'
     * @param string $string The string to be encrypted or decrypted
     * @return string The encrypted or decrypted string
     */
    public static function encryptor($action, $string)
    {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'gautam';
        $secret_iv = 'gautam123';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        //do the encyption given text/string/number
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
}