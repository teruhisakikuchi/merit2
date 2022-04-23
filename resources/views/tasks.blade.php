@extends('layouts.app')
@section('content')

@can('admin')

<p class="text-center h1 text-muted lead">タスク一覧</p>

@if (count($tasks) > 0)
    <div class="card-body mx-5">
        <table class="table table-striped task-table">
            <!-- テーブルヘッダ -->
            <thead>
            <tr>
                <th>タスク期限</th>
                <th>依頼者</th>
                <th>事件名</th>
                <th>タスク内容</th>
                <th>進捗ステータス</th>
            </tr>
            </thead>
            
            <!-- テーブル本体 -->
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <!-- タスク期限 -->
                        <td class="table-text">
                            <div>{{ $task->task_date }}</div>
                        </td>

                        <!-- 依頼者 -->
                        <td class="table-text">
                            <div>{{ $task->soudan->user->name }}</div>
                        </td>
                        
                        <!-- 事件名 -->
                        <td class="table-text">
                            <div>{{ $task->soudan->jiken_name }}</div>
                        </td>

                        <!-- タスク内容 -->
                        <td class="table-text">
                            <div>{{ $task->task_memo }}</div>
                        </td>
                        
                        <!-- ステータス -->
                        <td class="table-text">
                            <div>{{ $task->status }}</div>
                        </td>
                        

                        <!-- 相談: 削除ボタン -->
                        <td>
                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                                    削除
                                </button>
                            </form>
                        </td>
                        
                        <!--  編集ボタン -->
                        <td>
                        <a href="{{ url('tasksedit/'.$task->id) }}">
                            <button type="submit" class="btn btn-secondary">タスク編集</button>
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
    {{ $tasks->links() }}
</div>

@endcan

@endsection
