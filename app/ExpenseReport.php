<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    protected $fillable = ['title','description'];

    public function expenses(){
        return $this->hasMany(Expense::class);
    }
}
