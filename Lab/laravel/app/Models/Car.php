<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 * 
 * @property int $car_id
 * @property string $make
 * @property string $model
 * @property Carbon $produced_on
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Review[] $reviews
 *
 * @package App\Models
 */
class Car extends Model
{
	protected $table = 'cars';
	protected $primaryKey = 'car_id';

	protected $dates = [
		'produced_on'
	];

	protected $fillable = [
		'make',
		'model',
		'produced_on'
	];

	public function reviews()
	{
		return $this->hasMany(Review::class, 'car_id');
	}
}
