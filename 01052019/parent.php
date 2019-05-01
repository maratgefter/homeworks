<?php
    class Yong
    {
        protected $name;
        protected $age;
        
        function setName($name)
        {
            $this->name=$name;
        }

        function setAge($age)
        {
            if ($this->checkAge($age)) {
                $this->age=$age;
            } else {
                $this->age=null;
            }
        }

        function getName($name)
        {
            return $this->name;
        }

        function getAge($age)
        {
            return $this->age;
        }

        function info()
        {
            return "Привет, $this->name! Твой возраст: $this->age.<br>";
        }

        function checkAge($age)
        {
            
        }

    }

    class KinderGarden extends Yong
    {
        function checkAge($age)
        {
            if ($age >= 2 && $age <= 7) {
                return true;
            } else {
                return false;
            }
        }
    }

    class Scool extends Yong
    {
        function checkAge($age)
        {
            if ($age > 7 && $age <= 17) {
                return true;
            } else {
                return false;
            }
        }
    }

    class Student extends Yong
    {
        function checkAge($age)
        {
            if ($age >= 17 && $age <= 25) {
                return true;
            } else {
                return false;
            }
        }
    }

    $kindergarden = new KinderGarden;
    $kindergarden->setName('Вася');
    $kindergarden->setAge('5');
    echo $kindergarden->info();

    $scool = new Scool;
    $scool->setName('Петя');
    $scool->setAge('9');
    echo $scool->info();

    $student = new Student;
    $student->setName('Вася');
    $student->setAge('18');
    echo $student->info();
?>