<?php

/**
 *
 */
class ClearPar
{

    public function build($cadena='')
    {
        $parentesis = str_split($cadena,1);
        $indices = [];
        $sacar = [];
        foreach ($parentesis as $key => $value) {
            switch ($value) {
                case '(':
                    $indices[]=$key;
                    break;
                case ')':
                    if(count($indices)>0){
                        array_pop($indices);
                    }else{
                        $sacar[]=$key;
                    }
                    break;
            }
        }

        $parentesis=self::clearData($parentesis,$indices);
        $parentesis=self::clearData($parentesis,$sacar);

        return implode($parentesis);
    }

    public function clearData($parentesis,$clear)
    {
        if(count($clear)>0){
            foreach ($clear as $i) {
                $parentesis[$i]='';
            }
        }

        return $parentesis;
    }

}

$cad = "(​()()()()(()))))())((())";
echo "Entrada:{$cad} - Salida: ".ClearPar::build($cad);
echo PHP_EOL;
$cad1="()())()";
echo "Entrada:{$cad1} - Salida: ".ClearPar::build($cad1);
echo PHP_EOL;
$cad2="()(()";
echo "Entrada:{$cad2} - Salida: ".ClearPar::build($cad2);
echo PHP_EOL;
$cad3=")(";
echo "Entrada:{$cad3} - Salida: ".ClearPar::build($cad3);
echo PHP_EOL;
$cad4="((()";
echo "Entrada:{$cad4} - Salida: ".ClearPar::build($cad4);
echo PHP_EOL;
