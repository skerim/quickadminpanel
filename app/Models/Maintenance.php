<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maintenance extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'maintenances';

    protected $dates = [
        'maintenance_data',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'crane_id',
        'project_id',
        'maintenance_data',
        'conservator_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function crane()
    {
        return $this->belongsTo(Crane::class, 'crane_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getMaintenanceDataAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMaintenanceDataAttribute($value)
    {
        $this->attributes['maintenance_data'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function conservator()
    {
        return $this->belongsTo(User::class, 'conservator_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
