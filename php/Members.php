<?php

class Members
{
    private const memberArray = array(
        array(
            'name' => 'Camille',
            'level' => 'PRO',
        ),
        array(
            'name' => 'Michael',
            'level' => 'PRO',
        ),
        array(
            'name' => 'Tom',
            'level' => 'BEGINNER',
        ),
        array(
            'name' => 'Tim',
            'level' => 'PRO',
        ),
        array(
            'name' => 'Erik',
            'level' => 'BEGINNER',
        ),
        array(
            'name' => 'Lars',
            'level' => 'PRO',
        ),
        array(
            'name' => 'Mathijs',
            'level' => 'BEGINNER',
        ),
    );

    function getMembers()
    {
        return self::memberArray;
    }

}
