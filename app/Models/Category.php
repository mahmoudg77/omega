<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\softDeletes;
use \Dimsav\Translatable\Translatable;

class Category extends Model
{
    //use softDeletes;
    use Translatable;
    protected $fillable=['parent_id','created_by','slug','icon'];
    public $translatedAttributes = ['title','description'];

    public function Posts()
    {
      return $this->hasMany('App\Models\Post');
    }
    public function Parent()
    {
      return $this->belongsTo(self::class,"parent_id");
    }
    public function Chields()
    {
      return $this->hasMany(self::class,"parent_id")->orderBy('sort');
    }
    public function Files()
    {
      return $this->hasMany("App\Models\File","model_id","id")->where('model_name',self::class);;
    }
    public function MediaFiles()
    {
      return $this->hasMany("App\Models\MediaFile","model_id","id")->where('model_name',self::class);;
    }
    public function Creator()
    {
        return $this->belongsTo("App\User","created_by","id");
    }
    public function mainImage($thumb=false){
        $mf=$this->MediaFiles()->where('model_attribute','main')->orderBy('id', 'desc')->first();
        if(!$mf){
            return url('images/none.jpg');
        }

        if($thumb){
            return url('uploads/_thumbs/Images/'.$mf->name);
        }else{
            return url('uploads/images/'.$mf->name);
        }
    }
    public function mainFile(){
        $file=$this->Files()->where('model_attribute','main')->orderBy('id', 'desc')->first();
        if(!$file){
            return null;
        }

        return $file->name;
    }
    public function Visits(){
        return $this->hasMany(\App\Models\Visit::class,"model_id","id")->where('model_name',self::class);
    }
}

class CategoryTranslation extends Model {

    public $timestamps = false;
    protected $fillable = ['title','description'];

}
