<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacancy extends Model
{
    use HasFactory;

    public $timestamps = false;

    // @dbml-sync:table-property

    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'unit_id',
        'title',
        'category',
        'description',
        'min_qualification',
        'quota',
        'open_date',
        'close_date',
        'status',
        'created_by',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected function casts(): array
    {
        return [
            'quota' => 'integer',
            'open_date' => 'date',
            'close_date' => 'date',
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

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'vacancy_id', 'id');
    }
    // @enddbml-sync:relations
}
