<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $only_user_role = only_user_role();
        if($only_user_role){
            return redirect('/admin/user');
        }
        return redirect('/admin/publish');
    }

    public function webUploaderApi(Request $request)
    {
        // 设置超时时间为没有限制
        ini_set("max_execution_time", "0");

        $http_type = ((isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';

        $file = $request->file('file');

        $allowed_extensions = ["png", "jpg", "gif", "jpeg", "bmp"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return json_encode(['error' => 'You may only upload png, jpg or gif or jpeg or bmp.']);
        }

        $destinationPath = 'storage/uploads/'.date('Ymd').'/'; //public 文件夹下面建 storage/uploads 文件夹
        $extension = $file->getClientOriginalExtension();
        $fileName = md5(microtime(true)).'.'.$extension;
        $file->move($destinationPath, $fileName);

        return json_encode([
            'type'         => $extension,
            'url'          => $http_type . $_SERVER['HTTP_HOST'] . '/' . $destinationPath . '/' . $fileName,
            'name'         => $fileName,
            'relative_url' => '/'.$destinationPath . $fileName,
        ]);
    }
}
