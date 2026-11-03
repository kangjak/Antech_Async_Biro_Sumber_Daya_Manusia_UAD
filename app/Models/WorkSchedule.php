<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkSchedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    // @dbml-sync:table-property

    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'name',
        'unit_id',
        'category',
        'valid_from',
        'valid_until',
        'is_published',
        'published_at',
        'created_by',
        'first_day',
        'last_day',
        'start_time',
        'end_time',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected function casts(): array
    {
        return [
            'valid_from' => 'date',
            'valid_until' => 'date',
            'is_published' => 'boolean',
            'published_at' => 'datetime',
            'start_time' => 'datetime',
            'end_time' => 'datetime',
        ];
    }
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * Alias for creator relationship.
     */
    public function user(): BelongsTo
    {
        return $this->creator();
    }
    // @enddbml-sync:relations
}
