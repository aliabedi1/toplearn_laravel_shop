<?php

namespace App\Http\Controllers\admin\ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketRequest;
use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function newTickets()
    {
        $tickets = Ticket::where('seen' , 0)->get();
        return view('admin.ticket.index', compact('tickets'));
    }

    public function openTickets()
    {
        $tickets = Ticket::where('status' , 1)->get();
        return view('admin.ticket.index', compact('tickets'));

    }

    public function closeTickets()
    {
        $tickets = Ticket::where('status' , 0)->get();
        return view('admin.ticket.index', compact('tickets'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.ticket.index', compact('tickets'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $ticket->seen = 1;
        $result = $ticket->save();
        return view('admin.ticket.show', compact('ticket'));
    }

   


    public function change(Ticket $ticket)
    {
        $ticket->status = $ticket->status == 0 ? 1 : 0;
        $result = $ticket->save();
        return redirect()->route('admin.ticket.index')->with('swal-success', 'تغییر شما با موفقیت انجام شد');

    }



    public function answer(TicketRequest $request , Ticket $ticket)
    {
        $inputs = $request->all();
        $inputs['subject'] = $ticket->subject;
        $inputs['description'] = $ticket->description;
        $inputs['seen'] = 1;
        $inputs['reference_id'] = $ticket->reference_id;
        $inputs['user_id'] = 6;
        $inputs['category_id'] = $ticket->category_id;
        $inputs['priority_id'] = $ticket->priority_id;
        $inputs['ticket_id'] = $ticket->id;
        $inputs['status'] = 1;

        $ticket = Ticket::create($inputs);
        return redirect()->route('admin.ticket.index')->with('swal-success', 'پاسخ شما با موفقیت ثبت شد');
      
    }
}
