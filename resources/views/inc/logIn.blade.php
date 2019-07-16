<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Log in</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="h3 mb-3 text-black">Register</h2>
            </div>
            <div class="col-md-6">
                <h2 class="h3 mb-3 text-black">Log In</h2>
            </div>
            <div class="col-md-6">

                <form action="/register" method="post"  id="register">
                    @csrf
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstName" name="firstName">
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lastName" name="lastName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_subject" class="text-black">Address <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_subject" class="text-black">Phone number <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_subject" class="text-black">Username<span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Retype password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="retypePassword" name="retypePassword">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Register">
                            </div>
                        </div>

                                @if ($errors->register->all())
                                            @foreach ($errors->register->all() as $error)
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                                    <span class="text-danger">{{ $error }}</span>

                                    </div>
                                </div>
                                            @endforeach
                                @endif
                                @if(isset($poruka))
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <span >{{$poruka}}</span>

                                            </div>
                                        </div>
                                    @endif
                    </div>
                </form>
            </div>
            <form action="/login" method="post" id="login">
                @csrf
                <div class="p-3 p-lg-5 border">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="c_fname" class="text-black">Username: </label>
                            <input type="text" class="form-control" id="loginUsername" name="loginUsername">
                        </div>
                        <div class="col-md-6">
                            <label for="c_lname" class="text-black">Password: </label>
                            <input type="password" class="form-control" id="loginPassword" name="loginPassword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log in">
                        </div>
                    </div>

                    @if ($errors->login->all())
                        @foreach ($errors->login->all() as $error)
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <span class="text-danger">{{ $error }}</span>

                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </form>
        </div>
        </div>
    </div>
</div>