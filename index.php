<?php

require_once 'User.php';
require_once 'Inventory.php';

$user = new User('john@doe.com', 'John Doe');
$inventory = new Inventory();

$itemsToAdd = array_rand($inventory->getItems(), 3);

foreach ($itemsToAdd as $item) {
    $item = $inventory->getItems()[$item];
    $user->getShoppingCart()->addItem($item);
}

while ($user->getShoppingCart()->calculatePrice() > 8 || count($user->getShoppingCart()->getItems()) !== 3) {
    $items = $user->getShoppingCart()->getItems();
    $itemToRemove = $items[array_rand($items)];
    $user->getShoppingCart()->removeItem($itemToRemove);

    $itemToAdd = $inventory->getItems()[array_rand($inventory->getItems())];
    $user->getShoppingCart()->addItem($itemToAdd);
}

$items = $user->getShoppingCart()->getItems();

echo 'Items in Shopping Cart: ' . count($items) . PHP_EOL;
echo 'Shopping Cart Price: ' . $user->getShoppingCart()->calculatePrice() . PHP_EOL;