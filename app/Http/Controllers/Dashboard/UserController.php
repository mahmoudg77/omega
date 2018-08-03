<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\IController;
use App\User as IModel;
use Auth;
use Func;
use Datatables;
class UserController extends IController
{
  protected $viewFolder="dashboard.user";
    var $metaTitle="Users";
    public $model=IModel::class;
    var $methods=['dataTable'=>'Data Table'];
  public function index()
  {
    $data=request()->get('data');
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
      $category['created_by']=Auth::user()->id;
      $category['password']=bcrypt(rand( 1,99999));

      if(IModel::create($category)){
        return  Func::Success("Save Success");
      }else{
        return  Func::Error("Error while save data !!");
      }

  }
  public function update(Request $request,$id)
  {
      //
      $data=$request->except(['_token','_method']);
      $data['updated_by']=Auth::user()->id;
      //$category['id']=$id;
      //print_r($category);

      if(IModel::where('id',$id)->update($data)){
        return  Func::Success("Save Success");
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
    public function dataTable()
    {
        $data=\request()->get('data');

        $dataTable= Datatables::of($data)
            ->addColumn('action', function ($item) {
                return Func::actionLinks('user',$item->id,"tr",["edit"=>['class'=>"edit"],"view"=>['class'=>"view"]]);
            })
            ->addColumn('account_level', function ($item) {
                return ($item->AccountLevel)?$item->AccountLevel->name:"None";
            })
            ->removeColumn('password');
        foreach (\App\Models\PostType::all() as $postType){
            $dataTable=$dataTable->addColumn($postType->name,function ($item) use($postType) {
                return $item->Posts()->where('post_type_id',$postType->id)->get()->Count();
            });
        }
        //dd($dataTable);
        $dataTable=$dataTable->rawColumns(['action']);


        return $dataTable->make(true);
    }
}
