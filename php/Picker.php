<?php

class Picker
{
    const MAX_MINUTES = 30;
    private $initialArray;

    public function __construct(Array $array)
    {
        $this->initialArray = $array;
    }

    public static function numberPicker()
    {

    }

    public function generateRandom()
    {
        $plans = [];
        foreach (range(0, (int)AbstractMemberFactory::MAX_MINUTES - 1) as $number) {
            $exercise = $this->exercises[array_rand(Exercises::getNormalKeys())];
            $plans[$number] = $exercise;
        }
        return $plans;
    }
}
