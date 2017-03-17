<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function getThangNT($id)
    {
        return view('thangnt_view')->with(['id' => $id]);
    }
    public function getTestView()
    {
        return view('test_thoi');
    }
    public function testName($val1, $val2)
    {
        return view('test_view2')->with(['key1' => $val1, 'key2' => $val2]);
    }
    public function layView($varA, $varB)
    { // 2 bien varA, varB lay tu route
        // echo $bienA; die;
        return view('test_view')->with(['bienA' => $varA, 'bienB' => $varB]); // lay 2 bien varA, varB duoi 2 ten bienA, bienB, truyen toi view/test_view.blade.php
    }

    public function about()
    {
        return view('about');
    }
    public function test_redirect()
    {
        return redirect()->route('abc');

    }

}
