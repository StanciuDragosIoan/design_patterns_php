<?php
/*
    The chain of responsibility pattern gives us the ability to chain object calls
    while giving each of the objects the ability to either end the execution and handle
    the request or otherwise, if it can't handle the request, it will send it up the chain 
    to the next object.

    The next object will have the chance to do the exact same thing (handle the request or 
    send it to the next object)

    The benefits of this approach is that the client can make a request without knowing 
    specifically how the request will be handled
*/



/*
    E.G. imagine when leaving the house we check that: door is locked, lights are off, 
    alarm is on (these classes make sure that the home is in proper order for 
    their given responsibility)
*/

abstract class HomeChecker
{   
    protected $successor;

    //makes sure all the classes that extend HomeChecker have this method
    public abstract function  check(HomeStatus $home);

    //method to define the 'next' successor (the next object 2b chained) 
    public function succeedWith(HomeChecker $successor)
    {
        $this->successor = $successor;
    }


    //method to call the next 'chained' object
    public function next(HomeStatus $home)
    {   
      //call the check method only if we have a successor set
      if($this->successor)
      {
        $this->successor->check($home);
      }
    }
}

class Locks extends HomeChecker
{   
    //the 'request type' is the HomeStatus instance
    public function check(HomeStatus $home)
    {   //if home is not locked..
        if( ! $home->locked)
        {
            throw new Exception("The doors are not locked!! Abort Abort...");
        }
        //if home is locked, pass the next object
        $this->next($home);
    }
}

class Lights extends HomeChecker
{
     //the 'request type' is the HomeStatus instance
     public function check(HomeStatus $home)
     {   //if lights are not off..
         if( ! $home->lightsOff)
         {
             throw new Exception("The lights are not off!! Abort Abort...");
         }
         //if lights are off, pass the next object
         $this->next($home);
     }
}

class Alarm extends HomeChecker
{
    //the 'request type' is the HomeStatus instance
    public function check(HomeStatus $home)
    {   //if lights are not off..
        if( ! $home->alarmOn)
        {
            throw new Exception("The alarm has not been set!! Abort Abort...");
        }
        //if lights are off, pass the next object
        $this->next($home);
    }
}

class HomeStatus
{
    public $alarmOn = true;
    public $locked = true;
    public $lightsOff = true;
}


//CLIENT CODE 

/*
    we create the Locks, Lights and Alarm instances and instantiate the Locks;

    HomeStatus = the current state of the home (ideally all its properties are true);
*/


//set the 'rings' in the chain

//instantiate locks
$locks = new Locks;
//insantiate lights
$lights = new Lights;
//instantiate alarm
$alarm = new Alarm;


//set successors (chain the 'rings' in the chain together)
$locks->succeedWith($lights);
$lights->succeedWith($alarm);



//instantiate status (call check() on the first 'ring' or object in the chain)
$status = new HomeStatus;

/*
    pass status instance to locks object; (in order to start the chain, 
    just perform the check on the 1st object)
*/
$locks->check($status);




//NOTE the 'chain' will run till the first exception and then it will stop;

