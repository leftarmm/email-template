@extends('layouts.backend')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Create Admin</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('admins.store') }}" id="admin-form">
            @csrf

            @if(isset($admin->id))
            <input type="hidden" name="id" value="{{ $admin->id }}">
            @endif
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control border border-secondary" id="name" name="name" value="{{ $admin->name ?? '' }}" placeholder="Your name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                    <input type="text" class="form-control border border-secondary" id="email" name="email" value="{{ $admin->email ?? '' }}" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                    <input type="text" class="form-control border border-secondary" id="password" name="password" value="{{ $admin->password ?? '' }}" placeholder="Enter Password">
                </div>
            </div>
            <div class="form-group">
                <button type="button" id="submit-button" class="btn btn-block btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('custom-scripts')
<script>
    $(document).ready(function() {

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        }, 'อนุญาตให้ใส่เฉพาะตัวหนังสือ');

        $('#admin-form').validate({
            rules: {
                name: {
                    required: true, // บังคับกรอก
                    lettersonly: true //ตัวหนังสือเท่านั้น
                },
                email: 'required', // บังคับกรอก
                password: {
                    required: true, // บังคับกรอก
                    minlength: 8, // อย่างน้อย 8 ตัว
                    maxlength: 15 // ไม่เกิน 15 ตัว
                }
            }
        });

        // ปุ่มยืนยัน
        $('#submit-button').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                // text: "You want to change this?", // ข้อความที่จะแสดง
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน' // ข้อความปุ่มยืนยัน
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($('#admin-form').valid()) { // check ว่า form validaet แล้วหรือยัง
                        //alert(1);
                        $('#admin-form').submit();
                    }
                }
            })
        });
    });
</script>
@endpush