<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetsFormRequest;
use App\Http\Requests\SearchFormRequest;
use App\Models\Budgets;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BudgetsController extends Controller
{

    public function index(Request $request)
    {
        $budgets = Budgets::orderByDesc('date')->get();       
        return view('cadastros.index', compact('budgets'));
    }

    public function search(SearchFormRequest $request)
    {

        $client = $request->cliente;
        $seller = $request->vendedor;
        $date_begin = $request->data_inicial;
        $date_end = $request->data_final;

        $result = DB::table('budgets')
            ->where('client', '=', $client)
            ->orWhere('seller', '=', $seller)
            ->orderByDesc('date')
            ->get();

        if (count($result) == 0) {
            return redirect()->route('budgets.shearch')->with('error_search', 'Dados não encontrados!');
        } else {
            $budgets = $result->whereBetween('date', [$date_begin, $date_end]);;

            return view('cadastros.index', compact('budgets'));
        }
    }


    public function create()
    {
        return view('cadastros.create');
    }


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
        return redirect()->route('budgets.index')
            ->with('status', 'Orçamento cadastrado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->$id = $id;
        $budgets = Budgets::where("id", $this->$id)->first();
        return view('cadastros.edit', compact('budgets'));
    }

    public function update(BudgetsFormRequest $request, $id)
    {
        $budgets = Budgets::where("id", $id)->first();
        $budgets->update($request->all());
        return redirect()->route('budgets.index')
         ->with('status', 'Orçamento editada com sucesso!');
    }


    public function destroy($id)
    {
        $budgets = Budgets::where("id", $id)->first();
        $budgets->delete();
        
        return back()->with('status', 'Orçamento excluído com sucesso!');
    }
}
