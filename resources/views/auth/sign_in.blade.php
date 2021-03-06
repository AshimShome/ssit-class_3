<x-layout :category="$category">
    <x-slot name="title">Sign-In</x-slot>

    <div class="row g-5">
        <div class="col-md-8">

            <div class="bg-light py-5 rounded mb-3">
                <div class="row justify-content-center">

                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Sign Up Form</h4>

                        <x-success/>
                        <x-error/>
                        <x-validError/>
                        <form class="needs-validation" method="post" action="{{route('login')}}">

                            @csrf
                            <div class="row g-3">

                                <div class="col-12">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  placeholder="you@example.com"value="{{old('email')}}">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="lastName" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                    <div class="invalid-feedback">
                                        Valid password is required.
                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">
                            <div class="text-end">

                                <button class="btn btn-primary " type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>



                </div>
            </div>


        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">


                <x-about />

                <x-archives />

                <x-elsewhere />


            </div>
        </div>
    </div>
</x-layout>
