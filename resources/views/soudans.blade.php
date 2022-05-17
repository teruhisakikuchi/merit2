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
                <select name="field" class="form-control" id="field" onchange="entryChange2();">
                <option value="field">{{ old('field') }}（------- 選択してください -------）</option>
                <option value="離婚">離婚</option>
                <option value="相続">相続</option>
                <option value="交通事故">交通事故</option>
                <option value="債務整理">債務整理</option>
                <option value="その他">その他</option>
                </select>
        </div>
        
        <!-- 離婚の意向（相談者） -->
        <div class="form-group col-md-8 p-2" id="firstBox">
            <label for="rikonx" class="col-sm-3 control-label">離婚の意向（相談者）</label>
                <select name="rikonx" class="form-control" id="rikonx">
                <option value="rikonx">{{ old('rikonx') }}（------- 選択してください -------）</option>
                <option value="離婚したい">離婚したい</option>
                <option value="離婚したくない">離婚したくない</option>
                </select>
        </div>
        
        <!-- 離婚の意向（相手方） -->
        <div class="form-group col-md-8 p-2" id="secondBox">
            <label for="rikony" class="col-sm-3 control-label">離婚の意向（相手方）</label>
                <select name="rikony" class="form-control" id="rikony">
                <option value="rikony">{{ old('rikony') }}（------- 選択してください -------）</option>
                <option value="離婚したい">離婚したい</option>
                <option value="離婚したくない">離婚したくない</option>
                </select>
        </div>
        
        <!-- 子どもの人数 -->
        <div class="form-group col-md-8 p-2" id="thirdBox">
            <label for="child" class="col-sm-3 control-label">子どもの人数</label>
                <select name="child" class="form-control" id="child">
                <option value="child">{{ old('child') }}（------- 選択してください -------）</option>
                <option value="０人">０人</option>
                <option value="１人">１人</option>
                <option value="２人以上">２人以上</option>
                </select>
        </div>
        
        <!-- 親権の希望 -->
        <div class="form-group col-md-8 p-2" id="fourthBox">
            <label for="shinken" class="col-sm-3 control-label">親権の希望</label>
                <select name="shinken" class="form-control" id="shinken">
                <option value="shinken">{{ old('shinken') }}（------- 選択してください -------）</option>
                <option value="希望する">希望する</option>
                <option value="希望しない">希望しない</option>
                </select>
        </div>
        
        <!-- 本人との続柄 -->
        <div class="form-group col-md-8 p-2" id="firstitem">
            <label for="zokugara" class="col-sm-3 control-label">本人との続柄</label>
                <select name="zokugara" class="form-control" id="zokugara">
                <option value="zokugara">{{ old('zokugara') }}（------- 選択してください -------）</option>
                <option value="子">子</option>
                <option value="親">親</option>
                <option value="兄弟">兄弟</option>
                <option value="その他">その他</option>
                </select>
        </div>
        
        <!-- 遺言書の有無 -->
        <div class="form-group col-md-8 p-2" id="seconditem">
            <label for="igon" class="col-sm-3 control-label">遺言書の有無</label>
                <select name="igon" class="form-control" id="igon">
                <option value="igon">{{ old('igon') }}（------- 選択してください -------）</option>
                <option value="ある">ある</option>
                <option value="なし">なし</option>
                </select>
        </div>
        
        <!-- 協議の有無 -->
        <div class="form-group col-md-8 p-2" id="thirditem">
            <label for="kyougi" class="col-sm-3 control-label">協議の有無</label>
                <select name="kyougi" class="form-control" id="kyougi">
                <option value="kyougi">{{ old('kyougi') }}（------- 選択してください -------）</option>
                <option value="ある">ある</option>
                <option value="なし">なし</option>
                </select>
        </div>
        
        <!-- 特別の事情 -->
        <div class="form-group col-md-8 p-2" id="fourthitem">
            <label for="jijou" class="col-sm-3 control-label">特別の事情</label>
                <select name="jijou" class="form-control" id="jijou">
                <option value="jijou">{{ old('jijou') }}（------- 選択してください -------）</option>
                <option value="生前介護していた相続人がいる">生前介護していた相続人がいる</option>
                <option value="生前高額な贈与を受けた">生前高額な贈与を受けた相続人がいる</option>
                <option value="特になし">特になし</option>
                </select>
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

<script type="text/javascript">
    function entryChange2(){
        if(document.getElementById('field')){
            id = document.getElementById('field').value;
            
            if(id == '離婚'){
                document.getElementById('firstBox').style.display = "";
                document.getElementById('secondBox').style.display = "";
                document.getElementById('thirdBox').style.display = "";
                document.getElementById('fourthBox').style.display = "";
                document.getElementById('firstitem').style.display = "none";
                document.getElementById('seconditem').style.display = "none";
                document.getElementById('thirditem').style.display = "none";
                document.getElementById('fourthitem').style.display = "none";
            
            }else if(id == '相続'){
                document.getElementById('firstitem').style.display = "";
                document.getElementById('seconditem').style.display = "";
                document.getElementById('thirditem').style.display = "";
                document.getElementById('fourthitem').style.display = "";
                document.getElementById('firstBox').style.display = "none";
                document.getElementById('secondBox').style.display = "none";
                document.getElementById('thirdBox').style.display = "none";
                document.getElementById('fourthBox').style.display = "none";
                
            }else{
                document.getElementById('firstBox').style.display = "none";
                document.getElementById('secondBox').style.display = "none";
                document.getElementById('thirdBox').style.display = "none";
                document.getElementById('fourthBox').style.display = "none";
                document.getElementById('firstitem').style.display = "none";
                document.getElementById('seconditem').style.display = "none";
                document.getElementById('thirditem').style.display = "none";
                document.getElementById('fourthitem').style.display = "none";
            }
        }
    }
    
    window.onload = entryChange2;
</script>
                
@endcan

@endsection