@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
@if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="{{url('/')}}"> {{ __('titles.home') }} <span class="bread-slash"> / </span></a> 
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.company') }} </span>
    </li>
	@else
   
    <li>
        <span class="bread-blod"> {{ __('titles.company') }} /</span>
        <li>
        <a href="{{url('/')}}"> {{ __('titles.home') }}
    </li>
   
	@endif
										</ul>

@endsection

@section('content')
<div class="courses-area">
			<div class="container-fluid">
				<a href="{{route('home.create')}}" class="btn btn-primary waves-effect waves-light mg-b-15" > {{ __('titles.add') }}</a>
				<div id="result">
			@include('Admin.home.result')
				</div>
			</div>
		</div>
        
        @endsection