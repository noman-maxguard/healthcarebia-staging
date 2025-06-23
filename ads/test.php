<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE & ~E_WARNING & ~E_STRICT & ~E_USER_DEPRECATED);
ini_set('display_errors', 0);

trigger_error("Test warning", E_USER_WARNING);
trigger_error("Test deprecated", E_USER_DEPRECATED);
echo "Hello world";
