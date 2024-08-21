<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'], // Permite todos los métodos HTTP

    'allowed_origins' => ['*'], // Permite todos los orígenes (dominios)

    'allowed_origins_patterns' => [], // No es necesario usar patrones de origen en este caso

    'allowed_headers' => ['*'], // Permite todos los encabezados

    'exposed_headers' => ['*'], // Permite todos los encabezados expuestos

    'max_age' => 0, // Tiempo de caché de la respuesta CORS en segundos

    'supports_credentials' => false, // No permite credenciales (cookies, encabezados de autorización, etc.)

];
