<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Collaboration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'projects_id',
        'users_id',
        'families_id',
        'isManager',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'projects_id' => 'integer',
        'users_id' => 'integer',
        'families_id' => 'integer',
        'isManager' => 'boolean',
    ];

    public function projects(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function families(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }
}
