<?php

namespace App\Rules;

use App\Models\Servicio;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueServicioNombre implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public $tipo_servicio_id;

    public function __construct($tipo_servicio_id = null)
    {
        $this->tipo_servicio_id = $tipo_servicio_id;
    }
    
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $servicio = Servicio::where('nombres', $value)
            ->where('tipo_servicio_id', $this->tipo_servicio_id);
        if ($servicio->count() > 0) {

            $fail('El nombre del servicio no se debe repetir en la categoria.');
        }
    }
}
