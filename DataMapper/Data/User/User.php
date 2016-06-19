<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Package\User\DataMapper\Data\User;

use Eureka\Package\User\Component\Exception\LoginException;
use Eureka\Component\Password\Password;

/**
 * DataMapper Data class for table "user"
 *
 * @author  Romain Cottard
 * @version 1.0.0
 */
class User extends Abstracts\UserAbstract
{
    /**
     * Try to login the user.
     *
     * @param  Password $password
     * @return bool
     * @throws LoginException
     */
    public function login(Password $password)
    {
        if (!$password->verify($this->getPassword())) {
            throw new LoginException('Login and / or is incorrect!');
        }

        return true;
    }

    /**
     * Get full name.
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->getFirstname() . ' ' . $this->getLastname();
    }

}
