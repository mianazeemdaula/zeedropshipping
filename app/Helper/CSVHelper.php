<?php

namespace App\Helper;

class CSVHelper
{
    public static function readCSV($csvFile, $delimiter = ',')
    {
        $file_handle = fopen($csvFile, 'r');
        while ($csvRow = fgetcsv($file_handle, null, $delimiter)) {
            $line_of_text[] = $csvRow;
        }
        fclose($file_handle);
        return $line_of_text;
    }

    // public static function namedKeys(array $array, ?int $index = null): array 
    // {
    //     // Shift the keys from the first row: 
    //     $keys = array_shift($array);

    //     $named = [];
    //     // Loop and build remaining rows into a new array:
        
    //     foreach($array as $ln => $vals) {

    //         // Using specific index or row numbers?
    //         $key = !is_null($index) ? $vals[$index] : $ln;

    //         // Combine keys and values:
    //         $named[$key] = array_combine($keys, $vals);
    //     }

    //     return $named;
    // }

    public static function namedKeys(array $array){
        // Check if the array is not empty and has at least two rows
        if (empty($array) || count($array) < 2) {
            return [];
        }

        // Extract the first row as keys
        $keys = array_shift($array);

        // Initialize the associative array
        $associativeArray = [];

        // Loop through the remaining rows to create associative arrays
        foreach ($array as $row) {
            $associativeArray[] = array_combine($keys, $row);
        }

        return $associativeArray;
    }
}