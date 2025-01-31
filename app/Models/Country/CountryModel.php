<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "country_lang";

    protected $fillable =['id', 'alias', 'name', 'name_en'];

}
