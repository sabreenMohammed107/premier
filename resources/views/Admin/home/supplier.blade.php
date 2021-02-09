<div class="breadcome-heading">
    <form role="search" class="sr-input-func">
        <input type="text" id="searchSup" placeholder="{{ __('titles.search') }}" class="search-int form-control" style="text-align:right">
        <a href="" onclick="supplierSearch()"><i class="fa fa-search"></i></a>
    </form>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="review-content-section">
            <div class="chat-discussion" style="height: auto">


                @foreach($suppliers as $row)
                <div class="chat-message">
                    <div class="profile-hdtc">
                        <img class="message-avatar" src="{{ asset('uploads/person/'.$row->person_logo)}}" alt="">
                    </div>
                    <div class="message dir-rtl">
                        <b>{{$row->person_name}} - {{$row->person_nick_name}}</b>
                        <div class="message-content " >
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><b>{{ __('titles.phone') }}1 : </b>{{$row->phone1}}</p>
                                    <p><b>{{ __('titles.phone') }}2 : </b>{{$row->phone2}}</p>
                                    <?php
                                      $currentBalance = App\Models\FinanTransaction::where('person_id', $row->id)->sum('additive') - App\Models\FinanTransaction::where('person_id', $row->id)->sum('subtractive');
                                    ?>
                                    <p><b>{{ __('titles.current_balance') }} : </b>{{$currentBalance }}</p>
                                </div>
                                <div class="col-lg-5">
                                    <p><b>{{ __('titles.registeration_no') }} : </b> {{$row->registeration_no}}</p>
                                    <p><b>{{ __('titles.code') }} : </b>{{$row->id}}</p>
                                    <p><b>{{ __('titles.status') }} : </b>{{ __('titles.active') }}</p>
                                </div>

                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                        <div class="m-t-md mg-t-10">
                            <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Emp{{$row->id}}"><i class="fa fa-eye"></i> عـرض </a>
                        </div>
                    </div>
                </div>

                <div id="Emp{{$row->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">{{ __('titles.show') }}  </h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <img class="message-avatar" src="{{ asset('uploads/person/'.$row->person_logo)}}" alt="">
                <h2>{{$row->person_name}} </h2>
                <h4>{{$row->person_nick_name}}</h4>
                <br />
                <div class="message-content" style="text-align:right">
                    <div class="row">
                    <div class="col-lg-6">
                                    <p><b>{{ __('titles.phone') }}1 : </b>{{$row->phone1}}</p>
                                    <p><b>{{ __('titles.phone') }}2 : </b>{{$row->phone2}}</p>
                                    <?php
                                      $currentBalance = App\Models\FinanTransaction::where('person_id', $row->id)->sum('additive') - App\Models\FinanTransaction::where('person_id', $row->id)->sum('subtractive');
                                    ?>
                                    <p><b>{{ __('titles.current_balance') }} : </b>{{$currentBalance }}</p>
                                </div>
                                <div class="col-lg-5">
                                    <p><b>{{ __('titles.registeration_no') }} : </b> {{$row->registeration_no}}</p>
                                    <p><b>{{ __('titles.code') }} : </b>{{$row->id}}</p>
                                    <p><b>{{ __('titles.status') }} : </b>{{ __('titles.active') }}</p>
                                </div>

                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">{{ __('titles.cancel') }} </a>
            </div>
        </div>
    </div>
</div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="custom-pagination">
        <nav aria-label="Page navigation example">
            <ul id="supp" class="pagination">
                {!! $suppliers->links() !!}
            </ul>
        </nav>
    </div>
</div>

