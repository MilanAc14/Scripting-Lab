<?php
/*
lab 3: objected oriented feature in php
#question
what is class and onject ?discuss about constructor , discontructor in php
what is encapsulation 
what is inheritance and how can it be achieved in php?
#task
create a base class name employee with following properties and methods
name:string
address:string
setname(name)

*/

abstract class Employee{
    protected $name;
    protected $address;

    public function __construct($full_name,$address)
    {
        $this->name=$full_name;
        $this->address=$address;

    }
     
}

 class Full_time  extends Employee{
    private $salary ;
    private $post;

    public function set_salary($salaryamount)
    {
        $this->salary=$salaryamount;
        
    }
    
     public function set_post($post){
        $this->post=$post;
        


    }
    public function display_all(){
       echo"name: $this->name<br>";
       echo"address:$this->address<br>";
       echo "Salary amount :$this->salary<br> ";
       echo "Post:".$this->post."<br>";
    }
}
$employee1=new Full_time("ram gurung","ktm");
$employee1->set_salary(10000);
$employee1->set_post('manager');
$employee1->display_all();


?>