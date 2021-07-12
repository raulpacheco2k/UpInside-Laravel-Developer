<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ValidateField extends Component
{
    public string $field;
    public string $error;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $field, string $error = 'danger')
    {
        $this->field = $field;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.validate-field');
    }
}
