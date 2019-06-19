<?php

namespace ArchLayerUser\Entity\Contract;

/**
 * Interface UserRoleEntityInterface.
 *
 * @method mixed getKey() Get the value of the model's primary key.
 *
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package ArchLayerUser\Entity\Contract
 */
interface UserRoleEntityInterface
{
    /**
     * Get the display name of a role.
     *
     * @return string
     */
    public function getDisplayName(): string;

    /**
     * Get the description of a role.
     *
     * @return string|null
     */
    public function getDescription(): ?string;
}
