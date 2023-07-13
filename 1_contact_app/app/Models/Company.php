<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Scopes\FilterData;

class Company extends Model
{
    use HasFactory, SoftDeletes, FilterData;

    protected $table = 'companies';
    protected $fillable = ['name', 'created_at', 'updated_at'];

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class, 'company_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
