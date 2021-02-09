<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$Title}}</title>
    <style>
@page {
	header: page-header;
	footer: page-footer;
}
html,body,.body{
    box-sizing: border-box;
}
.body-page{
    padding: 35px 0 0;
    direction: ltr;
    /* background: #ddd; */
    width: 100%;
}
.dir-rtl{
	direction:rtl !important;
}
.dir-ltr{
	direction:ltr !important;
}
.float-r{
	float:right !important;
}
.float-l{
	float:left !important;
}
.header{
    padding: 25px 10px;
    width: 20%;
    font-size: 10px;
    text-align: center;
    background: #021625;
    color: #fff;
    float: left;
}
.footer{
    padding: 5px 10px;
    width: 20%;
    font-size: 10px;
    text-align: center;
    background: #021625;
    color: #fff;
}
.report-header{
    float: right;
    width: 40%;
    display: inline-block;
}
.date{
    float: right;
    padding: 10px;
    width: 40%;
    font-size: 12px;
    text-align: center;
}
.image{
    width: 100%;
    text-align: center;
    clear: both;
    padding: 5px 50px 30px 10px;

    /* background: #021625; */
}
.company{
    width: 100%;
    /* background: #255; */
}
.name{
    background-color: #cecece;
    padding: 10px;
    margin: 10px;
    width: 95px;
    font-size: 12px;
    float: right;
}
.off_name{
    padding: 10 20px;
    float: right;
    width: 180px;
}
.rep_name{
    padding: 10px;
    display: inline-block;
    width: 200px;
    float: left;
    font-size: 12px;
    text-align: center;
    margin: 10px auto;
    background: #021625;
    color: #fff;
    clear: both;
}
.right{
    margin: 250px 0;
}
.right, .left{
    float: right;
    width:50%;
}

    </style>
</head>
<body>
    <hr>
    <div class="body">
        <span>
            <div class="body-page">


                <htmlpageheader name="page-header">
                    <div class="header">
                        <span>{{ __('titles.page_no') }} : {PAGENO} / {nbpg}</span>
                    </div>
                    <div class="report-header">
                        <span>
                            <div class="date">
                                <span>{{ __('titles.date') }} : {{$Today}}</span>
                            </div>
                            <div class="date">
                                <span dir="rtl">{{ __('titles.user_name') }}: {{$User->user_name}}</span>
                            </div>
                        </span>
                    </div>
                    <br>
                    <div class="image" dir="rtl">
                        <span><img height="100" style="text-align: right;" src="{{public_path('/uploads/companies/'.$Logo)}}" /></span>
                    </div>
                    <div class="rep_name">
                        <span>{{$Title}}</span>
                    </div><br><br>
                    <div dir="rtl" class="company">
                        <span>
                            <div class="name">
                                <span>{{ __('titles.company') }} :</span>
                            </div>
                            <div class="off_name">
                                <span>
                                {{$Company->company_official_name}}
                                </span>
                            </div>
                        </span>
                    </div>

                </htmlpageheader>

                <htmlpagefooter name="page-footer">
                    <div class="footer">
                        <span>{{$Title}}</span>
                    </div>
                </htmlpagefooter>
            </div>
        </span>
    </div>
@foreach ($Cashes as $i => $Cash)
<div class="right">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.date') }} :</span>
            </div>
            <div class="off_name">
                <span>
                    {{date('d-m-Y', strtotime($Cash->cash_date))}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.declaration') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->statement}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.name') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->person_name}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.permission_no') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->exit_permission_code}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.outgoings_type') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->outgoing_type_name ??  __('titles.not_done')}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.type') }}:</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->purchasing_types_name ?? __('titles.not_done')}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.net_value') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->net_value}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.guid_item') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->guided_item_name ?? __('titles.not_done')}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.detailed_standard') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->detailed_criterion}}
                </span>
            </div>
        </span>
    </div>
</div>
<div class="left">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.confirm') }}  :</span>
            </div>
            <div class="off_name">
                <span>
                    @if ($Cash->approved == 1)
                    {{ __('titles.confirm') }} 
                    @else
                    {{ __('titles.not_confirm') }} 
                    @endif

                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.type') }}  :</span>
            </div>
            <div class="off_name">
                <span>
                    @if ($Cash->fund_source == 0)
                    {{ __('titles.cash_box') }} 
                    @else
                    {{ __('titles.bank') }} 
                    @endif
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.person_type') }}  :</span>
            </div>
            <div class="off_name">
                <span>
                    @if (!empty($Cash->person_id))
                        {{$Cash->person_type_name}}
                    @else
                    {{ __('titles.other') }}
                    @endif
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.mony_amount') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->cash_amount}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.Services_type') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->service_type}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.comm_industr_prof_tax') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->comm_industr_prof_tax}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.vat_value') }}:</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->vat_value}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.confirmed_items') }}:</span>
            </div>
            <div class="off_name">
                <span>
                    @if ($Cash->confirm == 1)
                    {{ __('titles.confirm') }}
                    @else
                    {{ __('titles.not_confirm') }}
                    @endif
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>{{ __('titles.notes') }} :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->notes}}
                </span>
            </div>
        </span>
    </div>

</div>
@if ($i != count($Cashes) - 1)
<br><br><br><br><br><br><br><br><br><br><br><br><br><hr>

@endif
@endforeach
</body>
</html>
