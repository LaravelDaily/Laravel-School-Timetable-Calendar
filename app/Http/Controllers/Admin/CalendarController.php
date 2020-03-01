<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Services\TimeService;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(TimeService $time)
    {
        $timeRange = $time->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $weekDays  = Lesson::WEEK_DAYS;
        $lessons   = Lesson::with('class', 'teacher')
            ->calendarByRoleOrClassId()
            ->get();

        return view('admin.calendar', compact('timeRange', 'weekDays', 'lessons'));
    }
}
