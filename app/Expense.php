<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'expense_report_id',
        'description',
        'amount',
    ];

    public function expenseReport(){
        return $this->belongsTo(ExpenseReport::class);
    }
}
