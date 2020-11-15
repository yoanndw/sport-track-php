<?php
    class User
    {
        private $email;

        private $lastName;
        private $firstName;

        private $birthDate;
        private $gender;
        
        private $size;
        private $weight;

        private $password;

        public function __construct() {}

        public function init($email, $lastName, $firstName, $birthDate, $gender, $size, $weight, $password)
        {
            $this->email = $email;

            $this->lastName = $lastName;
            $this->firstName = $firstName;

            $this->birthDate = $birthDate;
            $this->gender = $gender;

            $this->size = $size;
            $this->weight = $weight;
            
            $this->password = $password;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getLastName()
        {
            return $this->lastName;
        }

        public function getFirstName()
        {
            return $this->firstName;
        }
        
        public function getBirthDate()
        {
            return $this->birthDate;
        }

        public function getGender()
        {
            return $this->gender;
        }

        public function getSize()
        {
            return $this->size;
        }

        public function getWeight()
        {
            return $this->weight;
        }

        public function getPassword()
        {
            return $this->password;
        }
    }
?>