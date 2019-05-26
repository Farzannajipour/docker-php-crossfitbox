<?php

require_once 'AbstractMemberFactory.php';

class Pro extends AbstractMemberFactory
{
    const BREAKS = 2;
    public function addBreaks($plans)
    {
        $i = 0;
        while ($i < Pro::BREAKS) {
            $plans[rand(1, sizeof($plans) - 2)] = "BREAK";
            $i++;
        }
        return $plans;
    }

    public function createPlan()
    {
        $plan = parent::generateRandom();

        $plan["member"] = $this->addBreaks($plan["member"]);

        return $plan;
    }

}
