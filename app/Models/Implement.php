<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Implement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'projects_id',
        'technologies_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'projects_id' => 'integer',
        'technologies_id' => 'integer',
    ];

    public function projects(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function technologies(): BelongsTo
    {
        return $this->belongsTo(Technology::class);
    }
}
