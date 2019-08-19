1.在 /app/Admin/routes.php 头部添加

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
], function (Router $router) {
    Route::any('/web_uploader_api','HomeController@webUploaderApi');
});

2.方法在  /app/Admin/Controllers/HomeController.php 追加