<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Made in CVator">
        <meta name="author" content="Milan Brčkalo">
        <title></title>
	</head>
	<body>
		<!-- Custom CSS -->
		<style type="text/css">
		
			@include('layouts.bootstrap')
		
			div#basic
			{
				display: inline-block;
				width: 71%;
				height: 13%;
			}
			h3
			{
				font-family: DejaVu Sans, sans-serif;				
			}
			h5 b
			{
				font-family: DejaVu Sans, sans-serif;
				font-size: 14px;
			}
			h5 
			{
				font-family: DejaVu Sans, sans-serif;
				font-size: 14px;
			}
			#other
			{
				text-align: right;
				display: inline;
			}
			p
			{
				font-family: DejaVu Sans, sans-serif;
			}
			h4#title 
			{
				margin-bottom: 0px;
				font-family: DejaVu Sans, sans-serif;
			}
			hr#line 
			{
				margin-top: 0px;
				height: 8px;
    			background: #337ab7;
			}
			footer 
			{
				text-align: center;
			}
		</style>
		<!-- Basic -->
		<div id="basic">
			@foreach ($basic as $basicView)
            	<h3><b>{{ $basicView->full_name }}</b></h3>
            	<h5>{{ $basicView->date_of_birth }}</h5>
            	<h5>{{ $basicView->address }}</h5>
            	<h5>{{ $basicView->postal_code }}</h5>
            	<h5>{{ $basicView->city }}, {{ $basicView->country }}</h5><br>
            	<h5>{{ $basicView->phone_number }}</h5>
            	<h5>{{ $basicView->email }}</h5>
            	<h5>{{ $basicView->website }}</h5>
			@endforeach
		</div>
		<div id="basic">
			<?php	
	    		$file = 'avatar/'.$avatar.'.jpg';
				$file2 = 'avatar/'.$avatar.'.jpeg';
				
	    		if (file_exists($file))
	    		{
					echo '<img src="'.$file.'" width="200" height="200"/>';
				}
				elseif (file_exists($file2))
				{
                    echo '<img src="'.$file2.'" width="200" height="200"/>';
				}
                else
                {
                    echo '';
                }
			?>
		</div>
		<hr>
		<!-- Education -->
		<div>
			@foreach ($education as $educationView)
				@if ($educationView->id > 0)
					<h4 id="title"><b>Education</b></h4>
					<hr id="line">
					@break
				@endif
			@endforeach
			@foreach ($education as $educationView)
				<h5><b>{{ $educationView->school_name }}</b></h5>
				@if (empty($educationView->area_of_study))
					<p>{{ $educationView->duration }}</p>
				@else
					<p>{{ $educationView->area_of_study }}, {{ $educationView->duration }}</p>
				@endif
				<p>{{ $educationView->city }}, {{ $educationView->country }}</p>
				<p>{{ $educationView->comment }}</p>
			@endforeach
		</div>
		<!-- Experience -->
		<div>
			@foreach ($experience as $experienceView)
				@if ($experienceView->id > 0)
					<h4 id="title"><b>Experience</b></h4>
					<hr id="line">
					@break
				@endif
			@endforeach
			@foreach ($experience as $experienceView)
				<h5><b>{{ $experienceView->company_name }}</b></h5>
				@if (empty($experienceView->position))
					<p>{{ $experienceView->duration }}</p>
				@else
					<p>{{ $experienceView->position }}, {{ $experienceView->duration }}</p>
				@endif
				<p>{{ $experienceView->city }}, {{ $experienceView->country }}</p>
				<p>{{ $experienceView->comment }}</p>
			@endforeach
		</div>
		<!-- Other -->
		<div>
			<h4 id="title"><b>Other</b></h4>
			<hr id="line">
			<h5><b>Skills:</b></h5>
			@foreach ($skill as $skillView)
				@if (empty($skillView->skill))
				
				@else
					<p id="other">{{ $skillView->skill }},</p>
				@endif
			@endforeach
			<h5><b>Languages:</b></h5>
			@foreach ($language as $languageView)
				@if (empty($languageView->language))
				
				@else	
					<p id="other">{{ $languageView->language }},</p>
				@endif
			@endforeach
			<h5><b>Hobbies:</b></h5>
			@foreach ($hobby as $hobbyView)
				@if (empty($hobbyView->hobby))
				
				@else	
					<p id="other">{{ $hobbyView->hobby }},</p>
				@endif
			@endforeach
			@foreach ($other as $otherView)
				@if (empty($otherView->personal_description))
				
				@else
					<h5><b>About me:</b></h5>
					<p id="other">{{ $otherView->personal_description }}</p>
				@endif
			@endforeach	
			@foreach ($other as $otherView)
				@if (empty($otherView->other_description))
				
				@else
					<h5><b>Other:</b></h5>
					<p id="other">{{ $otherView->other_description }}</p>
				@endif
			@endforeach			
		</div>
		<footer>
			<p><b style="color: #337ab7;">cv</b>ator</p>
		</footer>
	</body>
</html>
