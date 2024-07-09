<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'table_contacts';

    protected $fillable = ['nom', 'prenom', 'email', 'telephone', 'contact_id', 'user_id'];

    public function groupe()
    {
        return $this->belongsTo(GroupeContact::class, 'contact_id');
    }
}
