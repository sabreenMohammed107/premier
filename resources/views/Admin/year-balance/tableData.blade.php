<div class="form-group-inner" style="margin-right:10px;">
    <div class="row dir-rtl" >

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 shadow mg-b-15" >
            <div class="row row-ltr" style="margin-top:5px;">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="input-mask-title">
                        <label><b>{{$company->year ?? ''}}</b></label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="input-mask-title">
                        <label><b>{{ __('titles.open_year') }}</b></label>
                    </div>
                </div>
            </div>
            <div class="row row-ltr">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="input-mask-title">
                        <label><b>@if($company->year_type==2){{ __('titles.start_opening') }} @elseif( $company->year_type==1){{ __('titles.opening') }} @elseif( $company->year_type==0){{ __('titles.closing') }} @else  @endif</b></label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="input-mask-title">
                        <label><b>{{ __('titles.type') }}</b></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 shadow mg-b-15">
            <div class="row row-ltr">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="input-mask-title">
                        <label><b><?php
                                    $date = date_create($company->period_from_date) ?>
                                {{ date_format($date,"d-m-Y") }}</b></label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="input-mask-title">
                        <label><b>{{ __('titles.date_from') }}</b></label>
                    </div>
                </div>
            </div>
            <div class="row row-ltr">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="input-mask-title">
                        <label><b><?php
                                    $date = date_create($company->period_to_date) ?>
                                {{ date_format($date,"d-m-Y") }}</b></label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="input-mask-title">
                        <label><b>{{ __('titles.date_to') }}</b></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="sparkline13-hd">
								<div class="main-sparkline13-hd dir-rtl">
									<h1 background:#eaa6a6;" id="error-msg">{{ $strr ?? '' }}</h1><br />
								</div>
							</div>
<div class="chosen-select-single mg-b-20 dir-rtl" >

    <button {{ !($company->year_type==0) ? '' : 'disabled' }} onclick="closeYear({{$company->id}})"   class="btn btn-primary waves-effect waves-light">{{ __('titles.close_this_year') }}</button>
    <button   {{ !($company->year_type==2 ||$company->year_type==1) ? '' : 'disabled' }} onclick="openYear({{$company->id}})" class="btn btn-primary waves-effect waves-light" >{{ __('titles.exit_close_year') }}</button>
    <button  {{ !($company->year_type==2 ||$company->year_type==1) ? '' : 'disabled' }} onclick="openYearBalance({{$company->id}})" class="btn btn-primary waves-effect waves-light"> {{ __('titles.open_new_balance') }} </button>
    <button {{ !($company->year_type==2 ) ? '' : 'disabled' }} onclick="cancelBalance({{$company->id}})" class="btn btn-primary waves-effect waves-light">{{ __('titles.exit_year_balance') }}</button>
</div>
<table class="table dir-rtl" id="table"  >
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __('titles.annual_balance') }}</th>
            <th>{{ __('titles.date_from') }}</th>
            <th> {{ __('titles.date_to') }}</th>
            <th> {{ __('titles.type') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($years as $index=>$row)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$row->year}}</td>
            <td><?php
                $date = date_create($row->period_from_date) ?>
                {{ date_format($date,"d-m-Y") }}</td>
            <td><?php
                $date = date_create($row->period_to_date) ?>
                {{ date_format($date,"d-m-Y") }}</td>
            <td>
            @if($row->year_type==2){{ __('titles.start_opening') }} @elseif( $row->year_type==1){{ __('titles.opening') }} @elseif( $row->year_type==0){{ __('titles.closing') }} @else  @endif

            </td>
        </tr>

        @endforeach
    </tbody>
</table>