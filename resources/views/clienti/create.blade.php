<x-dashboard>
    <div class="container px-5 my-5">
        <form id="contactForm" method="POST" action="{{ route('store_cliente') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="ragione_sociale">Ragione sociale</label>
                <input class="form-control" id="ragione_sociale" name="ragione_sociale" type="text"
                    placeholder="Ragione sociale" value="{{ old('ragione_sociale') }}" />
                @error('ragione_sociale')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" name="username" type="text" placeholder="Username"
                    value="{{ old('username') }}" />
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" id="password" name="password" type="text" placeholder="Password"
                    value="{{ old('password') }}" />
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Tipo</label>
                @foreach ($tipi as $tipo)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="{{ $tipo['nome'] }}" type="radio" name="tipo"
                            value="{{ $tipo['id'] }}" />
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
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="{{ $settore['nome'] }}" type="checkbox"
                            name="settore_{{ $settore['nome'] }}" value="{{ $settore['id'] }}" />
                        <label class="form-check-label"
                            for="{{ $settore['nome'] }}">{{ ucwords($settore['nome']) }}</label>
                    </div>
                @endforeach

            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="email" placeholder="Email"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="indirizzo">Indirizzo</label>
                <input class="form-control" id="indirizzo" name="indirizzo" type="text" placeholder="Indirizzo"
                    value="{{ old('indirizzo') }}" />
                @error('indirizzo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="inizio_attivita">Inizio Attivita&#x27;</label>
                <input class="form-control" id="inizio_attivita" name="inizio_attivita" type="date"
                    placeholder="Inizio Attivita&#x27;" value="{{ old('inizio_attivita') }}" />
                @error('inizio_attivita')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="rating">Rating</label>
                <input class="form-control" id="rating" type="number" name="rating" min="0" max="10"
                    value="{{ old('rating', 0) }}" />
                @error('rating')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="partita_iva">Partita Iva</label>
                <input class="form-control" id="partita_iva" type="text" name="partita_iva"
                    placeholder="Partita Iva" value="{{ old('partita_iva') }}" />
                @error('partita_iva')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="codice_fiscale">Codice Fiscale</label>
                <input class="form-control" id="codice_fiscale" name="codice_fiscale" type="text"
                    placeholder="Codice Fiscale" value="{{ old('codice_fiscale') }}" />
                @error('codice_fiscale')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="visura_camerale">Allegato visura camerale</label>
                <input class="form-control" id="visura_camerale" name="visura_camerale"type="file" />
                @error('visura_camerale')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="telefono">Telefono</label>
                <input class="form-control" id="telefono" name="telefono" type="text" placeholder="Telefono"
                    value="{{ old('telefono') }}" />
                @error('telefono')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-3">
                <label class="form-label" for="note">Note</label>
                <textarea class="form-control" id="note" type="text" name="note"placeholder="Note"
                    style="height: 10rem;">
                    {{ old('note') }}
                </textarea>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary btn-lg" id="submit_new_cliente" type="submit">Crea</button>
            </div>

        </form>
    </div>
</x-dashboard>
