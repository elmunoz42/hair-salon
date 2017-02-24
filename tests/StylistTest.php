<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            // Client::deleteAll();
        }

        // test 1
        function test_getName()
        {
            // Arrange
            $input_name = "Joaquin";
            $new_stylist = new Stylist($input_name);

            // Act
            $result = $new_stylist->getName();
            // Assert
            $this->assertEquals($input_name, $result);
        }
        // test 2
        function test_getId()
        {
            // Arrange
            $input_name = "Joaquin";
            $input_id = 1;
            $new_stylist = new Stylist($input_name, $input_id);

            // Act
            $result = $new_stylist->getId();
            // Assert
            $this->assertEquals($input_id, $result);
        }
        // test 3
        function test_save()
        {
            // Arrange
            $input_name = "Joaquin";
            $new_stylist = new Stylist($input_name);
            $new_stylist->save();

            // Act
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals($new_stylist, $result[0]);
        }
        function test_updateName()
        {
            // Arrange
            $input_name = "Joaquin";
            $input_new_name = "J-quin";
            $new_stylist = new Stylist($input_name);
            $new_stylist->save();
            $new_stylist->updateName($input_new_name);

            // Act
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals($input_new_name, $result[0]->getName());
        }
        function test_deleteStylist()
        {
            // Arrange
            $input_name = "Joaquin";
            $new_stylist = new Stylist($input_name);
            $new_stylist->save();
            $input_name2 = "Fernanda";
            $new_stylist2 = new Stylist($input_name2);
            $new_stylist2->save();
            $new_stylist->deleteStylist();

            // Act
            $result = Stylist::getAll();
            // Assert
            $this->assertEquals($input_name2, $result[0]->getName());
        }

        // function test_getClientsById()
        // {
        //
        // }
        // function test_()
        // {
        //     // Arrange
        //     // Act
        //     // Assert
        // }
        // function test_()
        // {
        //     // Arrange
        //     // Act
        //     // Assert
        // }
        // function test_()
        // {
        //     // Arrange
        //     // Act
        //     // Assert
        // }
        // function test_()
        // {
        //     // Arrange
        //     // Act
        //     // Assert
        // }
    };

 ?>
