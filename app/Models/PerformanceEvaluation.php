<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PerformanceEvaluation extends Model
{
    use HasFactory;

    public $timestamps = false;

    // @dbml-sync:table-property
    protected $table = 'performance_evaluation';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'employee_id',
        'eval_type',
        'period_label',
        'academic_year',
        'semester',
        'period_start',
        'period_end',
        'teaching_credit',
        'research_credit',
        'service_credit',
        'support_credit',
        'total_credit',
        'reviewer_id',
        'status',
        'reviewed_at',
        'final_score',
        'rating',
        'version',
        'is_current',
        'revision_reason',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected function casts(): array
    {
        return [
            'period_start' => 'date',
            'period_end' => 'date',
            'teaching_credit' => 'float',
            'research_credit' => 'float',
            'service_credit' => 'float',
            'support_credit' => 'float',
            'total_credit' => 'float',
            'reviewed_at' => 'datetime',
            'final_score' => 'float',
            'is_current' => 'boolean',
        ];
    }
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'reviewer_id', 'id');
    }

    public function performanceItems(): HasMany
    {
        return $this->hasMany(PerformanceItem::class, 'evaluation_id', 'id');
    }
    // @enddbml-sync:relations
}
