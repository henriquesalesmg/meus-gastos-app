<?php

namespace App\Http\Livewire\Expense;

use Livewire\Component;
use App\Models\Expense;

class ExpenseCreate extends Component
{
    public $amount;

    public $description;

    public $type;

    protected $rules = [
        'amount' => 'required',
        'description' => 'required',
        'type' => 'required',
    ];

    public function createExpense(){

        $this->validate();

        Expense::create([
            'amount' => $this->amount,
            'description' => $this->description,
            'type' => $this->type,
            'user_id' => 1
        ]);

        session()->flash('message', 'Registro criado com sucesso!');

        $this->amount = $this->type = $this->description = null;
    }

    public function render()
    {
        return view('livewire.expense.expense-create');
    }
}
