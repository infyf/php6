<?php

class Aquarium {
    public $shape;
    public $capacity;
    public $type;
    public static $totalsumm = 0;

    public function __construct($shape = "Прямокутний", $capacity = 100, $type = "Морський") {
        $this->shape = $shape;
        $this->capacity = $capacity;
        $this->type = $type;
        self::$totalsumm++;
    }

    public function getShape() {
        return $this->shape;
    }

    public function setShape($shape) {
        $this->shape = $shape;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
    public static function totalCapacity($aquariums) {
        $totalCapacity = 0;
        foreach ($aquariums as $aquarium) {
            $totalCapacity += $aquarium->getCapacity();
        }
        return $totalCapacity;
    }
}

class Oxygenat extends Aquarium {
    private $oxygenLevel;

    public function __construct($shape = "Прямокутний", $capacity = 100, $type = "Прісноводний", $oxygenLevel = 8) {
        parent::__construct($shape, $capacity, $type);
        $this->oxygenLevel = $oxygenLevel;
    }

    public function getOxygenLevel() {
        return $this->oxygenLevel;
    }

    public function setOxygenLevel($oxygenLevel) {
        $this->oxygenLevel = $oxygenLevel;
    }
}

$aquarium1 = new Aquarium(); 
$aquarium2 = new Aquarium("Круглий", 50, "Прісноводний"); 
$aquarium3 = new Aquarium("Овальний", 200); 

// Створення масиву з акваріумами
$aquariums = [$aquarium1, $aquarium2, $aquarium3];

foreach ($aquariums as $aquarium) {
    echo "Форма: " . $aquarium->getShape() . "<br>";
    echo "Літраж: " . $aquarium->getCapacity() . "<br>";
    echo "Тип: " . $aquarium->getType() . "<br><br>";
    
    $oxygenatedAquarium = new Oxygenat($aquarium->getShape(), $aquarium->getCapacity(), $aquarium->getType());
    echo "<span style='color: blue;'>Рівень кисню: " . $oxygenatedAquarium->getOxygenLevel() . " мг/л</span><br><br>";
   
    // Перевірка чи об'єкт належить до класу Aquarium
    echo "Об'єкт \$aquarium належить до класу Aquarium: " . ($aquarium instanceof Aquarium ? "Так" : "Ні") . "<br>";
    
}
echo "<br>";

echo "Загальний об'єм у літрах: " . Aquarium::totalCapacity($aquariums) . " л";
?>
