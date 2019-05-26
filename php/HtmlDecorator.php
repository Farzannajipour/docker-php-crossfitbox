<?php

interface DecoratorInterface
{
    public function beautifyResult();
}

/**
* for showing exercise data in a table. I've used DecoratorInterface due to SOLID 
* (open to extend..)
*/
class HtmlDecorator implements DecoratorInterface
{
    const MAX_MINUTES = 30;

    protected $plans;

    public function __construct($plans)
    {
        $this->plans = $plans;
    }

    public function beautifyResult()
    {
        echo "<html><body><style>body { margin: 0; table { overflow : scroll} }</style>";
        echo "<table border = '1' style='border-collapse:  collapse' cellpadding='10'><thead>";
        echo "<tr>";
        echo "<th scope='col'>#</th>";
        foreach (range(0, HtmlDecorator::MAX_MINUTES - 1) as $number) {
            echo "<th>" . $number . "</th>";
        }
        echo "</tr>";
        $counter = 0;
        foreach ($this->plans as $key => $value) {
            echo "<tr>";
            echo "<td scope='col'>" . $key . "</td>";
            foreach (range(0, HtmlDecorator::MAX_MINUTES - 1) as $number) {
                echo "<td>" . $value[$number] . "</td>";
            }
            echo "</tr>";
            $counter++;
        }
        echo "</tbody></table>";
        echo "<a href='#' onclick='window.location.reload(true);' style='margin-top: 100px;' ?>Refresh</a>";
        echo "</body></html>";
    }
}
