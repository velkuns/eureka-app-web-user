<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Module\Web\User;

use Eureka\Component\Config\Config;
use Eureka\Component\Loader\Loader;
use Eureka\Component\Routing\RouteCollection;
use Eureka\Component\Yaml\Yaml;

//~ Load config class
$config = Config::getInstance();

//~ Load routing config
$config->load(__DIR__ . '/routing.yml', 'Eureka\Module\Web\User\Routing', new Yaml(), EKA_ENV);
RouteCollection::getInstance()->addFromConfig((array) Config::getInstance()->get('Eureka\Module\Web\User\Routing'));

//~ Load Loader config & set it
$config->load(__DIR__ . '/autoload.yml', 'Eureka\Module\Web\User\Autoload', new Yaml(), EKA_ENV);

$loader = new Loader();
$loader->addFromConfig((array) $config->get('Eureka\Module\Web\User\Autoload'));
