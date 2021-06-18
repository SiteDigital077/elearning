<?php

namespace DigitalsiteSaaS\Elearning\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
	use UsesTenantConnection;
	
	protected $table = 'elearning_instructores';
	public $timestamps = true;
}