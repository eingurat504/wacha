<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'applications';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
    ];


    /**
     * User for this hop.
     *
     * @return
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'applied_by', 'id');
    }

    /**
     * User for this hop.
     *
     * @return
     */
    public function leave()
    {
        return $this->belongsTo(Leave::class, 'leave_id', 'id');
    }

}
