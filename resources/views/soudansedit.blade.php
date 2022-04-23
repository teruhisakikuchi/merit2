@extends('layouts.app')
@section('content')

@can('admin')

	<p class="text-center h1 text-muted lead">相談詳細編集</p>

    <div class="row container mx-5">
        <div class="col-md-12">
            <!-- ↓バリデーションエラーの表示に使用-->
						@include('common.errors')
            <!-- ↑バリデーションエラーの表示に使用-->
            
            <form action="{{ url('soudans/update') }}" method="POST" class="form-horizontal row justify-content-center">

                <!-- name -->
                <div class="form-group col-md-6 p-2">
                    <label for="name">名前</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$soudan->user->name}}">
                </div>
                <!--/ name -->

                <!-- address -->
                <div class="form-group col-md-6 p-2">
                    <label for="address">住所</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{$soudan->user->address}}">
                </div>
                <!--/ address -->

                <!-- phone -->
                <div class="form-group col-md-6 p-2">
                    <label for="phone">電話番号</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{$soudan->user->phone}}">
                </div>
                <!--/ phone -->

                <!-- email -->
                <div class="form-group col-md-6 p-2">
                    <label for="phone">メールアドレス</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{$soudan->user->email}}">
                </div>
                <!--/ email -->
                
                <!-- soudan_date -->
                <div class="form-group col-md-6 p-2">
                    <label for="soudan_date">相談予約日</label>
                    <input type="date" name="soudan_date" class="form-control" id="soudan_date" value="{{$soudan->soudan_date}}">
                </div>
                <!--/ soudan_date -->
                
                <!-- field -->
                <div class="form-group col-md-6 p-2">
                    <label for="field">相談分野</label>
                    <input type="text" name="field" class="form-control" id="field" value="{{$soudan->field}}">
                </div>
                <!--/ field -->
                
                <!-- y_name -->
                <div class="form-group col-md-6 p-2">
                    <label for="y_name">相手方の名前</label>
                    <input type="text" name="y_name" class="form-control" id="y_name" value="{{$soudan->y_name}}">
                </div>
                <!--/ y_name -->
                
                <!-- y_address -->
                <div class="form-group col-md-6 p-2">
                    <label for="y_address">相手方の住所</label>
                    <input type="text" name="y_address" class="form-control" id="y_address" value="{{$soudan->y_address}}">
                </div>
                <!--/ y_address -->
                
                <!-- summary -->
                <div class="form-group col-md-6 p-2">
                    <label for="summary">相談概要</label>
                    <textarea name="summary" class="form-control" id="summary" rows="5">{{$soudan->summary}}</textarea>
                </div>
                <!--/ summary -->
                
                <!-- question -->
                <div class="form-group col-md-6 p-2">
                    <label for="question">特に聞きたいこと</label>
                    <textarea name="question" class="form-control" id="question" rows="5">{{$soudan->question}}</textarea>
                </div>
                <!--/ question -->
                
                
                
 	            <p class="text-center h1 text-muted lead mt-2">事件受任・事件詳細編集</p>
                
                
                 <!-- jiken_name -->
                <div class="form-group col-md-6 p-2">
                    <label for="jiken_name">事件名</label>
                    <input type="text" name="jiken_name" class="form-control" id="jiken_name" value="{{$soudan->jiken_name}}">
                </div>
                <!--/ jiken_name -->
                
                 <!-- jiken_type -->
                <div class="form-group col-md-6 p-2">
                    <label for="jiken_type">事件の種類</label>
                    <input type="text" name="jiken_type" class="form-control" id="jiken_type" value="{{$soudan->jiken_type}}">
                </div>
                <!--/ jiken_type -->
                
                 <!-- agent_name -->
                <div class="form-group col-md-6 p-2">
                    <label for="agent_name">代理人の名前</label>
                    <input type="text" name="agent_name" class="form-control" id="agent_name" value="{{$soudan->agent_name}}">
                </div>
                <!--/ agent_name -->
                
               <!-- agent_address -->
                <div class="form-group col-md-6 p-2">
                    <label for="agent_address">代理人の住所</label>
                    <input type="text" name="agent_address" class="form-control" id="agent_address" value="{{$soudan->agent_address}}">
                </div>
                <!--/ agent_address -->
                  
                <!-- memo -->
                <div class="form-group col-md-6 p-2">
                    <label for="memo">メモ</label>
                    <textarea name="memo" class="form-control" id="memo" rows="5">{{$soudan->memo}}</textarea>
                </div>
                <!--/ memo -->
               
                <!-- status -->
                <div class="form-group col-md-6 p-2">
                    <label for="status">案件ステータス（受任・終了）</label>
                        <select name="status" class="form-control" id="status">
                        <option value="{{$soudan->status}}">{{$soudan->status}}（------- 選択してください -------）</option>
                        <option value="受任">受任</option>
                        <option value="終了">終了</option>
                        </select>
                </div>
                <!--/ status -->

                <!-- 編集 ボタン/戻る ボタン -->
	                <div class="well well-sm">
	                    <button type="submit" class="btn btn-primary">編集</button>
	                    <a class="btn btn-link pull-right" href="{{ url('detail/'.$soudan->id) }}">戻る</a>
	                </div>
                <!--/ 編集 ボタン/戻る ボタン -->
                
                <!-- id 値を送信 -->
                <input type="hidden" name="id" value="{{$soudan->id}}" />
                <!--/ id 値を送信 -->
                
                <!-- CSRF -->
                @csrf
                <!--/ CSRF -->
                
            </form>

        </div>
    </div>
    
@endcan

@endsection

