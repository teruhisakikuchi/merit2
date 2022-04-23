@extends('layouts.app')
@section('content')

@can('admin')

    <p class="text-center h1 text-muted lead">相談予約詳細</p>
    
    <div class="card-body mx-5">
        
        <div class="form-horizontal row justify-content-center"><!-- グリッド -->
        
            <!-- 名前 -->
            <div class="form-group col-md-6 p-2">
                <label for="name" class="col-sm-3 control-label">名前</label>
                <div class="form-control">{{$soudan->user->name}}</div>
            </div>
          
            <!-- 住所 -->
            <div class="form-group col-md-6 p-2">
                <label for="address" class="col-sm-3 control-label">住所</label>
                <div class="form-control">{{$soudan->user->address}}</div>
            </div>
          
            <!-- 電話番号 -->
            <div class="form-group col-md-6 p-2">
                <label for="phone" class="col-sm-3 control-label">電話番号</label>
                <div class="form-control">{{$soudan->user->phone}}</div>
            </div>
         
            <!-- メールアドレス -->
            <div class="form-group col-md-6 p-2">
                <label for="email" class="col-sm-3 control-label">メールアドレス</label>
                <div class="form-control">{{$soudan->user->email}}</div>
            </div>
        
            <!-- 相談予約日 -->
            <div class="form-group col-md-6 p-2">
                <label for="soudan_date" class="col-sm-3 control-label">相談予約日</label>
                <div class="form-control">{{$soudan->soudan_date}}</div>
            </div>
   
            <!-- 相談分野 -->
            <div class="form-group col-md-6 p-2">
                <label for="field" class="col-sm-3 control-label">相談分野</label>
                <div class="form-control">{{$soudan->field}}</div>
            </div>
    
            <!-- 相手方の名前 -->
            <div class="form-group col-md-6 p-2">
                <label for="y_name" class="col-sm-3 control-label">相手方の名前</label>
                <div class="form-control">{{$soudan->y_name}}</div>
            </div>
   
            <!-- 相手方の住所 -->
            <div class="form-group col-md-6 p-2">
                <label for="y_address" class="col-sm-3 control-label">相手方の住所</label>
                <div class="form-control">{{$soudan->y_address}}</div>
            </div>
   
            <!-- 相談概要 -->
            <div class="form-group col-md-6 p-2">
                <label for="summary" class="col-sm-3 control-label">相談概要</label>
                <div class="form-control">{{$soudan->summary}}</div>
            </div>

            <!-- 特に聞きたいこと -->
            <div class="form-group col-md-6 p-2">
                <label for="question" class="col-sm-3 control-label">特に聞きたいこと</label>
                <div class="form-control">{{$soudan->question}}</div>
            </div>
            
        </div>
                        
            <!-- 相談: 編集ボタン -->
                <a href="{{ url('soudansedit/'.$soudan->id) }}">
                    <button type="submit" class="btn btn-success">編集・事件受任</button>
                </a>

    </div>
    
@endcan
    
@endsection

