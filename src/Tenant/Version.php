<?php

namespace DigitalsiteSaaS\Elearning\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
	use UsesTenantConnection;
	
	protected $table = 'elearning_version';
	public $timestamps = true;
}