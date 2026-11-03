<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    public $timestamps = false;

    // @dbml-sync:table-property
    protected $table = 'unit';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'name',
        'unit_type',
        'is_active',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'unit_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_unit_id', 'id');
    }

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class, 'unit_id', 'id');
    }

    public function workSchedules(): HasMany
    {
        return $this->hasMany(WorkSchedule::class, 'unit_id', 'id');
    }
    // @enddbml-sync:relations
}
