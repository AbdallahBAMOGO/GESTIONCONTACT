<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\ResourceRepository;

//use Your Model

/**
 * Class ContactRepository.
 * @author Bessin Ivan ivan.bessin@orange.com
 */
class ContactRepository extends ResourceRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function __construct(Contact $contact)
	{
		$this->model = $contact; 
	}

   /**
    * @param $nom le nom de
    */
    public function search($nom)
    {
        return $this->model->where('nom', 'like', '%'.$nom.'%')->get();
    }
}
