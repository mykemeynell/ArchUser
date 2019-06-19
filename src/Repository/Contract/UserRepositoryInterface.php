<?php

namespace ArchLayerUser\Repository\Contract;

use ArchLayer\Repository\RepositoryInterface;
use ArchLayerUser\Entity\Contract\UserEntityInterface;

/**
 * Interface UserRepositoryInterface.
 *
 * @package Convene\Storage\Repository\Contract
 */
interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * Find a user entity using the user's email address.
     *
     * @param string $email
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingEmail(string $email): ?UserEntityInterface;

    /**
     * Find a user entity using the user's remember token.
     *
     * @param string $token
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingRememberToken(string $token): ?UserEntityInterface;
}
