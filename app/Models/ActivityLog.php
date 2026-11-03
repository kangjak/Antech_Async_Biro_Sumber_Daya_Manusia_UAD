<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ActivityLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    // @dbml-sync:table-property

    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'actor_id',
        'action',
        'entity_type',
        'entity_id',
        'old_status',
        'new_status',
        'reason',
        'details',
        'ip_address',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function actor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'actor_id', 'id');
    }

    /**
     * Alias for backward compatibility.
     */
    public function user(): BelongsTo
    {
        return $this->actor();
    }

    public function entity(): MorphTo
    {
        return $this->morphTo();
    }
    // @enddbml-sync:relations
}
