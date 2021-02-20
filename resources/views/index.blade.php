<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">​
</head>
<body>
	<div class="container">
		<h1>Laravel CRUD with Bootstrap Modal</h1>

		<a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Add New</a>
		<!-- Modal -->
		
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Địa chỉ</th>
						<th>Số điện thoại</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						@foreach($employees as $employee)
						<tr>
							<td id="{{$employee->id}}">{{$employee->id}}</td>
							<td id="fname-{{$employee->id}}">{{$employee->fname}}</td>
							<td id="lname-{{$employee->id}}">{{$employee->lname}}</td>
							<td id="address-{{$employee->id}}">{{$employee->address}}</td>
							<td id="mobile-{{$employee->id}}">{{$employee->mobile}}</td>
							<td>
								<button data-url="{{ route('employee.update',$employee->id) }}"​ type="button" data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button>
								<button data-url="{{ route('employee.destroy',$employee->id) }}"​ type="button" data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Delete</button>
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
			{{ $employees->links() }}
		</div>
	</div>
	@include('add')
	@include('edit')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript" charset="utf-8">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#form-add').submit(function(e){

				e.preventDefault();

				var url = $(this).attr('data-url');

				$.ajax({
					type: 'post',
					url: url,
					data: {
						fname: $('#fname-add').val(),
						lname: $('#lname-add').val(),
						address: $('#address-add').val(),
						mobile: $('#mobile-add').val(),
					},
					success: function(response) {
						toastr.success(response.message)
						//ẩn modal add new
						$('#modal-add').modal('hide');
						console.log(response.data)
						window.location.href="{{ route('employee.index') }}";
					},
					error: function (jqXHR, textStatus, errorThrown){
						//Xử lý lỗi tại đây
					}
				})
			})

			$('.btn-delete').click(function(){
				var url = $(this).attr('data-url');
				var _this = $(this);
				if(confirm('Bạn có chắc muốn xoá không?')){
					$.ajax({

						type: 'delete',
						url: url,
						success: function(response) {
							toastr.success(response.message)
							_this.parent().parent().remove();
						},
						error: function (jqXHR, textStatus, errorThrown){
							//Xử lý khi bị lỗi
						}
					})
				}
			})

			$('.btn-edit').click(function(e){

				var url = $(this).attr('data-url');

				$('#modal-edit').modal('show');

				e.preventDefault();

				
			})

		})
	</script>
</body>
</html>