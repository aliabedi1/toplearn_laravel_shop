<?php

use Morilog\Jalali\Jalalian;





function jalaliDate($date , $format = '%A, %d %B %y')
{
    return Jalalian::forge($date)->format($format); // دی 02، 1391

}


function jalaliDateAgo($date)    
{
    return Jalalian::forge($date)->ago();
}