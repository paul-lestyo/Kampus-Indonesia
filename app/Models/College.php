<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Major;

class College extends Model
{
    use HasFactory;

	protected $fillable = ['name'];

	public function majors() {
    	return $this->hasMany(Major::class, 'college_id');
	}
}
