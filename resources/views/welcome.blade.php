@extends('layouts.app')

@section('content')
<div class="container" id="welcome">
    <div class="row">
        <!-- Left -->
        <div class="col-md-6">
           <h1>Welcome to <b style="color: #337ab7;">CV</b>ator</h1>
           <h4><b>What's CV?</b></h4>
           <p>Curriculum vitae (or CV) is written overview of person's experience and other qualifications.</p>
           <h4><b>What's CVator?</b></h4>
           <p>CVator (or CV Creator) is free and simple app for build your CV in short time.</p>
           <h4><b>How it works?</b></h4>
           <p>While you are entering your data in fields, CVator is creating document in PDF.</p> 
        </div>
        <!-- Right -->
        <div class="col-md-6">
            @if (Auth::guest())
                <h3><b style="color: #337ab7;">Log In</b></h3>
                <br>
                {!! Form::open(array('url' => '/login', 'role' => 'form')) !!}
                    <div class="form-group">
                        {!! Form::label('username', 'Username') !!}
                        {!! Form::text('username', '', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', array('class' => 'form-control')) !!}
                    </div>                        
                    {!! Form::button('<span class="glyphicon glyphicon-log-in"></span> Log In', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signUpModal"><span class="glyphicon glyphicon-new-window"></span> Sign Up</button>                                      
                {!! Form::close() !!}
            @else
                
            @endif
            <!-- signUpModal -->
            <div id="signUpModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Log In</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('url' => '/register', 'role' => 'form')) !!}
                                <div class="form-group">
                                    {!! Form::label('full_name', 'Full name') !!}
                                    {!! Form::text('full_name', '', array('class' => 'form-control')) !!}    
                                </div>
                                <div class="form-group">
                                    {!! Form::label('username', 'Username') !!}
                                    {!! Form::text('username', '', array('class' => 'form-control')) !!}    
                                </div> 
                                <div class="form-group">
                                    {!! Form::label('password', 'Pasword') !!}
                                    {!! Form::password('password', array('class' => 'form-control')) !!}
                                </div>                   
                                {!! Form::button('<span class="glyphicon glyphicon-log-in"></span> Log In', array('class' => 'btn btn-primary', 'type' => 'submit')) !!}                                        
                            {!! Form::close() !!}                                
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <footer class="col-md-12">
           <hr>
           <p class="text-right"><a href="https://github.com/milanbrckalo">milanbrckalo</p>
        </footer>
    </div>
</div>
@endsection
