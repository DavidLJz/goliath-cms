<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

/**
 * 
 */
class Inquiry
{
	protected $where_queries = [];
	protected $like_queries = [];
	protected $rules = [];
	public $errors = [];
	protected $request_data;

	function __construct(array $params, array $request_data)
	{
		if (!array_filter($params)) {
			throw new Exception(__METHOD__ . ': Array params is empty', 1);
		}

		$this->prepare($params);

		$this->request_data = $request_data;

		$validator = Validator::make($this->request_data, $this->rules);

        $this->errors = $validator->errors()->all();
	}

	protected function prepare(array $params) :void
	{
		if (empty($params['where']) && empty($params['like'])) 
		{
			foreach ($params as $name => $rules) {
				$this->where_queries[] = $name;
			}
		
			$this->rules = $params;
		}

		if (!empty($params['where'])) {
			foreach ($params['where'] as $name => $rules) {
				$this->like_queries[] = $name;
			}

			$this->rules = $params['where'];
		}

		if (!empty($params['like'])) {
			foreach ($params['like'] as $name => $rules) {
				$this->like_queries[] = $name;
			}

			$this->rules = array_merge($this->rules, $params['like']);
		}
	}

	public function buildQuery(Builder $query) :Builder
	{
		foreach ($this->where_queries as $column) {
			if (empty($this->request_data[$column])) {
				continue;
			}

			$query->where($column, $this->request_data[$column]);
		}
	
		foreach ($this->like_queries as $column) {
			if (empty($this->request_data[$column])) {
				continue;
			}

			$query->where($column, 'like', '%' . $this->request_data[$column] . '%');
		}

		return $query;
	}
}