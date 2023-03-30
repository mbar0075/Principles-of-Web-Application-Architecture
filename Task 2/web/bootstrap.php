<?php

// Load our autoloader
require_once __DIR__.'/vendor/autoload.php';

//Specify our Twig templates openssl_get_cert_locations
$loader = new \Twig\loader\FilesystemLoader(__DIR__.'/templates');

// Instantiate our Twig
$twig = new \Twig\Environment($loader);

?>
