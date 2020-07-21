<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * 
 * @property int $review_id
 * @property int $car_id
 * @property string $review
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Car $car
 *
 * @package App\Models
 */
class Review extends Model
{
	protected $table = 'reviews';
	protected $primaryKey = 'review_id';

	protected $casts = [
		'car_id' => 'int'
	];

	protected $fillable = [
		'car_id',
		'review'
	];

	public function car()
	{
		return $this->belongsTo(Car::class, 'car_id');
	}
}
