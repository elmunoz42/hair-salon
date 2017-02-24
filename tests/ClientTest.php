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
        // protected function tearDown()
        // {
        //     Client::deleteAll();
        //     Stylist::deleteAll();
        // }

        // test 1
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
        // test 2
    //     function test_getId()
    //     {
    //         // Arrange
    //         $input_name = "Joaquin";
    //         $input_id = 1;
    //         $new_client = new Client($input_name, $input_id);
    //
    //         // Act
    //         $result = $new_client->getId();
    //         // Assert
    //         $this->assertEquals($input_id, $result);
    //     }
    //     // test 3
    //     function test_save()
    //     {
    //         // Arrange
    //         $input_name = "Joaquin";
    //         $new_client = new Client($input_name);
    //         $new_client->save();
    //
    //         // Act
    //         $result = Client::getAll();
    //         // Assert
    //         $this->assertEquals($new_client, $result[0]);
    //     }
    //     // test 4
    //     function test_updateName()
    //     {
    //         // Arrange
    //         $input_name = "Joaquin";
    //         $input_new_name = "J-quin";
    //         $new_client = new Client($input_name);
    //         $new_client->save();
    //         $new_client->updateName($input_new_name);
    //
    //         // Act
    //         $result = Client::getAll();
    //         // Assert
    //         $this->assertEquals($input_new_name, $result[0]->getName());
    //     }
    //     // test 5
    //     function test_deleteClient()
    //     {
    //         // Arrange
    //         $input_name = "Joaquin";
    //         $new_client = new Client($input_name);
    //         $new_client->save();
    //         $input_name2 = "Fernanda";
    //         $new_client2 = new Client($input_name2);
    //         $new_client2->save();
    //         $new_client->deleteClient();
    //
    //         // Act
    //         $result = Client::getAll();
    //         // Assert
    //         $this->assertEquals($input_name2, $result[0]->getName());
    //     }
    //     // test 6
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
