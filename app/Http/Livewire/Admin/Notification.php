<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Notification extends Component
{

    public function deleteNoti($id){
        $noti = \App\Models\Notification::find($id);
        $noti->delete();
    }

    public function render()
    {
        $user=auth()->user()->id;
        $notifications=\App\Models\Notification::where('user_id',$user)->orderBy('id','desc')->get();
        return view('livewire.admin.notification',['notifications'=>$notifications])->layout('livewire.layouts.admin');
    }
}
