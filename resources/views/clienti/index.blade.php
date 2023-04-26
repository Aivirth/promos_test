{{-- @dd($clienti) --}}
<x-dashboard>
    <div class="row my-5">
        <div class="col col-12">
            <x-flash-message-success />
        </div>
        <h3 class="col col-5 fs-4 mb-4">Lista clienti</h3>
        <div class="col">
            @include('../partials._clients_search')
        </div>
        <div class="col col-2 mb-4 d-flex justify-content-end">
            <a href="{{ route('crea_utente') }}" class="btn btn-success " tabindex="-1" role="button">Aggiungi nuovo
                cliente</a>
        </div>
        <div class="col col-12">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center" width="50">ID</th>
                        <th scope="col">Ragione Sociale</th>
                        <th scope="col" class="text-center">Tipo</th>
                        <th scope="col" class="text-center">Rating</th>
                        <th scope="col" colspan="3" class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @unless (count($clienti) == 0)
                        @foreach ($clienti as $cliente)
                            @if(!is_null($cliente->user))
                            <tr>
                                <th scope="row" class="text-center">{{ $cliente->user->id }}</th>
                                <td>{{ $cliente->ragione_sociale }}</td>
                                <td class="text-center">{{ ucwords($cliente->tipo->nome) }}</td>
                                <td class="text-center">{{ $cliente->rating }}</td>
                                <td class="d-flex justify-content-around">
                                    <a class="btn btn-outline-info"
                                        href="{{ route('summary_cliente', $cliente->user->id) }}">Visualizza</a>
                                    <a class="btn btn-outline-secondary"
                                        href="{{ route('edit_cliente', $cliente->user->id) }}">Modifica</a>
                                    <form
                                        onsubmit="return confirm('Sei sicuro di voler eliminare {{ $cliente->ragione_sociale }} ?')"
                                        action="{{ route('delete_cliente', $cliente->user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-outline-danger" value="Delete" />
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    @endunless
                </tbody>
            </table>
        </div>
        <div class="col col-12 mt-4">
            {{$clienti->links()}}
        </div>
    </div>

</x-dashboard>
