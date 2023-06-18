<?php

namespace App\Helpers;

class Helper
{
    public static function convertEngNumToNepali(string $string)
    {
    	$convertedString = '';
    	$string_to_convert = str_split($string);

    	foreach($string_to_convert as $character){
    		switch($character){
		    case "0": $n = "०"; break;
		    case "1": $n = "१"; break;
		    case "2": $n = "२"; break;
		    case "3": $n = "३"; break;
		    case "4": $n = "४"; break;
		    case "5": $n = "५"; break;
		    case "6": $n = "६"; break;
		    case "7": $n = "७"; break;
		    case "8": $n = "८"; break;
		    case "9": $n = "९"; break;
		    default : $n = $character;
		   }
		   $convertedString .= $n;
    	}

    	return $convertedString;
    }

    public static function formatAdDate($date){
    	$time = strtotime($date);
        $formatedDate = date('jS M, Y', $time);

    	return $formatedDate;
    }

    public static function convertToDateOnly($date){
    	$time = strtotime($date);
        $formatedDate = date('Y-m-d', $time);

        return $formatedDate;
    }
}