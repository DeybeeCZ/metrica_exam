<?php

/**
 *
 */
class CompleteRange
{

    function build($value)
    {
        try {
            if(!is_array($value))
                throw new Exception("El valor ingresado no es un array", 1);

            $start = (int)$value[0];
            $end = (int)end($value);

            for ($i=$start; $i <= $end; $i++) {
                $result[]=$i;
            }

            return $result;


        } catch (Exception $e) {
            echo 'Error:'.$e->getMessage();
        }

    }

}

var_dump(CompleteRange::build(['1', '2', '4', '5']));
var_dump(CompleteRange::build([2, 4, 9]));
var_dump(CompleteRange::build([55, 58, 60]));

 ?>
