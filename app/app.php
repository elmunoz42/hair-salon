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
    $app->get("/Stylists", function() use ($app) {

        return $app['twig']->render('stylists.html.twig', array('stylists'=>Stylist::getAll()));

    });
    //Create Stylists
    $app->post("/Stylists", function() use ($app) {

        $new_stylist = new Stylist($_POST['stylist_name']);
        $new_stylist->save();

        return $app['twig']->render('stylists.html.twig', array('stylists'=>Stylist::getAll()));

    });
    //Retrieve Stylist
    $app->get("/Stylists/{id}", function($id) use ($app) {

        $stylist = Stylist::findStylist($id);

        return $app['twig']->render('stylist.html.twig', array('stylist'=>$stylist));

    });
    //Update Stylist
    $app->patch("/Stylists/{id}", function($id) use ($app) {

        $stylist = Stylist::findStylist($id);
        $stylist->updateName($_POST['new_name']);

        return $app['twig']->render('stylist.html.twig', array('stylist'=>$stylist));

    });
    //Delete Stylist
    $app->delete("/Stylists/Terminate/{id}", function($id) use ($app) {

        $stylist = Stylist::findStylist($id);
        $stylist->updateName($_POST['new_name']);

        return $app['twig']->render('stylist_termination.html.twig', array('stylist'=>$stylist));
    });






    return $app;

?>
