@extends('layouts.app')

@section('content')
<div class="container" id="home">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a data-toggle="pill" href="#basic"><span class="glyphicon glyphicon-user"></span> Basic</a></li>
                        <li><a data-toggle="pill" href="#education"><span class="glyphicon glyphicon-education"></span> Education</a></li>
                        <li><a data-toggle="pill" href="#experience"><span class="glyphicon glyphicon-briefcase"></span> Experience</a></li>
                        <li><a data-toggle="pill" href="#other"><span class="glyphicon glyphicon-knight"></span> Other</a></li>                   
                    </ul>
                    <hr>
                    <a href="{{ url('/cv') }}" type="button" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span> Preview</a>
                    <a href="{{ url('/rollback') }}" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear</a>
                    <hr>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Basic -->
                        <div id="basic" class="tab-pane fade in active">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><b>Basic</b></div>
                                <div class="panel-body">
                                    {!! Form::open(array('url' => 'basic', 'role' => 'form', 'files' => true)) !!}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {!! Form::label('full_name', 'Full name') !!}
                                                    {!! Form::text('full_name', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('date_of_birth', 'Birthday') !!}
                                                    {!! Form::text('date_of_birth', '', array('class' => 'form-control', 'placeholder' => 'dd.mm.yyyy.', 'maxlength' => '11')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('address', 'Address') !!}
                                                    {!! Form::text('address', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('postal_code', 'Postal code') !!}
                                                    {!! Form::text('postal_code', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('city', 'City') !!}
                                                    {!! Form::text('city', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('country', 'Country') !!}
                                                    @include('countries', ['default' => null])
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {!! Form::label('phone_number', 'Phone number') !!}
                                                    {!! Form::text('phone_number', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('email', 'E-mail') !!}
                                                    {!! Form::email('email', '', ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('website', 'Website') !!}
                                                    {!! Form::url('website', '', ['class' => 'form-control', 'placeholder' => 'http://example.com']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('avatar', 'Avatar') !!}
                                                    {!! Form::file('avatar', ['class' => '', 'style' => 'color: transparent; height: 34px;', 'accept' => '.jpg']) !!}
                                                </div>
                                                <div class="alert alert-info">The best shape of photo is square (200x200).</div>                 
                                                {!! Form::submit('Insert', array('class' => 'btn btn-default')) !!}
                                            </div>
                                        </div>
                                    {!! Form::close() !!} 
                                </div>
                            </div>
                        </div>
                        <!-- Education -->
                        <div id="education" class="tab-pane fade">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><b>Education</b></div>
                                <div class="panel-body">
                                    {!! Form::open(array('url' => 'education', 'role' => 'form')) !!}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('school_name', 'School name') !!}
                                                    {!! Form::text('school_name', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('area_of_study', 'Area of Study') !!}
                                                    {!! Form::text('area_of_study', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('duration', 'Duration') !!}
                                                    {!! Form::text('duration', '', array('class' => 'form-control', 'placeholder' => 'yyyy - yyyy.')) !!}
                                                </div>                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('city', 'City') !!}
                                                    {!! Form::text('city', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('country', 'Country') !!}
                                                    @include('countries', ['default' => null])
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('comment', 'Comment') !!}
                                                    {!! Form::textarea('comment', null, ['size' => '30x5', 'class' => 'form-control']) !!}
                                                </div>
                                                {!! Form::submit('Insert', array('class' => 'btn btn-default')) !!}                                                
                                            </div>
                                            <div class="col-md-4">
                                                @foreach ($education as $educationView)
                                                    @if ($educationView->id > 0)
                                                        <div class="list-group-item active">
                                                            <h5 class="list-group-item-heading">{{ $educationView->school_name }}</h5>
                                                        </div>    
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    {!! Form::close() !!}                                               
                                </div>
                            </div>                                        
                        </div>
                        <!-- Experience -->
                        <div id="experience" class="tab-pane fade">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><b>Experience</b></div>
                                <div class="panel-body">
                                    {!! Form::open(array('url' => 'experience', 'role' => 'form')) !!}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('company_name', 'Company name') !!}
                                                    {!! Form::text('company_name', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('position', 'Position') !!}
                                                    {!! Form::text('position', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('duration', 'Duration') !!}
                                                    {!! Form::text('duration', '', array('class' => 'form-control', 'placeholder' => 'yyyy - present')) !!}
                                                </div>                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! Form::label('city', 'City') !!}
                                                    {!! Form::text('city', '', array('class' => 'form-control')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('country', 'Country') !!}
                                                    @include('countries', ['default' => null])
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('comment', 'Comment') !!}
                                                    {!! Form::textarea('comment', null, ['size' => '30x5', 'class' => 'form-control']) !!}
                                                </div>
                                                {!! Form::submit('Insert', array('class' => 'btn btn-default')) !!}                                               
                                            </div>
                                            <div class="col-md-4">
                                                @foreach ($experience as $experienceView)
                                                    @if ($experienceView->id > 0)
                                                        <div class="list-group-item active">
                                                            <h5 class="list-group-item-heading">{{ $experienceView->company_name }}</h5>
                                                        </div> 
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    {!! Form::close() !!}                                        
                                </div>
                            </div>                                        
                        </div>
                        <!-- Other -->
                        <div id="other" class="tab-pane fade">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><b>Other</b></div>
                                <div class="panel-body">
                                    {!! Form::open(array('url' => 'other', 'role' => 'form')) !!}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {!! Form::label('skill', 'Skills') !!}
                                                    {!! Form::text('skill', '', array('class' => 'form-control', 'placeholder' => 'PHP, content writing')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('language', 'Languages') !!}
                                                    {!! Form::text('language', '', array('class' => 'form-control', 'placeholder' => 'English, Serbian')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('hobby', 'Hobbies') !!}
                                                    {!! Form::text('hobby', '', array('class' => 'form-control', 'placeholder' => 'drawing, chess')) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('personal_description', 'Personal description') !!}
                                                    {!! Form::textarea('personal_description', null, ['size' => '30x3', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('other_description', 'Other') !!}
                                                    {!! Form::textarea('other_description', null, ['size' => '30x3', 'class' => 'form-control']) !!}
                                                </div>
                                                {!! Form::submit('Insert', array('class' => 'btn btn-default')) !!}                                           
                                            </div><br>
                                            <div class="col-md-6">
                                                <div class="alert alert-info">When you enumerate items, use commas.</div>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}                                                
                                </div>
                            </div>                                        
                        </div>                                                                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
