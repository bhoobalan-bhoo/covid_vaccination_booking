<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Filament\Notifications\Notification;

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
            $check = DB::table('slots')
                            ->select('count')
                            ->where('id', [$model->slot_id])
                            ->pluck('count')
                            ->first();
            if ($check <= 0){
                Notification::make()
                    ->title('No Slots Available')
                    ->danger()
                    ->send();
                    throw new \Exception('No Slots Available');
            }

            DB::statement("update slots set count = count -1 where id = ?",[$model->slot_id]);
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

    public function available_timings(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(AvailableTimings::class);

    }
    public function slot(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Slots::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }



}
