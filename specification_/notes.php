<?

/*
    The  specification pattern allows us to take any business rule and 'promote it' to 'first
    class citizen';
*/

/*
    we take the rule that decides whether a customer is or not a gold customer, and we 
    transform that logic into a class that we can use anywhere
*/
class CustomerIsGold
{
    public function isSatisfiedBy(Customer $customer)
    {

    }
}



/*
    We could also do:

    class Customer
    {
        public function isGold()
        {
            return $this->type == 'gold';
        }
    }


    *usually this would suffice but there are cases when we need the first approach
*/


/*
    We set up autoloading and 2 classes in the 'src' directory, we also set up a tests
    directory with a Test.php file (CustomerIsGoldTest.php)
*/

/*
    We ran 2 tests through the CustomerIsGoldTest.php which passed


*/


//CustomerIsGoldTest.php

class CustomerIsGoldTest extends  PHPUnit\Framework\TestCase
{
    /** @test */
    function a_customer_is_gold_if_they_have_the_respective_type()
    {
       $specification = new CustomerIsGold;
       $goldCustomer = new Customer('gold');
       $silverCustomer = new Customer('silver');
        
       $this->assertTrue($specification->isSatisfiedBy($goldCustomer));
       $this->assertFalse($specification->isSatisfiedBy($silverCustomer));
    }   
}

//* in order to launch the phpunit we ran: composer requier phpunit/phpunit --dev


/*
    Next we created a CustomersRepositoryTest.php file in the 'tests' to see if we can make it
    so that we fetch all the customers from DB/Repo, but pass in only those that pass the 
    test (in this case for gold user)

    -created the test

    -created the CustomersRepository class in 'src'

    -defined 1 test and tested it

    *note that a test function must have either the   following annotation above it:
    
    /** @test */    

    /* 
        else it might not be recognized as a test by phpunit (this or it must have 'test' )
    in its name
    
    */



    /*
        created a 2nd test in CustomerRepositoryTest.php
    */

    /*
        the specification pattern allows us to use a specification on a single object or 
        multiple objects (customer or customers)
    */

