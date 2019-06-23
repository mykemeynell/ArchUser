<?php

namespace ArchLayerUser\Service;

use ArchLayer\Repository\RepositoryInterface;
use ArchLayer\Service\Service;
use ArchLayerUser\Entity\Contract\UserEntityInterface;
use ArchLayerUser\Repository\Contract\UserRepositoryInterface;
use ArchLayerUser\Service\Contract\UserServiceInterface;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class UserService.
 *
 * @package ArchLayerUser\Service
 */
class UserService extends Service implements UserServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param \ArchLayerUser\Repository\Contract\UserRepositoryInterface|\ArchLayer\Repository\RepositoryInterface $repository
     */
    function __construct(UserRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * Create a new user entity and save to the database.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface
     */
    public function create(ParameterBag $payload): UserEntityInterface
    {
        /** @var \ArchLayerUser\Entity\UserEntity $user */
        $user = $this->getRepository()->create(
            Arr::only($payload->all(), $this->getRepository()->getModel()->getFillable())
        );
        $user->save();

        return $user;
    }

    /**
     * Update a user's attributes in the database. Match parameter is used to select column to match on.
     *
     * @param \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     * @param \Symfony\Component\HttpFoundation\ParameterBag                                         $payload
     *
     * @return bool
     */
    public function update(UserEntityInterface $entity, ParameterBag $payload): bool
    {
        return $entity->update(
            Arr::only($payload->all(), $this->getRepository()->getModel()->getFillable())
        );
    }

    /**
     * Delete a user from the database.
     *
     * @param \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model $user
     *
     * @return bool
     */
    public function delete(UserEntityInterface $user): bool
    {
        return $this->getRepository()->delete($user);
    }

    /**
     * Find using forgot password token.
     *
     * @param string $token
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingForgotToken(string $token): ?UserEntityInterface
    {
        return $this->getRepository()->findUsingForgotToken($token);
    }

    /**
     * Find using remember token.
     *
     * @param string $token
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingRememberToken(string $token): ?UserEntityInterface
    {
        return $this->getRepository()->findUsingRememberToken($token);
    }

    /**
     * Find using API token.
     *
     * @param string $token
     *
     * @return \ArchLayerUser\Service\Contract\UserServiceInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingApiToken(string $token): ?UserServiceInterface
    {
        return $this->getRepository()->findUsingApiToken($token);
    }
}
