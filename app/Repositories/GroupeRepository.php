<?php

namespace App\Repositories;

use App\Models\GroupeContact;
use App\Repositories\ResourceRepository;

//use Your Model

/**
 * Class GroupeRepository.
 * @author Bessin Ivan ivan.bessin@orange.com
 */
class GroupeRepository extends ResourceRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function __construct(GroupeContact $groupe)
	{
		$this->model = $groupe; 
	}
}
