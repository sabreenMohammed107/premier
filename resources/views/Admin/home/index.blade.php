@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
											<li>
												<a href="#"></a> {{ __('titles.home') }}<span class="bread-slash"> / </span>
											</li>
											<li>
												<span class="bread-blod"> {{ __('titles.home') }}</span>
											</li>
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