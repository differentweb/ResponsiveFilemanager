<?php

$base_load_file = "";
$application = "admin";
$environment = "prod";

$symfony_loaded = false;

if (file_exists($base_load_file) && @include_once($base_load_file)) {
    if (!sfContext::hasInstance()) {
        $configuration = ProjectConfiguration::getApplicationConfiguration($application, $environment, false);
        sfContext::createInstance($configuration);
    }
    $symfony_loaded = true;
} else {
    if (session_id() == '') {
        session_start();
    }
}
