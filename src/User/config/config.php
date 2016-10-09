<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Eureka\Component\Config\Config;
use Eureka\Component\Database\Database;
use Eureka\Component\Routing\RouteCollection;
use Eureka\Component\Yaml\Yaml;

//~ Root constant for current package
define('EKA_PKG_USER',   realpath(__DIR__ . '/../'));

//~ Load config class
$config = Config::getInstance();

//~ Load routing config
$config->load(__DIR__ . '/routing.yml', 'Eureka\Package\User\Routing', new Yaml(), EKA_ENV);
RouteCollection::getInstance()->addFromConfig((array) Config::getInstance()->get('Eureka\Package\User\Routing'));

//~ Load database config & set it
$config->load(__DIR__ . '/database.yml', 'Eureka\Package\User\Database', new Yaml(), EKA_ENV);
Database::getInstance()->setConfig($config->get('Eureka\Package\User\Database'));
