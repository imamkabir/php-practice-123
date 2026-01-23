<?php
  //1. THE CONTRACT 
interface CombatUnit {
    public function performAttack();
}
/**
 * THE CLASSES 
 * These are the real soldiers and machines.
 */

class InfantrySoldier implements CombatUnit {
    public function performAttack() {
        echo "Soldier Aiming ak47 \n";
    }
}

class B2Bomber implements CombatUnit {
    public function performAttack() {
        echo "B2 Bomber: Stealth mode active Opening bay doors  BOOM! \n";
    }
}

class HeavyTank implements CombatUnit {
    public function performAttack() {
        echo "Tank: Rotating turret  KABLAST \n";
    }
}

/**
 *  The Polymorphism Magic
 * This function is blind It doesn't know what the unit is
 * It only knows that the unit follows the CombatUnit contract
 */
function giveOrderToStrike(CombatUnit $assignedUnit) {
    echo "General Order confirmed Initiating strike sequence\n";
    
    // THIS IS THE MAGIC One line many different results
    $assignedUnit->performAttack();
    
    echo "General Strike completed Returning to base\n";
    echo "-------------------------------------------\n";
}

/**
 * Running my War Room
 */

//  create  different Forms of Combat Units
$soldier = new InfantrySoldier();
$bomber = new B2Bomber();
$tank = new HeavyTank();

// The General gives the EXACT same order to all three.
giveOrderToStrike($soldier);
giveOrderToStrike($bomber);
giveOrderToStrike($tank);

?>