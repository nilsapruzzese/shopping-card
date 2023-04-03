<?php

require_once 'Item.php';
require_once 'ShoppingCartMemento.php';

class ShoppingCart
{
    private array $items = [];

    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function removeItem(Item $removeItem): void
    {
        foreach ($this->items as $key => $item) {
            if ($item === $removeItem) {
                unset($this->items[$key]);
                return;
            }
        }

        throw new Exception('Item not found in shopping cart');
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function calculatePrice(): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }

        return $total;
    }

    public function saveToMemento(): ShoppingCartMemento
    {
        return new ShoppingCartMemento($this->items);
    }

    public function restoreFromMemento(ShoppingCartMemento $memento): void
    {
        if(!$memento) {
            throw new Exception('Memento cannot be empty');
        }

        $this->items = $memento->getItems();
    }
}