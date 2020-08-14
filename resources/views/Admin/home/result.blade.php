<div class="row mg-b-15"  >
    @foreach($rows as $row)
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12  mg-b-15" >
						<div class="courses-inner res-mg-b-30">
							<div class="courses-title">
								<a href="#"><img src="{{ asset('uploads/companies/'.$row->company_logo)}}" style="height:300px;width:100%" alt=""></a>
								<h2>{{$row->company_official_name}}</h2>
							</div>
							<div class="course-des">
								<p><span><i class="fa fa-clock"></i></span> <b>رقم التسجيل:</b> {{$row->registeration_no}}</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مأموريه الضرائب:</b> {{$row->tax_authority}}</p>
								<p><span><i class="fa fa-clock"></i></span> <b>الكيان القانونى:</b> {{$row->legal_entity}}</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مفعل:</b><i class="fa fa-check"></i></p>
							</div>
							<div class="product-buttons">
							<a data-toggle="tooltip" title="View" href="{{ route('home.show',$row->id) }}" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></a>
								<a data-toggle="tooltip" title="Edit" href="{{ route('home.edit',$row->id) }}" class="btn pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#del{{$row->id}}"></i></a>
								
								<!--Delete Customer-->
								<div id="del{{$row->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header header-color-modal bg-color-2">
												<h4 class="modal-title" style="text-align:right">حذف بيانات الشركة</h4>
												<div class="modal-close-area modal-close-df">
													<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
												</div>
											</div>
											<div class="modal-body">
												<span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
												<h2>{{$row->company_official_name ?? ''}}</h2>
												<h4>هل تريد حذف جميع بيانات الشركة ؟ </h4>
											</div>
											<div class="modal-footer info-md">
												<button data-dismiss="modal" >إلغــاء</button>
												<form id="delete" style="display: inline;" action="{{ route('home.destroy', $row->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="submit">حذف</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!--/Delete Customer-->			
											</div>
						</div>
					</div>

				@endforeach
				
				</div>
			
				<div class="custom-pagination mg-b-15">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
                        {!! $rows->links() !!}
						</ul>
					</nav>
				</div>