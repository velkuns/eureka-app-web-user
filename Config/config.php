<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Package\User\Config;

use Eureka\Component\Config\Config;
use Eureka\Component\Database\Database;
use Eureka\Component\Loader\Loader;
use Eureka\Component\Routing\RouteCollection;
use Eureka\Component\Yaml\Yaml;

//~ Load config class
$config = Config::getInstance();

//~ Load routing config
$config->load(__DIR__ . '/routing.yml', 'Eureka\Package\User\Routing', new Yaml(), EKA_ENV);
RouteCollection::getInstance()->addFromConfig((array) Config::getInstance()->get('Eureka\Package\User\Routing'));

//~ Load Loader config & set it
$config->load(__DIR__ . '/autoload.yml', 'Eureka\Package\User\Autoload', new Yaml(), EKA_ENV);

$loader = new Loader();
$loader->addFromConfig((array) $config->get('Eureka\Package\User\Autoload'));

//~ Load database config & set it
$config->load(__DIR__ . '/database.yml', 'Eureka\Package\User\Database', new Yaml(), EKA_ENV);
Database::getInstance()->setConfig($config->get('Eureka\Package\User\Database'));

//~ Load theme
$config->load(__DIR__ . '/theme.yml', 'Eureka\Package\User\Theme', new Yaml(), EKA_ENV);

//~ Load meta
$config->load(__DIR__ . '/meta.yml', 'Eureka\Package\User\Meta', new Yaml(), EKA_ENV);