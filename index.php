<?php

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once('vendor/autoload.php');
//eventually this will be a class includes in that .json file SAYS TINA 2/8/22
require('model/data-layer.php');

//create an instance of the Base class for fat free
$f3 = Base::instance();

$f3->route('GET /', function($f3)
{
    //save data to hive
    $f3->set('username', 'itsme');
    $f3->set('title', 'Working WIth Templates');
    $f3->set('temp', 67);
    $f3->set('color', 'purple');
    $f3->set('radius', 10);

    $f3->set('fruits', array('apple', 'orange', 'banana', 'cherry'));
    $f3->set('desserts', getDesserts());

    //display a list of radio buttons containing colors
        //define a function in model that returns an array of colors
        //then add the data to your f3 hive
        //display data in view page
    $f3->set('colors', getColors());


    $views = new Template();
    echo $views->render('views/info.html');
});

//run fat-free -> invokes
$f3->run();