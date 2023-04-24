<x-dashboard>
    {{-- @dd($cliente, $settori, $tipi) --}}
    <div class="container px-5 my-5">
        <form id="contactForm" method="POST" action="{{ route('store_cliente') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="ragione_sociale">Ragione sociale</label>
                <input class="form-control" id="ragione_sociale" name="ragione_sociale" type="text"
                    placeholder="Ragione sociale" value="{{ $cliente['ragione_sociale'] ?? old('ragione_sociale') }}" />
                @error('ragione_sociale')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" name="username" type="text" placeholder="Username"
                    value="{{ $cliente['user']['username'] ?? old('username') }}" />
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Vecchia Password</label>
                <input class="form-control" id="password" name="password" type="text" placeholder="Vecchia Password"
                    value="{{ old('password') }}" />
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="new_password">Nuova Password</label>
                <input class="form-control" id="new_password" name="new_password" type="text" placeholder="Nuova Password"
                    value="{{ old('new_password') }}" />
                @error('new_password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label d-block">Tipo</label>
                @foreach ($tipi as $tipo)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="{{ $tipo['nome'] }}" type="radio" name="tipo"
                            value="{{ $tipo['id'] }}" {{ $tipo['id'] == $cliente['tipo']['id'] ? ' checked' : '' }} />
                        <label class="form-check-label" for="{{ $tipo['nome'] }}">{{ ucwords($tipo['nome']) }}</label>
                    </div>
                @endforeach
                @error('tipo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Settori di appartenenza</label>
                @foreach ($settori as $settore)
                    @php
                        $checked = '';
                        if (array_key_exists($settore['id'], $cliente['settori'])) {
                            $userSettore = $cliente['settori'][$settore['id']]['id'];
                            if ($settore['id'] == $userSettore) {
                                $checked = ' checked';
                            }
                        }
                    @endphp
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="{{ $settore['nome'] }}" type="checkbox"
                            name="settore_{{ $settore['nome'] }}" value="{{ $settore['id'] }}" {{ $checked }} />
                        <label class="form-check-label"
                            for="{{ $settore['nome'] }}">{{ ucwords($settore['nome']) }}</label>
                    </div>
                @endforeach

            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="email" placeholder="Email"
                    value="{{ $cliente['user']['email'] ?? old('email') }}" />
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="indirizzo">Indirizzo</label>
                <input class="form-control" id="indirizzo" name="indirizzo" type="text" placeholder="Indirizzo"
                    value="{{ $cliente['indirizzo'] ?? old('indirizzo') }}" />
                @error('indirizzo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="inizio_attivita">Inizio Attivita&#x27;</label>
                <input class="form-control" id="inizio_attivita" name="inizio_attivita" type="date"
                    placeholder="Inizio Attivita&#x27;"
                    value="{{ $cliente['inizio_attivita'] ?? old('inizio_attivita') }}" />
                @error('inizio_attivita')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="rating">Rating</label>
                <input class="form-control" id="rating" type="number" name="rating" min="0" max="10"
                    value="{{ $cliente['rating'] ?? old('rating', 0) }}" />
                @error('rating')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="partita_iva">Partita Iva</label>
                <input class="form-control" id="partita_iva" type="text" name="partita_iva"
                    placeholder="Partita Iva" value="{{ $cliente['piva'] ?? old('partita_iva') }}" />
                @error('partita_iva')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="codice_fiscale">Codice Fiscale</label>
                <input class="form-control" id="codice_fiscale" name="codice_fiscale" type="text"
                    placeholder="Codice Fiscale" value="{{ $cliente['cf'] ?? old('codice_fiscale') }}" />
                @error('codice_fiscale')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="visura_camerale">Allegato visura camerale</label>

                {{-- @unless (is_null($cliente['attach_visura_camerale']))
                    <object type="application/pdf" width="100%" height="500px"
                        data="{{ asset($cliente['attach_visura_camerale']) }}">
                        <p>Browser embeding not possible, <a href="{{ asset($cliente['attach_visura_camerale']) }}">view
                                the
                                file</a> instead</p>
                    </object>
                @endunless --}}

                @if (is_null($cliente['attach_visura_camerale']))
                    <p class="text-underscored">Nessun allegato presente</p>
                @else
                    <p>File attualmente caricato : <a href="{{ asset($cliente['attach_visura_camerale']) }}"
                            target="_blank">Visualizza</a></p>
                @endif

                <input class="form-control" id="visura_camerale" name="visura_camerale"type="file" />
                @error('visura_camerale')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="telefono">Telefono</label>
                <input class="form-control" id="telefono" name="telefono" type="text" placeholder="Telefono"
                    value="{{ $cliente['telefono'] ?? old('telefono') }}" />
                @error('telefono')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label" for="note">Note</label>
                <textarea class="form-control" id="note" type="text" name="note"placeholder="Note"
                    style="height: 10rem;">{{ $cliente['note'] ?? old('note') }}</textarea>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary btn-lg" id="submit_new_cliente" type="submit">Crea</button>
            </div>

        </form>
    </div>
</x-dashboard>
