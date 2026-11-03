<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

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
        'retirement_notes',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'join_date' => 'date',
            'end_date' => 'date',
            'retirement_planned_date' => 'date',
            'retirement_proposed_at' => 'datetime',
            'retirement_sk_date' => 'date',
            'retirement_completed_at' => 'datetime',
        ];
    }
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'supervisor_id', 'id');
    }

    /**
     * Alias for supervisor relationship.
     */
    public function employee(): BelongsTo
    {
        return $this->supervisor();
    }

    public function retirementProcessor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'retirement_processed_by', 'id');
    }

    /**
     * Alias for backward compatibility.
     */
    public function user(): BelongsTo
    {
        return $this->retirementProcessor();
    }

    public function subordinates(): HasMany
    {
        return $this->hasMany(Employee::class, 'supervisor_id', 'id');
    }

    /**
     * Alias for subordinates relationship.
     */
    public function employees(): HasMany
    {
        return $this->subordinates();
    }

    public function userAccount(): HasOne
    {
        return $this->hasOne(User::class, 'employee_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'employee_id', 'id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'employee_id', 'id');
    }

    public function leaveBalances(): HasMany
    {
        return $this->hasMany(LeaveBalance::class, 'employee_id', 'id');
    }

    public function employeeRequests(): HasMany
    {
        return $this->hasMany(EmployeeRequest::class, 'employee_id', 'id');
    }

    public function rankHistories(): HasMany
    {
        return $this->hasMany(RankHistory::class, 'employee_id', 'id');
    }

    public function developmentActivities(): HasMany
    {
        return $this->hasMany(DevelopmentActivity::class, 'employee_id', 'id');
    }

    public function bpjsMemberships(): HasMany
    {
        return $this->hasMany(BpjsMembership::class, 'employee_id', 'id');
    }

    public function performanceEvaluations(): HasMany
    {
        return $this->hasMany(PerformanceEvaluation::class, 'employee_id', 'id');
    }
    // @enddbml-sync:relations
}
