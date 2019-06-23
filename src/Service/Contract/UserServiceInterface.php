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
     * @param \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     * @param \Symfony\Component\HttpFoundation\ParameterBag                                         $payload
     *
     * @return bool
     */
    public function update(UserEntityInterface $entity, ParameterBag $payload): bool;

    /**
     * Delete a user from the database.
     *
     * @param \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model $user
     *
     * @return bool
     */
    public function delete(UserEntityInterface $user): bool;

    /**
     * Find using forgot password token.
     *
     * @param string $token
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingForgotToken(string $token): ?UserEntityInterface;

    /**
     * Find using remember token.
     *
     * @param string $token
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingRememberToken(string $token): ?UserEntityInterface;

    /**
     * Find using API token.
     *
     * @param string $token
     *
     * @return \ArchLayerUser\Service\Contract\UserServiceInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingApiToken(string $token): ?UserServiceInterface;
}
