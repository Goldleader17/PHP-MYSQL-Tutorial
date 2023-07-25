<html lang="en">
<body>

<?php

// ACCESS MODIFIERS

class User {
    public $name;
    public $email;

    function __construct($email){
        $this->email = $email;
    }
    function __destruct(){
        echo "The user's email is {$this->email}.";
    }
}

//$gabby = new User("ezeriohagabriel@gmail.com");

//The "final" keyword in the class will prevent it from being inherited but in function, prevents it from being overriden.

// CONSTANTS

class Goodbye {
    const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!". "<br />";
}

//echo Goodbye::LEAVING_MESSAGE;

// ABSTRACT CLASSES

// Parent class
abstract class Car{
    public $name;
    public function __construct($name){
        $this->name = $name;
    }
    abstract public function intro() : string;
}

// child classes
class Audi extends Car{
    public function intro() : string{
        return "Choose German quality! I'm an $this->name!";
    }
}

class Volvo extends Car{
    public function intro() : string{
        return "Proud to be Swedish! I'm a $this->name!";
    }
}

// Create objects from the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br><br>";

abstract class ParentClass{
    // Abstract method with an argument
    abstract protected function prefixName($name);
}

class ChildClass extends ParentClass{
    public function prefixName($name){
        if ($name == "John Doe"){
            $prefix = "Mr.";
        } elseif ($name == "Jane Doe"){
            $prefix = "Mrs.";
        } else {
            $prefix = "";
        }
        return "{$prefix} {$name}";
    }
}

$class = new ChildClass;
echo $class->prefixName("John Doe");
echo "<br>";
echo $class->prefixName("Jane Doe"). "<br><br>";

// INTERFACES

// Interface definition
interface Animal {
    public function makeSound();
}

// Class definitions
class Cat implements Animal {
    public function makeSound(){
        echo " Meow ";
    }
}

class Dog implements Animal {
    public function makeSound(){
        echo " Bark ";
    }
}

class Mouse implements Animal {
    public function makeSound(){
        echo " Squeak ";
    }
}

// Create a list of animals
$cat = new Cat();
$dog = new Dog();
$mouse = new Mouse();
$animals = array($cat, $dog, $mouse);

// Tell the animals to make a sound
foreach($animals as $animal){
    $animal->makeSound();
    echo "<br>";
}
echo "<br>";

// TRAITS
trait message1{
    public function msg1(){
        echo "OOP is fun! ";
    }
}

trait message2{
    public function msg2(){
        echo "OOP reduces code duplication!";
    }
}

class Welcome {
    use message1;
}

class Welcome2 {
    use message1, message2;
}

$obj = new Welcome();
$obj->msg1();
echo "<br>";

$obj2 = new Welcome2();
$obj2->msg1();
$obj2->msg2();
echo "<br><br>";

// STATIC METHODS

class greeting{
    public static function welcome(){
        echo "Hello World!";
    }
}

// Call static method
greeting::welcome();
echo "<br>","<br>";

class greeting1{
    public static function welcome1(){
        echo "Hello World!";
    }

    public function __construct(){
        self::welcome1();
    }
}

new greeting1();
echo "<br>","<br>";

// static methods can also be called from methods in other classes.

class A {
    public static function welcome(){
        echo "Hello World!";
    }
}

class B {
    public static function message(){
        A::welcome();
    }
}

$obj = new B();
echo $obj -> message();
echo "<br>","<br>";

class domain {
    protected static function getWebsiteName(){
        return "W3Schools.com";
    }
}

class domainW3 extends domain {
    public $websiteName;
    public function __construct(){
        $this -> websiteName = parent::getWebsiteName();
    }
}

$domainW3 = new domainW3;
echo $domainW3 -> websiteName;
echo "<br>","<br>";

?>
    
</body>
</html>
