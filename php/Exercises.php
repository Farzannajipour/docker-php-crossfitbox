<?php

class Exercises
{
    private const exerciseArray = array(
        "jumping jacks",
        "push ups",
        "front squats",
        "back squats",
        "pull ups",
        "rings",
        "short sprints",
        "handstand practice",
        "jumping rope",
    );

    public function getExercises()
    {
        return self::exerciseArray;
    }

    public function getCardioExercises()
    {
        return array(
            self::exerciseArray[0],
            self::exerciseArray[6],
            self::exerciseArray[8],
        );
    }

    public function getNormalExercises()
    {
        return array(
            self::exerciseArray[1],
            self::exerciseArray[2],
            self::exerciseArray[3]            
        );
    }

    public function getHandstand() 
    {
        return self::exerciseArray[7];
    }

    public function getLimitedSpaceExercises()
    {
        return array(
            self::exerciseArray[4],
            self::exerciseArray[5]
        );
    }

    public function getRings() 
    {
        return self::exerciseArray[5];
    }

    public function getPullups()
    {
        return self::exerciseArray[4];
    }
}
