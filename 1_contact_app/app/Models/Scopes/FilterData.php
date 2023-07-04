<?php
namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait FilterData 
{

    /********************************************************
    *
    *  Escopo para filtrar os dados do filtro dos contatos
    *                                                     
    *  @param Builder $query                              
    *                                                     
    *
    ********************************************************/

    public function scopeFilterData(Builder $query)
    {
        $company = request()->query('company_id');
        $search = request()->query('search');
        return $query->with('company')
                        ->when($company, function($query) use ($company) {
                            $query->where('company_id', $company);
                        })
                        ->where(function($query) use ($search){
                            return $query
                                ->where('first_name', 'LIKE', "%$search%")
                                ->orWhere('last_name', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%");
                        })                            
                        ->latest()
                        ->paginate(15); 
    }
    
}