<?php 

class Cat
{
    //---------------------------Properties--------------------------------------------------------

    private $firstname;
    private $age;
    private $sex;
    private $color;
    private $race;

    //---------------------------Methods-----------------------------------------------------------

    //---------------------------Constructor------------------------------------------

    public function __construct($firstname, $age, $color, $sex, $race)
    {
        $this->firstname = $firstname;
        $this->age = $age;
        $this->color = $color;
        $this->sex = $sex;
        $this->race = $race;

    }

    //---------------------------Firstname-------------------------------------------

    /**
     * Get the value of firstname
     */ 
    public function getFirstname() : string
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname(string $firstname)
    {
        if ($firstname > 3 && $firstname < 20) 
        {
            $this->firstname = $firstname;
            return $this;
        } 
        else 
        {
            echo "Please use a Firstname with min. 3 and max. 20 Characters.";
        }
    }

    //------------------------------Age-----------------------------------------

    /**
     * Get the value of age
     */ 
    public function getAge() : int
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge(int $age)
    {
        if (is_int($age)) 
        {
            $this->age = $age;
            return $this;
        } 
        else 
        {
            echo "The age needs to be an integer value.";
        }
    }

    //------------------------------Sex-----------------------------------------

    /**
     * Get the value of sex
     */ 
    public function getSex() : string
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */ 
    public function setSex(string $sex)
    {
        if ($sex == 'male' || $sex == 'female') 
        {
            $this->sex = $sex;
            return $this;
        }
        else
        {
            echo "Please choose a sex: male or female.";
        }
    }

    //------------------------------Color----------------------------------------

    /**
     * Get the value of color
     */ 
    public function getColor() : string
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor(string $color)
    {
        if ($color > 3 && $color < 10) 
        {
            $this->color = $color;
            return $this;
        } 
        else 
        {
            echo "Please enter a color with min. 3 and max. 10 Characters.";
        }
    }

    //------------------------------Color----------------------------------------

    /**
     * Get the value of race
     */ 
    public function getRace() : string
    {
        return $this->race;
    }

    /**
     * Set the value of race
     *
     * @return  self
     */ 
    public function setRace(string $race)
    {
        if ($race > 3 && $race < 20) {
            $this->race = $race;
            return $this;
        } else {
            echo "Please enter a race with min. 3 and max. 20 Characters.";
        }
    }

    //------------------------------Public function getInfos----------------------

    public function getInfos()
    {

        $infos = array(
            "The cat's Firstname is: " . $this->getFirstname() . '.' .'<br>',
            "The Cat's age is: " . $this->getAge() . '.' . '<br>',
            "The Cat's color is: " . $this->getColor() . '.' . '<br>',
            "The Cat's sex is: " . $this->getSex() . '.' . '<br>',
            "The Cat's race is: " . $this->getRace() . '.<br>' . '<hr>'
        );
        return $infos;
    }
}

?>