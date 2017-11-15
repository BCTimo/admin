<?php
function date_range($first, $last)
{
    //加一天
    $last = str_replace('-', '/', $last);
    $last = date('Y-m-d',strtotime($last . "+1 days"));
    //加一天

    $period = new DatePeriod(
        new DateTime($first),
        new DateInterval('P1D'),
        new DateTime($last)
    );

    foreach ($period as $date)
        $dates[] = $date->format('Y-m-d');

    return $dates;
}
// test: print_r(date_range('2014-06-22', '2014-07-02'));
?>