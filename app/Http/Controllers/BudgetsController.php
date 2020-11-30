<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetsFormRequest;
use App\Http\Requests\SearchFormRequest;
use App\Models\Budgets;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BudgetsController extends Controller
{

    public function index()
    {   /*
        É buscado do Model Budgets na ordem decrecente por data, onde é colocado 8 orçamentos por paginação
        */
        $budgets = Budgets::orderByDesc('date')->paginate(8);       

        /* logo depoois é returnado para view de index com a variável recebida a acima*/
        return view('budgets.index', compact('budgets'));
    }

    public function search(SearchFormRequest $request)
    {
        /*É recebi do formulário de pesquisa os dados a serem pesquisados
        e colocado cada um em suas respectivas variáveis*/
        $client = $request->cliente;
        $seller = $request->vendedor;
        $date_begin = $request->data_inicial;
        $date_end = $request->data_final;

        /*aqui são pegas duas variáveis (client e seller) para realizar a pesquisa no banco e 
        retornarem para a variável result */
        $result = DB::table('budgets')
            ->where('client', '=', $client)
            ->orWhere('seller', '=', $seller)
            ->orderByDesc('date')
            ->get();
        
        /*tendo o resultado, é feita uma condição, se a variável result estiver vazia, retornará uma sessison de erro,
        mas, senão pesquisá por data, as linhas de orçamento que ficam entre a data inicial e data final.*/

        if (count($result) == 0) {
            return redirect()->route('budgets')->with('error_search', 'Dados não encontrados!');
        } else {

            $budgets = $result->whereBetween('date', [$date_begin, $date_end]);;
            return view('budgets.index', compact('budgets'));
        }
    }


    public function create()
    {
        /*É retornado para a rota de create*/
        return view('budgets.create');
    }


    public function store(BudgetsFormRequest $request)
    {
        /*é recebido da rota, um request da rota, para ser inserido no banco de dados*/
        $budgets = Budgets::create($request->all());

        /*É entregue a cada variável seu respectivo dado vindo com o request */
        $budgets->client = $request->client;
        $budgets->seller = $request->seller;
        $budgets->date = $request->date;
        $budgets->schedule = $request->schedule;
        $budgets->cost = $request->cost;
        $budgets->description = $request->description;

        /*linha de comando onde os dados são salvos no banco de dados */
        $budgets->save();

        /*depois é redirecionado para a rota de nome "budgets" com uma session 
        chamada "status" que leva o estado do procedimento, mostrando ocorreu corretamente*/
        return redirect()->route('budgets')
            ->with('status', 'Orçamento cadastrado com sucesso!');
    }

    public function show($id)
    {   
        /*é recebido da rota um id, onde é buscado do model
        um orçamento específico representado pelo id, para ser exibido*/
        $budgets = Budgets::where("id", $id)->first();

         /*depois retorna para a view show com uma varíavel de nome "bugets para 
         ser exibido os dados"*/
        return view('budgets.show', compact('budgets'));
    }

    public function edit($id)
    {
        /*é recebido da rota um id, onde é buscado do model
        um orçamento específico representado pelo id*/
        $budgets = Budgets::where("id", $id)->first();

        /*depois retorna para a view edit com uma variável de nome "bugets"*/
        return view('budgets.edit', compact('budgets'));
    }

    public function update(BudgetsFormRequest $request, $id)
    {
        /*é recebido da rota, um request e um id, 
        o id representa a linha de orçamento a qual os dados vão ser substituídos pelos dados do request  */
        $budgets = Budgets::where("id", $id)->first();

        /* linha a qual realiza a substituíção*/
        $budgets->update($request->all());

        /*depois é redirecionado para rota de nome "bugets"*/
        return redirect()->route('budgets')
         ->with('status', 'Orçamento editada com sucesso!');
    }


    public function destroy($id)
    {
        /*é recebido da rota um id, onde é buscado do model
        um orçamento específico representado pelo id*/
        $budgets = Budgets::where("id", $id)->first();

        /* linha de comando onde o orçamento instanciado é deletado*/
        $budgets->delete();

        /* depois de concluído, é redirecionado para a rota de nome "budgets"*/
        return redirect()->route('budgets')
        ->with('status', 'Orçamento excluído com sucesso!');
        
    }
}
