<?php

	namespace App\Repositories;

	abstract class ResourceRepository
	{

		protected $model;

		/**
		 * recupere le nombre d'instance du modele passeé en parametre
		 * dans le model
		 */
		public function getPaginate($n)
		{
			return $this->model->paginate($n);
		}

		/**
		 * retourne toutes les instances du modele
		 * enregistreé en BD
		 */
		public function getAll()
		{
			return $this->model::All();
		}
		/**
		 * Enregistre un /de instance(s) 
		 */
		public function store(Array $inputs)
		{
			return $this->model->create($inputs);
		}

		public function getById($id)
		{
			return $this->model->findOrFail($id);
		}

		public function update($id, Array $inputs)
		{
			$this->getById($id)->update($inputs);
		}

		public function destroy($id)
		{
			$this->getById($id)->delete();
		}

	}