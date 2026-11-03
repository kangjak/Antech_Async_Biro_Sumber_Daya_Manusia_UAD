<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerformanceItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    // @dbml-sync:table-property

    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'evaluation_id',
        'description',
        'unit',
        'target_value',
        'realization_value',
        'weight',
        'score',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected function casts(): array
    {
        return [
            'target_value' => 'float',
            'realization_value' => 'float',
            'weight' => 'float',
            'score' => 'float',
        ];
    }
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function performanceEvaluation(): BelongsTo
    {
        return $this->belongsTo(PerformanceEvaluation::class, 'evaluation_id', 'id');
    }
    // @enddbml-sync:relations
}
