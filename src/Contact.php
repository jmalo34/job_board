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
            return $this->phone . $this->email;
        }

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
