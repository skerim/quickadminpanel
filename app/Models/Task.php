<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'tasks';

    protected $dates = [
        'end',
        'start',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'crane_type_id',
        'crane_id',
        'status_id',
        'comments',
        'end',
        'start',
        'hp',
        'lw_jb',
        'kontrahent_id',
        'location',
        'monters',
        'hydr',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function crane_type()
    {
        return $this->belongsTo(Type::class, 'crane_type_id');
    }

    public function crane()
    {
        return $this->belongsTo(Crane::class, 'crane_id');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    public function getEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndAttribute($value)
    {
        $this->attributes['end'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function kontrahent()
    {
        return $this->belongsTo(Customer::class, 'kontrahent_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
