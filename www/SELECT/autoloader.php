<?php

spl_autoload_register(function ($class_name) {
    include 'clases/' . $class_name . '.php';
});