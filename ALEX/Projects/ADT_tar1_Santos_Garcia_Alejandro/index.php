<?php

// Subtarea 1
$clients = [
    [
        "name" => "John",
        "orders" => [
            "products" => "TV, Phone, Tablet",
            "totalPrice" => 500
        ],
        "subscription" => false
    ],
    [
        "name" => "Bob",
        "orders" => [
            "products" => "Laptop",
            "totalPrice" => 1000
        ],
        "subscription" => true
    ],
    [
        "name" => "Charlie",
        "orders" => [
            "products" => "Tablet, Headphones",
            "totalPrice" => 300
        ],
        "subscription" => true
    ],
    [
        "name" => "Eve",
        "orders" => [],
        "subscription" => true
    ],
    [
        "name" => "Alice",
        "orders" => [],
        "subscription" => false
    ]
];

$subcribeFilter = array_filter($clients, function ($client) {
    return $client["subscription"] == true;
});
$notSubcribeFilter = array_filter($clients, function ($client) {
    return $client["subscription"] == false;
});
$withOrders = array_filter($clients, function ($client) {
    return count($client["orders"]) > 0;
});

// Subtarea 2
function compareTotalPrice($a, $b)
{
    $totalPriceA = !empty($a["orders"]["totalPrice"]) ? $a["orders"]["totalPrice"] : 0;
    $totalPriceB = !empty($b["orders"]["totalPrice"]) ? $b["orders"]["totalPrice"] : 0;

    if ($totalPriceA == $totalPriceB) {
        return 0;
    }
    return ($totalPriceA > $totalPriceB) ? -1 : 1;
}

require "index.view.php";
