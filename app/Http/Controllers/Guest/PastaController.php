<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Pasta;
use Illuminate\Http\Request;

class PastaController extends Controller
{
    // definisco la variabile privata per le validate
    private $validations = [
        'src'           => 'string|max:100',
        'titolo'        => 'required|string|max:100',
        'tipo'          => 'required|required|string|max:100',
        'cottura'       => 'required|integer|max:255',
        'peso'          => 'required|integer|max:2000', // max:65535 smallinteger
        'descrizione'   => 'string',
    ];
    
    public function index()
    {
        $pastas = Pasta::paginate(5); // SELECT * FROM `pastas`

        // dd($pastas);

        return view('pastas.index', compact('pastas'));
    }

    
    public function create()
    {
        return view('pastas.create');
    }

    
    public function store(Request $request)
    {
        // dobbiamo validare i dati prima di eseguire il salvataggio del form

        // richiamo la variabile per la validate
        $request->validate($this->validations);

        // $request->validate([
        //     'src'           => 'string|max:100',
        //     'titolo'        => 'required|string|max:100',
        //     'tipo'          => 'required|required|string|max:100',
        //     'cottura'       => 'required|integer|max:255',
        //     'peso'          => 'required|integer|max:2000', // max:65535 smallinteger
        //     'descrizione'   => 'string',
        // ]);
        
        $data = $request->all();

        // vogliamo salvare i dati nel DB

        $newPasta = new Pasta();

        $newPasta->src              = $data['src'];
        $newPasta->titolo           = $data['titolo'];
        $newPasta->tipo             = $data['tipo'];
        $newPasta->cottura          = $data['cottura'];
        $newPasta->peso             = $data['peso'];
        $newPasta->descrizione      = $data['descrizione'];

        $newPasta->save(); // per salvare una nuova riga

        // metodo con create per salvare i dati nel DB (poi vai nel model e inserisci il fillable)

        // unset($data['_token']);
        // $newPasta = Pasta::create($data);

        return redirect()->route('pastas.show', ['pasta' => $newPasta->id]);
    }

    
    public function show(Pasta $pasta)
    {
        return view('pastas.show', compact('pasta'));
    }

   
    public function edit(Pasta $pasta)
    {
        return view('pastas.edit', compact('pasta'));
    }

    
    public function update(Request $request, Pasta $pasta)
    {
        // validare i dati

        // richiamo la variabile per la validate

        $request->validate($this->validations);

        // $request->validate([
        //     'src'           => 'string|max:100',
        //     'titolo'        => 'required|string|max:100',
        //     'tipo'          => 'required|required|string|max:100',
        //     'cottura'       => 'required|integer|max:255',
        //     'peso'          => 'required|integer|max:2000', // max:65535 smallinteger
        //     'descrizione'   => 'string',
        // ]);

        $data = $request->all();

        // aggiornare i dati nel DB

        $pasta->src              = $data['src'];
        $pasta->titolo           = $data['titolo'];
        $pasta->tipo             = $data['tipo'];
        $pasta->cottura          = $data['cottura'];
        $pasta->peso             = $data['peso'];
        $pasta->descrizione      = $data['descrizione'];
        $pasta->update(); // per aggiornare la riga

        return to_route('pastas.show', ['pasta' => $pasta->id]);
    }

    
    public function destroy(Pasta $pasta)
    {
        $pasta->delete(); // attivando i soft delete il delete viene modificato automaticamente
        return to_route('pastas.index')->with('delete_success', $pasta);
        
    }

    public function restore($id)
    {
        Pasta::withTrashed()->where('id', $id)->restore();

        $pasta = Pasta::find($id);

        return to_route('pastas.index')->with('restore_success', $pasta);
    }

    public function trashed()
    {
        $trashedPastas = Pasta::onlyTrashed()->paginate(5); 

        

        return view('pastas.trashed', compact('trashedPastas'));
    }

    public function hardDelete($id)
    {
        $pasta = Pasta::withTrashed()->find($id);
        $pasta->forceDelete();

        return to_route('pastas.trashed')->with('delete_success', $pasta);
    
    }
}
