@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
   

    @if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a> {{ __('titles.home') }}<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod">{{ __('titles.cash_payments') }} </span>
    </li>
	@else
  
    <li>
        <span class="bread-blod">{{ __('titles.cash_payments') }}/ </span>
    </li>
    <li>
        <a href="#"></a> {{ __('titles.home') }}
    </li>
	@endif
</ul>

@endsection

@section('content')
<style>
    .pagination ul li {
        float: right !important;
    }

    .search input:-ms-input-placeholder {
        color: white !important;
    }

   
</style>
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <input type="hidden" value="{{csrf_token()}}" id="csrf-token">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd dir-rtl">
                            <h1>{{ __('titles.cash_payments') }}</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright" >
                            <div class="chosen-select-single mg-b-20 dir-rtl" >
                                <label>{{ __('titles.company') }}</label>
                                <select data-placeholder="Choose a Country..." id="select_company" name="select_company" class="selectpicker" data-live-search="true" data-width="100%" tabindex="-1">
                                    <option value="">{{ __('titles.select') }}</option>
                                    @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->company_official_name}} </option>

                                    @endforeach
                                </select>
                            </div>

                            <table class="table-striped dir-rtl" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true">#</th>
                                        <th data-field="name" data-sortable="true">{{ __('titles.date') }}</th>
                                        <th data-field="email" data-sortable="true">{{ __('titles.declaration') }}</th>
                                        <th data-field="phone" data-sortable="true">{{ __('titles.recived_permission') }}</th>
                                        <th data-sortable="true">{{ __('titles.detailed_standard') }}</th>
                                        <th data-sortable="true">{{ __('titles.guid_item') }}</th>
                                        <th data-sortable="true"> {{ __('titles.confirm') }}</th>
                                        <th data-field="price" data-sortable="true">{{ __('titles.amount') }}</th>
                                        <th data-field="action">{{ __('titles.options') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="indexTable">
                                    @include('Admin.cash-purch.indexTable')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Static Table End -->

<!--Delete-->
<div id="del" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">{{ __('titles.delete_data') }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
                <h2>{{ __('titles.cash_payments') }}</h2>
                <h4>{{ __('titles.delete_data_qest') }} </h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
                <a href="#">{{ __('titles.delete') }}</a>
            </div>
        </div>
    </div>
</div>
<!--/Delete-->
<!--View-->
<div id="vw" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">{{ __('titles.cash_payments') }} - {{ __('titles.show') }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">

                <span class="educate-icon educate-warning modal-check-pro information-icon-pro"> </span>
                <h4> {{ __('titles.cash_payments') }}</h4>
                <div class="message-content" style="text-align:right;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <div id="dropzone1" class="pro-ad addcoursepro">
                                <form action="/upload" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
                                            <div class="form-group">
                                                <label class="">{{ __('titles.company') }}</label>
                                                <input name="" type="text" class="form-control"  disabled>
                                            </div>
                                           
                                           
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
                                            <div class="form-group">
                                                <label class="">{{ __('titles.date') }}</label>
                                                <input name="" type="date" class="form-control"  disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">{{ __('titles.permission_no') }}</label>
                                                <input name="" type="text" class="form-control"  disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">{{ __('titles.mony_amount') }}</label>
                                                <input name="" type="text" class="form-control"  disabled>
                                            </div>
                                       
                                            <div class="form-group">
                                                <label class="">{{ __('titles.recived_permission') }}</label>
                                                <input name="" type="text" class="form-control"  disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">{{ __('titles.vat_value') }}</label>
                                                <input name="" type="number" class="form-control"  disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">{{ __('titles.net_value') }}</label>
                                                <input name="" type="text" class="form-control"  disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">{{ __('titles.detailed_standard') }}</label>
                                                <input name="" type="text" class="form-control"  disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                            <div class="form-group">
                                                <label class="">{{ __('titles.notes') }}</label>
                                                <textarea name=""  style="max-height:100px" disabled></textarea>
                                            </div>

                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                            <div class="form-group">
                                                <label class="">{{ __('titles.notes') }}</label>
                                                <textarea name=""  style="max-height:100px" disabled></textarea>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
            </div>
        </div>
    </div>
</div>
<!--/View-->
<!--/Modal-->
</div>
@endsection
@section('scripts')



<script>
    $(document).ready(function() {
     
        $('#select_company').selectpicker();
       
        $('select[name="select_company"]').on('change', function() {
            var company = $(this).val();


            $.ajax({
                url: "{{route('dynamicCompany.fetch')}}",
                method: "get",
                data: {
                    company_id: company,

                },
                success: function(result) {
                    $('#table').bootstrapTable('destroy');

                    $('tbody').html(result);
                    $('#table').bootstrapTable();
                    $('#select_company').selectpicker();

                }
            });

        });


    });

    function fillForm(id) {

        var criterion = $('input[name=detailed_criterion' + id + ']').val();

        $.ajax({
            url: "{{route('update.criterion')}}",
            method: "Post",
            data: {
                criterion: criterion,
                _token: $('#csrf-token').val(),
                id: id,
                company_id: $('#select_company').val(),

            },
            success: function(result) {
                $('#table').bootstrapTable('destroy');
                $('#indexTable').html(result);
                $('#table').bootstrapTable();
                $('#select_company').selectpicker();
            
            }
        });

    }

    function fillSelect(id) {

        var guided_item_id = $('select[name=guided_item_id' + id + ']').val();

        $.ajax({
            url: "{{route('update.guided')}}",
            method: "Post",
            data: {
                guided_item_id: guided_item_id,
                _token: $('#csrf-token').val(),
                id: id,
                company_id: $('#select_company').val(),

            },
            success: function(result) {
                $('#table').bootstrapTable('destroy');
                $('#indexTable').html(result);
                $('#table').bootstrapTable();
                $('#select_company').selectpicker();
            }
        });

    }

    function fillCheck(id) {
        var confirmed = 0;

        if ($('input[name=confirmed' + id + ']').prop('checked')) {

            confirmed = 1;
        } else {
            confirmed = 0;
        }

        $.ajax({
            url: "{{route('update.confirmed')}}",
            method: "Post",
            data: {
                confirmed: confirmed,
                _token: $('#csrf-token').val(),
                id: id,
                company_id: $('#select_company').val(),

            },
            success: function(result) {
                $('#table').bootstrapTable('destroy');
                $('#indexTable').html(result);
                $('#table').bootstrapTable();
                $('#select_company').selectpicker();
            }
        });

    }
</script>
@endsection