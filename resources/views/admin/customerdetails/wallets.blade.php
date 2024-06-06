@extends('admin.template')
@section('main')
<div class="content-wrapper">
	<section class="content">
		@include('admin.customerdetails.customer_menu')
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<div class="table-responsive parent-table f-14">
							{!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection


@section('validate_script')
	<script src="{{ asset('public/backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
	{!! $dataTable->scripts() !!} 
@endsection