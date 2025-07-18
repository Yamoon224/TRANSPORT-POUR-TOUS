<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Achievement
 * 
 * @property int $id
 * @property int $level
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Achievement extends Model
{
	protected $casts = [
		'level' => 'int',
		'user_id' => 'int'
	];

	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
