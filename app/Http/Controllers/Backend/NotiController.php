<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotiController extends Controller
{
    public function destroy($id)
    {
        $noti = Notification::find($id);

        $noti->delete();

        return redirect()->back();
    }
}
