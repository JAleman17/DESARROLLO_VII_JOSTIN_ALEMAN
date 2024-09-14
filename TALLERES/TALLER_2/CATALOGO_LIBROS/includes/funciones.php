<?php
// funciones.php

function obtenerLibros() {
    return [
        [
            'titulo' => '1984',
            'autor' => 'George Orwell',
            'anio' => 1949,
            'descripcion' => 'Una distopía sobre un régimen totalitario.'
        ],
        [
            'titulo' => 'El Señor de los Anillos',
            'autor' => 'J.R.R. Tolkien',
            'anio' => 1954,
            'descripcion' => 'Una épica fantasía de la lucha entre el bien y el mal.'
        ],
        [
            'titulo' => 'Cien Años de Soledad',
            'autor' => 'Gabriel García Márquez',
            'anio' => 1967,
            'descripcion' => 'Una obra maestra del realismo mágico.'
        ],
        [
            'titulo' => 'Orgullo y Prejuicio',
            'autor' => 'Jane Austen',
            'anio' => 1813,
            'descripcion' => 'Una historia de amor y malentendidos en la Inglaterra del siglo XIX.'
        ],
        [
            'titulo' => 'Don Quijote de la Mancha',
            'autor' => 'Miguel de Cervantes',
            'anio' => 1605,
            'descripcion' => 'La historia de un hombre que se convierte en caballero andante.'
        ]
    ];
}

function mostrarDetallesLibro($libro) {
    return "
        <div class='libro'>
            <h2>{$libro['titulo']}</h2>
            <p><strong>Autor:</strong> {$libro['autor']}</p>
            <p><strong>Año:</strong> {$libro['anio']}</p>
            <p><strong>Descripción:</strong> {$libro['descripcion']}</p>
        </div>
    ";
}
?>