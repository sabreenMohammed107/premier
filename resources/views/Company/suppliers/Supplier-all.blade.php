@extends('Layout.company')




@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> {{ __('titles.suppliers') }}<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.company') }}</span>
    </li>
    <li>
    <span class="bread-blod">
        @if(isset($Supplier->person_name))
        {{$Supplier->person_name}}
        @else
        {{ __('titles.add') }}
        @endif
    </span>
    </li>
</ul>

@endsection

@section('content')
		<!-- Single pro tab review Start-->
		<div class="single-pro-review-area mt-t-30 mg-b-15">
			<div class="container-fluid">
                <a href="{{ url("/Company/Suppliers")}}" class="btn btn-primary waves-effect waves-light mg-b-15">رجــــــوع</a>
            @component('/Company/components/SupplierForm')
            @slot('image')
            @isset($Supplier->person_logo)
                {{$Supplier->person_logo}}
            @endisset
            @endslot
                @slot('company')
                    {{$CompanyId}}
                @endslot
            @if($type == 'View' || $type == 'Edit')
            @slot('name')
                {{$Supplier->person_name}}
            @endslot
            @slot('nick_name')
                {{$Supplier->person_nick_name}}
            @endslot
            @slot('registeration_no')
                {{$Supplier->registeration_no}}
            @endslot
            @slot('phone1')
                {{$Supplier->phone1}}
            @endslot
            @slot('phone2')
                {{$Supplier->phone2}}
            @endslot
            @slot('contact_person_name')
                {{$Supplier->contact_person_name}}
            @endslot
            @slot('contact_person_mobile')
                {{$Supplier->contact_person_mobile}}
            @endslot
            @slot('website')
                {{$Supplier->website}}
            @endslot
            @slot('address')
                {{$Supplier->address}}
            @endslot
            @slot('tax_authority')
                {{$Supplier->tax_authority}}
            @endslot
            @slot('active')
                {{$Supplier->active}}
            @endslot
            @slot('check')
                @if($Supplier->active == 1)
                checked
                @endif
            @endslot
            @slot('checkt')
                @if($Supplier->taxable == 1)
                checked
                @endif
            @endslot
            @slot('email')
                {{$Supplier->email}}
            @endslot
            @slot('openBalance')
                {{$Supplier->open_balance}}
            @endslot
            @slot('openBalanceDate')
                {{$Supplier->balance_start_date}}
            @endslot
            @slot('commercial_register')
                {{$Supplier->commercial_register}}
            @endslot
            @slot('legal_entity')
                {{$Supplier->legal_entity}}
            @endslot
            @slot('current')
                {{$SupplierTrans->current}}
            @endslot
            @slot('tax_card')
                {{$Supplier->tax_card}}
            @endslot
            @slot('notes')
                {{$Supplier->notes}}
            @endslot
                    @if($type == 'View')
                        @slot('title')
                        {{ __('titles.supplier_data') }} : {{$Supplier->person_name}}
                        @endslot
                        @slot('disabled')
                            disabled
                        @endslot
                        @slot('style')
                            display:none;
                        @endslot
                    @else
                        @slot('open')
                            @if ($Open == 1)
                                disabled
                            @endif
                        @endslot
                        @slot('title')
                        {{ __('titles.edit') }} : {{$Supplier->person_name}}
                        @endslot
                        @slot('button')
                        {{ __('titles.edit') }}
                        @endslot
                        @slot('action')
                            {{ url("/Company/Supplier/$Supplier->id/Update") }}
                        @endslot
                        @slot('person')
                            {{$Supplier->id}}
                        @endslot
                    @endif
            {{-- @slot('image')
                {{$Supplier->image}}
            @endslot --}}

            @else
                @slot('title')
                {{ __('titles.add') }}
                @endslot

                @slot('button')
                {{ __('titles.add') }}
                @endslot
                @slot('action')
                    {{ url("/Company/Supplier/Create") }}
                @endslot
            @endif
            <strong>{{ __('titles.something_error') }}</strong> {{ __('titles.try_again') }}
            @endcomponent
			</div>
		</div>
@endsection

@section('modal')
<!--Modal-->

        <!--/Modal-->

        @endsection
        @section('scripts')
            <script>
                function customReset(){
                    $('input[name ="person_name"]').val("");
                    $('input[name ="person_nick_name"]').val("");
                    $('input[name ="registeration_no"]').val("");
                    $('input[name ="phone1"]').val("");
                    $('input[name ="address"]').val("");
                    $('input[name ="phone2"]').val("");
                    $('input[name ="fax"]').val("");
                    $('input[name ="email"]').val("");
                    $('input[name ="role_name"]').val("");
                    $('input[name ="legal_entity"]').val("");
                    $('input[name ="open_balance"]').val("");
                    $('input[name ="balance_start_date"]').val("");
                    $('input[name ="tax_authority"]').val("");
                }
            </script>
        @endsection
