<?php namespace App;

abstract class Sub
{   

    public function make()
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addSauces();
    }

    protected function layBread()
    {
        var_dump('Laying down the bread...');
        return $this;
    }

    protected function addLettuce()
    {
        var_dump('Adding the lettuce...');
        return $this;
    }

    protected function addSauces()
    {
        var_dump('Adding the sauces...');
        return $this;
    }

    protected abstract function addPrimaryToppings();
   
}

// class TurkeySub extends Sub
// {
//     public function addPrimaryToppings()
//     {
//         var_dump('Adding the turkey...');
//         return $this;
//     }
 
// }

// class VeggieSub extends Sub
// {
//     public function addPrimaryToppings()
//     {
//         var_dump('Adding the veggies...');
//         return $this;
//     }
 
// }

