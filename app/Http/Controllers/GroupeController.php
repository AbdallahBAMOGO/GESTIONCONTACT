<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groupe;
use App\Models\GroupeContact;

class GroupeController extends Controller
{
    /**
     * Cette fonction affiche la liste des groupes
     */
    public function index(){
        $pageTitle = 'Liste des groupes';
        $groupes = GroupeContact::all();
        return view("groupes.index", compact('groupes','pageTitle'));

    }

    /**
     * Cette fonction affiche la liste des groupes
     */
    public function show($id){
        $pageTitle = "page details";
        $group = GroupeContact::find($id);
        return view("groupes.show",compact('group','pageTitle'));

    }


    /**
     * Cette fonction affiche la liste dajout de groupes
     */

    public function create(){
        $pageTitle = 'Ajouter un groupe';
        return view("groupes.create", compact('pageTitle'));

    }

    /**
     * Cette fonction affiche un nouveau groupe
     */

    public function store(Request $request){
        $groupe = new GroupeContact();
        $groupe->libelle = $request->libelle;
        $groupe->user_id = 1;
        $groupe->save();
        return redirect()->route("groupes.index");
    }

    /**
     * Cette fonction affiche le formulaire de modificaton dun groupe
     */

    public function edit($id){
        $groupe = GroupeContact::find($id);
        return view("groupes.edit", compact('groupe'));

    }

    /**
     * Cette fonction permet de mettre a jour un groupe
     */

    public function update(Request $request, $id){

        $groupe = GroupeContact::find($id);
        $groupe->libelle = $request->libelle;
        $groupe->user_id = auth()->user_id;
        return redirect()->route("groupes.index");

    }

    /**
     * Cette fonction permet de supprimer un groupe
     */

    public function destroy($id){
        $groupe = GroupeContact::find($id);
        $groupe->delete();
        return redirect()->route("groupes.index");
    }

}
