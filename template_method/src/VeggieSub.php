<?php namespace App;

class VeggieSub extends Sub
{
    public function addPrimaryToppings()
    {
        var_dump('Adding the veggies...');
        return $this;
    }
 
}