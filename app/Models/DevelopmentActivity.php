<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevelopmentActivity extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'employee_id',
		'activity_type',
		'title',
		'organizer',
		'start_date',
		'end_date',
		'status',
		'degree_level',
		'study_program',
		'expected_end_date',
		'scholarship_name',
		'scholarship_status',
		'mentoring_notes',
		'training_type',
		'duration_hours',
		'certificate_number',
		'certificate_path'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'start_date' => 'date',
		'end_date' => 'date',
		'expected_end_date' => 'date'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public $timestamps = false;
    // @enddbml-sync:relations
}