<?php

namespace DigitalsiteSaaS\Elearning\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
	use UsesTenantConnection;

	protected $table = 'elearning_competencias';
	public $timestamps = true;
}
