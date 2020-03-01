<?php

namespace Tests\Feature;

use App\Lesson;
use App\Role;
use App\SchoolClass;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Calendar Page Returns 200 code, so no errors.
     *
     * @return void
     */
    public function testCalendarPageIsLoadingForAdmin()
    {
        $role = Role::create([
            'name' => 'Admin'
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $admin->roles()->attach($role->id);

        $response = $this->actingAs($admin)->get('/admin/calendar');

        $response->assertSuccessful();
    }

    /**
     * Test Calendar Page Shows the Lesson we created
     *
     * @return void
     */
    public function testCalendarPageShowsLessonForTeacher()
    {
        // Create class
        $schoolClass = SchoolClass::create([
            'name' => 'Class no.1'
        ]);

        // Create teacher
        $role = Role::create([
            'name' => 'Teacher'
        ]);
        $teacher = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@teacher.com',
            'password' => bcrypt('password')
        ]);
        $teacher->roles()->attach($role->id);

        // Create lesson
        Lesson::create([
            'weekday' => 1,
            'start_time' => '10:00',
            'end_time' => '12:00',
            'teacher_id' => $teacher->id,
            'class_id' => $schoolClass->id,
        ]);

        $response = $this->actingAs($teacher)->get('/admin/calendar');

        $response->assertSuccessful();
        $response->assertSeeText($schoolClass->name);
    }
}
