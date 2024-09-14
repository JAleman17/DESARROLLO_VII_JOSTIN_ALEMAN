<?php

function contar_palabras($texto) {
    $palabras = str_word_count($texto, 1); 
    return count($palabras);
}


function contar_vocales($texto) {
    $texto = strtolower($texto); 
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    $contador = 0;
    
    for ($i = 0; $i < strlen($texto); $i++) {
        if (in_array($texto[$i], $vocales)) {
            $contador++;
        }
    }
    
    return $contador;
}

function invertir_pala($texto) {

    $listPalabras =  explode(" ",$texto);
    krsort($listPalabras);
    $nuevoTexto = implode(" ",$listPalabras);
    return $nuevoTexto;
    
}

?>