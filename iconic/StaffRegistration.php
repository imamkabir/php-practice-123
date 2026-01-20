<?php

class StaffMember
{
    public string $name;
    public int $myStaffId;

    private static int $nextAvailableId = 1;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->myStaffId = self::$nextAvailableId;
        self::$nextAvailableId++;
    }

    public static function getCurrentCounter(): int
    {
        return self::$nextAvailableId;
    }
}

$staff1 = new StaffMember("Ibrahim");
echo "Name: {$staff1->name} | ID: {$staff1->myStaffId}\n";

$staff2 = new StaffMember("Dr. Adegoke");
echo "Name: {$staff2->name} | ID: {$staff2->myStaffId}\n";

$staff3 = new StaffMember("Prof. Musa");
echo "Name: {$staff3->name} | ID: {$staff3->myStaffId}\n";

echo "\n----------------\n";

echo "Next available ID for hire: " . StaffMember::getCurrentCounter();

?>