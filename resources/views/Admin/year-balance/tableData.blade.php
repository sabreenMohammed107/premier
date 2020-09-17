<div class="form-group-inner" style="margin-right:10px;">
    <div class="row res-rtl" style="display: flex ;flex-direction: row-reverse ;">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 shadow mg-b-15" style="direction:rtl">
            <div class="row" style="margin-top:5px;">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="input-mask-title">
                        <label><b>{{$company->year ?? ''}}</b></label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="input-mask-title">
                        <label><b>السنة المفتوحة</b></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="input-mask-title">
                        <label><b>@if($company->year_type==2)إفتتاحية @elseif( $company->year_type==1)مفتوحة @elseif( $company->year_type==0)مغلقة @else  @endif</b></label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="input-mask-title">
                        <label><b>النوع</b></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 shadow mg-b-15">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="input-mask-title">
                        <label><b><?php
                                    $date = date_create($company->period_from_date) ?>
                                {{ date_format($date,"d-m-Y") }}</b></label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="input-mask-title">
                        <label><b>الفترة مــــــن</b></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="input-mask-title">
                        <label><b><?php
                                    $date = date_create($company->period_to_date) ?>
                                {{ date_format($date,"d-m-Y") }}</b></label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="input-mask-title">
                        <label><b>الفترة إلـــــي</b></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="sparkline13-hd">
								<div class="main-sparkline13-hd">
									<h1 style="direction:rtl;background:#eaa6a6;" id="error-msg">{{ $strr ?? '' }}</h1><br />
								</div>
							</div>
<div class="chosen-select-single mg-b-20" style="direction:rtl;">

    <button {{ !($company->year_type==0) ? '' : 'disabled' }} onclick="closeYear({{$company->id}})"   class="btn btn-primary waves-effect waves-light">إغلاق السنة الحالية</button>
    <button   {{ !($company->year_type==2 ||$company->year_type==1) ? '' : 'disabled' }} onclick="openYear({{$company->id}})" class="btn btn-primary waves-effect waves-light" >إلغاء إغلاق السنة</button>
    <button  {{ !($company->year_type==2 ||$company->year_type==1) ? '' : 'disabled' }} onclick="openYearBalance({{$company->id}})" class="btn btn-primary waves-effect waves-light">فتح + ترصيد جديد</button>
    <button {{ !($company->year_type==2 ) ? '' : 'disabled' }} onclick="cancelBalance({{$company->id}})" class="btn btn-primary waves-effect waves-light">إلغاء ترصيد السنة</button>
</div>
<table class="table" id="table"  style="direction:rtl">
    <thead>
        <tr>
            <th>#</th>
            <th>الترصيد السنوي</th>
            <th>الفترة من</th>
            <th>الفترة إلي</th>
            <th> النوع</th>
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
            @if($row->year_type==2)إفتتاحية @elseif( $row->year_type==1)مفتوحة @elseif( $row->year_type==0)مغلقة @else  @endif

            </td>
        </tr>

        @endforeach
    </tbody>
</table>