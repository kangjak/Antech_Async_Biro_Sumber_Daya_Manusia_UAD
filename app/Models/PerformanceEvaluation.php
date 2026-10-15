<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceEvaluation extends Model
{
    use HasFactory;

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
		'revision_reason'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'period_start' => 'date',
		'period_end' => 'date',
		'teaching_credit' => 'float',
		'research_credit' => 'float',
		'service_credit' => 'float',
		'support_credit' => 'float',
		'total_credit' => 'float',
		'reviewed_at' => 'datetime',
		'final_score' => 'float',
		'is_current' => 'boolean'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function reviewer() // dari employee ke reviewer
    {
        return $this->belongsTo(Employee::class, 'reviewer_id', 'id');
    }

    public function performanceItems()
    {
        return $this->hasMany(PerformanceItem::class, 'evaluation_id', 'id');
    }

    public $timestamps = false;

    // @enddbml-sync:relations
}