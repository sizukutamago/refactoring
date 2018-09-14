<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/13
 * Time: 18:33
 */
namespace App\Chapter1;
require __DIR__ . '/../../vendor/autoload.php';

$movie = new Movie('test1', Movie::REGULAR);

$rental1 = new Rental($movie, 2);

$movie = new Movie('test2', Movie::CHILDRENS);

$rental2 = new Rental($movie, 2);

$customer = new Customer('test');

$customer->addRental($rental1);
$customer->addRental($rental2);
echo $customer->statement();
echo $customer->htmlStatement();