<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Classe de Budgets
 * @author Wallace
 */
class Budgets extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'seller',
        'description',
        'cost',
        'date',
        'schedule',
    ];

    /**
     * Pesquisa um recurso.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * @param [string] $client [nome do cliente]
     * @param [string] $seller [nome do vendedor]
     * @param [date] $date_begin [data inicial]
     * @param [date] $date_end [data final]
     * 
     *  @return [array] $result
     */
    public function search($client, $seller, $date_begin, $date_end)
    {
        $result = DB::table('budgets')
            ->where('client', '=', $client)
            ->orWhere('seller', '=', $seller)
            ->orderByDesc('date')
            ->whereBetween('date', [$date_begin, $date_end])
            ->paginate(8);

        return $result;
    }
}
