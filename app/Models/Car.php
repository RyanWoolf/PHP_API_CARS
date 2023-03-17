<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'founded', 'description', 'image_path'];
    // protected $timestamps = false; // 사용하고 싶지 않으면 거짓을 넣어둠
    // protected $dateFormat = 'h:m:s'; // "Y-m-d H:i:s"

    // protected $hidden = ['updated_at'];
    // protected $visible = ['name', 'founded', 'description'];

    // one to many
    public function carModels() {
        return $this->hasMany(CarModel::class);
        // hasMany($related, $foreignKey = null, $localKey = null)
        // 참조키 이름이 다른경우 두번째 파라미터에 이름을.
    } 

    public function headquarter() {
        return $this->hasOne(Headquarter::class);
    }

    //Define a has many through relationship
    public function engines() {
        return $this->hasManyThrough(
            Engine::class, 
            CarModel::class, 
            'car_id', // FK on CarModel table
            'model_id' // FK on Engine table
            // hasManyThrough($related, $through, $firstKey = null, $secondKey = null, $localKey = null)
        );
    }

    //Define a has one through relationship
    public function productionDate() {
        return $this->hasOneThrough(
            CarProductionDate::class, // Model that it wants to access
            CarModel::class, // Intermediate model
            'car_id', // FK on CarModel table
            'model_id' // FK on 
        );
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
