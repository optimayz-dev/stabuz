<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\ApplicationRequest;
use App\Models\Admin\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function store(ApplicationRequest $request)
    {
        $application = new Application($request->validated());

        $application->save();

        return redirect()->back()->with('success', 'Заявка успешно отправлена');
    }
}
