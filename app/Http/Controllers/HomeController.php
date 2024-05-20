<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // This method will show our home page
    public function index(Request $request) {

        $categories = Category::where('status',1)->orderBy('name','ASC')->take(8)->get();

        $newCategories = Category::where('status',1)->orderBy('id','ASC')->get();

        $featuredJobs = Job::where('status',1)
                        ->orderBy('created_at','DESC')
                        ->with('jobType')
                        ->where('isFeatured',1)->take(6)->get();

        $latestJobs = Job::where('status',1)
                        ->with('jobType')
                        ->orderBy('created_at','DESC')
                        ->take(6)->get();

        
                        $jobTypes = JobType::where('status',1)->get();

                        $jobs = Job::where('status',1);
                        $jobTypeArray = [];
                        
                        // Search using Job Type
                        if(!empty($request->jobType)) {
                            $jobTypeArray = explode(',',$request->jobType);
                
                            $jobs = $jobs->whereIn('job_type_id',$jobTypeArray);
                        }
                
        



        return view('front.home',[
            'categories' => $categories,
            'featuredJobs' => $featuredJobs,
            'latestJobs' => $latestJobs,
            'newCategories' => $newCategories,
            'jobTypeArray' => $jobTypeArray,
            'jobTypes' => $jobTypes,
        ]);
    }
}
