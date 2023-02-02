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

function convertPersianToEnglishNumber($number)
{
    
    $number = str_replace('۰','0', $number);
    $number = str_replace('۱','1', $number);
    $number = str_replace('۲','2', $number);
    $number = str_replace('۳','3', $number);
    $number = str_replace('۴','4', $number);
    $number = str_replace('۵','5', $number);
    $number = str_replace('۶','6', $number);
    $number = str_replace('۷','7', $number);
    $number = str_replace('۸','8', $number);
    $number = str_replace('۹','9', $number);

    return $number;
}

function convertArabicToEnglishNumber($number)
{
    
    $number = str_replace('۰','0', $number);
    $number = str_replace('۱','1', $number);
    $number = str_replace('۲','2', $number);
    $number = str_replace('۳','3', $number);
    $number = str_replace('۴','4', $number);
    $number = str_replace('۵','5', $number);
    $number = str_replace('۶','6', $number);
    $number = str_replace('۷','7', $number);
    $number = str_replace('۸','8', $number);
    $number = str_replace('۹','9', $number);

    return $number;
}


function convertEnglishToPersianNumber($number)
{
    
    $number = str_replace('0','۰', $number);
    $number = str_replace('1','۱', $number);
    $number = str_replace('2','۲', $number);
    $number = str_replace('3','۳', $number);
    $number = str_replace('4','۴', $number);
    $number = str_replace('5','۵', $number);
    $number = str_replace('6','۶', $number);
    $number = str_replace('7','۷', $number);
    $number = str_replace('8','۸', $number);
    $number = str_replace('9','۹', $number);

    return $number;
}

function convertEnglishToArabicNumber($number)
{
    
    $number = str_replace('0','۰', $number);
    $number = str_replace('1','۱', $number);
    $number = str_replace('2','۲', $number);
    $number = str_replace('3','۳', $number);
    $number = str_replace('4','۴', $number);
    $number = str_replace('5','۵', $number);
    $number = str_replace('6','۶', $number);
    $number = str_replace('7','۷', $number);
    $number = str_replace('8','۸', $number);
    $number = str_replace('9','۹', $number);

    return $number;
}



function priceFormat($price)
{
    $price = number_format($price, 0 , '/' , '،');
    $price = convertEnglishToPersianNumber($price);

    return $price;
}

function validateNationalCode($nationalCode)
{
    $nationalCode = trim($nationalCode,'.');
    $nationalCode = convertArabicToEnglishNumber($nationalCode);
    $nationalCode = convertPersianToEnglishNumber($nationalCode);
    $bannedArray = ['0000000000' , '1111111111' , '2222222222' , '3333333333' , '4444444444' , '5555555555' , '6666666666' , '7777777777' , '8888888888' , '9999999999'];

    if(empty($nationalCode))
    {
        return false;
    }
    else if(count(str_split($nationalCode)) != 10)
    {
        return false;
    }
    else if(in_array($nationalCode,$bannedArray))
    {
        return false;
    }
    else
    {
        // National Organization for Civil Registration rule for national code
        $sum = 0;
        // sum of digits except last digit
        for($i = 0; $i < 9; $i++)
        {
            $sum += (int) $nationalCode[$i] * (10 - $i);
        }

        $devidRemaining = $sum % 11;
        
        // calculating last digit
        if($devidRemaining < 2)
        {
            $lastDigit = $devidRemaining;
        }
        else
        {
            $lastDigit = 11 - ($devidRemaining);
        }

        // validation for last digit
        if( (int) $nationalCode[9] == $lastDigit )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}


