<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $testimonials = Testimonial::all();
        return view('website.testimonial.index')->with([
            'testimonials' => $testimonials
        ]);
    }
    public function show(Testimonial $testimonial)
    {
        return view('website.testimonial.show')->with([
            'testimonial' => $testimonial
        ]);
    }
}
