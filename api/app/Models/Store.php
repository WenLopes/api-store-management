<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;
    
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'store';

    /**
     * Primary key name
     *
     * @var string
     */
    protected $primaryKey = 'store_id';

    /**
     * @var string[]
     */
    protected $guarded = ['store_id'];
}
