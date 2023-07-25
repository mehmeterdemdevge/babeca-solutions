<?php

class UserRegistration
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function registerUser($email, $password)
    {
        $data = "$email,$password\n";
        file_put_contents($this->filename, $data, FILE_APPEND);
    }

    public function checkUserData($email, $password)
    {
        $file = fopen($this->filename, 'r');
        while (($line = fgets($file)) !== false) {
            list($stored_email, $stored_password) = explode(',', trim($line));
            if ($email === $stored_email && $password === $stored_password) {
                fclose($file);
                return true;
            }
        }
        fclose($file);
        return false;
    }
}
