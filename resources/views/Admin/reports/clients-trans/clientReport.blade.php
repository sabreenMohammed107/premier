<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>{{$Title}}</title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
            margin-top: 200px;
            /* Adjust height to be for header - المسافه اللي الفروض يبعد بيها*/
        }

        html,
        body,
        .body {
            box-sizing: border-box;
        }

        .body-page {
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
        .header {

            padding: 25px 10px;
            width: 20%;
            font-size: 10px;
            text-align: center;
            background: #021625;
            color: #fff;
            float: left;


        }

        .footer {
            padding: 5px 10px;
            width: 20%;
            font-size: 10px;
            text-align: center;
            background: #021625;
            color: #fff;
        }

        .report-header {
            float: right;
            width: 40%;
            display: inline-block;
        }

        .date {
            float: right;
            padding: 10px;
            width: 40%;
            font-size: 12px;
            text-align: center;
        }

        .image {
            width: 100%;
            text-align: center;
            clear: both;
            /* padding: 5px 50px 30px 10px; */

            /* background: #021625; */
        }

        .company {
            width: 100%;
            /* background: #255; */
        }

        .name {
            background-color: #cecece;
            padding: 10px;
            margin: 10px;
            width: 95px;
            font-size: 12px;
            float: right;
        }

        .off_name {
            padding: 10 20px;
            float: right;
            width: 180px;
        }

        .rep_name {
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

        .right {
            /* margin: 250px 0; */
        }

        .right,
        .left {
            float: right;
            width: 50%;
        }

        .rightTable {
            /* margin: 100px 0 0 0; */
        }

        table,
        th,
        td {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 10px 3px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="body">
        <span>
            <div class="body-page">


                <htmlpageheader name="page-header" style="height: 200px;
            position: fixed;">
                    <div class="header">
                        <span>{{ __('titles.page_no') }} : {PAGENO} / {nbpg}</span>
                    </div>
                    <div class="report-header">
                        <span>
                            <div class="date">
                                <span>{{ __('titles.date') }} : {{$Today}}</span>
                            </div>
                            <div class="date">
                                <span dir="rtl">{{ __('titles.user_name') }} : {{$User->user_name}}</span>
                            </div>
                        </span>
                    </div>
                    <br>


                    <br><br>

                    <div class="right">
                        <div dir="rtl">
                            <span><img height="70" style="text-align: right;" src="{{public_path('/uploads/companies/'.$Logo)}}" /></span>
                        </div>
                    </div>
                    <div class="rep_name">
                        <span>{{$Title}}</span>
                    </div>
                </htmlpageheader>
                <br><br> <br><br> <br><br>
                <htmlpagefooter name="page-footer">
                    <div class="footer">
                        <span>{{$Title}}</span>
                    </div>

                </htmlpagefooter>

            </div>
        </span>

        <div class="content">

            @foreach($trans as $rows)
            <hr>

            <div class="left">
                <div dir="rtl" class="company">
                    <span>
                        <div class="name">
                            <span> {{ __('titles.date_from') }} :</span>
                        </div>
                        <div class="off_name">
                            <span>
                                {{$from_date}}
                            </span>
                        </div>
                    </span>
                </div>

                <div dir="rtl" class="company">
                    <span>
                        <div class="name">
                            <span> {{ __('titles.date_to') }} :</span>
                        </div>
                        <div class="off_name">
                            <span>
                                {{$to_date}}
                            </span>
                        </div>
                    </span>
                </div>
            </div>
            <div class="right">


                <div dir="rtl" class="company">
                    <span>
                        <div class="name">
                            <span>{{ __('titles.company') }}:</span>
                        </div>
                        <div class="off_name">
                            <span>
                                {{$Company->company_official_name ?? ''}}
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
                                {{$rows->client_name ?? ''}}
                            </span>
                        </div>
                    </span>
                </div>
                <div dir="rtl" class="company">
                    <span>
                        <div class="name">
                            <span> {{ __('titles.current_balance') }} :</span>
                        </div>
                        <div class="off_name">
                            <?php
                            $currentBalance = App\Models\FinanTransaction::where('person_id', $rows->client_id)->sum('additive') - App\Models\FinanTransaction::where('person_id', $rows->client_id)->sum('subtractive');
                            if(!$rows->client_id){
                                $currentBalance =0;
                              }
                           
                           ?>

                            <span>
                                {{$currentBalance}}
                            </span>
                        </div>
                    </span>
                </div>
            </div>
            <div dir="rtl" class="rightTable">
                <table id="courseEval" style="width: 100%" border="1"  @if(str_replace('_', '-', app()->getLocale())=='ar') class="dattable table table-striped thead-dark dir-rtl"  @else
    class="dattable table table-striped thead-dark dir-ltr"   @endif >
                    <thead>
                        <tr>

                        <th> {{ __('titles.date') }} </th>
                            <th>{{ __('titles.permission_no') }}</th>
                            <th>{{ __('titles.bill_no') }}</th>
                            <th>{{ __('titles.depit') }}</th>
                            <th> {{ __('titles.credit') }}</th>
                            <th>{{ __('titles.current_balance') }}</th>
                            <th>{{ __('titles.type') }}</th>
                            <th>{{ __('titles.declaration') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php $tbalance=0; ?>
                        @foreach ($rows->trans as $row)
                        <tr>

                            <td> {{date('d-m-Y', strtotime($row->transaction_date))}}</td>
                            <td> {{$row->permission_code}}</td>
                            <td> {{$row->invoice_no}}</td>
                            <td> {{$row->additive}}</td>
                            <td> {{$row->subtractive}}</td>
                            <td><?php $chkbala = $row->additive - $row->subtractive;
                                echo $tbalance += $chkbala; ?>
                            </td>
                            <td> {{$row->type->transaction_type??''}}</td>
                            <td> {{$row->purch_sales_statement}}</td>

                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>

</body>

</html>