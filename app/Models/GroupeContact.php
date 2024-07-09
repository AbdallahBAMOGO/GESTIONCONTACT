<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class GroupeContact extends Model
{
    use HasFactory;

    protected $table = 'table_contacts_groupe';

    protected $fillable = ['libelle', 'user_id'];

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'contact_id');
    }

}
