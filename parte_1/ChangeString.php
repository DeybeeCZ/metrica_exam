<?php

/**
 * @author Deybee J. Chávez Zapata
 */
class ChangeString
{


    function build($word)
    {
        $letters = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','ñ',
        'o','p','q','r','s','t','u','v','w','x','y','z');

        $letras = str_split($word,1);

        foreach ($letras as $letra) {
            $isUpper = ctype_upper($letra);
            $letterClean=strtolower($letra);

            if(in_array($letterClean,$letters)){

                $result[]=self::getNewString($letterClean,$isUpper,$letters);

            }else{

                $result[]=$letra;

            }
        }
         return implode($result);

    }

    function getNewString($letter,$isUpper,$letters){

        $index = array_search($letter,$letters)+1;

        if($index==count($letters)){
            $index=0;
        }

        return ($isUpper)?strtoupper($letters[$index]):$letters[$index];
    }


    }

    $changeString = new ChangeString();
    $cad1 = '123 abcd*3';
    echo "Entrada: {$cad1} - Salida: ".$changeString->build($cad1);
    echo PHP_EOL;
    $cad2 = '**Casa 52';
    echo "Entrada: {$cad2} - Salida: ".$changeString->build($cad2);
    echo PHP_EOL;
    $cad3 = '**Casa 52Z';
    echo "Entrada: {$cad3} - Salida: ".$changeString->build($cad3);
    echo PHP_EOL;

 ?>
