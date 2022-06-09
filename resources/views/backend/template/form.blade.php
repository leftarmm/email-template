@extends('layouts.backend')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Create Template</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('templates.store') }}" id="template-form">
            @csrf

            @if(isset($template->id))
            <input type="hidden" name="id" value="{{ $template->id }}">
            @endif

            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Title</label>
                <div class="col-md-10">
                    <input type="text" class="form-control border border-secondary" id="title" name="title" value="{{ $template->title ?? '' }}" placeholder="Your Title" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="address1" class="col-md-2 col-form-label">Body</label>
                <div class="col-md-10">
                    <textarea class="form-control border border-secondary summernote" name="body" id="body" cols="30" rows="10" placeholder="Your body" required>{{ $template->body ?? '' }}</textarea>
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

        $('.summernote').summernote();

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        }, 'อนุญาตให้ใส่เฉพาะตัวหนังสือ');

        $('#admin-form').validate({
            rules: {
                Title: {
                    required: true, // บังคับกรอก
                },
                Bodyl: {
                    required: true, // บังคับกรอก
                },
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
                    if ($('#template-form').valid()) { // check ว่า form validaet แล้วหรือยัง
                        //alert(1);
                        $('#template-form').submit();
                    }
                }
            })
        });
    });
</script>
@endpush