<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['name', 'created_at', 'updated_at'];

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'company_id');
    }
}
