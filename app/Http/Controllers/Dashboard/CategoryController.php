<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\IController;
use App\Models\Category as IModel;
use App\Models\MediaFile;
use App\Models\File;
use Auth;
use Func;

class CategoryController extends IController
{
  protected $viewFolder="dashboard.category";
    var $metaTitle="أقسام الموقع";
    public $model=IModel::class;
    var $methods=[];
  public function index()
  {
    $data=IModel::where("parent_id",0)->orWhereNull('parent_id')->get();
    return view($this->viewFolder.".index",compact('data'));
  }

  public function edit($id)
  {
    $data=IModel::find($id);
    return view($this->viewFolder.".edit",compact('data'));
  }
  public function create()
  {
      return view($this->viewFolder.".create");
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
      //$class=new $this->model;
      $data=IModel::find($id);
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
      //
      $category=$request->except(['_token']);
      $category['slug']=str_slug($category['en']['title'],'_');
      if(IModel::create($category)){

        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $imageobj=new MediaFile(['model'=>IModel::class,'id'=>$category->id,'tag'=>'main']);
            $imageobj->upload($image);
        }
        if($request->hasfile('attach'))
        {
            $file=$request->file('attach');
            $fileobj=new File(['model'=>IModel::class,'id'=>$category->id,'tag'=>'main']);
            $fileobj->upload($file);
        }

        return  Func::Success("Save Success",$category);
      }else{
        return  Func::Error("Error while save data !!");
      }

  }
  public function update(Request $request,$id)
  {
      //
      $category=$request->except(['_token']);
      $category['updated_by']=Auth::user()->id;
      //$category['id']=$id;
      //print_r($category);

      if(IModel::findOrFail($id)->update($category)){
        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $imageobj=new MediaFile(['model'=>IModel::class,'id'=>$id,'tag'=>'main']);
            $imageobj->upload($image);
        }
        if($request->hasfile('attach'))
        {
            $file=$request->file('attach');
            $fileobj=new File(['model'=>IModel::class,'id'=>$id,'tag'=>'main']);
            $fileobj->upload($file);
        }
        return  Func::Success("Save Success",$category);
      }else{
        return  Func::Error("Error while save data !!");
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
      $data=IModel::find($id);
      //$data->deleted_by=Auth::user()->id;
      //$data->save();

      if($data->destroy($id)){
        return  Func::Success("Delete Success");
      }else{
        return  Func::Error("Error while delete data !!");
      }
  }


}
