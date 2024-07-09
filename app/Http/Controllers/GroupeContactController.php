<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GroupeRepository;
use Illuminate\Support\Facades\Session;

class GroupeContactController extends Controller
{
    protected $groupeRepository;

    /**
     * Constructor
     * on fait une injectoin de dependance
     */
    public function __construct(GroupeRepository $groupeRepos)
    {   
        $this->groupeRepository = $groupeRepos;
    }

    public function index()
    {
        $pageTitle = 'Liste des groupes';

        $groupes = $this->groupeRepository->getAll();

        return view('groupes.index', compact('groupes', 'pageTitle'));
    }


    public function show($id)
    {
        $pageTitle = 'page details';

        $group = $this->groupeRepository->getById($id);
        return view('groupes.show', compact('group', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'Ajouter un groupe';
        return view('groupes.create',compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $groupeData = array('libelle' => $request->libelle, 
                            'user_id' => 1);

        $this->groupeRepository->store($groupeData);

        Session::flash('message', 'Groupe cree avec success!'); 
        Session::flash('alert-class', 'alert-success'); 
        
        return redirect()->route('groupes.index');
    }


    public function edit($id)
    {
        $groupe = $this->groupeRepository->getById($id);
        return view('groupes.edit', compact('groupe'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
        ]);
        
        $this->groupeRepository->update($id, $request->all());
        Session::flash('message', 'Groupe mis a jour avec success!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('groupes.index');
    }

    public function destroy($id)
    {
        $groupe = $this->groupeRepository->destroy($id);
        Session::flash('message', 'Groupe supprimé avec success!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('groupes.index');
    }

    
}
