{{-- @dd($clienti) --}}
<x-dashboard>
    <div class="row my-5">
        <div class="col col-12">
            <x-flash-message-success />
        </div>
        <h3 class="col col-8 fs-4 mb-4">Lista clienti</h3>
        <div class="col col-4 mb-4">
            <a href="{{ route('crea_utente') }}" class="btn btn-success " tabindex="-1" role="button" >Aggiungi nuovo cliente</a>
        </div>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">ID</th>
                        <th scope="col">Ragione Sociale</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>

                    @unless (count($clienti) == 0)

                        @foreach ($clienti as $cliente)
                            <tr>
                                <th scope="row">{{ $cliente['id'] }}</th>
                                <td>{{ $cliente['ragione_sociale'] }}</td>
                                <td>{{ ucwords($cliente['tipo']['nome']) }}</td>
                                <td>{{ $cliente['rating'] }}</td>
                                <td><a href="{{route('summary_cliente', $cliente['id'])}}">view</a> | edit | delete</td>
                            </tr>
                        @endforeach

                    @endunless

                </tbody>
            </table>
        </div>
    </div>

</x-dashboard>
