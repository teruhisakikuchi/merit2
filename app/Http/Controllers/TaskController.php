<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Validator;
use Auth;

class TaskController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('task_date', 'desc')->paginate(5);
        return view('tasks', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $soudan)
    {
        return view('taskscreate', ['soudan' => $soudan]);
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
	        'task_date'   => 'required',
	        'task_memo'   => 'required',
	    ]);

			// バリデーション:エラー時の処理
	    if ($validator->fails()) {
	        return redirect('/taskscreate/{soudan}')
	            ->withInput()
	            ->withErrors($validator);
	    }
			
		// 登録処理
        $task = new Task;
        $task->soudan_id =       $request->id;
        $task->task_date =       $request->task_date;
        $task->task_memo =       $request->task_memo;
        $task->status    =       $request->status;
        $task->save();
        return redirect('/t')->with('message', 'タスク内容が送信されました。');
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
    public function edit(Task $task)
    {
        return view('tasksedit', ['task' => $task]);
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
	        'task_date'   => 'required',
	        'task_memo'   => 'required',
		]);

		// バリデーション:エラー
		if ($validator->fails()) {
		    return redirect('/tasksedit/'.$request->id)
		        ->withInput()
		        ->withErrors($validator);
		}

        $task = Task::find($request->id);
        $task->task_date = $request->task_date;
        $task->task_memo = $request->task_memo;
        $task->status    = $request->status;
        $task->save(); 
        return redirect('/t');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/t');
    }
    
}