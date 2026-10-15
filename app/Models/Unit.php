<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'unit';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'name',
		'unit_type',
		'is_active'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'is_active' => 'boolean'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function employees()
    {
        return $this->hasMany(Employee::class, 'unit_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'role_unit_id', 'id');
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class, 'unit_id', 'id');
    }

    public function workSchedules()
    {
        return $this->hasMany(WorkSchedule::class, 'unit_id', 'id');
    }

    public $timestamps = false;

    // @enddbml-sync:relations
}