<?php

namespace App\Http\Controllers;

use App\Donkey;
use Illuminate\Http\Request;
use App\Http\Requests\DonkeyRequest;

class DonkeyController extends Controller
{
    public function index(Request $request)
    {
        $data = Donkey::select('id', 'nome')
            ->orderBy('nome')
            ->paginate($request->get('porPagina') ?: 15);

        return response()->json($data);
    }

    public function store(DonkeyRequest $request)
    {
        return $this->save($request, new Donkey());
    }

    public function show(Donkey $donkey)
    {
        return response()->json($donkey, $donkey->wasRecentlyCreated ? 201 : 200);
    }

    public function update(DonkeyRequest $request, Donkey $donkey)
    {
        return $this->save($request, $donkey);
    }

    private function save(DonkeyRequest $request, Donkey $donkey)
    {
        $donkey->nome = $request->json('nome');
        $donkey->email = $request->json('email');
        $donkey->observacao = $request->json('observacao');
        $donkey->save();

        return $this->show($donkey);
    }

    public function destroy(Donkey $donkey)
    {
        $donkey->delete();

        return response()->json(null, 204);
    }
}
