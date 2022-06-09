@extends('layouts.backend')

@section('content')
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Host</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('hosts.store') }}" id="host-form">
                @csrf

                @if (isset($host->id))
                    <input type="hidden" name="id" value="{{ $host->id }}">
                @endif
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control border border-secondary" id="name" name="name"
                            value="{{ $host->name ?? '' }}" placeholder="Your name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="post" class="col-md-2 col-form-label">Url</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control border border-secondary" id="url" name="url"
                            value="{{ $host->url ?? '' }}" placeholder="Enter Url">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="post" class="col-md-2 col-form-label">Port</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control border border-secondary" id="port" name="port"
                            value="{{ $host->port ?? '' }}" placeholder="Enter Port">
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

            $('#host-form').validate({
                rules: {
                    name: 'required',
                    url: 'required',
                    port: 'required',
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
                        if ($('#host-form').valid()) { // check ว่า form validaet แล้วหรือยัง
                            //alert(1);
                            $('#host-form').submit();
                        }
                    }
                })
            });
        });
    </script>
@endpush
