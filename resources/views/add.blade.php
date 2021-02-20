<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" data-url="{{ route('employee.store') }}" id="form-add" method="POST" role="form">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Thêm Nhân Viên</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="fname" id="fname-add" class="form-control" placeholder="Enter First Name">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lname" id="lname-add" class="form-control" placeholder="Enter Last Name">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="address" id="address-add" class="form-control" placeholder="Enter Address">
					</div>
					<div class="form-group">
						<label>Mobile</label>
						<input type="text" name="mobile" id="mobile-add" class="form-control" placeholder="Enter Mobile">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Add New</button>
				</div>
			</form>
		</div>
	</div>
</div>