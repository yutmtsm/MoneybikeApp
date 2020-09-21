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
}
