<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
    // echo $id."a = ".$a;
});
Route::get('/thongtin', function () {
    echo "test thử thôi";
});
Route::get('about', function () {
    // goi truc tiep den view.
    return view('about');
});
Route::get('test_route/{val1}/{val2}', 'TestController@testName');

Route::get('redirec_test', ['as' => 'thu_redirect', 'uses' => 'TestController@test_redirect']); //dung 'as' dat ten cho route
Route::get('test_redirect', ['as' => 'abc', 'uses' => 'TestController@about']);

Route::get('goidenview/{varA}/{varB}', 'TestController@layView'); // truyen bien varA, varB den function layView trong TestController.
Route::group(['prefix' => 'quan-ly'], function () {
// nhom cac muc vao mot cay
    Route::get('tin-tuc', function () {
        echo "Đây là trang quản lý tin tức";
    });
    Route::get('thanh-vien', function () {
        echo "Đây là trang quan lý thành viên";
    });
});
Route::get('test_thoi', 'TestController@getTestView');
Route::get('thangtrungnguyen/{id}', 'TestController@getThangNT');

Route::get('filter_before', ['before' => 'filter.demo', 'uses' => 'HomeController@allowed']);
Route::get('filter_after', ['after' => 'filter.demo', 'uses' => 'HomeController@allowed']);
// vi du lay du lieu tu bang order
Route::get('query/select-all', function () {
    $data = DB::table('order')->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
Route::get('query/select-row', function () {
    $data = DB::table('customer')->select('id', 'name')->where('id', 8)->get();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

Route::get('query/where-or', function () {
    $data = DB::table('customer')->select('id', 'name')->where('id', 8)->orWhere('name', 'Huyen')->orderBy('id', 'DESC')->get();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('query/between', function () { 
    $data = DB::table('customer')->select('id', 'name')->whereBetween('id', [4, 9])->get();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
// Eloquent
Route::get('eloquent/get-all', function () {
    $data = App\news::all()->tojSon();
    echo '<pre>';
    print_r($data);
    echo "</pre>";
});
// select by id
Route::get('eloquent/get-id', function () {
    $data = App\news::find(4)->toArray();
    echo '<pre>';
    print_r($data);
    echo "</pre>";
});
// cau lenh where
Route::get('eloquent/where', function () {
    $data = App\news::where('id', '>', 2)->get()->toArray();
    echo '<pre>';
    print_r($data);
    echo "</pre>";
});
// lay 1 dong du lieu, neu ko co thi in ra loi
Route::get('eloquent/select-one-id', function () {
    $data = App\news::findOrFail(11)->toArray();
    echo '<pre>';
    print_r($data);
    echo "</pre>";
});

Route::get('eloquent/limit', function () {
    $data = App\news::skip(2)->take(2)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// count
Route::get('eloquent/count', function(){
    $data = App\news::all()->count();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Auth::routes();

Route::get('/home', 'HomeController@index');
// c1
Route::get('eloquent/select', function(){
    $data = App\news::select('title')->take(2)->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// cach 2, dat vao function bien $news, sau do dung no thay cho doan App\news
Route::get('eloquent/select-take', function(App\news $news){
    $data = $news::select('title')->take(3)->get()->toArray();
     echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// them du lieu c1
Route::get('model/add', function(){
    $news =  new App\news;
    $news->title ='title add';
    $news->cate_id = 4;
    $news->sapo = 'sapo add';
    $news->content = 'content add';
    $news->save();
    echo "finish added";
});
// them du lieu c2
Route::get('model/add-c2',function(){
    $data = array('title'   => 'title add 2','cate_id'=>'4', 'sapo'=>'sapo add 2',
    'content'=>'content add 2' );
    App\news::create($data);
});
// update du lieu
Route::get('model/update',function(){
    $news = App\news::find(4); // tim den id 4
    $news->title = 'update id 4'; // update truong title o vi tri id =4
    $news->update(); // chay update
});
// cach 1
Route::get('model/delete', function(){
    $data = App\news:: destroy(6);
    echo "delete sussessed!";
});
// c2
Route::get('model/deletec2', function(App\news $news){
    $data = $news::destroy(7);
    echo "da xoa id 7";
});
// thu nghiem voi Form
// route nay dung de di den giao dien
Route::get('form/dangky',function(){
    return view('form.dangky');
});
// sau khi bam vao btn Them trong form thi chuyen den trang xu ly. Tao 1 controller va 1 function them
Route::post('form/dangky-thanhvien',['as'=>'postDangKy','uses'=>'FormController@them']);
// xu ly khi nhap vao url nhung truong ko co
// Route::any('{all?}','HomeController@index')->where('all','(.*)');

// Về Responses
Route::get('responses/json', function(){
    $arr = array(
         'Nguyen Van A' => '24',
         'Nguyen Thi B'=>'20',
         'Nguyen Thi BBB'=>'18',
         'Trinh Van CC'=>'26'
        );
    return Response::json($arr);
});
// redirect, vd den trang chu
// khi nhap vao url= redirect, xem nhu 'chuyenhuong' trong xu ly, dan den view response.response_thangnt 
Route::get('redirect',['as'=>'chuyenhuong', function(){
    return view('response.response_thangnt');
}]);
Route::get('responses/redirect', function(){
    return redirect()->Route('chuyenhuong')->with([
        'mtb'=>'mauxanh',
        'message'=>'Eh...trang nay nguy hiem lam nha!'
        ]);
});
// Route::get('responses/download', function(){
//     $url =('public/Download/filedownload.rar'); // url chua file download
//     return Response::download($url)->deleteFileAfterSend(true); // down xong thi xoa luon file trong url
// });
Route::get('responses/macro', function(){
    return response()->cap('thang NT Demo macro');
});