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

        // dd($products[0]->category);
        $allbesoin = array();
        foreach ($products as $product) {
            $besoins = Besoin::where('product_id', '=', $product->id)->get();
            if($besoins != null && count($besoins)>0){
                $temp = new Besoin();
                $temp->product_id = $product->id;
                foreach ($besoins as $besoin) {
                    $temp->quantity = $temp->quantity + $besoin->quantity;
                }
                array_push($allbesoin, $temp);
            }
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
