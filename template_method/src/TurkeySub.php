<?php namespace App;

class TurkeySub extends Sub
{
    public function addPrimaryToppings()
    {
        var_dump('Adding the turkey...');
        return $this;
    }
 
}