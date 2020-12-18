<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnterpriseRequest;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnterpriseController extends Controller
{
    public function index()
    {
        return view('enterprise.listEnterprise');
    }

    public function list()
    {
        $enterprises = Enterprise::orderBy('name', 'ASC')->paginate();
        return view('enterprise.listEnterprise', compact('enterprises'));
    }

    public function addEnterprise()
    {
        return view('enterprise.addEnterprise');
    }

    public function addEnterpriseShow(EnterpriseRequest $request)
    {
        $data = $request->all();
        $data['cnpj'] = Str::of($data['cnpj'])->replaceMatches('/[^A-Za-z0-9]++/', '');
        $data['cep'] = Str::of($data['cep'])->replaceMatches('/[^A-Za-z0-9]++/', '');
        $data['phone'] = Str::of($data['phone'])->replaceMatches('/[^A-Za-z0-9]++/', '');

        $verify = DB::table('enterprises')->where('cnpj', $data['cnpj'])->first();

        if ($verify) {
            return redirect()->route('enterprise.add')->withInput()->with('error', 'Já existe um cadastro com esse cnpj!');
        }


        $enterprise = Enterprise::create($data);

        if ($enterprise) {
            return redirect()->route('enterprise.list')->with('success', 'Empresa cadastrada com sucesso!');
        }
        return redirect()->back()->with('error', 'Preencha todos os campos corretamente!');
    }

    public function editEnterprise($id)
    {
        $query = Enterprise::find($id);
        return view('enterprise.editEnterprise', compact('query'));
    }

    public function editEnterpriseShow(EnterpriseRequest $request, $id)
    {
        $data = $request->all();
        $data['cnpj'] = Str::of($data['cnpj'])->replaceMatches('/[^A-Za-z0-9]++/', '');
        $data['cep'] = Str::of($data['cep'])->replaceMatches('/[^A-Za-z0-9]++/', '');
        $data['phone'] = Str::of($data['phone'])->replaceMatches('/[^A-Za-z0-9]++/', '');

        if (!$query = Enterprise::find($id)) {
            return redirect()->route('enterprise.list')->with('error', 'Empresa não encontrada');
        }

        $query->update($data);

        if ($query) {
            return redirect()->route('enterprise.list')->with('success', 'Empresa atualziada com sucesso!');
        }

        return redirect()->back()->withInput()->with('error', 'Preenchar corretamente todos os campos!');
    }



    /** Navegação fora da area de cadastro, simulando consulta*/

    public function searchEnterprise(Request $request)
    {
        $data = $request->search;

        $data = Str::of($data)->replaceMatches('/[^A-Za-z0-9]++/', '');

        $enterprises = Enterprise::where('razao_social', 'like', "%$data%")->orWhere('cnpj', 'like', "%$data%")->get();

        return view('listEnterprise', compact('enterprises'));
    }

    public function disabledEnterprise($id)
    {
        if (!$enterprise = Enterprise::find($id)) {
            return redirect()->route('enterprise.list')->with('error', 'Empresa não encontrada');
        }

        Enterprise::find($id)->delete();
        return redirect()->route('enterprise.list')->with('success', 'Empresa desabilitada!');
    }

    public function disabledEnterpriseList(Request $request)
    {
        $enterprises = Enterprise::onlyTrashed()->get();
        return view('enterprise.listDisabled', compact('enterprises'));
    }

    public function restoreEnterprise($id)
    {

        $enterprise = Enterprise::where('id', $id)->restore();
        if (!$enterprise) {
            return redirect()->route('enterprise.list')->with('error', 'Não foi possível restaurado o cadastro solicitado!');
        }

        return redirect()->route('enterprise.list')->with('success', 'Cadastro restaurado!');
    }

    public function disabledEnterpriseDefinitive($id){

        $enterprise = Enterprise::where('id', $id)->forceDelete();
        if (!$enterprise) {
            return redirect()->route('enterprise.list')->with('error', 'Não foi possível Deletar o cadastro solicitado!');
        }

        return redirect()->route('enterprise.list')->with('success', 'Cadastro excluido definitivamente!');
    }

    public function searchDetails($id){

        $query = Enterprise::find($id);

        return view('detailsEnterprise', compact('query'));

    }
}
