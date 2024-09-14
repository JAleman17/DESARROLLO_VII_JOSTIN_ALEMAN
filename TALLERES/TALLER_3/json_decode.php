<?php

$jsonPelicula = '{"titulo":"The Matrix","director":"Lana Wachowski, Lilly Wachowski","año":1999,"actores":["Keanu Reeves","Laurence Fishburne","Carrie-Anne Moss"]}';
$peliculaFavorita = json_decode($jsonPelicula, true);
echo "Información de mi película favorita decodificada:</br>";
print_r($peliculaFavorita);


$jsonComplejo = '{
    "titulo": "Inception",
    "director": "Christopher Nolan",
    "año": 2010,
    "generos": ["Ciencia ficción", "Acción"],
    "elenco": [
        {"actor": "Leonardo DiCaprio", "personaje": "Dom Cobb"},
        {"actor": "Joseph Gordon-Levitt", "personaje": "Arthur"},
        {"actor": "Elliot Page", "personaje": "Ariadne"}
    ],
    "duracion_minutos": 148
}';
$datosComplejos = json_decode($jsonComplejo, true);
echo "</br>JSON complejo decodificado:</br>";
print_r($datosComplejos);


$jsonBiblioteca = '{
    "nombre_biblioteca": "Biblioteca Central",
    "direccion": "Calle Principal 456, Ciudad",
    "libros": [
        {
            "titulo": "1984",
            "autor": "George Orwell",
            "año_publicacion": 1949,
            "genero": "Distopía"
        },
        {
            "titulo": "To Kill a Mockingbird",
            "autor": "Harper Lee",
            "año_publicacion": 1960,
            "genero": "Ficción"
        }
    ]
}';
$datosBiblioteca = json_decode($jsonBiblioteca, true);
echo "</br>JSON anidado decodificado:</br>";
print_r($datosBiblioteca);


$jsonInvalido = '{"titulo": "El Padrino", "director": "Francis Ford Coppola", "año": 1972,}'; // JSON inválido (coma extra)
$resultadoInvalido = json_decode($jsonInvalido);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "</br>Error al decodificar JSON inválido: " . json_last_error_msg();
}
?>
