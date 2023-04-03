<?php

class ShoppingCartMemento
{
    private array $items;

    public function __construct(array $items)
    {
        if(empty($items)) {
            throw new Exception('Items cannot be empty');
        }

        $this->items = $items;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}