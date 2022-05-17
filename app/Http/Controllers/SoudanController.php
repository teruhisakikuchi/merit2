<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soudan;
use Validator;
use Auth;

class SoudanController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soudans = Soudan::orderBy('soudan_date', 'desc')->paginate(5);
        return view('soudans', ['soudans' => $soudans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// バリデーション
	    $validator = Validator::make($request->all(), [
	        'soudan_date'   => 'required',
	        'summary'   => 'required',
	    ]);

			// バリデーション:エラー時の処理
	    if ($validator->fails()) {
	        return redirect('/')
	            ->withInput()
	            ->withErrors($validator);
	    }
			
		// 登録処理
        $soudan = new Soudan;
        $soudan->user_id =       Auth::id();
        $soudan->soudan_date =   $request->soudan_date;
        $soudan->field =         $request->field;
        $soudan->rikonx =        $request->rikonx;
        $soudan->rikony =        $request->rikony;
        $soudan->child =         $request->child;
        $soudan->shinken =       $request->shinken;
        $soudan->zokugara =      $request->zokugara;
        $soudan->igon =          $request->igon;
        $soudan->kyougi =        $request->kyougi;
        $soudan->jijou =         $request->jijou;
        $soudan->y_name =        $request->y_name;
        $soudan->y_address =     $request->y_address;
        $soudan->summary =       $request->summary;
        $soudan->question =      $request->question;
        $soudan->jiken_name =    $request->jiken_name;
        $soudan->jiken_type =    $request->jiken_type;
        $soudan->agent_name =    $request->agent_name;
        $soudan->agent_address = $request->agent_address;
        $soudan->memo =          $request->memo;
        $soudan->status =        $request->status;
        $soudan->save();
        return redirect('/')->with('message', '相談内容が送信されました。来所の際は、関係資料に加え、身分証明書と認印をご持参ください。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Soudan $soudan)
    {
        return view('detail', ['soudan' => $soudan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Soudan $soudan)
    {
        return view('soudansedit', ['soudan' => $soudan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		// バリデーション
		$validator = Validator::make($request->all(), [
		    'id' => 'required', // storeに対しての追加分
	        'soudan_date'   => 'required',
	        'summary'   => 'required',
		]);

		// バリデーション:エラー
		if ($validator->fails()) {
		    return redirect('/soudansedit/'.$request->id)
		        ->withInput()
		        ->withErrors($validator);
		}

        $soudan = Soudan::find($request->id);
        $soudan->soudan_date = $request->soudan_date;
        $soudan->field =       $request->field;
        $soudan->rikonx =      $request->rikonx;
        $soudan->rikony =      $request->rikony;
        $soudan->child =       $request->child;
        $soudan->shinken =     $request->shinken;
        $soudan->zokugara =    $request->zokugara;
        $soudan->igon =        $request->igon;
        $soudan->kyougi =      $request->kyougi;
        $soudan->jijou =       $request->jijou;
        $soudan->y_name =      $request->y_name;
        $soudan->y_address =   $request->y_address;
        $soudan->summary =     $request->summary;
        $soudan->question =    $request->question;
        $soudan->jiken_name =    $request->jiken_name;
        $soudan->jiken_type =    $request->jiken_type;
        $soudan->agent_name =    $request->agent_name;
        $soudan->agent_address = $request->agent_address;
        $soudan->memo =          $request->memo;
        $soudan->status =        $request->status;
        $soudan->save(); 
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soudan $soudan)
    {
        $soudan->delete();
        return redirect('/');
    }
    
}