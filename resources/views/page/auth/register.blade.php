<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="author" content="ZiddKh">
   <meta name="description" content="Laundry Web Application">
   <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="/assets/img/favicon.png">
   <title>Register - ZiLaundry</title>
   <x-link></x-link>
</head>
<body>
   <main class="main-content  mt-0">
      <section>
         <div class="page-header min-vh-100">
         <div class="container">
            <div class="row">
               <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
               <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
               </div>
               </div>
               <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
               <div class="card card-plain">
                  <div class="card-header">
                     <h4 class="font-weight-bolder">Sign Up</h4>
                     <p class="mb-0">Enter your credentials to register</p>
                  </div>
                  <div class="card-body">
                     <form autocomplete="off" method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <div class="input-group input-group-outline mb-3 w-100">
                           <select class="form-control text-secondary" id="selectOutlet" name="id_outlet">
                              <option selected disabled>Select Outlet</option>
                           </select>
                           @error('id_outlet')
                              <small class="w-100 text-danger mt-1 mx-1">
                                 {{ $message }}
                              </small>
                           @enderror
                        </div>
                        <div class="input-group input-group-outline mb-3 @error('nama') is-filled is-invalid @enderror">
                           <label class="form-label">Name</label>
                           <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                           @error('nama')
                              <small class="w-100 text-danger mt-1 mx-1">
                                 {{ $message }}
                              </small>
                           @enderror
                        </div>
                           <div class="input-group input-group-outline mb-3 rounded-0 rounded-start @error('username') is-filled is-invalid @enderror" id="username">
                              <label class="form-label">Username</label>
                              <input type="text" class="form-control rounded-0 rounded-end" name="username" value="{{ old('username') }}">
                              <button type="button" class="btn btn-sm btn-primary input-group-text text-xxs w-25 rounded-0 rounded-end z-4" id="btnCheckUsername">Check</button>
                              @error('username')
                                 <small class="w-100 text-danger mt-1 mx-1">
                                    {{ $message }}
                                 </small>
                              @enderror
                           </div>
                        <div class="input-group input-group-outline mb-3 @error('password') is-filled is-invalid @enderror" id="password">
                           <label class="form-label">Password</label>
                           <input type="password" class="form-control" name="password">
                           @error('password')
                              <small class="w-100 text-danger mt-1 mx-1">
                                 {{ $message }}
                              </small>
                           @enderror
                        </div>
                        <div class="input-group input-group-outline mb-3" id="confirmPassword">
                           <label class="form-label">Confirm Password</label>
                           <input type="password" class="form-control">
                        </div>
                        <small class="text-danger text-xs mt-n1">
                           Looks good!
                        </small>
                        <div class="form-check form-check-info text-start ps-0">
                           <input class="form-check-input @error('rules_check') border-danger @enderror" type="checkbox" value="1" id="rules_check" name="rules_check">
                           <label class="form-check-label" for="rules_check">
                              I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                           </label>
                           @error('rules_check')
                              <small class="w-100 text-danger d-block mt-1 mx-1">
                                 {{ $message }}
                              </small>
                           @enderror
                        </div>
                        <div class="text-center">
                           <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center pt-0 px-lg-2 px-1">
                     <p class="mb-2 text-sm mx-auto">
                     Already have an account?
                     <a href="/login" class="text-primary text-gradient font-weight-bold">Sign in</a>
                     </p>
                  </div>
               </div>
               </div>
            </div>
         </div>
         </div>
      </section>
   </main>
   <x-script></x-script>
   <script>
      $(function () {
         $('#selectOutlet').select2({
            ajax: {
               url: '/api/register/getData',
               dataType: 'json',
               type: 'POST',
               data: function (params) {
                  var query = {
                     search: params.term,
                  }
                  return query
               },
               processResults: function (data) {
                  dataOutlets = data;
                  const results = [];
                  data.map(item => {
                        results.push({
                           id: item.id,
                           text: `${item.nama}`
                        })
                  })
                  return {
                        results
                  };
               },
               delay: 250,
            }
         })

         // make function confirm password and password
         $('#confirmPassword .form-control').on('keyup', function () {
            if ($('#confirmPassword .form-control').val() != '') {
               if ($('#password .form-control').val() == $('#confirmPassword .form-control').val()) {
                  $('#confirmPassword').removeClass('is-invalid').addClass('is-valid');
                  $('#password').removeClass('is-invalid').addClass('is-valid');
               } else {
                  $('#confirmPassword').removeClass('is-valid').addClass('is-invalid');
                  $('#password').removeClass('is-valid');
               }
            } else {
               $('#confirmPassword').removeClass('is-invalid');
               $('#confirmPassword').removeClass('is-valid');
               $('#password').removeClass('is-valid');
            }
         });

         // make function checking username is already exist or not from database and add clas valid or invalid to input
         $('#btnCheckUsername').on('click', function () {
            let token = $('input[name="_token"]').val();
            let username = $('#username .form-control').val();
            if (username != '') {
               $.ajax({
                  url: 'register/checkUsername',
                  method: 'POST',
                  data: {
                     _token: token,
                     username: username,
                  },
                  success: function (data) {
                     if (data.success == true) {
                        $('#username').removeClass('is-valid').addClass('is-invalid');
                     } else {
                        $('#username').removeClass('is-invalid').addClass('is-valid');
                     }
                  },
               })
            } else {
               alert('please fill username');
            }
         });
      })

   </script>
</body>
</html>
