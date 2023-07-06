<?php
namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait FilterData 
{

    /********************************************************
    *
    *  @param Builder $query  
                           
    *  Escopo para filtrar os dados do filtro dos contatos
    *                                                     
    *                                                     
    *
    ********************************************************/

    public function scopeFilterData(Builder $query)
    {
        $sort = request()->query('sort');
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
                        ->orderBy($this->sortable($sort)['column'], $this->sortable($sort)['direction'])
                        ->paginate(15); 
    }


    private function sortable($sort)
    {
        if (!is_null($sort)) {
            $column = strpos($sort, "-") === 0 ? ltrim($sort, "-") : $sort;
            $direction = strpos($sort, "-") === 0 ? "desc" : "asc";

            return [
                'column'    => $column,
                'direction' => $direction
            ];
        }
       return [
            'column'    => 'id',
            'direction' => 'desc'
       ];
    }
    
}