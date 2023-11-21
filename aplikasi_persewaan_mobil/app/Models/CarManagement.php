<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarManagement extends Model
{
    use HasFactory;
    protected $table ='listofcar';
    protected $fillable = [ "namalengkap",
                            "merek",
                            "model",
                            "platnumb",
                            "tarif"
                          ];
}
