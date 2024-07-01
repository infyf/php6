<?php

class Aquarium {
    public $shape;
    public $capacity;
    public $type;
    public static $totalsumm = 0;

    public function __construct($shape = "�����������", $capacity = 100, $type = "��������") {
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

    public function __construct($shape = "�����������", $capacity = 100, $type = "�����������", $oxygenLevel = 8) {
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
$aquarium2 = new Aquarium("�������", 50, "�����������"); 
$aquarium3 = new Aquarium("��������", 200); 

// ��������� ������ � ����������
$aquariums = [$aquarium1, $aquarium2, $aquarium3];

foreach ($aquariums as $aquarium) {
    echo "�����: " . $aquarium->getShape() . "<br>";
    echo "˳����: " . $aquarium->getCapacity() . "<br>";
    echo "���: " . $aquarium->getType() . "<br><br>";
    
    $oxygenatedAquarium = new Oxygenat($aquarium->getShape(), $aquarium->getCapacity(), $aquarium->getType());
    echo "<span style='color: blue;'>г���� �����: " . $oxygenatedAquarium->getOxygenLevel() . " ��/�</span><br><br>";
   
    // �������� �� ��'��� �������� �� ����� Aquarium
    echo "��'��� \$aquarium �������� �� ����� Aquarium: " . ($aquarium instanceof Aquarium ? "���" : "ͳ") . "<br>";
    
}
echo "<br>";

echo "��������� ��'�� � �����: " . Aquarium::totalCapacity($aquariums) . " �";
?>
