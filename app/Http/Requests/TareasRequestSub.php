<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareasRequestSub extends FormRequest
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
      		'tipo' => 'required|min:5|max:255',
      		'nombre' => 'required|min:5|max:255',
      		'descripcion' => 'required|max:800'
   		];
	}
	
	public function messages()
	{
   		return [
      		'tipo.required' => 'Debe ingresar un Tipo',
      		'nombre.required' => 'Debe ingresar un Nombre',
      		'descripcion.required' => 'Debe ingresar una Descripción',
   		];
	}	
}	
