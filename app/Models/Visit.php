<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Visit extends Model
{
    protected $fillable=['client_ip','client_country','client_city','model_name','model_id'];

    public function RelatedObject()
    {
        return $this->belongsTo($this->model_name,'model_id',"id");

    }
    public static function log($model,$id){
        $location=geoip()->getLocation(\Request::ip());
        $obj=new Visit();
        $obj->client_ip=\Request::ip();
        $obj->client_country=$location['country'];
        $obj->client_city=$location['city'];
        $obj->model_name=$model;
        $obj->model_id=$id;
        $obj->save();

    }
}
