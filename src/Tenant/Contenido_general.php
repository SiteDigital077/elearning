<?php

namespace DigitalsiteSaaS\Elearning\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;

use Illuminate\Database\Eloquent\Model;

class Contenido_general extends Model
{

	use UsesTenantConnection;

	protected $table = 'elearning_general';
	public $timestamps = true;
}