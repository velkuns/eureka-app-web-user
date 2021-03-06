<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Package\User\DataMapper\Mapper\User\Abstracts;

use Eureka\Component\Orm\DataMapper\MapperAbstract;
use Eureka\Package\User\DataMapper\Data\User\User;

/**
 * /!\ AUTO GENERATED FILE. DO NOT EDIT THIS FILE.
 * THIS FILE IS OVERWRITTEN WHEN THE ORM SCRIPT GENERATOR IS RAN.
 * You can add you specific code in child class: User
 *
 * @author  Romain Cottard
 * @version 1.0.0
 */
abstract class UserMapperAbstract extends MapperAbstract
{
    /**
     * @var string $dataClass Name of class use to instance DataMapper Data class.
     */
    protected $dataClass = '\Eureka\Package\User\DataMapper\Data\User\User';

    /**
     * @var string $databaseConfig Database config name
     */
    protected $databaseConfig = 'user';

    /**
     * @var array $fields List of fields
     */
    protected $table = 'user_user';

    /**
     * @var array $fields List of fields
     */
    protected $fields = array(
        'user_id',
        'user_email',
        'user_password',
        'user_pseudo',
        'user_firstname',
        'user_lastname',
        'user_date_register',
        'user_is_activated',
        'user_date_activation',
        'user_code_activation',
        'user_avatar'
    );

    /**
     * @var array $primaryKeys List of primary keys
     */
    protected $primaryKeys = array(
        'user_id'
    );

    /**
     * @var array $primaryKeys List of primary keys
     */
    protected $dataNamesMap = array(

        'user_id' => array(
            'get'      => 'getId',
            'set'      => 'setId',
            'property' => 'id',
        ),
        'user_email' => array(
            'get'      => 'getEmail',
            'set'      => 'setEmail',
            'property' => 'email',
        ),
        'user_password' => array(
            'get'      => 'getPassword',
            'set'      => 'setPassword',
            'property' => 'password',
        ),
        'user_pseudo' => array(
            'get'      => 'getPseudo',
            'set'      => 'setPseudo',
            'property' => 'pseudo',
        ),
        'user_firstname' => array(
            'get'      => 'getFirstname',
            'set'      => 'setFirstname',
            'property' => 'firstname',
        ),
        'user_lastname' => array(
            'get'      => 'getLastname',
            'set'      => 'setLastname',
            'property' => 'lastname',
        ),
        'user_date_register' => array(
            'get'      => 'getDateRegister',
            'set'      => 'setDateRegister',
            'property' => 'dateRegister',
        ),
        'user_is_activated' => array(
            'get'      => 'getActivated',
            'set'      => 'setIsActivated',
            'property' => 'isActivated',
        ),
        'user_date_activation' => array(
            'get'      => 'getDateActivation',
            'set'      => 'setDateActivation',
            'property' => 'dateActivation',
        ),
        'user_code_activation' => array(
            'get'      => 'getCodeActivation',
            'set'      => 'setCodeActivation',
            'property' => 'codeActivation',
        ),
        'user_avatar' => array(
            'get'      => 'getAvatar',
            'set'      => 'setAvatar',
            'property' => 'avatar',
        ),
    );

    /**
     * @var string $cacheName Name of cache config to use.
     */
    protected $cacheName = 'user';

    /**
     * @var bool $isCacheEnabled
     */
    protected $isCacheEnabled = false;

    /**
     * Get first row corresponding of the id.
     *
     * @param  integer $id
     * @return User
     */
    public function findById($id)
    {
        return parent::findById($id);
    }

    /**
     * Get first row corresponding of the primary keys.
     *
     * @param  array $primaryKeys
     * @return User
     */
    public function findByKeys($primaryKeys)
    {
        return parent::findByKeys($primaryKeys);
    }

    /**
     * Select all rows corresponding of where clause.
     *
     * @return User[] List of row.
     */
    public function select()
    {
        return parent::select();
    }

    /**
     * Select first rows corresponding to where clause.
     *
     * @return User
     */
    public function selectOne()
    {
        return parent::selectOne();
    }

    /**
     * Fetch rows for specified query.
     *
     * @param string $query
     * @return User[] Array of model_base object for query.
     */
    public function query($query)
    {
        return parent::query($query);
    }

    /**
     * Create new instance of extended DataAbstract class & return it.
     *
     * @param  \stdClass $row
     * @param  bool      $exists
     * @return User
     */
    public function newDataInstance(\stdClass $row = null, $exists = false)
    {
        return parent::newDataInstance($row, $exists);
    }
}
