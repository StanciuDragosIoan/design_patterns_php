<?php

abstract class HomeChecker
{
    protected $successor;

    public abstract function check(HomeStatus $home);

    public function succeedWith(HomeChecker $successor)
    {
        $this->successor = $successor;
    }

    public function next(HomeStatus $home)
    {   //call successor's check() method only if there is a successor
        if($this->successor){
            $this->successor->check($home);
        } 
    }
}

class Locks extends HomeChecker
{   
    public function check(HomeStatus $home)
    {   //if home is not locked..
        if( ! $home->locked)
        {
            throw new Exception("The doors are not locked!! Abort Abort...");
        }

        $this->next($home);
    }
}

class Lights extends HomeChecker
{
    public function check(HomeStatus $home)
    {   //if lights are not off
        if( ! $home->lightsOff)
        {
            throw new Exception("The lights are still on!! Abort Abort...");
        }

        $this->next($home);
    }
}

class Alarm extends HomeChecker
{   
    public function check(HomeStatus $home)
    {   //if the alarm is not on
        if( ! $home->alarmOn)
        {
            throw new Exception("The alarm has not been set!! Abort Abort...");
        }

        $this->next($home);
    }
}

class HomeStatus
{
    public $alarmOn = true;
    public $locked = true;
    public $lightsOff = true;
}


//define home checkers
$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;

//set successors
$locks->succeedWith($lights);
$lights->succeedWith($alarm);


$status = new HomeStatus;
$locks->check($status);

