<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['user', 'attachments', 'comments.user'])->get();
        return $tickets;
    }
}