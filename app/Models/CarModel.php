<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table = 'car_models';
    protected $primaryKey = 'id';

    // A car model belongs to a car
    public function car() {
        return $this->belongsTo(Car::class); // 참조키 컬럼이름이 다를경우 두번째 파라미터로 참조키 컬럼이름을 준다.
        // belongsTo($related, $foreignKey = null, $otherKey = null, $relation = null) 
    }
}
