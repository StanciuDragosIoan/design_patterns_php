<?php

interface CarService
{
    public function getCost();

    public function getDescription();
}


class BasicInspection  implements CarService
{

    public function getCost()   
    {
        return 25;
    }

    public function getDescription()
    {
        return 'Basic Inspection';
    }

}


class OilChange implements CarService
{   

    protected $carService;

    public function __construct(CarService $carService){
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 29 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ' and Oil Change';
    }
}


class TyreRotation implements CarService
{   

    protected $carService;

    public function __construct(CarService $carService){
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 15 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ' and Tyre Rotation';
    }
}

// echo (new TyreRotation(new OilChange(new BasicInspection())))->getCost();

//echo (new TyreRotation(new BasicInspection()))->getCost();

$service = new OilChange(new TyreRotation(new BasicInspection));

echo $service->getDescription();
// class BasicInspectionAndOilChange {

//     public function getCost()
//     {
//         return 19 + 19;
//     }

// }


// class BasicInspectionAndOilChangeAndTireRotation {

//     public function getCost()
//     {
//         return 19 + 19 + 10;
//     }

// }

//get cost
 