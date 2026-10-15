<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'nip',
		'nidn',
		'full_name',
		'category',
		'gender',
		'birth_place',
		'birth_date',
		'email',
		'phone',
		'address',
		'highest_education',
		'unit_id',
		'supervisor_id',
		'employment_status',
		'join_date',
		'end_date',
		'retirement_status',
		'retirement_age',
		'retirement_planned_date',
		'retirement_proposed_at',
		'retirement_processed_by',
		'retirement_sk_number',
		'retirement_sk_date',
		'retirement_completed_at',
		'retirement_notes'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'birth_date' => 'date',
		'join_date' => 'date',
		'end_date' => 'date',
		'retirement_planned_date' => 'date',
		'retirement_proposed_at' => 'datetime',
		'retirement_sk_date' => 'date',
		'retirement_completed_at' => 'datetime'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'supervisor_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'retirement_processed_by', 'id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'supervisor_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'employee_id', 'id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'employee_id', 'id');
    }

    public function leaveBalances()
    {
        return $this->hasMany(LeaveBalance::class, 'employee_id', 'id');
    }

    public function employeeRequests()
    {
        return $this->hasMany(EmployeeRequest::class, 'employee_id', 'id');
    }

    public function rankHistories()
    {
        return $this->hasMany(RankHistory::class, 'employee_id', 'id');
    }

    public function developmentActivities()
    {
        return $this->hasMany(DevelopmentActivity::class, 'employee_id', 'id');
    }

    public function bpjsMemberships()
    {
        return $this->hasMany(BpjsMembership::class, 'employee_id', 'id');
    }

    public function performanceEvaluations()
    {
        return $this->hasMany(PerformanceEvaluation::class, 'employee_id', 'id');
    }

    public $timestamps = false;

    // @enddbml-sync:relations
}