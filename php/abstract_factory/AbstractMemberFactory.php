<?php

require_once './Exercises.php';

abstract class AbstractMemberFactory
{
    const MAX_MINUTES = 30;
    public $exercises = [];
    private $member;

    public function __construct($member, $limitedSpacesFlags)
    {
        $this->exercises = Exercises::getExercises();
        $this->limitedSpace = Exercises::getLimitedSpaceExercises();
        $this->normal = Exercises::getNormalExercises();
        $this->member = $member;
        $this->limitedSpacesFlags = $limitedSpacesFlags;
    }

    public function generateRandom()
    {
        // I wanna make sure that my all exercise (except rings and pull ups) has at least one of exercise;
        //first allocate first 8th array to all exercise randomly
        $excludedExercises = array_values(array_diff($this->exercises, $this->limitedSpace));
        shuffle($excludedExercises);
        $plans = array_slice($excludedExercises, 0, sizeof($excludedExercises));

        //then use rand function to complete array
        foreach (range(sizeof($excludedExercises), ((int)AbstractMemberFactory::MAX_MINUTES) - 1) as $number) {
            $randomNumber = rand(0, sizeof($this->exercises) - 1);
            $exercise = $this->exercises[$randomNumber];
            $plans[$number] = $exercise;
        }

        //prevent using multi cardio exercises in a exercise
        $this->validate($plans);
        return [
            "member" => $plans,
            "rings" => $this->limitedSpacesFlags["rings"],
            "pullups" => $this->limitedSpacesFlags["pullups"],
        ];
    }

    /**
     * Prevent from doing cardio exercises follow after each other
     */
    private function validate(&$plans)
    {
        $normalExercises = Exercises::getNormalExercises();
        $normalValue = $normalExercises[array_rand($normalExercises)];
        $cardioExercises = Exercises::getCardioExercises();
        $rings = Exercises::getRings();
        $pullups = Exercises::getPullups();
        $usingLimitedExercises = true;
        foreach ($plans as $key => $plan) {
            if (isset($plans[$key + 1]) && in_array($plans[$key], $cardioExercises)
                && in_array($plans[$key + 1], $cardioExercises)) {
                $plans[$key] = $normalValue;
            }
            if (!$usingLimitedExercises) {
                if ($plans[$key] == $rings || $plans[$key] == $pullups) {
                    $plans[$key] = $normalValue;
                }
            } else {
                if ($plans[$key] == $rings) {
                    if (!$this->limitedSpacesFlags['rings']) {
                        $plans[$key] = $normalValue;
                    } else {
                        $this->limitedSpacesFlags['rings'] = 0;
                        $usingLimitedExercises = false;
                    }
                }
                if ($plans[$key] == $pullups) {
                    if (!$this->limitedSpacesFlags['pullups']) {
                        $plans[$key] = $normalValue;
                    } else {
                        $this->limitedSpacesFlags['pullups'] = 0;
                        $usingLimitedExercises = false;
                    }
                }
            }
        }
    }

    /**
     * Each member could have their own breaks
     */
    abstract public function addBreaks($plans);

    /**
     * The essential method in class
     */
    abstract public function createPlan();

}
