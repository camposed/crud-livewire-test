<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Script;

class Scripts extends Component
{

    public $scripts, $name, $description, $code, $id_script;
    public $modal = false;

    public function render()
    {
        $this->scripts = Script::all();
        
        return view('livewire.scripts');
    }

    public function crear(){
        $this->limpiarInputs();
        $this->abrirModal();
    }

    public function limpiarInputs(){
        $this->name = '';
        $this->description = '';
        $this->code = '';
        $this->id_script = '';
    }

    public function abrirModal(){
        $this->modal = true;
    }

    public function cerrarModal(){
        $this->modal = false;
    }

    public function editar($id){

        $script = Script::findOrFail($id);

        $this->id_script = $id;
        $this->name = $script->name;
        $this->description = $script->description;
        $this->code = $script->code;

        $this->abrirModal();
    }

    public function borrar($id){

        Script::find($id)->delete();

        session()->flash('message','Registro eliminado.');
    }

    public function guardar(){

        Script::updateOrCreate(['id'=>$this->id],
            [
                'name' => $this->name,
                'description' => $this->description,
                'code' => $this->code
            ]
        );

        session()->flash('message', $this->id_script ? 'Registro actualizado.' : 'Se ha creado el registro.');

        $this->cerrarModal();
        $this->limpiarInputs();
    }
}
