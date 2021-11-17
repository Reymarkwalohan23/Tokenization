<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class applicationform
 * @package App\Models
 * @version October 26, 2021, 6:49 pm UTC
 *
 * @property string $firstname
 * @property string $lastname
 * @property integer $age
 * @property string $department
 * @property integer $phone
 * @property string $email
 */
class applicationform extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'applicationform';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstname',
        'lastname',
        'age',
        'department',
        'phone',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstname' => 'string',
        'lastname' => 'string',
        'age' => 'integer',
        'department' => 'string',
        'phone' => 'integer',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'age' => 'nullable|integer',
        'department' => 'required|string|max:255',
        'phone' => 'nullable|integer',
        'email' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
