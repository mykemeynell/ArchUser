# User Storage Layer Architecture

A small package that sets up a Service, Repository and Entity for user storage. 
You can extend the classes and interfaces within this package to add your own 
additional functionality, or use the ones that come with this package as 
default.

## Installation via Composer

* Get the latest version of ArchUser for your application.

```composer require mykemeynell/archuser```

* Include the service provider within your application.

```php
    ...
    
    \ArchLayerUser\Provider\ArchUserServiceProvider::class,
    
    ...
```

* Bind the Service, Repository and Entity to your application.

```php
    public function register(): void
    {
        $this->app->bind('user.entity',               \ArchLayerUser\Entity\UserEntity::class);
        $this->app->bind('userRole.entity',           \ArchLayerUser\Entity\UserRoleEntity::class);
        $this->app->bind('userRolePermission.entity', \ArchLayerUser\Entity\UserRolePermissionEntity::class);
        
        $this->app->singleton('user.repository',               \ArchLayerUser\Repository\UserRepository::class);
        $this->app->singleton('userRole.repository',           \ArchLayerUser\Repository\UserRoleRepository::class);
        $this->app->singleton('userRolePermission.repository', \ArchLayerUser\Repository\UserRolePermissionRepository::class);
        
        $this->app->singleton('user.service',               \ArchLayerUser\Service\UserService::class);
        $this->app->singleton('userRole.service',           \ArchLayerUser\Service\UserRoleService::class);
        $this->app->singleton('userRolePermission.service', \ArchLayerUser\Service\UserRolePermissionService::class);
    }
```

* Register any aliases and populate your providers ```provides(): void``` method 
appropriately, I have a couple of packages at 
[```mykemeynell/laravel-alias-service```](https://github.com/mykemeynell/laravel-alias-service)
and [```mykemeynell/laravel-provides-service```](https://github.com/mykemeynell/laravel-provides-service). 
**The following instructions are 
based on using those packages**.

```php
class AppServiceProvider extends ServiceProvider
{
    use mykemeynell\Support\Providers\Concern\AliasService,
        mykemeynell\Support\Providers\Concern\ProvidesService;
        
    /**
     * Services that are to be aliased into application.
     *
     * @var array
     */
    protected $aliases = [
        'user.entity' => [\ArchLayerUser\Entity\Contract\UserEntityInterface::class],
        'userRole.entity' => [\ArchLayerUser\Entity\Contract\UserRoleEntityInterface::class],
        'userRolePermission.entity' => [\ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface::class],
        
        'user.repository' => [\ArchLayerUser\Repository\Contract\UserRepositoryInterface::class],
        'userRole.repository' > [\ArchLayerUser\Repository\Contract\UserRoleRepositoryInterface::class],
        'userRolePermission.repository' => [[\ArchLayerUser\Repository\Contract\UserRolePermissionsRepositoryInterface::class]],
        
        'user.service' => [\ArchLayerUser\Service\Contract\UserServiceInterface::class],
        'userRole.service' => [\ArchLayerUser\Service\Contract\UserRoleServiceInterface::class],
        'userRolePermission.service' => [\ArchLayerUser\Service\Contract\UserRolePermissionsServiceInterface::class],
    ];

...
```

* Call the ```AliasService::registerAliases(): void``` method.

```php
    public function register(): void
    {
        $this->registerAliases();
        
        ...
```

