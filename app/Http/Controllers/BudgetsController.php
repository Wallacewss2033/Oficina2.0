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

        $budgets = Budgets::orderByDesc('date')->paginate(8);

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
        $client = $request->cliente;
        $seller = $request->vendedor;
        $date_begin = $request->data_inicial;
        $date_end = $request->data_final;

        $budgets = new Budgets;

        $result = $budgets->search($client, $seller, $date_begin, $date_end);

       

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
        return view('budgets.create');
    }


    /**
     * Armazena um recurso recém-criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * @param [string] $client [nome do cliente]
     * @param [string] $seller [nome do vendedor]
     * @param [date] $date_begin [data inicial]
     * @param [time] $schedule [horário]
     * @param [doble] $cost [valor]
     * @param [string] $description [descrição]
     */
    public function store(BudgetsFormRequest $request)
    {

        $budgets = Budgets::create($request->all());

        $budgets->client = $request->client;
        $budgets->seller = $request->seller;
        $budgets->date = $request->date;
        $budgets->schedule = $request->schedule;
        $budgets->cost = $request->cost;
        $budgets->description = $request->description;

        $budgets->save();

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
        $budgets = Budgets::where("id", $id)->first();
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
        $budgets = Budgets::where("id", $id)->first();
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
        
        $budgets = Budgets::where("id", $id)->first();
        $budgets->update($request->all());

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
       
        $budgets = Budgets::where("id", $id)->first();
        $budgets->delete();

        return redirect()->route('budgets')
            ->with('status', 'Orçamento excluído com sucesso!');
    }
}
