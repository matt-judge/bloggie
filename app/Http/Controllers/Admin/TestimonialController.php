<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function create(Testimonial $testimonial)
    {
        return view('admin.testimonial.create');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit')->with([
            'testimonial' =>  $testimonial
        ]);
    }

    public function index(Request $request)
    {
        $testimonials = Testimonial::query();

        if ($request->get('search')) {
            $testimonials->where('user_name', 'like', '%' . $request->get('search') . '%');
        }

        $testimonials = $testimonials
            ->orderBy('user_name', 'asc')
            ->paginate();

        return view('admin.testimonial.index')->with([
            'testimonials' => $testimonials
        ]);
    }

    public function store(TestimonialStoreRequest $request)
    {
        $testimonial = Testimonial::create($request->validated());

        return redirect(route('admin.testimonial.edit', $testimonial))->with([
            'success' => 'Successfully Created a new Testimonial Post.'
        ]);
    }

    public function update(TestimonialUpdateRequest $request, Testimonial $testimonial)
    {
        $testimonial->update($request->validated());
        $testimonial->refresh();

        return redirect(route('admin.testimonial.edit', $testimonial))->with([
            'success' => 'Successfully Edited the Testimonial Post.'
        ]);
    }
}
