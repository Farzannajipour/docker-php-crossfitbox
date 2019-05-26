<?php

require './Planner.php';              
require './HtmlDecorator.php';

$planner = new Planner();
$plans = $planner->generalPlanning();
$decorator = new HtmlDecorator($plans);
$beautifyResult = $decorator->beautifyResult();
echo $beautifyResult;



