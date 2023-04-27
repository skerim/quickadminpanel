<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crane extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'cranes';

    public static $searchable = [
        'sn',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'type_id',
        'producer_id',
        'crane_class_id',
        'sn',
        'year',
        'udt',
        'enova',
        'color',
        'max_load',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function craneMaintenances()
    {
        return $this->hasMany(Maintenance::class, 'crane_id', 'id');
    }

    public function craneRentals()
    {
        return $this->hasMany(Rental::class, 'crane_id', 'id');
    }

    public function craneSnRaports()
    {
        return $this->hasMany(Raport::class, 'crane_sn_id', 'id');
    }

    public function craneLinies()
    {
        return $this->hasMany(Liny::class, 'crane_id', 'id');
    }

    public function craneServis()
    {
        return $this->hasMany(Servi::class, 'crane_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function producer()
    {
        return $this->belongsTo(Producer::class, 'producer_id');
    }

    public function crane_class()
    {
        return $this->belongsTo(Craneclass::class, 'crane_class_id');
    }
}
