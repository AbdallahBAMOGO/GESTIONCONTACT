<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContactRepository;
use Illuminate\Support\Facades\Session;
use App\Models\GroupeContact;
use App\Repositories\GroupeRepository;

class ContactController extends Controller
{
    protected $contactRepository;
    protected $groupeRepository;

    /**
     * Constructor
     * on fait une injectoin de dependance
     */
    public function __construct(ContactRepository $contactRepos, GroupeRepository $groupRepos)
    {   
        $this->contactRepository = $contactRepos;
        $this->groupeRepository = $groupRepos;
    }

    public function index()
    {
        $pageTitle = 'Liste des contacts';

        $contacts = $this->contactRepository->getAll();
        return view('contacts.index', compact('contacts', 'pageTitle'));
    }


    public function show($id)
    {
        $pageTitle = 'page details';

        $contact = $this->contactRepository->getById($id);
        return view('contacts.show', compact('contact', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = 'Ajouter un contact';
        //$groupes = GroupeContact::all();
        $groupes = $this->groupeRepository->getAll();
        return view('contacts.create',compact('pageTitle','groupes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'numero' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $contactData = array('nom' => $request->nom, 
                            'prenom' => $request->prenom,
                            'telephone' => $request->numero, 
                            'email' => $request->email,
                            'contact_id' => $request->groupe,
                            'user_id' => 1);

        $this->contactRepository->store($contactData);

        Session::flash('message', 'Contact cree avec success!'); 
        Session::flash('alert-class', 'alert-success'); 
        
        return redirect()->route('contacts.index');
    }


    public function edit($id)
    {
        $pageTitle = 'Modifier un contact';
        $groupes = GroupeContact::all();
        $contact = $this->contactRepository->getById($id);
        return view('contacts.edit', compact('contact','pageTitle','groupes'));
    }

    public function update(Request $request, $id)
    {        
        $contactData = array('nom' => $request->nom, 
                            'prenom' => $request->prenom,
                            'telephone' => $request->numero, 
                            'email' => $request->email,
                            'contact_id' => $request->groupe,
                            'user_id' => 1);

        $this->contactRepository->update($id, $contactData);

        Session::flash('message', 'Contact mis a jour avec success!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('contacts.index');
    }

    public function destroy($id)
    {
        $groupe = $this->contactRepository->destroy($id);
        Session::flash('message', 'Contact supprimé avec success!'); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('contacts.index');
    }

    
}
