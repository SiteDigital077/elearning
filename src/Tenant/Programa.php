<?php

namespace DigitalsiteSaaS\Elearning\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
	use UsesTenantConnection;

	protected $table = 'elearning_programas';
	public $timestamps = true;
}
