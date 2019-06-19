<?php

namespace ArchLayerUser\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use ArchLayerUser\Entity\Contract\UserEntityInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Interface UserServiceInterface.
 *
 * @package ArchLayerUser\Service\Contract
 */
interface UserServiceInterface extends ServiceInterface
{
    /**
     * Create a new user entity and save to the database.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface
     */
    public function create(ParameterBag $payload): UserEntityInterface;

    /**
     * Update a user's attributes in the database. Match parameter is used to select column to match on.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     * @param string                                         $match
     *
     * @return bool
     */
    public function update(ParameterBag $payload, $match = 'id'): bool;

    /**
     * Delete a user from the database.
     *
     * @param \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model $user
     *
     * @return bool
     */
    public function delete(UserEntityInterface $user): bool;
}
