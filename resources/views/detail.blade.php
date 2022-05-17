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
            
        @if($soudan->field === "離婚")    
            
            <!-- 離婚意向（相談者） -->
            <div class="form-group col-md-6 p-2">
                <label for="rikonx" class="col-sm-3 control-label">離婚意向（相談者）</label>
                <div class="form-control">{{$soudan->rikonx}}</div>
            </div>
            
            <!-- 離婚意向（相手方） -->
            <div class="form-group col-md-6 p-2">
                <label for="rikony" class="col-sm-3 control-label">離婚意向（相手方）</label>
                <div class="form-control">{{$soudan->rikony}}</div>
            </div>
            
            <!-- 子どもの人数 -->
            <div class="form-group col-md-6 p-2">
                <label for="child" class="col-sm-3 control-label">子どもの人数</label>
                <div class="form-control">{{$soudan->child}}</div>
            </div>
            
            <!-- 親権の希望 -->
            <div class="form-group col-md-6 p-2">
                <label for="shinken" class="col-sm-3 control-label">親権の希望</label>
                <div class="form-control">{{$soudan->shinken}}</div>
            </div>
            
        @endif    

        @if($soudan->field === "相続")    
            
            <!-- 本人との続柄 -->
            <div class="form-group col-md-6 p-2">
                <label for="zokugara" class="col-sm-3 control-label">本人との続柄</label>
                <div class="form-control">{{$soudan->zokugara}}</div>
            </div>
            
            <!-- 遺言書の有無 -->
            <div class="form-group col-md-6 p-2">
                <label for="igon" class="col-sm-3 control-label">遺言書の有無</label>
                <div class="form-control">{{$soudan->igon}}</div>
            </div>
            
            <!-- 協議の有無 -->
            <div class="form-group col-md-6 p-2">
                <label for="kyougi" class="col-sm-3 control-label">協議の有無</label>
                <div class="form-control">{{$soudan->kyougi}}</div>
            </div>
            
            <!-- 特別の事情 -->
            <div class="form-group col-md-6 p-2">
                <label for="jijou" class="col-sm-3 control-label">特別の事情</label>
                <div class="form-control">{{$soudan->jijou}}</div>
            </div>
            
        @endif    

    
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
                    <button type="submit" class="btn btn-outline-success">編集</button>
                </a>

    </div>
    
@endcan
    
@endsection
