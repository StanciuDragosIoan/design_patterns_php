<?php

/*
    ### The DECORATOR Pattern ###
*/

/*
    A decorator allows us to dynamically extend the behavior of a particular object at 
    runtime, without needing to resort to unnecessary inheritance;

    Usually if we need a new service we can just add a new class;

    This approach is bad as for each service combination we need a new class and because 
    values are hard-coded (so if 1 price changes, we have to modify it everywhere);
*/

/*

class BasicInspection
{
    public function getCost()
    {
        return 25;
    }
}

 
 

class BasicInspectionAndOilChange
{
    public function getCost()
    {
        return 25 + 20;
    }
}

class BasicInspectionAndOilChangeAndTireRotation
{
    public function getCost()
    {
        return 25 + 20 + 15;
    }
}

 

*/

//echo (new BasicInspectionAndOilChangeAndTireRotation)->getCost();

/*
    The Decorator pattern allows us to decorate objects at runtime by adding a wrapper
    to them
*/

interface CarService
{
    public function getCost();

    public function getService();
}

class BasicInspection implements CarService
{
    public function getCost()
    {
        return 20;
    }

    public function getService()
    {
        return 'Basic Inspection ';
    }
}

class OilChange implements CarService
{   
    //declare $carService as protected property
    protected $carService;

    //inject $carService in constructor
    public function __construct($carService){
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 25 + $this->carService->getCost();
    }

    public function getService()
    {
        return $this->carService->getService() . ' And an Oil Change';
    }
}

class TireRotation implements CarService{
    protected $carService;
    public function __construct($carService)
    {   
        $this->carService=$carService;
    }
    public function getCost()
    {
        return 10 + $this->carService->getCost();
    }
    public function getService()
    {
        return $this->carService->getService() . ' And a Tire Rotation';
    }
}



//$service = new TireRotation(new OilChange((new BasicInspection())));

$service = new TireRotation((new BasicInspection()));
// echo $service->getCost();
echo $service->getService();

/*
    Basic Inspection cost = 20; Oil change adds 25 and Tire Rotation 10;
    Each decorator must have a CarService injected in its constructor at runtime;
    above the BasicInspection is decorated with TireRotation (note we can 'combine')
    the decorators however we need;

    we can decorate it too (note that each time we add a new wrapper, the class inside of 
    it ‘becomes’ the CarService instance that is being injected in the constructor of the 
    new decorator)

    if we need to inherit from other classes but we don't really require all the functionality,
    we can use the DECORATOR pattern to use only some functionality
*/