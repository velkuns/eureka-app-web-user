<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Package\User\Component\Authentication;

use Eureka\Component\Debug\Debug;
use Eureka\Package\User\Component\Exception\LoginException;
use Eureka\Component\Database\Database;
use Eureka\Component\Http;
use Eureka\Package\User\DataMapper\Data;
use Eureka\Package\User\DataMapper\Mapper\User\UserMapper;
use Eureka\Component\Routing\RouteCollection;

/**
 * User Authentication component
 *
 * @author Romain Cottard
 * @version 2.1.0
 */
class User
{
    /**
     * @var Data\User\User $user
     */
    protected static $user = null;

    /**
     * Get User data instance.
     *
     * @return Data\User\User
     */
    public static function get()
    {
        return static::$user;
    }

    /**
     * Check for authentication & redirect if not logged in.
     *
     * @param  bool $redirect
     * @return void
     * @throws \Exception
     */
    public static function checkAuthentication($redirect = true)
    {
        if(static::isAuthenticated()) {
            return;
        }

        if ($redirect) {
            Http\Server::getInstance()->redirect(RouteCollection::getInstance()->get('login')->getUri());
        } else {
            throw new LoginException();
        }
    }

    /**
     * If the user is authenticated.
     *
     * @return bool
     */
    public static function isAuthenticated()
    {
        if (self::$user === null)  {
            static::restoreFromSession();
        }

        return static::$user->exists();
    }

    /**
     * Try to restore user from data in session.
     *
     * @return void
     */
    protected static function restoreFromSession()
    {
        $session = Http\Session::getInstance();

        try {
            $mapper = new UserMapper(Database::get());
            $user   = $mapper->findFromSession($session);
        } catch (\Exception $exception) {
            $user = new Data\User\User();
        }

        static::$user = $user;
    }
}