<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Classe de Budgets
 * @author Classe de Orçamento
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
     * @author método de pesquisar orçamentos
     * @return \Illuminate\Http\Response
     */
    public function search($client, $seller, $date_begin, $date_end)
    {
        /**
         * aqui são pegas variáveis para realizar a pesquisa no banco
         * @param $client
         * @param $seller
         * @param $date_begin
         * @param $date_end
         * retornarem para a variável @param $result
         */
        $result = DB::table('budgets')
            ->where('client', '=', $client)
            ->orWhere('seller', '=', $seller)
            ->orderByDesc('date')
            ->whereBetween('date', [$date_begin, $date_end])
            ->paginate(8);
        /**
         * @return $result
         */
        return $result;
    }
}
