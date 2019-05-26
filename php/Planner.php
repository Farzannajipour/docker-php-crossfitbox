<?php

require './Members.php';
require './abstract_factory/MemberFactory.php';

class Planner
{
    private $allPlans = [];
    private $members = [];

    public function generalPlanning()
    {
        $this->members = Members::getMembers();
        $abstractFactory = new MemberFactory();
        $limitedExercises = [
            "rings" => 1,
            "pullups" => 1
        ];
        foreach ($this->members as $member) {
            $factory = $abstractFactory::getFactory($member, $limitedExercises);
            $plans = $factory->createPlan();
            $limitedExercises["rings"] = $plans["rings"];
            $limitedExercises["pullups"] = $plans["pullups"];
            $this->allPlans[$member['name'] . '(' . $member['level'] . ')'] = $plans['member'];
        }

        return $this->allPlans;
    }

}
