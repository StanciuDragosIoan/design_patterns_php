<?php
 
interface CarService
{
    public function getCost();

    public function getDescription();
}

class BasicInspection implements CarService 
{

    public function getCost()   
    {
        return 25;
    }

    public function getDescription(){
        return 'basic inspection';
    }
}

//decorators for additional services
class OilChange implements CarService{
    //declare car service as protected property
    protected $carService;

    //inject the CarService instance in the OilChange at runtime;
   function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }

    public function getDescription(){
        return $this->carService->getDescription() .  ' and Oil Change';
    }
}

class TyreRotation implements CarService{
    protected $carService;

    //inject the CarService instance in the OilChange at runtime;
   function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription(){
        return $this->carService->getDescription() .  ' and Tyre Rotation';
    }
}

$service = new BasicInspection();//echoes 25


//decorate with OilChange
$service = new OilChange(new BasicInspection()); //echoes 54


$service = new OilChange(new TyreRotation(new BasicInspection())); //40

// echo $service->getCost();
echo $service->getDescription();