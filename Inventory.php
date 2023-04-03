<?php

require_once 'Item.php';

class Inventory
{
    private array $items = [];

    public function __construct()
    {
        for($i = 0; $i < 5; $i++) {
            $name = 'Item ' . ($i + 1);
            $price = random_int(100, 500) / 100;

            $item = new Item($name, $price);
            $this->addItem($item);
        }
    }

    public function addItem(Item $item): void
    {
        foreach($this->items as $existingItem) {
            if($existingItem->getName() === $item->getName()) {
                throw new Exception('Item already exists in inventory');
            }
        }

        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}