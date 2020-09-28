<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    //
    protected $fillable = [
        'manufacturer', 'engine_displacement', 'type', 'model_year',
        'light_vehicle_tax', 'weight_tax', 'liability_insurance',
        'voluntary_insurance', 'vehicle_inspection', 'parking_fee', 'consumables'
    ];
    
    public function user()
    {
    return $this->belongsTo('App\User');
        
    }
    
    public function getMybikeInfo(Int $user_id){
        return $this->where('user_id', $user_id)->get();
    }
    // バイクのそうコストを取得
    public function getTotalCost($mybikes)
    {
        $total = 0;
        foreach($mybikes as $mybike)
        {
            $total += ($mybike->light_vehicle_tax + $mybike->weight_tax + 
            $mybike->liability_insurance + $mybike->voluntary_insurance + 
            $mybike->vehicle_inspection + $mybike->parking_fee + $mybike->consumables);
        }

        return $total;
    }
}
