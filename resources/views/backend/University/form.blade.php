@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>University</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('universitys.store') }}" id="university-form">
                @csrf

                @if (isset($university->id))
                    <input type="hidden" name="id" value="{{ $university->id }}">
                @endif
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control border border-secondary" id="name" name="name"
                            value="{{ $university->name ?? '' }}" placeholder="Your name" required>
                    </div>
                </div>
                <div class="form-group mt-3">
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

            $('#university-form').validate({
                rules: {
                    name: 'required',
                    
                }
            });

            // ปุ่มยืนยัน
            $('#submit-button').click(function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to change this?", // ข้อความที่จะแสดง
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ยืนยัน' // ข้อความปุ่มยืนยัน
                }).then((result) => {
                    if (result.isConfirmed) {
                        if ($('#university-form').valid()) { // check ว่า form validaet แล้วหรือยัง
                            //alert(1);
                            $('#university-form').submit();
                        }
                    }
                })
            });
        });
    </script>
@endpush
