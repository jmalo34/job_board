<?php
    class JobOpening
    {
        //properties
        public $title;
        public $description;
        public $contact;

        //methods
        function __construct ($job, $details, $author)
        {
            $this->title = $job;
            $this->description = $details;
            $this->contact = $author;
        }

        function getJob ()
        {
            return $this->title;
        }

        function setJob ($new_job)
        {
            $this->title = $new_job;
        }

        function getDetails ()
        {
            return $this->description;
        }

        function setDetails ($new_details)
        {
            $this->description = $new_details;
        }

        function getAuthor ()
        {
            return $this->contact;
        }

        function setAuthor ($new_author)
        {
            $this->contact = $new_author;
        }
    }
 ?>
