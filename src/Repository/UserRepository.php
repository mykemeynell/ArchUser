<?php

namespace ArchLayerUser\Repository;

use ArchLayer\Repository\Repository;
use ArchLayerUser\Entity\Contract\UserEntityInterface;

/**
 * Class UserRepository.
 *
 * @package ArchLayerUser\Repository
 */
class UserRepository extends Repository implements Contract\UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(UserEntityInterface $entity)
    {
        $this->setModel($entity);
    }

    /**
     * Find a user entity using the user's email address.
     *
     * @param string $email
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingEmail(string $email): ?UserEntityInterface
    {
        return $this->builder()->where('email', $email)->first();
    }

    /**
     * Find a user entity using the user's remember token.
     *
     * @param string $token
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingRememberToken(string $token): ?UserEntityInterface
    {
        return $this->builder()->where('remember_token', $token)->first();
    }

    /**
     * Find a user entity using the user's api token.
     *
     * @param string $token
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingApiToken(string $token): ?UserEntityInterface
    {
        return $this->builder()->where('api_token', $token)->first();
    }

    /**
     * Find a user entity using the user's forgot password token.
     *
     * @param string $token
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingForgotToken(string $token): ?UserEntityInterface
    {
        return $this->builder()->where('forgot_token', $token)->first();
    }
}
