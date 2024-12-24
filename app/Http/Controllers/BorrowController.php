<?php
namespace App\Http\Controllers;
use App\Models\Borrow;
use App\Models\Reader;
use Illuminate\Http\Request;
use App\Http\Requests\BorrowRequest;
class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::with(['reader', 'book'])->orderBy('updated_at', 'desc')->paginate(10);
        return view('borrows.index', compact('borrows'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrows.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(BorrowRequest $request)
    {
        Borrow::create([
            'reader_id' => $request->reader_id,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
        ]);
    
        return redirect()->route('borrows.index')->with('success', 'Thêm mới thành công!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        return view('borrows.detail', compact('borrow'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        return view('borrows.update', compact('borrow'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'reader_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required',
            'return_date' => 'required',
        ]);
        $borrow = Borrow::findOrFail($id);
        $data = $request->all();
        $data['status'] = $request->has('status') ? 0 : 1;
        $borrow->update($data);
        return redirect()->route('borrows.index')->with('success', 'Trả sách thành công.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Xóa thành công.');
    }
    public function history($reader_id)
    {
        // Lấy thông tin độc giả
        $reader = Reader::findOrFail($reader_id);
        // Lấy lịch sử mượn trả sách của độc giả
        $borrows = Borrow::where('reader_id', $reader_id)->orderBy('borrow_date', 'desc')->get();
        // Trả về view với dữ liệu
        return view('borrows.history', compact('reader', 'borrows'));
    }
    public function updateStatusToReturned(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->update(['status' => 1]); // Set trạng thái thành "Trả"
        return redirect()->route('borrows.index')->with('success', 'Trả sách thành công.');
    }

    
}