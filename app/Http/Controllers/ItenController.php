<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Iten;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Empresa;

class ItenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Iten::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $credenciais = $user->only(['id', 'empresa_id']);
        $data = $request->all();
        Iten::create([
            'codigo' => $data['codigo'],
            'nome' => $data['nome'],
            'categoria' => $data['categoria'],
            'descricao' => $data['descricao'],
            'preco' => $data['preco'],
            'qtdunitaria' => $data['qtdunitaria'],
            'user_id' => $credenciais['id'],
            'empresa_id' => $credenciais['empresa_id'],
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Iten::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $selectIten = Iten::findOrFail($id);
        $selectIten->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Iten::destroy($id);
        return redirect('/');
    }

    public function gerarPDF()
    {
        $user = auth()->user();
        $credenciais = $user->only(['id', 'empresa_id']);
        $empresa = Empresa::find($credenciais['empresa_id']);
        if (is_null($empresa)) {
            return response()->json([
                'Erro' => 'Empresa não encontrada'
            ], 404);
        } else {
            $itens = Iten::where('empresa_id', $credenciais['empresa_id'])->get();
            if ($itens->isEmpty()) {
                response()->json([
                    'Erro' => 'Empresa não tem itens cadastrados'
                ], 401);
                return redirect('/');
            } else {
                $pdf = Pdf::loadView('model.pdf', ['itens' => $itens])->setPaper('a4', 'portrait');

                return $pdf->download('relatorio_de_itens.pdf');

            }
        }

    }
}
