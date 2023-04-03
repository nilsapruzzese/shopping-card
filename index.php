<?php

require_once 'User.php';
require_once 'Inventory.php';

// Create example user and inventory
$user = new User('john@doe.com', 'John Doe');
$inventory = new Inventory();

// Get shopping cart from current user
$shoppingCart = $user->getShoppingCart();

// Add 3 random items for inventory to shopping cart
$itemsToAdd = array_rand($inventory->getItems(), 3);
foreach ($itemsToAdd as $item) {
    $item = $inventory->getItems()[$item];
    $shoppingCart->addItem($item);
}

// Save the current state of the shopping cart to memento
$memento = $shoppingCart->saveToMemento();

// Remote and add Items until shopping cart value is under 8 and exactly 3 items
while ($shoppingCart->calculatePrice() > 8 || count($shoppingCart->getItems()) !== 3) {
    $itemsInCart = $shoppingCart->getItems();
    $itemToRemove = $itemsInCart[array_rand($itemsInCart)];
    $shoppingCart->removeItem($itemToRemove);

    $itemToAdd = $inventory->getItems()[array_rand($inventory->getItems())];
    $shoppingCart->addItem($itemToAdd);
}

// Restore saved state of shopping cart from memento
$shoppingCart->restoreFromMemento($memento);

echo 'Items in Shopping Cart: ' . count($shoppingCart->getItems()) . PHP_EOL;
echo 'Shopping Cart Price: ' . $shoppingCart->calculatePrice() . PHP_EOL;