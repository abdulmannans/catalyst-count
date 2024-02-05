<?php

namespace App\QueryFilters;

use Kblais\QueryFilter\QueryFilter;

class CompanyFilter extends QueryFilter
{
	public function name($value = '')
	{
		$this->where('name', 'like', '%'.$value.'%');
	}

	public function uniqueReference($value = '')
	{
		$this->where('unique_reference',  'like', '%'.$value.'%');
	}
}
