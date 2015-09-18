<?php

function myExceptionHandler($exception) {
  echo "Oops: Something went wrong, with this message: <p>" . $exception->getMessage() . "</p>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');





