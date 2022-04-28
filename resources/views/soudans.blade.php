@extends('layouts.app')
@section('content')

@can('admin')

<p class="text-center h1 text-muted lead">相談予約一覧</p>

@if (count($soudans) > 0)
    <div class="card-body mx-5">
        <table class="table table-striped task-table">
            <!-- テーブルヘッダ -->
            <thead>
            <tr>
                <th>相談予約日</th>
                <th>名前</th>
                <th>相談分野</th>
                <th>案件ステータス</th>
            </tr>
            </thead>
            
            <!-- テーブル本体 -->
            <tbody>
                @foreach ($soudans as $soudan)
                    <tr>
                        <!-- 相談予約日 -->
                        <td class="table-text">
                            <div>{{ $soudan->soudan_date }}</div>
                        </td>

                        <!-- お名前 -->
                        <td class="table-text">
                            <div>{{ $soudan->user->name }}</div>
                        </td>

                        <!-- 相談分野 -->
                        <td class="table-text">
                            <div>{{ $soudan->field }}</div>
                        </td>
                        
                        <!-- 案件ステータス -->
                        <td class="table-text">
                            <div>{{ $soudan->status }}</div>
                        </td>
                        
                        <!-- 相談: 削除ボタン -->
                        <td>
                            <form action="{{ url('soudan/'.$soudan->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger" onclick='return confirm("削除しますか？");'>
                                    削除
                                </button>
                            </form>
                        </td>

                        <!-- 相談: 詳細ボタン -->
                        <td>
                            <a href="{{ url('detail/'.$soudan->id) }}">
                                <button type="submit" class="btn btn-outline-dark">詳細</button>
                            </a>
                        </td>
                        
                        <!-- タスク登録ボタン -->
                        <td>
                            <a href="{{ url('taskscreate/'.$soudan->id) }}">
                                <button type="submit" class="btn btn-outline-success">タスク登録</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<!-- pagination -->
<div class="d-flex justify-content-center">
    {{ $soudans->links() }}
</div>

@elsecan('user')

<p class="text-center h1 text-muted lead">相談内容フォーム</p>

@if (session('message'))
    <div class="alert alert-danger text-center">
        {{ session('message') }}
    </div>
@endif

<div class="card-body mx-5">
    
    <!-- ↓バリデーションエラーの表示に使用-->
    @include('common.errors')
    <!-- ↑バリデーションエラーの表示に使用-->

    <!-- 相談登録フォーム -->
    <form action="{{ url('soudans') }}" method="POST" class="form-horizontal row justify-content-center">
        @csrf
        
        <!-- 相談予約日 -->
        <div class="form-group col-md-8 p-2">
            <label for="soudan_date" class="col-sm-3 control-label">相談予約日</label>
            <input type="date" name="soudan_date" class="form-control" id="soudan_date" value="{{ old('soudan_date') }}">
        </div>

        <!-- 相談分野 -->
        <div class="form-group col-md-8 p-2">
            <label for="field" class="col-sm-3 control-label">相談分野</label>
            <input type="text" name="field" class="form-control" placeholder="（例）相続、離婚、交通事故、債務整理ほか" id="field" value="{{ old('field') }}">
        </div>
        
        <!-- 相手方の名前 -->
        <div class="form-group col-md-8 p-2">
            <label for="y_name" class="col-sm-3 control-label">相手方の名前</label>
            <input type="text" name="y_name" class="form-control" id="y_name" value="{{ old('y_name') }}">
        </div>
       
        <!-- 相手方の住所 -->
        <div class="form-group col-md-8 p-2">
            <label for="y_address" class="col-sm-3 control-label">相手方の住所</label>
            <input type="text" name="y_address" class="form-control" id="y_address" value="{{ old('y_address') }}">
        </div>
        
        <!-- 相談概要 -->
        <div class="form-group col-md-8 p-2">
            <label for="summary" class="col-sm-3 control-label">相談概要</label>
            <textarea name="summary" class="form-control" id="summary" rows="5">{{ old('summary') }}</textarea>
        </div>
        
        <!-- 特に聞きたいこと -->
        <div class="form-group col-md-8 p-2">
            <label for="question" class="col-sm-3 control-label">特に聞きたいこと</label>
            <textarea name="question" class="form-control" id="question" rows="5">{{ old('question') }}</textarea>
        </div>     
        
        <!-- 内容送信ボタン -->
        <div class="form-group col-md-8 p-2">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    送信
                </button>
            </div>
        </div>
    </form>
</div>

@endcan

@endsection