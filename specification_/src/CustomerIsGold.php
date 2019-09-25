<?php namespace Acme;

class CustomerIsGold
{
    public function isSatisfiedBy(Customer $customer)
    {
        return $customer->type() == "gold";
    }
}