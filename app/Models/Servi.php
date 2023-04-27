<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servi extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'servis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'crane_id',
        'project_id',
        'conservator_id',
        'discription',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function crane()
    {
        return $this->belongsTo(Crane::class, 'crane_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function conservator()
    {
        return $this->belongsTo(User::class, 'conservator_id');
    }
}
