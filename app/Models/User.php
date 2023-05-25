<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * the fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * get the id for a user
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    /**
     * get the created at time for a user
     *
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->getAttribute('created_at');
    }

    /**
     * get the name for a user
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * get the email for a user
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getAttribute('email');
    }

    /**
     * set the name for this user
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->setAttribute('name', $name);
    }

    /**
     * set the email for this user
     *
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->setAttribute('name', $email);
    }

    /**
     * set the password for this user
     *
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->setAttribute('password', $password);
    }

    public function mods(): HasMany
    {
        return $this->hasMany(Mod::class);
    }
}
