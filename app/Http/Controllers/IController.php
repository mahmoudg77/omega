<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use Auth;
use View;
use Redirect;
class IController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    var $metaTitle="";
    protected $basic_methods=[
                  'index'=>'Show table data',
                  'show'=>'Show specific item',
                  'edit'=>'Modify specific item',
                  'create'=>'Create new item',
                  'destroy'=>'Delete specific item',
                ];
    protected $post_methods=[
                'update'=>'edit',
                'store'=>'create',
              ];
    var $methods=[];
    var $postmethods=[];

    public function __construct()
    {
        $this->middleware('access');
        $this->middleware('ViewFilter');

        $this->methods=array_merge($this->basic_methods, $this->methods);
        $this->postmethods=array_merge($this->post_methods, $this->postmethods);
        //Category Menu
        $cp_menu=[
          'Category'=>[
            'url'=>route('cp.category.index'),
            'roles'=>['admin'],
//            'submenu'=>[
//              'All Category'=>['url'=>route('cp.category.index',['curr_menu'=>'Category']),'roles'=>['admin'],'submenu'=>null],
//              'New Category'=>['url'=>route('cp.category.create',['curr_menu'=>'Category']),'roles'=>['admin'],'submenu'=>null]
//            ]
        ]
        ];

        //Posts Menu
        foreach (\App\Models\PostType::all() as $key => $value) {
          $cp_menu[$value->name]=[
            'url'=>route('cp.posts.index',['type'=>$value->id]),
            'roles'=>['admin'],
//            'submenu'=>[
//              'All '.$value->name=>['url'=>route('cp.posts.index',['type'=>$value->id,'curr_menu'=>$value->name]),'roles'=>['admin'],'submenu'=>null],
//              'New '.$value->name=>['url'=>route('cp.posts.create',['type'=>$value->id,'curr_menu'=>$value->name]),'roles'=>['admin'],'submenu'=>null]
//            ]
            ];
        }

        //Menus
        $cp_menu['Menus']=[
          'url'=>route('cp.menu.index'),
          'roles'=>['admin'],
//          'submenu'=>[
//            'All Menus'=>['url'=>route('cp.menu.index',['curr_menu'=>'Menus']),'roles'=>['admin'],'submenu'=>null],
//            'New Menu'=>['url'=>route('cp.menu.create',['curr_menu'=>'Menus']),'roles'=>['admin'],'submenu'=>null]
//          ]
            ];

          //Comments
//         $cp_menu['Comments']=[
//          'url'=>route('cp.comment.index',['menu'=>'Comments']),
//          'roles'=>['admin'],
//          'submenu'=>[
//            'All Comments'=>['url'=>route('cp.comment.index',['menu'=>'Comments']),'roles'=>['admin'],'submenu'=>null],
//          ]];

          //Users
          $cp_menu['Users']=[
           'url'=>route('cp.user.index'),
           'roles'=>['admin'],
//           'submenu'=>[
//             'All Users'=>['url'=>route('cp.user.index',['curr_menu'=>'Users']),'roles'=>['admin'],'submenu'=>null],
//           ]
          ];

           //setting
           $cp_menu['Setting']=[
            'url'=>route('cp.setting.index'),
            'roles'=>['admin'],
//            'submenu'=>[
//              //'Post Type'=>['url'=>route('cp.post-type.index',['menu'=>'Setting']),'roles'=>['admin'],'submenu'=>null],
//              //'Account Levels'=>['url'=>route('cp.account-level.index',['menu'=>'Setting']),'roles'=>['admin'],'submenu'=>null],
//              'Groups'=>['url'=>route('cp.secgroup.index',['curr_menu'=>'Setting']),'roles'=>['admin'],'submenu'=>null],
//              //'Permissions'=>['url'=>route('cp.secpermission.index',['curr_menu'=>'Setting']),'roles'=>['admin'],'submenu'=>null],
//
//            ]
           ];

         View::share('cp_menu',$cp_menu);
         View::share('sel_menu',null);
    }

}
