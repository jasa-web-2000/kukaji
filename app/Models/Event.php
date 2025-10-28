<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $guarded = ['id'];

    public function getThumbnailAttribute($value = '')
    {
        $fullPath = $value;
        if (file_exists($fullPath)) {
            return [
                'path' => $fullPath,
                'exists' => true,
                'url' => asset($fullPath)
            ];
        }

        return [
            'path' => $fullPath,
            'exists' => false,
            'url' => img()
        ];
    }



    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($event) {
            if ($event->thumbnail['path'] && File::exists(public_path($event->thumbnail['path']))) {
                File::delete($event->thumbnail['path']);
            }
        });
    }


    public function speaker(): BelongsTo
    {
        return $this->belongsTo(Speaker::class, 'speaker_id', 'id');
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function eventParticipant()
    {
        return $this->hasMany(EventParticipant::class, 'event_id', 'id');
    }
    public function eventLike()
    {
        return $this->hasMany(EventLike::class, 'event_id', 'id');
    }
}
