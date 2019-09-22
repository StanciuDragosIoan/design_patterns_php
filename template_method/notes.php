<?php

/*
    --------------------------------------------------------------
    The Template Method design patterin is used to extract the steps of an algorithm
    e.g: say we have the 2 below classes (note how we chain the method calls and how we 
    must return $this; in order to do so)
*/

namespace App;

class TurkeySub
{

    public function make(){
        return $this
        ->layBread()
        ->addLettuce() 
        ->addTurkey()
        ->addSauces();
    }

    public function layBread()
    {
        var_dump('Laying down the bread...');
        return $this;
    }

    public function addLettuce()
    {
        var_dump('Adding the lettuce...');
        return $this;
    }

    public function addTurkey()
    {
        var_dump('Adding the turkey...');
        return $this;
    }

    public function addSauces()
    {
        var_dump('Adding the sauces...');
        return $this;
    }
}


class VeggieSub
{

    public function make(){
        return $this
        ->layBread()
        ->addLettuce() 
        ->addVeggies()
        ->addSauces();
    }

    public function layBread()
    {
        var_dump('Laying down the bread...');
        return $this;
    }

    public function addLettuce()
    {
        var_dump('Adding the lettuce...');
        return $this;
    }

    public function addVeggies()
    {
        var_dump('Adding the veggies...');
        return $this;
    }

    public function addSauces()
    {
        var_dump('Adding the sauces...');
        return $this;
    }
}

/*
    now if we instantiate the classes and call make() we get the 'algorithms' described:

    (new App\TurkeySub)->make(); //describes steps for TurkeySub

    (new App\VeggieSub)->make(); //describes steps for VeggieSub

    *Try the exemple above after each change to see that it works and how it works
*/


/*
    Note that the 2 classes are pretty similar, so in order t oavoid code duplication, we will
    extract them into an abstract class and let the sub-classes deal only with the specific methods
    for each class ( in this case the addTurkey()/addVeggies() methods
*/


/*
    First we will create an abstract Sub class with all the common methods;

    //Sub = sandwich
*/

abstract class Sub
{
    public function layBread()
    {
        var_dump('Laying down the bread...');
        return $this;
    }

    public function addLettuce()
    {
        var_dump('Adding the lettuce...');
        return $this;
    }

    public function addSauces()
    {
        var_dump('Adding the sauces...');
        return $this;
    }
}

/*
    Now we can 'dry' up the code in the VeggieSub and TurkeySub classes
*/

class VeggieSub extends Sub
{

    public function make(){
        return $this
        ->layBread()
        ->addLettuce() 
        ->addVeggies()
        ->addSauces();
    }

    public function addVeggies()
    {
        var_dump('Adding the veggies...');
        return $this;
    }
 
}


class TurkeySub extends Sub
{

    public function make(){
        return $this
        ->layBread()
        ->addLettuce() 
        ->addTurkey()
        ->addSauces();
    }

    public function addTurkey()
    {
        var_dump('Adding the turkey...');
        return $this;
    }
 
}

/*
    We have removed some duplication but we can do better;
    We can remove the make() method from the TurkeySub and VeggieSub classes and extract
    its 3rd step into an abstract method (note how we replaced addTurkey and addVeggies with
    addPrimaryToppings)
*/


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


    //the abstract method enforces the fact that all sub-classes must have it
    protected abstract function addPrimaryToppings();
   

}

/*
    The template_method design pattern allows us to remove duplication and to extract it in
    an abstract class, while extracting the specific functionality (that is not duplicate but similar)
    into an abstract method;
*/

