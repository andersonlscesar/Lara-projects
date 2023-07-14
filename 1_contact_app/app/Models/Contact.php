<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Scopes\FilterData;

class Contact extends Model
{
    use HasFactory, SoftDeletes, FilterData;

    protected $table = 'contacts';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'created_at', 'updated_at', 'company_id', 'user_id'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
