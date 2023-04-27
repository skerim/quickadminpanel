<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rental extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'rentals';

    protected $dates = [
        'rental_start',
        'rental_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'project_id',
        'crane_id',
        'rental_start',
        'rental_end',
        'hp',
        'lw',
        'lifting_capacity',
        'power',
        'anchor',
        'cross',
        'foundation_level',
        'name_crane',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function rentalProjects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function crane()
    {
        return $this->belongsTo(Crane::class, 'crane_id');
    }

    public function getRentalStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRentalStartAttribute($value)
    {
        $this->attributes['rental_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRentalEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRentalEndAttribute($value)
    {
        $this->attributes['rental_end'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
