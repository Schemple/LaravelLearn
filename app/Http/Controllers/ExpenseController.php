<?php
namespace App\Http\Controllers;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all()->sortByDesc('date');
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'note' => 'nullable|string',
            'source' => 'required|string|max:255',
        ]);

        Expense::create($request->all());

        return redirect()->route('expenses.index')->with('success', 'Khoản chi đã được thêm!');
    }
    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'date' => 'required|date',
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'note' => 'nullable|string',
            'source' => 'required|string|max:255',
        ]);

        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Khoản chi đã được cập nhật!');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Khoản chi đã bị xóa!');
    }

}
