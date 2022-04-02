<?php

$engines = array_slice(scandir(ENGINE_DIR), 2);
$models = array_slice(scandir(MODELS_DIR), 2);

foreach ($engines as $engine) {
    if ($engine != 'autoload.php') {
        require ENGINE_DIR . $engine;
    }
}

foreach ($models as $model) {
    require MODELS_DIR . $model;
}
