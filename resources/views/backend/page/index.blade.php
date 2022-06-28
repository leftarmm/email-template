@extends('layouts.backend')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Send Emails</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">University</label>
            <select class="form-control border border-grey" name="name" id="select-university">
                @foreach ($universitys as $data)
                <option value="{{ $data->id }}">{{ $data->name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">Host</label>
            <select class="form-control border border-grey" name="host" id="select-host">
                @foreach ($hosts as $data)
                <option value="{{ $data->id }}">{{ $data->url }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">User</label>
            <select class="form-control border border-grey" name="name" id="select-admin">
                @foreach ($admins as $data)
                <option value="{{ $data->id }}">{{ $data->name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">Email Template</label>
            <select class="form-control border border-grey" name="body" id="select-template">
                @foreach ($templates as $data)
                <option value="{{ $data->id }}">{{ $data->title }}</option>
                @endforeach
            </select>
            <p id="preview123"></p>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <label for="">List</label>
            <div class="col-lg-11 col-5 my-auto text-end">
                <input type="file" id="excelfile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />

                <button type="button" class="btn btn-sm btn-info" id="viewfile" value="Export To Table">
                    Upload File
                </button>
            </div>
            <table class="table align-items-center mb-0 datatable" id="exceltable">
                <thead>
                    <tr>
                        <th>No</th>
                        {{-- <th>university_id</th> --}}
                        <th>Time</th>
                        <th>Room</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Test Email</th>
                        <th>Reciever</th>
                        <th>Reciever 2</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="">Log</label><br>
            <div class="col-lg-11 col-5 my-auto text-end">
                <a style="background-color:yellow; color:black;" class="btn btn-sm btn-info" id="send-email">Send All</a>
            </div>
            <textarea class="form-control border boder-primary" rows="10" id="email-logs" disabled></textarea>
            <p id="message"></p>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script>

    $(document).ready(function() {
        var t = @JSON($templates);
        $('.datatable').DataTable();
        var did = $('#select-template :selected').val();

        $.each(t, function(key, val) {
            if (val.id == did) {
                $('#preview123').html(val.body);
            }
        });


        $("#txtContent").on("keydown", function(e) {
            $('#message').html($(this).val());
        });

        $('#select-template').on('change', function() {
            var id = $(this).val();
            $.each(t, function(key, val) {
                if (val.id == id) {
                    $('#preview123').html(val.body);
                }
            });
        });

        if (typeof $('#excelTable').length !== 'undefined') {
            var t = $('#exceltable').DataTable();
            var counter = 1;
            var importExcelData = [];
            var errorData = [];

            $("#send-email").click(function() {
                if (importExcelData.length > 0) {
                    if (confirm('Are you sure you want to send all email?')) {
                        var count = 0;
                        myLoop(count);

                        function myLoop(count) { //  create a loop function
                            var i = count;
                            var reciever;
                            var data = {};
                            if (isEmail(importExcelData[i][8])) {
                                reciever = importExcelData[i][8];
                            } else {
                                reciever = importExcelData[i][7]
                            };
                            data._token = '{{ Session::token() }}';
                            data.university = $('#select-university').val();
                            data.host = $('#select-host').val();
                            data.admin = $('#select-admin').val();
                            data.template = $('#select-template').val();
                            data.time = importExcelData[i][1];
                            data.room = importExcelData[i][2];
                            data.code = importExcelData[i][3];
                            data.name = importExcelData[i][4];
                            data.department = importExcelData[i][5];
                            data.email = importExcelData[i][6];
                            data.reciever = reciever;
                            //console.log(data);
                            $.ajax({
                                url: "/email/send",
                                type: "post",
                                data: data,
                                success: function(result) {
                                    //console.log(result);
                                    $('#email-logs').append(result + '\n');
                                    count++;
                                    $('#logs-count').html(count);
                                    if (count < importExcelData.length) {
                                        setTimeout(function() {
                                            myLoop(count);
                                        }, 3000);
                                    } else {
                                        $('#email-logs').append("Finish..\n");
                                    }
                                }
                            });
                        }
                    }
                    $('#email-logs').focus();
                } else {
                    alert('Please upload file');
                    $('#viewfile').focus();
                }
            });

            $("#viewfile").click(function() {
                t.clear();
                var regex = /^([\u0E00-\u0E7Fa-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;
                /*Checks whether the file is a valid excel file*/
                if (regex.test($("#excelfile").val().toLowerCase())) {
                    var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/
                    if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {
                        xlsxflag = true;
                    }
                    /*Checks whether the browser supports HTML5*/
                    if (typeof(FileReader) != "undefined") {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var data = e.target.result;
                            /*Converts the excel data in to object*/
                            if (xlsxflag) {
                                var workbook = XLSX.read(data, {
                                    type: 'binary'
                                });
                            } else {
                                var workbook = XLS.read(data, {
                                    type: 'binary'
                                });
                            }


                            /*Gets all the sheetnames of excel in to a variable*/
                            var sheet_name_list = workbook.SheetNames;

                            var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/
                            sheet_name_list.forEach(function(y) {
                                /*Iterate through all sheets*/
                                /*Convert the cell value to Json*/
                                if (xlsxflag) {
                                    var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);
                                } else {
                                    var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);
                                }
                                if (exceljson.length > 0 && cnt == 0) {
                                    BindTable(exceljson);
                                    cnt++;
                                }
                            });
                        }
                        if (xlsxflag) {
                            /*If excel file is .xlsx extension than creates a Array Buffer from excel*/
                            reader.readAsArrayBuffer($("#excelfile")[0].files[0]);
                        } else {
                            reader.readAsBinaryString($("#excelfile")[0].files[0]);
                        }
                    } else {
                        alert("Sorry! Your browser does not support HTML5!");
                    }
                } else {
                    alert("Please upload a valid Excel file!");
                }
            });

            function BindTable(jsondata) {
                var excel = [];
                $.each(jsondata, function(index, row) {
                    var t_row = [];
                    $.each(row, function(k, v) {
                        t_row.push(v);
                    });
                    excel.push(t_row);
                });
                if (Object.keys(jsondata[0]).length != 9) {
                    alert('Incorrect data format');
                } else {
                    t.clear();
                    t.rows.add(excel);
                    t.draw();
                    importExcelData = excel;
                }
                //$('#exceltable').DataTable();
            };

            function isEmail(email) {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return regex.test(email);
            }
        }

    });
</script>
@endpush