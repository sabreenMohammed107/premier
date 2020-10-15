@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="{{url('/')}}">الرئيسية<span class="bread-slash"> / </span></a>
    </li>
    <li>
        <span class="bread-blod"> تعديل مستخدم </span>
    </li>
</ul>

@endsection

@section('content')
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row" style="direction:rtl;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <div class="message-content" style="text-align:right;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div id="dropzone1" class="pro-ad addcoursepro">



                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl">

                                            <div class="form-group">
                                                <label class="">الاسم </label>
                                                <input name="user_name" readonly value="{{$row->user_name}}" type="text" class="form-control" placeholder="الاسم ">
                                            </div>
                                            <div class="form-group">
                                                <label class="">كلمة المرور</label>
                                                <input id="myInput" readonly name="password" type="password" value="{{$row->password}}" class="form-control" placeholder="كلمة المرور">
                                                <input type="checkbox" onclick="myFunction()">Show Password
                                            </div>
                                            <div class="form-group">
                                                <label class="">الصلاحيات</label>
                                                <select name="role_id" class="form-control" disabled>
                                                    <option value="none" selected="" disabled="">الصلاحيات</option>
                                                    @foreach($roles as $role)
                                                    <option value="{{$role->id}}" {{ $role->id == $row->role_id ? 'selected' : '' }}>{{$role->role_name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="">الشركات</label>
                                                <select name="company_id" class="form-control" disabled>
                                                    <option value="none" selected="" disabled="">{{$row->company[0]->company_official_name ?? 'الشركة'}}</option>
                                                    @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->company_official_name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="">الإسم بالكامل</label>
                                                <input name="user_full_name" readonly value="{{$row->user_full_name}}" type="text" class="form-control" placeholder="الاسم بالكامل">
                                            </div>
                                            <div class="form-group">
                                                <label class="">ملاحظات</label>
                                                <textarea name="notes" readonly placeholder="ملاحظات" style="max-height:100px">{{$row->notes}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    @if($row->active ==1)
                                                    <input name="active" value="1" disabled type="checkbox" class="i-checks" checked> مفعل
                                                    @else
                                                    <input name="active" value="0" disabled type="checkbox" class="i-checks"> مفعل
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($row->role_id==100 || $row->role_id==101)
                                    <form action="{{route('savePrevildge')}}" method="post">
                                        @csrf
                                        <button onclick="saving()" type="submit" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 15px;">حفظ</button>

                                        <input type="hidden" value="{{$row->id}}" name="UserPrev">
                                        <input type="hidden" name="companies_ids[]" id="comp">
                                        <table class="table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" data-select-item-name="selectItemName" style="direction:rtl">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-checkbox="true"></th>
                                                    <th data-field="id"></th>
                                                    <th data-field="db">Id</th>
                                                    <th data-field="safe" data-visible="false">safeId</th>
                                                    <th data-field="name">إسم الشركة</th>
                                                    <th>الكيان القانوني</th>
                                                    <th>مأمورية الضرايب</th>
                                                    <th>رقم التسجيل</th>
                                                </tr>
                                            </thead>
                                            <tbody id="indexTable">

                                                @foreach($row->company as $comp)
                                                <tr>


                                                    <td>{{$comp->id}}</td>
                                                    <td></td>
                                                    <td>{{$comp->id}}</td>
                                                    <td>{{$comp->safe_id }}</td>
                                                    <td>{{$comp->company_official_name}}</td>
                                                    <td>{{$comp->legal_entity}}</td>
                                                    <td>{{$comp->tax_authority}}</td>
                                                    <td>{{$comp->registeration_no}}</td>


                                                </tr>
                                                @endforeach

                                                @foreach($alls as $all)
                                                <tr>

                                                    <td></td>
                                                    <td></td>
                                                    <td>{{$all->id}}</td>
                                                    <td>{{$all->safe_id }}</td>
                                                    <td>{{$all->company_official_name}}</td>
                                                    <td>{{$all->legal_entity}}</td>
                                                    <td>{{$all->tax_authority}}</td>
                                                    <td>{{$all->registeration_no}}</td>
                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>

                                    </form>
                                    @endif
                                    <div class="modal-footer info-md">
                                        <a href="{{route('users.index')}}">إلغــاء</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function saving() {
      
        var index = []
        $('input[name="selectItemName"]:checked').each(function() {
            var mynumber = Number.MIN_SAFE_INTEGER;
             mynumber =  JSON.parse(JSON.stringify($('#table').bootstrapTable('getData')[$(this).data('index')].db));
         
            index.push(mynumber);
        })

        $('#comp').val(index);
    }
</script>

@endsection