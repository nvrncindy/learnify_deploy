<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    // createe
    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0|max:999999',
            'rating'      => 'required|nullable|numeric|min:0|max:5',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                        'links' => 'nullable|url|max:255',

        ]);

        $slug = Str::slug($validated['title']);
        $count = Course::where('slug', 'LIKE', "$slug%")->count();
        $validated['slug'] = $count ? "{$slug}-" . ($count + 1) : $slug;
        $validated['image'] = null;

         if ($request->hasFile('image')) {
            $image = $request->file('image');

            //generate nama in case nama filenya sama
            $filename = time() . '_' . $image->getClientOriginalName();

            // masukin ke folder public
            $image->move(public_path(), $filename);

            // submit nama ke db
            $validated['image'] = $filename;
        }


        Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', __('messages.course_created'));
    }

    // edit
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // update
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0|max:999999',
            'rating'      => 'required|numeric|min:0|max:5',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'links' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            //generate nama in case nama filenya sama
            $filename = time() . '_' . $image->getClientOriginalName();

            // masukin ke folder public
            $image->move(public_path(), $filename);

            // submit nama ke db
            $validated['image'] = $filename;
        }

        $course->update($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', __('messages.course_updated'));

    }

    // delete
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect('/courses')
            ->with('success', __('messages.course_deleted'));
    }
    
}
