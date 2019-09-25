<?php
include './src/CustomersRepository.php';

    class CustomersRepositoryTest extends PHPUnit\Framework\TestCase
    {   
        protected $customers;

        public function setUp()
        {
            $this->customers = new CustomersRepository(
                        [
                            new Customer('gold'),
                            new Customer('silver'),
                            new Customer('bronze'),
                            new Customer('gold')
                        ]);
        }

        /** @test */
        function it_fetches_all_customers()
        {
            $results = $this->customers->all();

            $this->assertCount(4, $results);
        }

        /** @test */
        function it_fetches_all_customers_who_match_a_given_specification()
        {
            $customers  = new CustomersRepository(
                [
                    new Customer('gold'),
                    new Customer('silver'),
                    new Customer('bronze'),
                    new Customer('gold')
                ]
        );
        

            $results = $customers->bySpecification(new CustomerIsGold);

            $this->assertCount(2, $results); 
            
        }


    }