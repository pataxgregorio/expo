<?php

// En el archivo config/cors.php

return [
    'paths' => ['api/*', '*.map'], // Permitir acceso a archivos .map
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'], // O especifica los orígenes permitidos
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];

