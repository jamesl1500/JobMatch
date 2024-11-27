<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\JobPostings;

class JobBoards extends Model
{
    //
    protected $fillable = ['user_id', 'name', 'description', 'url', 'logo', 'email', 'banner'];

    /**
     * Get the user that owns the job board
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the job posts for the job board
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobPostings::class, 'job_board_id');
    }
}
