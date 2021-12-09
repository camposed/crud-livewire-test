<div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                @if(session()->has('message'))
                    <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                        <div class="flex">
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                @endif

                <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold px-2 py-2 my-3">Nuevo</button>

                @if($modal)
                    @include('livewire.crear')
                @endif

                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-indigo-600 text-white">
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Code</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($scripts as $script)
                        <tr>
                            <td class="border px-4 py-2">{{ $script->name }}</td>
                            <td class="border px-4 py-2">{{ $script->description }}</td>
                            <td class="border px-4 py-2">{{ $script->code }}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{ $script->id }})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-2">Edit</button>
                                <button wire:click="borrar({{ $script->id }})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-2">Delete</button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
