<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRequest extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'employee_request';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'request_kind',
		'employee_id',
		'request_type_id',
		'start_date',
		'end_date',
		'total_days',
		'work_date',
		'start_time',
		'end_time',
		'total_hours',
		'period_label',
		'amount',
		'reason',
		'status',
		'approver_id',
		'submitted_at',
		'decided_at',
		'decision_note',
		'version'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'start_date' => 'date',
		'end_date' => 'date',
		'work_date' => 'date',
		'start_time' => 'datetime',
		'end_time' => 'datetime',
		'total_hours' => 'float',
		'amount' => 'float',
		'submitted_at' => 'datetime',
		'decided_at' => 'datetime'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function requestType()
    {
        return $this->belongsTo(RequestType::class, 'request_type_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'approver_id', 'id');
    }

    // @enddbml-sync:relations
}