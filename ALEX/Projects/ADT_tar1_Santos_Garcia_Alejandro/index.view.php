<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Orders</title>
</head>

<body>
    <h1>Tarea 1</h1>

    <!-- Subtarea 1 -->
    <h2>Subscribe Clients</h2>
    <ol>
        <?php foreach ($subcribeFilter as $client) : ?>
            <li>
                <?= $client["name"]; ?>
            </li>
        <?php endforeach; ?>
    </ol>

    <h2>Not Subscribe Clients</h2>
    <ol>
        <?php foreach ($notSubcribeFilter as $client) : ?>
            <li>
                <?= $client["name"]; ?>
            </li>
        <?php endforeach; ?>
    </ol>

    <h2>Clients with at least 1 order</h2>
    <ol>
        <?php foreach ($withOrders as $client) : ?>
            <li>
                <?= $client["name"]; ?>: $<?= $client["orders"]["totalPrice"]; ?>
            </li>
        <?php endforeach; ?>
    </ol>

    <!-- Subtarea 2 -->
    <h2>All Clients List</h2>
    <ol>
        <?php
        $sortedClients = $clients;
        usort($sortedClients, "compareTotalPrice");

        foreach ($sortedClients as $client) : ?>
            <li>
                <?= $client["name"]; ?>: $<?= !empty($client["orders"]["totalPrice"]) ? $client["orders"]["totalPrice"] : 0; ?>
            </li>
        <?php endforeach; ?>
    </ol>

</body>

</html>