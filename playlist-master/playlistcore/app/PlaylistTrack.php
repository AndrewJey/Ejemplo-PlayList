<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistTrack extends Model
{
    protected $table = 'playlist_tracks';

    protected $fillable = [
        'title',
        'artist',
        'album',
        'duration_seconds',
        'position',
    ];

    protected $casts = [
        'duration_seconds' => 'integer',
        'position' => 'integer',
    ];
}
