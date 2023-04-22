{{-- @dd($clienti[0]) --}}
<x-dashboard>
    <div class="row my-5">
        <h3 class="fs-4 mb-3">Lista clienti</h3>
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
                                <td>view | edit | delete</td>
                            </tr>
                        @endforeach

                    @endunless

                </tbody>
            </table>
        </div>
    </div>

</x-dashboard>
