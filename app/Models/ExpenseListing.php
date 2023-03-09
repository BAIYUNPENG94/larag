<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'creation_date',
        'issue_date',
        'addmission_date',
        'status',
        'content',
        'trans_type',
        'type',
        'amount',
        'creator',
        'payment_target',
        'receipt_path',
        'remark',
        'year',
        'month',
        'url',
        'manager',
        'reject_reason',
        'approve_reason',
        'C_10000',
        'C_5000',
        'C_2000',
        'C_1000',
        'C_500',
        'C_100',
        'C_50',
        'C_10',
        'C_5',
        'C_1'
    ];
}
