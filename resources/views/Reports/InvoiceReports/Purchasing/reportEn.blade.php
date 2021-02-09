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
    margin-top:220px;
}
html,body,.body{
    box-sizing: border-box;
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
.body-page{
    padding: 35px 0 0;
    direction: ltr;
    /* background: #ddd; */
    width: 100%;
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
    font-size: 12px;
    /* background: #255; */
}
.name{
    background-color: #cecece;
    padding: 3px;
    margin: 3px;
    width: 95px;
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
    font-size: 16px;
    text-align: center;
    margin: 10px auto;
    background: #021625;
    color: #fff;
    clear: both;
}
.right{
    /* margin: 210px 0 20px; */
}
.right, .left{
    float: right;
    width:50%;
}
table{
    direction: rtl;
}
table{
    border:none;
    background-color: #021625;
    color: #fff;
}
tbody tr{
    background: #eee;
}
tbody tr td{
    color: #000;
}
table,th,tr,td{
    border:none;
    outline: none;
    border-color: #fff;
}
th{
    color: #fff;
    font-size: 12px;
    padding: 10px;
}
td{
    font-size: 16px;
    padding: 10px 8px;
    border-bottom: #021625 solid 1px;
}

    </style>
</head>
<body>
    <hr>
    <div class="body" style="margin-bottom:-35px;">
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
                        <span><img height="75" style="text-align: right;" src="{{public_path('/uploads/companies/'.$Logo)}}" /></span>
                    </div>
                    <div class="rep_name">
                        <span>{{$Title}}</span>
                    </div><br><br>
                   
                    <div  class="company"  >

                        <span>
                        <div class="off_name">
                                <span>
                                {{$Company->company_official_name}}
                                </span>
                            </div>
                            <div class="name">
                                <span>{{ __('titles.company') }}  </span>
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
@foreach ($Invoices as $i => $Invoice)
<div class="right">
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                    {{date('d-m-Y', strtotime($Invoice->inv_date))}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.date') }}  </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                {{$Invoice->invoice_no}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.bill_no') }}  </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                {{$Invoice->person_type_name}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.person_type') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                {{$Invoice->outgoing_type_name}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.outgoings_type') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                {{$Invoice->service_type ??  __('titles.not_done')}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.Services_type') }}</span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                {{$Invoice->total_items_discount ??  __('titles.not_done')}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.discount') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                {{$Invoice->total_vat}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.total_vat_value') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                {{$Invoice->net_invoice ??  __('titles.not_done')}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.net_value') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                    @if ($Invoice->return_back_invoice == 1)
                    {{ __('titles.yes') }}
                    @else
                    {{ __('titles.no') }}
                    @endif
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.returned') }}  </span>
            </div>
        </span>
    </div>
</div>
<div class="left">
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                    @if ($Invoice->approved == 1)
                    {{ __('titles.confirm') }}
                    @else
                    {{ __('titles.not_confirm') }}
                    @endif

                </span>
            </div>
            <div class="name">
                <span> {{ __('titles.confirm') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
            
            <div class="off_name">
                <span>
{{$Invoice->serial}}
                </span>
            </div>
            <div class="name">
                <span># </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                        {{$Invoice->person_name}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.name') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
            
            <div class="off_name">
                <span>
                {{$Invoice->purchasing_types_name}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.type') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                {{$Invoice->total_items_price}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.total_items') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                {{$Invoice->total_price_post_discounts}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.total_price_post_discounts') }}</span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
            
            <div class="off_name">
                <span>
                {{$Invoice->total_comm_industr_tax}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.total_comm_industr_tax') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
            
            <div class="off_name">
                <span>
                    {{$Invoice->notes}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.notes') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
        <div class="off_name">
                <span>
                    {{date('d-m-Y', strtotime($Invoice->return_back_date))}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.date') }}{{ __('titles.returned') }} </span>
            </div>
           
        </span>
    </div>

</div>
<table>
    <thead>
        <tr>
            <th>{{ __('titles.stocked')}}</th>
            <th>{{ __('titles.code')}}</th>
            <th>{{ __('titles.name')}}</th>
            <th>{{ __('titles.price')}}</th>
            <th>{{ __('titles.qty')}}</th>
            <th>{{ __('titles.total')}}</th>
            <th>{{ __('titles.discount')}}</th>
            <th>{{ __('titles.total_price_post_discounts')}}</th>
            <th>{{ __('titles.exemption')}}</th>
            <th>{{ __('titles.vat_value')}}</th>
            <th>{{ __('titles.comm_industr_prof_tax')}}</th>
            <th>{{ __('titles.net_value')}}</th>
        </tr>
    </thead>
    <tbody>
        @php
            $InvoiceItems = $Invoice->invoice_items;
        @endphp
        @foreach ($InvoiceItems as $Item)
            <tr>
                <td>
                    @if ($Item->store_item == 1)
                    {{ __('titles.yes')}}
                    @else
                    {{ __('titles.no')}}
                    @endif
                </td>
                <td>{{$Item->id}}</td>
                <td>{{$Item->item_text}}</td>
                <td>{{$Item->item_price}}جم</td>
                <td>{{$Item->item_quantity}}</td>
                <td>{{$Item->total_item_price}}جم</td>
                <td>{{$Item->item_discount}}جم</td>
                <td>{{$Item->total_after_discounts}}جم</td>
                <td>
                    @if ($Item->tax_exemption == 1)
                    {{ __('titles.yes')}}
                    @else
                    {{ __('titles.no')}}
                    @endif
                </td>
                <td>{{$Item->vat_tax_value}}جم</td>
                <td>{{$Item->comm_industr_tax}}جم</td>
                <td>{{$Item->net_value}}جم</td>
            </tr>
        @endforeach

    </tbody>

</table>
<hr>
@if ($i != count($Invoices) - 1)
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>

@endif
@endforeach
</body>
</html>
