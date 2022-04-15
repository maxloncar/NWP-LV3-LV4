<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//import models
use App\Models\User;
use App\Models\Project_User;

class Project extends Model {
    //klasa Project s nazivom tablice, primarnim ključem i atributima
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ['naziv_projekta', 'opis_projekta', 'cijena_projekta', 'obavljeni_poslovi', 'datum_pocetka', 'datum_zavrsetka', 'voditelj_id'];
}
