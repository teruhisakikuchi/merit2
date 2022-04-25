@extends('layouts.app')
@section('content')

@can('admin')

<p class="text-center h1 text-muted lead">タスク登録</p>


@if (session('message'))
    <div class="alert alert-danger text-center">
        {{ session('message') }}
    </div>
@endif


<div class="card-body mx-5">
    
    <!-- ↓バリデーションエラーの表示に使用-->
    @include('common.errors')
    <!-- ↑バリデーションエラーの表示に使用-->

    <!-- タスク登録フォーム -->
    <form action="{{ url('/tasks') }}" method="POST" class="form-horizontal row justify-content-center">
        @csrf
        
        <!-- タスク期限 -->
        <div class="form-group col-md-8 p-2">
            <label for="task_date" class="col-sm-3 control-label">タスク期限</label>
            <input type="date" name="task_date" class="form-control" id="task_date" value="{{ old('task_date') }}">
        </div>

        <!-- タスク内容 -->
        <div class="form-group col-md-8 p-2">
            <label for="task_memo" class="col-sm-3 control-label">タスク内容</label>
            <textarea name="task_memo" class="form-control" id="task_memo" rows="5">{{ old('task_memo') }}</textarea>
        </div>
        
        <!-- status -->
        <div class="form-group col-md-8 p-2">
            <label for="status">進捗ステータス（未着手・着手中）</label>
                <select name="status" class="form-control" id="status">
                <option value="status">（------- 選択してください -------）</option>
                <option value="未着手">未着手</option>
                <option value="着手中">着手中</option>
                </select>
        </div>
        <!--/ status -->
        
        <!-- 内容送信ボタン -->
        <div class="form-group col-md-8 p-2">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-outline-primary">
                    送信
                </button>
            </div>
        </div>
        
        <!-- id 値を送信 -->
        <input type="hidden" name="id" value="{{$soudan->id}}"/>
        <!--/ id 値を送信 -->
        
    </form>
</div>

@endcan

@endsection