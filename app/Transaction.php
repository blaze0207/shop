<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'merchandise_id', 'price', 'buy_count', 'total_price'];
}
