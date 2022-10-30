<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function getCompanies(){
        $company = Company::all();

        return $company;
    }
    //
}
