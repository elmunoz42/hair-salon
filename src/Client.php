<?php
    class Client
    {
        private $name;
        private $stylist_id;
        private $id;

        function __construct($name, $stylist_id, $id = null)
        {
            $this->name = $name;
            $this->stylist_id = $stylist_id;
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

        function setStylistId($id)
        {
            $this->stylist_id = $id;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        // CRUD functions
        function save()
        {
            // $GLOBALS['DB']->exec("INSERT INTO client (name) VALUES ('{$this->getName()}');");
            // $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            // $clients = array();
            // $returnded_clients = $GLOBALS['DB']->query("SELECT * FROM client;");
            // foreach ($returnded_clients as $client){
            //     $client_name = $client['name'];
            //     $client_id = $client['id'];
            //     $retrieved_client = new Client($client_name, $client_id);
            //     array_push($clients, $retrieved_client);
            // }
            // return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM client;");
        }

        function updateName($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE client SET name = '{$new_name}' WHERE id = {$this->getId()};");
        }

        function deleteClient()
        {
            $GLOBALS['DB']->exec("DELETE FROM client WHERE id ='{$this->getId()}';");
        }

        static function findClient($search_id)
        {
           $found_client = null;
           $clients = Client::getAll();
           foreach($clients as $client){
               $client_id = $client->getId();
               if ( $client_id == $search_id){
                   $found_client = $client;
               }
           }
           return $found_client;
        }

    }

 ?>
