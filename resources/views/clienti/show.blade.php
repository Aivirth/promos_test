<x-dashboard>
    {{-- @dd($cliente) --}}
    <div class="container px-5 my-5">
        <div class="row">
            <h3 class="col col-8 fs-4 mb-4">Scheda Cliente</h3>
            <div class="col col-4 mb-4 d-flex justify-content-end">
                <a href="{{ route('edit_cliente', $cliente['user']['id']) }}" class="btn btn-success" tabindex="-1"
                    role="button">Modifica</a>
            </div>
        </div>
        <hr />

        <table class="table bg-white ">
            {{-- <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead> --}}
            <tbody>

                <tr>
                    <th scope="row">Username</th>
                    <td>{{ $cliente['user']['username'] }}</td>
                </tr>

                <tr>
                    <th scope="row">Ragione Sociale</th>
                    <td>{{ $cliente['ragione_sociale'] }}</td>
                </tr>

                <tr>
                    <th scope="row">Email</th>
                    <td>{{ $cliente['user']['email'] }}</td>
                </tr>

                <tr>
                    <th scope="row">Telefono</th>
                    <td>{{ $cliente['telefono'] }}</td>
                </tr>

                <tr>
                    <th scope="row">Rating</th>
                    <td>{{ $cliente['rating'] }}</td>
                </tr>

                <tr>
                    <th scope="row">Codice Fiscale</th>
                    <td>{{ $cliente['cf'] }}</td>
                </tr>

                <tr>
                    <th scope="row">Partita Iva</th>
                    <td>{{ $cliente['piva'] }}</td>
                </tr>

                <tr>
                    <th scope="row">Indirizzo</th>
                    <td>{{ $cliente['indirizzo'] }}</td>
                </tr>

                <tr>
                    <th scope="row">Inizio attivita'</th>
                    <td>{{ $cliente['inizio_attivita'] }}</td>
                </tr>

                <tr>
                    <th scope="row">Tipo</th>
                    <td>{{ $cliente['tipo']['nome'] }}</td>
                </tr>

                <tr>
                    <th scope="row">Note</th>
                    <td>{{ $cliente['note'] }}</td>
                </tr>
                <tr>
                    <th scope="row">Settori</th>
                    <td>
                        <ul class="list-group list-group-flush">
                            @unless (count($cliente['settori']) == 0)
                                @foreach ($cliente['settori'] as $settore)
                                    <li class="list-group-item ms-0 ps-0 pt-0">
                                        {{ $settore['nome'] }}
                                    </li>
                                @endforeach
                            @endunless
                        </ul>
                    </td>
                </tr>
            </tbody>


        </table>


        <hr/>
        @unless (is_null($cliente['attach_visura_camerale']))
            <object type="application/pdf" width="100%" height="500px"
                data="{{ asset($cliente['attach_visura_camerale']) }}">
                <p>Browser embeding not possible, <a href="{{ asset($cliente['attach_visura_camerale']) }}">view the
                        file</a> instead</p>
            </object>
        @endunless


    </div>

</x-dashboard>
