<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\IController;
use App\Models\MediaFile as IModel;
use Func;
class MediaFileController extends IController
{
    var $metaTitle="ملفات المالتيميديا";
    public $model=IModel::class;
    var $methods=[];

}
