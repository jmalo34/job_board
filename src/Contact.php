<?php
    class Contact
    {
        //properties
        public $phone;
        public $email;

        //methods
        function __construct ($number, $address)
        {
            $this->phone = $number;
            $this->email = $address;
        }

        function showInfo ()
        {
            return $this->phone . " " . $this->email;
        }
        //at some point in time, figure out how to make this display prettier or something... i think if i review business card lesson example i could be cool on it

        function getNumber ()
        {
            return $this->phone;
        }

        function setNumber ($new_number)
        {
            $this->phone = $new_number;
        }

        function getAddress ()
        {
            return $this->email;
        }

        function setAddress ($new_address)
        {
            $this->email = $new_address;
        }
    }
 ?>
