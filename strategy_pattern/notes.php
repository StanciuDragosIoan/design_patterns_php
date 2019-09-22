<?php
/*
    The Strategy Pattern enables us to define a family of algorithms and then to encapsulate
    and make them (make the classes that implement the algorithms) interchangeable
*/

//encapsulate and make each algorithm interchangeable
interface Logger
{
    public function log($data);
}

//define a familiy of algorithms

class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a file');
    }
}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a database');
    }
}

class LogToXWebService implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a web service');
    }
}

class App
{
    public function log($data)
    {
        $logger = new LogToFile;
        $logger->log($data);
    }
}

$app = new App;
$app->log('Some info here...');

/*
    Now our code works but it is tightly coupled (if we want to log to a DB or to a Service,
    it won't work without modifying the App class - as we have hard-coded the LogToFile instantiation
    and method call to log() inside of it)
*/


/*
    We will modify the App class by leveraging polymorphism:
*/ 

class App
{
    public function log($data, Logger $logger)
    {
        $logger->log($data);
    }
}

$app = new App;
$app->log('Some info here...', new LogToXWebService);

/*
    Now the App class takes in a Logger instance (does not matter which so if we want to 
    log to a database we simply do)

    $app->log('Some info here...', new LogToDatabase);
*/ 


/*
    Furthermore, we can set default in the App class
*/

class App
{
    public function log($data, Logger $logger = null)
    {   
        //if no logger passed in, default to LogToFile
        $logger = $logger ?: new LogToFile;
        $logger->log($data);
    
    }
}

$app = new App;
$app->log('Some info here...'); 

/*
    The line above logs to a file, but if we pass i a different type of logger, it will
    log to a web service or to a database;
*/