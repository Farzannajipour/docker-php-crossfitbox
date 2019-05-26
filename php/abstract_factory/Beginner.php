<?php

require_once 'AbstractMemberFactory.php';

class Beginner extends AbstractMemberFactory
{
    const BREAKS = 4;
    public function addBreaks($plans)
    {
        $i = 0;
        while ($i < Beginner::BREAKS) {
            $plans[rand(1, sizeof($plans) - 2)] = "BREAK";
            $i++;
        }
        return $plans;
    }

    public function createPlan()
    {
        $plan = parent::generateRandom();
        $this->checkHandstand($plan["member"]);
        $plan["member"] = $this->addBreaks($plan["member"]);
        return $plan;
    }

    /*
    * The maximum number of handstand is just one
    */
    private function checkHandstand(&$memberPlan)
    {
        $handstand = Exercises::getHandstand();
        if (array_count_values($memberPlan)[$handstand] > 1) {
            while (array_count_values($memberPlan)[$handstand] > 1) {
                $key = array_search($handstand, $memberPlan);
                $switchKey = array_rand($this->normal);
                $memberPlan[$key] = $this->normal[$switchKey];
            }
        }
    }
}
