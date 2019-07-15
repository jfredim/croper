<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareasRequestFig extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
	public function rules()
	{
   		return [
      		'tipo_subtipo' => 'required|min:5|max:255',
      		'nombre' => 'required|min:5|max:255',
      		'color' => 'required|min:4|max:255',
      		'perimetro' => 'required|max:5',
      		'lado' => 'required|max:5'
   		];
	}
	
	public function messages()
	{
   		return [
      		'tipo_subtipo.required' => 'Debe ingresar un Tipo y Subtipo',
      		'nombre.required' => 'Debe ingresar un Nombre',
      		'color.required' => 'Debe ingresar un Color',
      		'perimetro.required' => 'Debe ingresar el Perimetro',
      		'lado.required' => 'Debe ingresar el Lado',
   		];
	}	
}
