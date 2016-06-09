<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Module\Web\User\DataMapper\Mapper\User;

use Eureka\Module\Web\User\Component\Exception\LoginException;
use Eureka\Module\Web\User\DataMapper\Data\User\User;
use Eureka\Component\Error\ExceptionNoData;
use Eureka\Component\Http\Session;

/**
 * DataMapper Mapper class for table "user"
 *
 * @author  Romain Cottard
 * @version 1.0.0
 */
class UserMapper extends Abstracts\UserMapperAbstract
{
    /**
     * Try to find user with specified email (as login)
     *
     * @param  string $email
     * @return User
     * @throws LoginException
     */
    public function findByEmail($email)
    {
        $this->addWhere('user_email', $email);
        $this->addWhere('user_is_activated', 1);

        try {
            $user = $this->selectOne();
        } catch (ExceptionNoData $exception) {
            throw new LoginException('Login and / or password is incorrect!', 1000, $exception);
        }

        return $user;
    }

    /**
     * Find user with data from Session.
     *
     * @param  Session $session
     * @return User
     * @throws \Exception
     */
    public function findFromSession(Session $session)
    {
        $this->addWhere('user_email', $session->get('email'));
        $this->addWhere('user_id',    (int) $session->get('id'));
        $this->addWhere('user_is_activated', 1);

        try {
            $user = $this->selectOne();
        } catch (ExceptionNoData $exception) {
            throw new LoginException('Login and / or password is incorrect!', 1000, $exception);
        }

        return $user;
    }
}
