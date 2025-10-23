<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    // Hiển thị danh sách vé
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket.index', compact('tickets'));
    }

    // Hiển thị form tạo vé
    public function create()
    {
        return view('ticket.create');
    }

    // Lưu vé mới
    public function store(TicketRequest $request)
    {
        $ticket = Ticket::create($request->validated());
        return redirect()->route('tickets.index')->with('success', 'Tạo vé thành công!');
    }

    // Hiển thị form chỉnh sửa vé
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('ticket.edit', compact('ticket'));
    }

    // Cập nhật vé
    public function update(TicketRequest $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->validated());
        return redirect()->route('tickets.index')->with('success', 'Cập nhật vé thành công!');
    }

    // Xoá vé
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Xoá vé thành công!');
    }

    // Nhận vé (ví dụ: cập nhật trạng thái đã nhận)
    public function receive($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'received';
        $ticket->save();
        return redirect()->route('tickets.index')->with('success', 'Đã nhận vé!');
    }
}
