<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    public $timestamps = false;

    // @dbml-sync:table-property

    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'vacancy_id',
        'employee_id',
        'applicant_name',
        'applicant_email',
        'applicant_phone',
        'birth_date',
        'highest_education',
        'cv_path',
        'applied_at',
        'aik_score',
        'current_stage',
        'stage_result',
        'stage_score',
        'stage_assessed_by',
        'stage_assessed_at',
        'stage_notes',
        'status',
        'decided_at',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'applied_at' => 'datetime',
            'aik_score' => 'float',
            'stage_score' => 'float',
            'stage_assessed_at' => 'datetime',
            'decided_at' => 'datetime',
        ];
    }
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id', 'id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function stageAssessor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'stage_assessed_by', 'id');
    }

    /**
     * Alias for backward compatibility.
     */
    public function user(): BelongsTo
    {
        return $this->stageAssessor();
    }
    // @enddbml-sync:relations
}
