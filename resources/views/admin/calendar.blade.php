@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Calendar
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <th width="125">Time</th>
                            @foreach($weekDays as $day)
                                <th>{{ $day }}</th>
                            @endforeach
                        </thead>
                        <tbody>
                            @foreach($timeRange as $time)
                                <tr>
                                    <td>
                                        {{ $time['start'] }} - {{ $time['end'] }}
                                    </td>
                                    @foreach($weekDays as $index => $day)
                                        @php($lesson = $lessons->where('weekday', $index)->where('start_time', $time['start'])->first())
                                        @if ($lesson)
                                            <td rowspan="{{ $lesson->difference/30 ?? '' }}" class="align-middle text-center" style="background-color:#f0f0f0">
                                                {{ $lesson->class->name }}<br>
                                                Teacher: {{ $lesson->teacher->name }}
                                            </td>
                                        @elseif ($lessons->where('weekday', $index)->where('start_time', '<', $time['start'])->where('end_time', '>=', $time['end'])->count())
                                            
                                        @else
                                            <td></td>
                                        @endif
                                        
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection