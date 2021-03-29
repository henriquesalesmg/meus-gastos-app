<?php

namespace App\Http\Livewire\Plan;

use Livewire\Component;
use App\Models\Plan;
use Illuminate\Support\Facades\Http;

class PlanCreate extends Component
{
    public array $plan = [];

    public $rules = [
        'plan.name' => 'required',
        'plan.description' => 'required',
        'plan.price' => 'required',
        'plan.slug' => 'required',
        'plan.reference' => 'required'
    ];

    public function createPlan() {

        /*
        $this->validate();

        $plan = $this->plan;
        $plan['reference'] = 'PAGSEGURO-REFERENCE';

        Plan::create($plan);
        */

        $response = Http::withHeaders([
            'Accept' => 'application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1',
            'Content-Type' => 'application/json'
        ])->post(
            'https://ws.sandbox.pagseguro.uol.com.br/pre-approvals/request/?email=email&token=token',
            [
                'reference' => 'referencia-livewire',
                'preApproval' => [
                    'name' => 'Plano Mensal',
                    'charge' => 'AUTO',
                    'period' => 'MONTHLY',
                    'amountPerPayment' => '39.99',
                ]
            ]
        );

        dd($response->json());

        session()->flash('message', 'Plano Criado com Sucesso');
    }

    public function render()
    {
        return view('livewire.plan.plan-create');
    }
}
