<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('employee.update',$employee['id']) }}" id="form-edit" method="POST" role="form">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cập Nhật Nhân Viên</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="fname" value="{!! old('fname-edit',$employee['fname']) !!}" id="fname-edit" class="form-control" placeholder="Enter First Name">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lname" value="{{ old('lname',$employee['lname']) }}" id="lname-edit" class="form-control" placeholder="Enter Last Name">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="address" id="address-edit" class="form-control" placeholder="Enter Address">
					</div>
					<div class="form-group">
						<label>Mobile</label>
						<input type="text" name="mobile" id="mobile-edit" class="form-control" placeholder="Enter Mobile">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>