<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbackAll = Feedback::paginate(5);
        return view('feedback.index', compact('feedbackAll'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'feedback' => 'required'

        ]);

        $feedback = [
            'feedback' => $request->feedback,
            'id_user' => Auth::user()->id
        ];

        Feedback::create($feedback);
        alert()->success('Success', 'Feedback terkirim');
        return redirect()->route('feedback.create');
    }
}
