<?php
    class Stylist
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        // Getters and Setters
        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        // CRUD functions
        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylist (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $stylists = array();
            $returnded_stylists = $GLOBALS['DB']->query("SELECT * FROM stylist;");
            foreach ($returnded_stylists as $stylist){
                $stylist_name = $stylist['name'];
                $stylist_id = $stylist['id'];
                $retrieved_stylist = new Stylist($stylist_name, $stylist_id);
                array_push($stylists, $retrieved_stylist);
            }
            return $stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylist;");
        }

        function updateName($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE stylist SET name = '{$new_name}' WHERE id = {$this->getId()};");
        }

        function deleteStylist()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylist WHERE id ='{$this->getId()}';");
        }

    }

 ?>
