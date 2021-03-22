<?php

namespace App\Http\Livewire\Expense;

use Livewire\Component;
use App\Models\Expense;
use Livewire\WithFileUploads;

class ExpenseCreate extends Component
{
    use WithFileUploads;

    public $amount;

    public $description;

    public $type;

    public $photo;

    public $expenseDate;

    protected $rules = [
        'amount'      => 'required',
        'description' => 'required',
        'type'        => 'required',
        'photo'       => 'image|nullable',
    ];

    public function createExpense(){

        $this->validate();

        if($this->photo){
            $this->photo = $this->photo->store('expenses-photos', 'public');
        }

        auth()->user()->expenses()->create([
            'amount'      => $this->amount,
            'description' => $this->description,
            'type'        => $this->type,
            'user_id'     => 1,
            'photo'       => $this->photo,
            'expense_date'=> $this->expenseDate
        ]);

        session()->flash('message', 'Registro criado com sucesso!');

        $this->amount = $this->type = $this->description = null;
    }

    public function render()
    {
        return view('livewire.expense.expense-create');
    }
}
