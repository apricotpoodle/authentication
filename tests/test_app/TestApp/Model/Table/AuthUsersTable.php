<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace TestApp\Model\Table;

use Cake\Core\Exception\Exception;
use Cake\ORM\Query\SelectQuery;
use Cake\ORM\Table;

/**
 * AuthUser class
 */
class AuthUsersTable extends Table
{
    /**
     * Custom finder
     *
     * @param \Cake\ORM\Query\SelectQuery $query The query to find with
     * @param array $options The options to find with
     * @return \Cake\ORM\Query The query builder
     */
    public function findAuth(SelectQuery $query, array $options)
    {
        $query->select(['id', 'username', 'password']);
        if (!empty($options['return_created'])) {
            $query->select(['created']);
        }

        return $query;
    }

    /**
     * Custom finder
     *
     * @param \Cake\ORM\Query\SelectQuery $query The query to find with
     * @param array $options The options to find with
     * @return \Cake\ORM\Query The query builder
     */
    public function findUsername(SelectQuery $query, array $options)
    {
        if (empty($options['username'])) {
            throw new Exception('Username not defined');
        }

        $query = $this->find()
            ->where(['username' => $options['username']])
            ->select(['id', 'username', 'password']);

        return $query;
    }
}
