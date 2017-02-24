<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        // test 7
        function test_getName()
        {
            // Arrange
            $input_name = "Joaquin";
            $input_stylist_id = 1;
            $new_client = new Client($input_name, $input_stylist_id);

            // Act
            $result = $new_client->getName();
            // Assert
            $this->assertEquals($input_name, $result);
        }
        // test 7b
        function test_getStylistId()
        {
            // Arrange
            $input_name = "Joaquin";
            $input_stylist_id = 1;
            $new_client = new Client($input_name, $input_stylist_id);

            // Act
            $result = $new_client->getStylistId();
            // Assert
            $this->assertEquals($input_stylist_id, $result);
        }
        // test 8
        function test_getId()
        {
            // Arrange
            $input_name = "Joaquin";
            $input_stylist_id = 1;
            $input_id = 1;
            $new_client = new Client($input_name, $input_stylist_id, $input_id);

            // Act
            $result = $new_client->getId();
            // Assert
            $this->assertEquals($input_id, $result);
        }
        // test 9
        function test_save()
        {
            // Arrange
            $input_name = "Joaquin";
            $input_stylist_id = 1;
            $new_client = new Client($input_name, $input_stylist_id);
            $new_client->save();

            // Act
            $result = Client::getAll();
            // Assert
            $this->assertEquals($input_name, $result[0]->getName());
        }
    //     // test 10
        function test_updateName()
        {
            // Arrange
            $input_name = "Joaquin";
            $input_new_name = "J-quin";
            $input_stylist_id = 1;
            $new_client = new Client($input_name, $input_stylist_id);
            $new_client->save();
            $new_client->updateName($input_new_name);

            // Act
            $result = Client::getAll();
            // Assert
            $this->assertEquals($input_new_name, $result[0]->getName());
        }
        // test 11
        function test_deleteClient()
        {
            // Arrange
            $input_name = "Joaquin";
            $input_stylist_id = 1;
            $new_client = new Client($input_name, $input_stylist_id);
            $new_client->save();
            $input_name2 = "Fernanda";
            $input_stylist_id2 = 1;
            $new_client2 = new Client($input_name2, $input_stylist_id2);
            $new_client2->save();
            $new_client->deleteClient();

            // Act
            $result = Client::getAll();
            // Assert
            $this->assertEquals($input_name2, $result[0]->getName());
        }
    //     // test 12
    //     function test_findClient()
    //     {
    //         // Arrange
    //         $input_name = "Joaquin";
    //         $new_client = new Client($input_name);
    //         $new_client->save();
    //         $input_name2 = "Fernanda";
    //         $new_client2 = new Client($input_name2);
    //         $new_client2->save();
    //         $input2_id = $new_client2->getId();
    //
    //         // Act
    //         $result = Client::findClient($input2_id);
    //
    //         // Assert
    //         $this->assertEquals($input_name2, $result->getName());
    //     }
    //
    };

 ?>
