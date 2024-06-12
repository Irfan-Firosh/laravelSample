<x-layout>
  <body>
    <title>Login</title>
    <script>
      $(document).ready(function dip() {
          setTimeout(function () {$(".dipper").fadeOut('fast');}, 1500);
      });
    </script>
    <div class="container py-5">
      <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-5 col-xl-4">
          <div class="card" style="border-radius: 1rem">
            <div class="card-body text-center p-5">
              <h3 class="mb-5">Sign In.</h3>
              <form action="/login" method="POST">
                @csrf
                <div class="form-floating mb-4">
                  <input
                    type="text"
                    name="email"
                    class="form-control"
                    placeholder=""
                    value="{{old('email')}}"
                  />
                  <label for="email">Email</label>
                </div>
                <div class="form-floating mb-4">
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder=""
                    value="{{old('password')}}"
                  />
                  <label for="password">Password</label>
                </div>
                <div class="row d-flex justify-content-start text-left mb-4 mx-1">
                  <div class="form-check col d-flex justify-content-start">
                    <input
                      type="checkbox"
                      class="form-check-input me-2"
                      name="frem"
                    />
                    <label for="frem" class="form-check-label">Remember me</label>
                  </div>
                  <div class="d-flex justify-content-end col d-flex justify-content-start">
                      <a href="/register" class="text-decoration-none">Not registered?</a>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                  Login
                </button>
              </form>
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger mb-2 dipper" role="alert">
                    {{$error}}
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</x-layout>