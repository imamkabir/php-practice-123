<?php
class GradeCalculator {

    /** * @var float $passingScore 
     * (Tells IDE this is a float, not just a number)
     */
    public $passingScore = 50.0;

    /**
     * Calculates the final grade.
     * * @param  int   $score    The raw score (0-100)
     * @param  bool  $isBonus  If the student gets bonus points
     * * @return string          Returns "Pass" or "Fail"
     * * @throws Exception       Warns you: "Hey, negative scores crash this!"
     * * @deprecated             (Optional) Use calculateNewGrade() instead.
     */
    public function calculate($score, $isBonus) {
        if ($score < 0) throw new Exception("Score cannot be negative");
        // ... logic ...
        return "Pass";
    }
}