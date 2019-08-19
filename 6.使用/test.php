在form表单中使用
$form->webuploader('aaa','上传文件');

读取上传后的路径(结果是json格式的 如果需要数组则解开)
dd($form->aaa ,json_decode($form->aaa,1));