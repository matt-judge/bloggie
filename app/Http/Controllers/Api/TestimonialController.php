<?php

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class TestimonialController extends Controller
{
    public function latest(Request $request) : JsonResponse
    {
        $now = Carbon::now();
        $testimonials = Testimonial::orderBy('created_at', 'desc')
            ->limit($request->get('limit', 3))
            ->get();
        return response()->json($testimonials);
    }
}
