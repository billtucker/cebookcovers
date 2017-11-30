<?php
/**
 * Created by IntelliJ IDEA.
 * User: billt
 * Date: 10/15/2017
 * Time: 1:12 PM
 */

$root = dirname(__FILE__) .DIRECTORY_SEPARATOR;
$headerFooter = $root .DIRECTORY_SEPARATOR ."headers_footers" .DIRECTORY_SEPARATOR;
$dbUtils = $root ."dao" .DIRECTORY_SEPARATOR;


include_once ('vendor/apache/log4php/src/main/php/Logger.php');
Logger::configure($root ."config.xml");
$log = Logger::getLogger("SiteLogger");

