<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminEventController extends Controller
{
    public function index() {
        return view('admin/event',[
            'page_title' => 'Event',
            'events' => Event::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'event_title'  => 'required|min:5',
            'event_description' => '',
            'event_date' => 'required',
            'event_image' => 'image|file|max:2048'
        ]);

   
        //jika ada gambar baru
        if($request->file('event_image')){
            $validatedData['event_image'] = $request->file('event_image')->store('post-images/event');
        }
        $time = strtotime($validatedData['event_date']);
        $validatedData['event_date'] = date("Y-m-d H:i:s",$time);
        Event::create($validatedData);
        Alert::success('Berhasil', 'Data event berhasil ditambah !');
        return view('admin/event',[
            'page_title' => 'Event',
            'events' => Event::all()
        ]);
        
    }

    public function destroy(Event $event) {
        
        Storage::delete($event->event_image);
        Event::destroy($event->id);
        Alert::success('Berhasil', 'Data event berhasil dihapus !');
        return redirect('/admin-event');
        
    }

    public function showedit(Event $event) {
  
        return view('admin/eventedit',[
            'page_title' => 'Ubah Event',
            'event' => Event::find($event->id)
        ]);
        
    }

    public function edit(Event $event,Request $request) {
        $validatedData = $request->validate([
            'event_title'  => 'required|min:5',
            'event_description' => '',
            'event_date' => 'required',
            'event_image' => 'image|file|max:2048'
        ]);

        $time = strtotime($validatedData['event_date']);
        $validatedData['event_date'] = date("Y-m-d H:i:s",$time);

        //jika ada gambar baru
        if($request->file('event_image')){
            //jika gambar lama isi (ada gambar lama)
            if($request->old_event_image){
                // hapus gambar lama
                Storage::delete($request->old_event_image);
            }
            $validatedData['event_image'] = $request->file('event_image')->store('post-images/event');
        }
        
        Event::where('id',$event->id)
                    ->update($validatedData);
        Alert::success('Berhasil', 'Data event berhasil diubah !');
        return redirect('/admin-event');
        
    }
}
