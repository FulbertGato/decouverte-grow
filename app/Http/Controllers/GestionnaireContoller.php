<?php

namespace App\Http\Controllers;

use App\Mail\MessageGoogle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GestionnaireContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestionnaires = User::all();

        return view('pages.admin.list', compact('gestionnaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|regex:/^[a-zA-Z0-9._-]+@growstrategyzer.com$/',

        ],
        [
            'name.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'email.unique' => 'L\'email existe déjà',
            'email.regex' => 'L\'email doit être de la forme : name@growstrategyzer.com',
        ]
    );
        //create
        $gestionnaire = new User();
        $gestionnaire->name = $request->name;
        $gestionnaire->email = $request->email;
        $gestionnaire->password = bcrypt('123456789');
        $gestionnaire->save();
        $data = array(
            'message' => 'Votre compte a bien été créé ! Vous pouvez désormais vous connecter.
            <br>Votre email est : '.$gestionnaire->email.' et votre mot de passe est : 123456789',
        );
       // Mail::to($gestionnaire)->bcc("fulbert@growstrategyzer.com")->queue(new MessageGoogle($data));
        return redirect()->route('admin.list')->with('success', 'Le gestionnaire a été ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //validation
        $gestionnaire = User::findOrFail($id);
        $gestionnaire->delete();
        //redirect
        return redirect()->route('admin.list')->with('success', 'Le gestionnaire a été supprimé avec succès');
    }
}
