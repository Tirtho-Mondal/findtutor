<?php

namespace App\Http\Controllers;

use App\Mail\JobNotificationEmail;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TutionsController extends Controller
{
    // This method will show Tuition page
    public function index(Request $request) {
        $categories = Category::where('status',1)->get();
        $jobTypes = JobType::where('status',1)->get();

        $jobs = Job::where('status',1);

        // Search using keyword
        if (!empty($request->keyword)) {
            $jobs = $jobs->where(function($query) use ($request) {
                $query->orWhere('title','like','%'.$request->keyword.'%');
                $query->orWhere('keywords','like','%'.$request->keyword.'%');
            });
        }

        // Search using location
        if(!empty($request->location)) {
            $jobs = $jobs->where('location',$request->location);
        }

        // Search using category
        if(!empty($request->category)) {
            $jobs = $jobs->where('category_id',$request->category);
        }

        $jobTypeArray = [];
        // Search using Tuition Type
        if(!empty($request->jobType)) {
            $jobTypeArray = explode(',',$request->jobType);

            $jobs = $jobs->whereIn('job_type_id',$jobTypeArray);
        }

        // Search using experience
        if(!empty($request->experience)) {
            $jobs = $jobs->where('experience',$request->experience);
        }


        $jobs = $jobs->with(['jobType','category']);

        if($request->sort == '0') {
            $jobs = $jobs->orderBy('created_at','ASC');
        } else {
            $jobs = $jobs->orderBy('created_at','DESC');
        }
        

        $jobs = $jobs->paginate(9);


        return view('front.tutions',[
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'jobs' => $jobs,
            'jobTypeArray' => $jobTypeArray
        ]);
    }

    // This method will show Tuition detail page
    public function detail($id) {

        $job = Job::where([
                            'id' => $id, 
                            'status' => 1
                        ])->with(['jobType','category'])->first();
        
        if ($job == null) {
            abort(404);
        }

        $count = 0;
        if (Auth::user()) {
            $count = SavedJob::where([
                'user_id' => Auth::user()->id,
                'job_id' => $id
            ])->count();
        }
        

        // fetch applicants

        $applications = JobApplication::where('job_id',$id)->with('user')->get();


        return view('front.tuitionsDetails',[ 'job' => $job,
                                        'count' => $count,
                                        'applications' => $applications
                                    ]);
    }

    public function applyJob(Request $request) {
        $id = $request->id;

        $job = Job::where('id',$id)->first();

        // If job not found in db
        if ($job == null) {
            $message = 'Tuition does not exist.';
            session()->flash('error',$message);
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        // you can not apply on your own job
        $employer_id = $job->user_id;

        if ($employer_id == Auth::user()->id) {
            $message = 'You can not apply on your own Tuition.';
            session()->flash('error',$message);
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        // You can not apply on a job twise
        $jobApplicationCount = JobApplication::where([
            'user_id' => Auth::user()->id,
            'job_id' => $id
        ])->count();
        
        if ($jobApplicationCount > 0) {
            $message = 'You already applied on this Tuition.';
            session()->flash('error',$message);
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        $application = new JobApplication();
        $application->job_id = $id;
        $application->user_id = Auth::user()->id;
        $application->employer_id = $employer_id;
        $application->applied_date = now();
        $application->save();


        // Send Notification Email to Employer
        $employer = User::where('id',$employer_id)->first();
        
        $mailData = [
            'employer' => $employer,
            'user' => Auth::user(),
            'job' => $job,
        ];

        Mail::to($employer->email)->send(new JobNotificationEmail($mailData));

        $message = 'You have successfully applied.';

        session()->flash('success',$message);

        // return response()->json([
        //     'status' => true,
        //     'message' => $message
        // ]);
        return view('front.exampleHosted')->with('status',true)->with('message',$message);
    }

    public function saveJob(Request $request) {

        $id = $request->id;

        $job = Job::find($id);

        if ($job == null) {
            session()->flash('error','Tuition not found');

            return response()->json([
                'status' => false,
            ]);
        }

        // Check if user already saved the Tuition
        $count = SavedJob::where([
            'user_id' => Auth::user()->id,
            'job_id' => $id
        ])->count();

        if ($count > 0) {
            session()->flash('error','You already saved this Tuition.');

            return response()->json([
                'status' => false,
            ]);
        }

        $savedJob = new SavedJob;
        $savedJob->job_id = $id;
        $savedJob->user_id = Auth::user()->id;
        $savedJob->save();

        session()->flash('success','You have successfully saved the Tuition.');

        return response()->json([
            'status' => true,
        ]);

    }
}
