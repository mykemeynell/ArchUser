<?php

namespace ArchLayerUser\Entity;

use ArchLayer\Entity\Concern\EntityHasTimestamps;
use ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface;
use Illuminate\Database\Eloquent\Model;
use UuidColumn\Concern\HasUuidObserver;

/**
 * Class UserRolePermissionsEntity.
 *
 * @package ArchLayerUser\Entity
 */
class UserRolePermissionsEntity extends Model implements UserRolePermissionsEntityInterface
{
    use EntityHasTimestamps, HasUuidObserver;

    /**
     * The table name.
     *
     * @var string
     */
    protected $table = 'role_permissions';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['permission', 'role_id',];

    /**
     * Get the name of the permission.
     *
     * @return string
     */
    public function getPermission(): string
    {
        // TODO: Implement getPermission() method.
    }

    /**
     * Get the role ID.
     *
     * @return string
     */
    public function getRoleId(): string
    {
        // TODO: Implement getRoleId() method.
    }
}
