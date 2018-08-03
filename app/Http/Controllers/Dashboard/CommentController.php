<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\IController;
use App\Models\Comment as IModel;
use Func;
class CommentController extends IController
{

    var $metaTitle="التعليقات";
    public $model=IModel::class;
    var $methods=[];

}
