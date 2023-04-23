<x-dashboard>
    {{-- @dd($cliente['settori']) --}}
    <div class="container px-5 my-5">
        <div class="row my-5">
            <h3 class="col col-8 fs-4 mb-4">Scheda Cliente: </h3>
            <p>username: {{$cliente['username']}}</p>
            <p>ragione sociale: {{$cliente['ragione_sociale']}}</p>
            <p>email: {{$cliente['email']}}</p>
            <p>telefono: {{$cliente['telefono']}}</p>
            <p>rating: {{$cliente['rating']}}</p>
            <p>codice fiscale: {{$cliente['cf']}}</p>
            <p>partita iva: {{$cliente['piva']}}</p>
            <p>indirizzo: {{$cliente['indirizzo']}}</p>
            <p>inizio attivita: {{$cliente['inizio_attivita']}}</p>
            <p>tipo: {{$cliente['tipo']['nome']}}</p>
            <p>note: {{$cliente['note']}}</p>

            @unless(is_null($cliente['attach_visura_camerale']))
            <p>{{asset($cliente['attach_visura_camerale'])}}</p>
                <object type="application/pdf" width="100%" height="500px" 
                data="{{asset($cliente['attach_visura_camerale'])}}">
                <p>unable to display pdf file</p>         </object>   
                @endunless

            <p>Settori:</p>
            @unless( count($cliente['settori']) == 0  )
                @foreach ($cliente['settori'] as $settore)
                    <p>
                        {{$settore['nome']}}
                    </p>
                @endforeach
            @endunless
        </div>
    </div>
</x-dashboard>
