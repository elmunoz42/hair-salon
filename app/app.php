<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug']=true;

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //Root
    $app->get("/", function() use ($app) {

        return $app['twig']->render('index.html.twig');

    });
    //Retrieve Stylists
    $app->get("/stylists", function() use ($app) {

        return $app['twig']->render('stylists.html.twig', array('stylists'=>Stylist::getAll()));

    });
    //Create Stylists
    $app->post("/stylists", function() use ($app) {

        $new_stylist = new Stylist($_POST['stylist_name']);
        $new_stylist->save();

        return $app['twig']->render('stylists.html.twig', array('stylists'=>Stylist::getAll()));

    });
    //Delete all Stylists
    $app->delete("/stylists", function() use ($app) {

        Stylist::deleteAll();

        return $app['twig']->render('stylists.html.twig', array('stylists'=>Stylist::getAll()));

    });
    //Retrieve Stylist
    $app->get("/stylists/{id}", function($id) use ($app) {

        $stylist = Stylist::findStylist($id);
        $assigned_clients = Client::findClientsByStylist($id);
        return $app['twig']->render('stylist.html.twig', array('stylist'=>$stylist, 'assigned_clients'=>$assigned_clients));

    });
    // Create a new client assigned to this stylist
    $app->post("/stylists/{id}", function($id) use ($app) {

        $new_client = new Client($_POST['client_name'], $_POST['stylist_id']);
        $new_client->save();
        $stylist = Stylist::findStylist($id);
        $assigned_clients = Client::findClientsByStylist($id);
        return $app['twig']->render('stylist.html.twig', array('stylist'=>$stylist, 'assigned_clients'=>$assigned_clients));

    });
    //Update Stylist
    $app->patch("/stylists/{id}", function($id) use ($app) {

        $stylist = Stylist::findStylist($id);
        $stylist->updateName($_POST['new_name']);
        $assigned_clients = Client::findClientsByStylist($id);

        return $app['twig']->render('stylist.html.twig', array('stylist'=>$stylist, 'assigned_clients'=>$assigned_clients));


    });
    //Delete Stylist
    $app->delete("/stylists/terminate/{id}", function($id) use ($app) {

        $stylist = Stylist::findStylist($id);
        $deleted_stylist = $stylist;
        $stylist->deleteStylist($id);

        return $app['twig']->render('stylist_termination.html.twig', array('deleted_stylist'=>$deleted_stylist));
    });

    //Retrieve Clients
    $app->get("/clients", function() use ($app) {

        return $app['twig']->render('clients.html.twig', array('clients'=>Client::getAll(), 'stylists'=>Stylist::getAll()));

    });
    //Create Clients
    $app->post("/clients", function() use ($app) {


        $new_client = new Client($_POST['client_name'], $_POST['stylist_id']);
        $new_client->save();

        return $app['twig']->render('clients.html.twig', array('clients'=>Client::getAll(), 'stylists'=>Stylist::getAll()));

    });
    //Delete all Clients
    $app->delete("/clients", function() use ($app) {

        Client::deleteAll();
        return $app['twig']->render('clients.html.twig', array('clients'=>Client::getAll(), 'stylists'=>Stylist::getAll()));

    });
    //Retrieve Client
    $app->get("/clients/{id}", function($id) use ($app) {

        $client = Client::findClient($id);
        $stylist_id = $client->getStylistId();
        $assigned_stylist = Stylist::findStylist($stylist_id);

        return $app['twig']->render('client.html.twig', array( 'client'=>$client, 'assigned_stylist' => $assigned_stylist));

    });
    //Update Client
    $app->patch("/clients/{id}", function($id) use ($app) {

        $client = Client::findClient($id);
        $client->updateName($_POST['new_name']);
        $stylist_id = $client->getStylistId();
        $assigned_stylist = Stylist::findStylist($stylist_id);

        return $app['twig']->render('client.html.twig', array( 'client'=>$client, 'assigned_stylist' => $assigned_stylist));


    });
    //Delete Client
    $app->delete("/clients/terminate/{id}", function($id) use ($app) {

        $client = Client::findClient($id);
        $deleted_client = $client;
        $client->deleteClient($id);

        return $app['twig']->render('client_termination.html.twig', array('deleted_client'=>$deleted_client));
    });


    return $app;

?>
