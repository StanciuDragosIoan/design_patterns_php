<?php
/*
    we take the rule that decides whether a customer is or not a gold customer, and we 
    transform that logic into a class that we can use anywhere
*/
class CustomerIsGold 
{
    public function isSatisfiedBy(Customer $customer)
    {
        $customer->type == "gold";
    }
}

$spec = new CustomerIsGold;

$spec->isSatisfiedBy(new Customer);//returns true or false