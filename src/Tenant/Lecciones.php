<?php

namespace DigitalsiteSaaS\Elearning\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Lecciones extends Model
{
	protected $table = 'elearning_lecciones';
	public $timestamps = true;
}