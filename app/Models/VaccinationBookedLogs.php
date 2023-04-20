<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationBookedLogs extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (! $model->isDirty('created_by')) {
                $model->created_by = auth()->user()->email;
            }
            if (! $model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->email;
            }
        });
        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (! $model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->email;
            }
        });
    }

    protected $fillable = [
        'user_id',
        'vaccination_centre_id',
        'available_timings_id',
        'slot_id',
        'status',
    ];

    public function vaccination_centre(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VaccinationCentre::class);
    }
    public static function available_timings():  array
    {
        $available_timing = AvailableTimings::where('status', '=', 1)->get();
        $available_timing_options = [];
        foreach ($available_timing as $a_time) {
            $data =$a_time->from_time.' | '.$a_time->to_time;
            $available_timing_options[$a_time->id] = strtoupper($data);

        }
        asort($available_timing_options);

        return $available_timing_options;

    }
    public function slots(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Slots::class);
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }



}
