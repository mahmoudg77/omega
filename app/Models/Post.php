<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use \Dimsav\Translatable\Translatable;
use App\Models\Category;
use App\Models\PostType;


class Post extends Model
{
    //
    use Translatable;
    protected $fillable=['pub_date','post_type_id','category_id','is_published','created_by','slug'];
    public $translatedAttributes = ['title','body'];

    public function PostType()
    {
      return $this->belongsTo("App\Models\PostType","post_type_id");
    }
    public function Category()
    {
      return $this->belongsTo("App\Models\Category","category_id");
    }
    public function Tags()
    {
      return $this->belongsToMany("App\Models\Tag","posts_tags_relationship");
    }
    public function strTags()
    {
        return implode(",", $this->Tags()->pluck('name')->toArray());
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

class PostTranslation extends Model {

    public $timestamps = false;
    protected $fillable = ['title','body'];

}
