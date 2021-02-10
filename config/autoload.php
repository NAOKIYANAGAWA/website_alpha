<?php

spl_autoload_register(function($class) {
  $prefix = 'app\\';
  if (strpos($class, $prefix) === 0) {
    $className = substr($class, strlen($prefix));
    $classFilePass = __DIR__ . '/../app/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($classFilePass)) {
      require $classFilePass;
    }
  }
});

