<x-base>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="border border-3 border-success"></div>
                    <div class="card bg-white shadow-lg">
                        <div class="card-body p-5">
                            <form method="POST" action="{{ route('authenticate') }}" class="mb-3 mt-md-4">
                                @csrf
                                <h2 class="fw-bold mb-2 text-uppercase ">PromosTest</h2>
                                <p class=" mb-5">Benvenuto!</p>
                                <div class="mb-3">
                                    <label for="email" class="form-label ">Email address</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="name@example.com" name="email" value="{{ old('email') }}" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="*******"
                                        name="password" />
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-outline-dark" type="submit">Login</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
