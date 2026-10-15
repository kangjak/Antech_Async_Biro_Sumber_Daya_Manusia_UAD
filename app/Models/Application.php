<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

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
		'decided_at'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'birth_date' => 'date',
		'applied_at' => 'datetime',
		'aik_score' => 'float',
		'stage_score' => 'float',
		'stage_assessed_at' => 'datetime',
		'decided_at' => 'datetime'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'stage_assessed_by', 'id');
    }

    public $timestamps = false;

    // @enddbml-sync:relations
}