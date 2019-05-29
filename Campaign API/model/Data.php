<?php 
  class Data
   {
        // DB stuff
        private $conn;
        private $table = 'data';

        // Post Properties
        public $name;
        public $country;
        public $budget;
        public $goal;
        public $category;

        // Constructor with DB
        public function __construct($db)
        {
           $this->conn = $db;
        }

        // Get Posts
        public function read() 
        {
            // Create query
            $query = 'SELECT * FROM ' . $this->table . ' p';
            
            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

  }
