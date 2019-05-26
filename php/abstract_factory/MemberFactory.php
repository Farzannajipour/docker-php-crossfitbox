<?php

require_once 'Beginner.php';
require_once 'Pro.php';

class MemberFactory
{

    public static function getFactory($member, $limitedSpaces)
    {
        switch ($member['level']) {
            case 'PRO':
                $factory = new Pro($member, $limitedSpaces);
                break;
            case 'BEGINNER';                
                $factory = new Beginner($member, $limitedSpaces);
                break;
        }
        return $factory;
    }

}
