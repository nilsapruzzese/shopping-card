<?php

require_once 'ShoppingCart.php';

class User
{
    private string $email;
    private string $name;
    private ShoppingCart $shoppingCart;

    public function __construct(string $email, string $name)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email');
        }

        $this->email = $email;
        $this->name = $name;
        $this->shoppingCart = ShoppingCart::getInstance();
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getShoppingCart(): ShoppingCart
    {
        return $this->shoppingCart;
    }
}