<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\IController;
use App\Models\Post as IModel;
use App\Models\MediaFile;
use App\Models\File;
use Func;
use Auth;
use DB;
use Datatables;
class PostController extends IController
{
  var $metaTitle="المقالات والصفحات والأبحاث";
  public $model=\App\Models\Post::class;
  var $methods=['getFreeSlug'=>'Create Free Slug',
                'publish'=>'Go to online post',
                'unpublish'=>'Go to offline post',
                'dataTable'=>'Data Table',
                ];
  protected $viewFolder="dashboard.post";

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $data=request()->get('data');
      if(request()->has("type")){
        $post_type_id=request()->get('type');
        $data=$data->where('post_type_id',request()->get("type"));
      }

      return view($this->viewFolder.".index",compact('data','post_type_id'));
  }

  public function edit($id)
  {
    $data=request()->get('data');
    $data=$data->find($id);
    if($data==null){
        return  Func::Error( "Unauthorized !",$this->viewFolder.".edit",compact('data') );
    }
    return view($this->viewFolder.".edit",compact('data'));
  }
  public function create()
  {
      $post_type_id=request()->get('type');
      return view($this->viewFolder.".create",compact('post_type_id'));
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
        $data=request()->get('data');
        $data=$data->find($id);
        if($data==null){
            return  Func::Error( "Unauthorized !",$this->viewFolder.".edit",compact('show') );
        }
        return view($this->viewFolder.".show", compact('data'));
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {


      $data=$request->except(['_token']);
      $data['created_by']=Auth::user()->id;
      if(in_array('is_published',$data) && $data['is_published']==1){
          $data['pub_date']=date('Y-m-d H:i:n');
      }
      if(!in_array('slug',$data) || $data['slug']==""){
          $data['slug']=Func::getFreeSlug(IModel::class,$data[app()->getLocale()]['title']);
      }

      DB::beginTransaction();
      try{
          $post=IModel::create($data);

          if($request->hasfile('image'))
          {
              $image=$request->file('image');
              $imageobj=new MediaFile(['model'=>IModel::class,'id'=>$post->id,'tag'=>'main']);
              $imageobj->upload($image);
          }
          if($request->hasfile('attach'))
          {
              $file=$request->file('attach');
              $fileobj=new File(['model'=>IModel::class,'id'=>$post->id,'tag'=>'main']);
              $fileobj->upload($file);
          }
	if(in_array('tags',array_keys($data)))
          $tags=$data['tags'];
          if(isset($tags) && $tags!='' && $tags!=null && !empty($tags)){
              $list=explode(',',$tags);
              foreach ($list as $tag){
                 if(!$dbtag=\App\Models\Tag::where('name',$tag)->first())
                         $dbtag=\App\Models\Tag::create(['name'=>$tag]);
                 // dd($tag);
                  $post->Tags()->attach([$dbtag->id]);
              }

          }
          DB::commit();

          return  Func::Success("Save Success");
      }catch (\Exception $ex){
          DB::rollback();
          return  Func::Error("Error while save data !! " .$ex->getMessage(),$this->viewFolder.".create",compact('data'));
      }

  }
  public function update(Request $request,$id)
  {

      $reqData=$request->except(['_token']);

      $reqData['updated_by']=Auth::user()->id;

      $data=request()->get('data');

      $data=$data->find($id);
      if($data==null){
          return  Func::Error( "Unauthorized !",$this->viewFolder.".edit",compact('data') );
      }
      $post_type_id=$data['post_type_id'];
      DB::beginTransaction();
      try{
          $data->update($reqData);
          if($request->hasfile('image'))
          {
              $image=$request->file('image');
              $imageobj=new MediaFile(['model'=>IModel::class,'id'=>$data->id,'tag'=>'main']);
              $imageobj->upload($image);
          }

          if($request->hasfile('attach'))
          {
              $file=$request->file('attach');
              $fileobj=new File(['model'=>IModel::class,'id'=>$data->id,'tag'=>'main']);
              $fileobj->upload($file);
          }

	if(in_array('tags',array_keys($reqData)))
          $tags=$reqData['tags'];
         // dd($tags);
          $data->Tags()->delete();
          if(isset($tags) && $tags!='' && $tags!=null && !empty($tags)){
              $list=explode(',',$tags);
              foreach ($list as $tag){
                  if(!$dbtag=\App\Models\Tag::where('name',$tag)->first())
                      $dbtag=\App\Models\Tag::create(['name'=>$tag]);
                  // dd($tag);
                  $data->Tags()->attach([$dbtag->id]);
              }

          }

          DB::commit();
          return  Func::Success("Save Success");
      }catch (\Exception $ex){
          DB::rollback();
          return  Func::Error("Error while save data !! ".$ex->getMessage() ,$this->viewFolder.".edit",['data'=>$data,'post_type_id'=>$post_type_id]);
      }


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
      //$data=\request()->get('data');
      $data=IModel::find($id);

      if($data==null){

          return  Func::Error( "Unauthorized !",$this->viewFolder.".index" );
      }
       try{
          $data->destroy($id);
      }catch (\Exception $ex){
         return  Func::Error("Error while save data !! ");
      }
      return  Func::Success("Delete Success");

  }

  public function getFreeSlug(){
      $title=\request()->get('title');
      $slug=Func::getFreeSlug(IModel::class,$title);
      return Func::Success("Success",compact('slug'));
  }
    public function publish()
    {
        $data=request()->get('data');
        $id=request()->get('id');

        $data=$data->find($id);

        if($data==null){
            return  Func::Error( "Unauthorized !");
        }

        DB::beginTransaction();
        try{
            $data->is_published=1;
            $data->pub_date=date("Y-m-d H:i:n");
            $data->save();

            DB::commit();
            return  Func::Success("Save Success");
        }catch (\Exception $ex){
            DB::rollback();
            return  Func::Error("Error while save data !! ");
        }
    }
    public function unpublish()
    {
        $data=request()->get('data');
        $id=request()->get('id');

        $data=$data->find($id);

        if($data==null){
            return  Func::Error( "Unauthorized !");
        }

        DB::beginTransaction();
        try{
            $data->is_published=0;
            $data->pub_date=null;
            $data->save();

            DB::commit();
            return  Func::Success("Save Success");
        }catch (\Exception $ex){
            DB::rollback();
            return  Func::Error("Error while save data !! ");
        }
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable()
    {
        $data=\request()->get('data');
        if(request()->has("type")){
            $data=$data->where('post_type_id',request()->get("type"));
        }
        return Datatables::of($data)
            ->addColumn('action', function ($post) {
                return Func::actionLinks('posts',$post->id,"tr",["view"=>['class'=>"","target"=>"_blank",'href'=>"/".app()->getLocale()."/".$post->slug]]);
            })
            ->addColumn('creator',function ($post) {
                return $post->Creator->name;
            })
            ->addColumn('image',function ($post) {
                return '<img src="'.$post->mainImage().'" class="img-responsive" width="100px"/>';
            })
            ->addColumn('file',function ($post) {
                return ($post->mainFile()? '<a href="/uploads/files/'.$post->mainFile().'">Download</a>':'');
            })
            ->addColumn('visits',function ($post) {
                return $post->Visits()->count();
            })
            ->addColumn('status',function ($item){
                return '<a href="#" title="Publish/UnPublish Post" data-id="'.$item->id.'" class="btn btn-default '.($item->is_published?"unpublish":"publish").'"><span class="glyphicon glyphicon-globe '.($item->is_published?"text-success":"text-danger").'"></span></a>';
            })
            ->rawColumns(['image','file','action','status'])
            ->make(true);
    }

}
