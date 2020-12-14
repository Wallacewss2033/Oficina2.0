<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetsFormRequest;
use App\Http\Requests\SearchFormRequest;
use App\Models\Budgets;
use Illuminate\Http\Request;

class BudgetsController extends Controller
{
    /**
     * Mostra uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** 
         * É buscado do Model Budgets na ordem decrecente por data, onde é colocado 8 orçamentos por paginação
         * @param $budgets
         */
        $budgets = Budgets::orderByDesc('date')->paginate(8);

        /** 
         * logo depoois é returnado para view de index com a variável recebida a acima
         */
        return view('budgets.index', compact('budgets'));
    }


    /**
     * Pesquisa um recurso.
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(SearchFormRequest $request)
    {
        /**
         * É recebi do formulário de pesquisa os dados a serem pesquisados
         * @param $request
         * 
         * e colocado cada um em suas respectivas variáveis
         * $client
         * $seller
         * $date_begin
         * $date_end
         * 
         */
        $client = $request->cliente;
        $seller = $request->vendedor;
        $date_begin = $request->data_inicial;
        $date_end = $request->data_final;

        /** 
         * instacia o objeto da class Budgets
         */
        $budgets = new Budgets;

        /** 
         * chama o método search da class Budgets com todos os parametros
         * @param $client
         * @param $seller
         * @param $date_begin
         * @param $date_end
         * 
         * e coloca em $result 
         */
        $result = $budgets->search($client, $seller, $date_begin, $date_end);

        /**
         * tendo o resultado, é feita uma condição, se a variável $result estiver vazia, retornará uma sessison de erro,
         * 
         * mas, senão entrega o valor de $result à $budgets 
         * e enviada para a view budgets.index
         */

        if (count($result) == 0) {
            return redirect()->route('budgets')->with('error_search', 'Dados não encontrados!');
        } else {

            $budgets = $result;
            return view('budgets.index', compact('budgets'));
        }
    }

    /**
     * Mostra o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * É retornado para a rota de create
         */
        return view('budgets.create');
    }


    /**
     * Armazena um recurso recém-criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BudgetsFormRequest $request)
    {
        /**
         * é recebido da rota, um request
         * @param $result
         * para ser inserido no banco de dados
         */
        $budgets = Budgets::create($request->all());

        /**
         * É entregue a cada variável seus respectivos dados, trazido pelo request 
         */
        $budgets->client = $request->client;
        $budgets->seller = $request->seller;
        $budgets->date = $request->date;
        $budgets->schedule = $request->schedule;
        $budgets->cost = $request->cost;
        $budgets->description = $request->description;

        /**
         * linha de comando onde os dados são salvos no banco de dados 
         */
        $budgets->save();

        /** 
         * Depois é redirecionado para a rota de nome "budgets" com uma session 
         * chamada "status" que leva o estado do procedimento, mostrando ocorreu corretamente
         */
        return redirect()->route('budgets')
            ->with('status', 'Orçamento cadastrado com sucesso!');
    }


    /**
     * Exibe o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /** 
         * é recebido da rota um id
         * @param $id
         * onde é buscado do model
         * um orçamento específico representado pelo id, para ser exibido
         */
        $budgets = Budgets::where("id", $id)->first();

        /**
         * depois retorna para a view show com uma varíavel de nome "bugets" para 
         * ser exibido os dados"
         */
        return view('budgets.show', compact('budgets'));
    }


    /**
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * é recebido da rota um id, onde é buscado do model
         * um orçamento específico representado pelo id
         * @param int $id
         */
        $budgets = Budgets::where("id", $id)->first();

        /**
         * depois retorna para a view edit com uma variável de nome
         * @param $budgets
         */
        return view('budgets.edit', compact('budgets'));
    }


    /**
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(BudgetsFormRequest $request, $id)
    {
        /**
         * é recebido da rota, um request e um id, 
         *  o id representa a linha de orçamento a qual os dados vão ser substituídos pelos dados do request  
         */
        $budgets = Budgets::where("id", $id)->first();

        /** 
         * linha a qual realiza a substituíção
         */
        $budgets->update($request->all());

        /**
         * depois é redirecionado para rota de nome "bugets"
         */
        return redirect()->route('budgets')
            ->with('status', 'Orçamento editada com sucesso!');
    }


     /**
     * * Remove o recurso especificado do armazenamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * é recebido da rota um id, onde é buscado do model
         * um orçamento específico representado pelo id
         */
        $budgets = Budgets::where("id", $id)->first();

        /**
         * linha de comando onde o orçamento instanciado é deletado
         */
        $budgets->delete();

        /** 
         * depois de concluído, é redirecionado para a rota de nome "budgets" 
         */
        return redirect()->route('budgets')
            ->with('status', 'Orçamento excluído com sucesso!');
    }
}
