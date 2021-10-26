<x-guestuser-layout>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-register flex-row my-5">
                    <div class="d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Register</h5>
                        <form class="form-register" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-label-group">
                                <input type="text" name="name" id="inputUserame" class="form-control"
                                    placeholder="Username" required autofocus>
                                <label for="inputUserame">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="email" name="email" id="inputEmail" class="form-control"
                                    placeholder="Email address" required>
                                <label for="inputEmail">Email address</label>
                            </div>

                            <hr>

                            <div class="form-label-group">
                                <input type="password" name="password" id="inputPassword" class="form-control"
                                    placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password_confirmation" id="inputConfirmPassword"
                                    class="form-control" placeholder="Password" required>
                                <label for="inputConfirmPassword">Confirm password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                type="submit">Register</button>

                            <a href="{{ route('login') }}" class="btn btn-lg btn-success btn-block text-uppercase"
                                type="submit">Sign
                                In</a>
                            {{-- <a class="d-block text-center mt-2 text-uppercase" href="#">Sign In</a> --}}
                            <hr class="my-4">
                            <a href="{{ url('auth/google') }}" class="btn btn-lg btn-google btn-block text-uppercase"
                                style="color: white;"><img class="fab fa-google mr-2">Sign in with Google</a>
                            <a href="{{ url('auth/facebook') }}"
                                class="btn btn-lg btn-facebook btn-block text-uppercase" style="color: white;"><img
                                    class="fab fa-facebook-f mr-2">Sign in with
                                Facebook</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guestuser-layout>
