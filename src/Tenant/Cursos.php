<?php

namespace DigitalsiteSaaS\Elearning\Tenant;
use Hyn\Tenancy\Traits\UsesTenantConnection;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
	use UsesTenantConnection;
	
	protected $table = 'elearning_cursos';
	public $timestamps = true;
}