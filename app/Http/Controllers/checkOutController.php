<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\checkOut;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class checkOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = request()->query("event");
        $event = Event::find($id);

        // dd($event);
        return view('auth.checkout',compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function showCheckoutForm($id)
    {
        $event = Event::findOrFail($id);
        return view('auth.checkout', compact('event'));
    }
   
    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'payment' => 'required|string|in:dana,gopay,fadipay,cash',
        ]);

        $checkout = new checkOut();
        $checkout->event_id = $event->id;
        $checkout->name = $validated['name'];
        $checkout->phone = $validated['phone'];
        $checkout->email = $validated['email'];
        $checkout->payment_method = $validated['payment'];
        $checkout->status = 'pending';
        $checkout->save();

        return redirect()->route('checkout.qrcode', $checkout->id);
    }
    public function showQrCode($id)
{
    $checkout = checkOut::findOrFail($id);

    $qrData = "Tiket untuk {$checkout->name}\nEvent ID: {$checkout->event_id}\nEmail: {$checkout->email}";

    $qrCode = QrCode::size(250)->generate($qrData);

    return view('auth.qrcode', compact('qrCode', 'checkout'));
}


    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
