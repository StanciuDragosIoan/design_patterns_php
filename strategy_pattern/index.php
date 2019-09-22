<?php

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
    public function log($data, Logger $logger = null)
    {   
        $logger = $logger ?: new LogToFile;
        $logger->log($data);
    }
}

$app = new App;
$app->log('Some info here...');

