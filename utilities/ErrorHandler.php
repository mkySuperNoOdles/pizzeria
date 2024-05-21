<?php
// ErrorHandler.php

namespace utilities;


class ErrorHandler
{

    // Function to handle exceptions
    public static function handleException($exception)
    {
        $file = $exception->getFile();
        $line = $exception->getLine();
        $message = "Uncaught exception: " . $exception->getMessage() . " in $file on line $line";
        error_log($message . PHP_EOL, 3, LOG_DIR . "exception_log.txt");
        echo $message;
    }

    // Function to handle errors
    public static function handleError($errno, $errstr, $errfile, $errline)
    {
        $message = "Error: [$errno] $errstr in $errfile on line $errline";
        error_log($message . PHP_EOL, 3, LOG_DIR . "error_log.txt");
        echo $message;
    }

    // Register error handler functions
    public static function register()
    {
        set_exception_handler([__NAMESPACE__ . '\\ErrorHandler', 'handleException']);
        set_error_handler([__NAMESPACE__ . '\\ErrorHandler', 'handleError']);
    }
}
// Example usage:
// Uncomment the next line to test an exception
// throw new Exception('Test exception');

// Example error triggering (division by zero)
// This will trigger the handleError method
// $result = 1 / 0;
