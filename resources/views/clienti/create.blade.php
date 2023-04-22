<div class="container px-5 my-5">
    <form id="contactForm">
        <div class="mb-3">
            <label class="form-label" for="ragioneSociale">Ragione sociale</label>
            <input class="form-control" id="ragioneSociale" type="text" placeholder="Ragione sociale" />

        </div>
        <div class="mb-3">
            <label class="form-label d-block">Tipo</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="business" type="radio" name="tipo" />
                <label class="form-check-label" for="business">Business</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="privato" type="radio" name="tipo" />
                <label class="form-check-label" for="privato">Privato</label>
            </div>

        </div>
        <div class="mb-3">
            <label class="form-label d-block">Settori di appartenenza</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="informatica" type="checkbox" name="settoriDiAppartenenza" />
                <label class="form-check-label" for="informatica">Informatica</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="edilizia" type="checkbox" name="settoriDiAppartenenza" />
                <label class="form-check-label" for="edilizia">Edilizia</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="immobiliare" type="checkbox" name="settoriDiAppartenenza" />
                <label class="form-check-label" for="immobiliare">Immobiliare</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="salute" type="checkbox" name="settoriDiAppartenenza" />
                <label class="form-check-label" for="salute">Salute</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="finanza" type="checkbox" name="settoriDiAppartenenza" />
                <label class="form-check-label" for="finanza">Finanza</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="emailAddress">Email Address</label>
            <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" />

        </div>
        <div class="mb-3">
            <label class="form-label" for="note">Note</label>
            <textarea class="form-control" id="note" type="text" placeholder="Note" style="height: 10rem;"></textarea>

        </div>
        <div class="mb-3">
            <label class="form-label" for="indirizzo">Indirizzo</label>
            <input class="form-control" id="indirizzo" type="text" placeholder="Indirizzo" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="inizioAttivita">Inizio Attivita&#x27;</label>
            <input class="form-control" id="inizioAttivita" type="text" placeholder="Inizio Attivita&#x27;" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="rating">Rating</label>
            <input class="form-control" id="rating" type="text" placeholder="Rating" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="partitaIva">Partita Iva</label>
            <input class="form-control" id="partitaIva" type="text" placeholder="Partita Iva" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="codiceFIscale">Codice FIscale</label>
            <input class="form-control" id="codiceFIscale" type="text" placeholder="Codice FIscale" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="telefono">Telefono</label>
            <input class="form-control" id="telefono" type="text" placeholder="Telefono" />

        </div>
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" id="username" type="text" placeholder="Username" />

        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" id="password" type="text" placeholder="Password" />

        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Crea</button>
        </div>
    </form>
</div>
