<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Mod extends Model
{
    use HasFactory;

    /**
     * the fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'path',
        'user_id'
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

    public function setName(string $name): void
    {
        $this->setAttribute('name', $name);
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    public function setPath(string $path): void
    {
        $this->setAttribute('path', $path);
    }

    public function getPath(): string
    {
        return $this->getAttribute('path');
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
     * Returns the user the mod is associated to
     * TODO: Set a default system user instead of returning a nullable object
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
