@extends('layouts.app')
@section('content')
<div class="site-section">
    <div class="container">
        
            <div class="col">
                <h2 class="h3 mb-3 text-black">Login Admin</h2>
            </div>
            <div class="col">

                <form action="#" method="post">

                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col">
                                <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                            <label for="c_password" class="text-black">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="c_password" name="c_password" placeholder="">
                            </div>
                        </div>

                    
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
               
            </div>
        
    </div>
</div>
@endsection