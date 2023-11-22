<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Besoin extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'etat', 'service_id', 'product_id'];

    public static function getBesoinParNature()
    {
        $products = Product::all();
        $services = Service::all();
        $allbesoin = array();
        foreach ($services as $service){
            $besoinService = array();
            foreach ($products as $product) {
                $besoins = Besoin::where('product_id', '=', $product->id)
                                ->where('service_id', '=', $service->id)->get();
                $temp = new Besoin();
                $temp->product_id = $product->id;
                foreach ($besoins as $besoin) {
                    $temp->quantity = $temp->quantity + $besoin->quantity;
                }
                array_push($besoinService, $temp);
            }
            $b = new Besoin();
            $b->besoin = $besoinService;
            array_push($allbesoin, $b);
        }
        return $allbesoin;
    }


    public function service() {
        return $this->belongsTo(\App\Models\Service::class);
    }
    public function product() {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
