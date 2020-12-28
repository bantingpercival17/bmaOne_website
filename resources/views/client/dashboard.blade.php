@extends('client.layout')
@section('pageTitle', 'Student Information')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endsection
@section('js')
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/app/main.js') }}"></script>
@endsection
@section('content')

<div class="container-fluid">
    @if( $data && $form_2_1 && $form_2_2 && $form_3) 
    @include('client.layout.profileLayout')
    @yield('profile')
    @else
    <div class="card form-input-1">
        <h1 id="header"></h1>
        <input type="hidden" id="code" value=" {{ Auth::user()->client_code }}">
        <div style="text-align:center;margin-top:20px;">
            <span class="step step-0"></span>
            <span class="step step-1"></span>
            <span class="step step-2"></span>
            <span class="step step-3"></span>
            <span class="step step-4"></span>
        </div>

        {{--  Student Information  --}}
        <div class="tab ">
            <form id="student-information" class="card-body" role="form">
                <input type="hidden" name="input_0" value={{ Auth::user()->id }}>
                @csrf
                <label>FULLNAME</label>
                <div class="row">
                    <div class="form-group col-md ">
                        <input type="text" class="form-control" id="input-1" name="input_1"
                            value=" {{ Auth::user()->last_name }}" placeholder="Lastname">
                    </div>

                    <div class="form-group col-md">
                        <input type="text" class="form-control" id="input-2" name="input_2"
                            value=" {{ Auth::user()->first_name }}" placeholder="Firstname">
                    </div>

                    <div class="form-group col-md">
                        <input type="text" class="form-control" id="input-3" name="input_3" placeholder="Middlename"
                            value="{{ $data ? $data->middle_name:"" }}">
                    </div>

                    <div class="form-group col-md">
                        <input type="text" class="form-control" id="input-4" name="input_4" placeholder="Ext"
                            value="{{ $data ? $data->extention_name:"" }}">
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label>DATE OF BIRTH</label>
                        <input type="text" class="form-control" name="input_5" placeholder="mm/dd/yy"
                            value="{{ $data ? $data->birthday:"" }}">
                    </div>
                    <div class="form-group col-md">
                        <label>PLACE OF BIRTH</label>
                        <input type="text" class="form-control" name="input_6" placeholder="Location"
                            value="{{ $data ? $data->birth_place:"" }}">
                    </div>
                    <div class="form-group col-md">
                        <label>SEX</label>
                        <select name="input_7" class="form-control" value="{{ $data ? $data->sex:"" }}">
                            <option value="Male">Male</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label>NATIONALITY</label>
                        <input type="text" name="input_8" class="form-control" placeholder="Ex. Filipino"
                            value="{{ $data ? $data->nationality:"" }}">
                    </div>
                    <div class="form-group col-md">
                        <label>STATUS</label>
                        <input type="text" name="input_9" class="form-control" placeholder="Civil Status"
                            value="{{ $data ? $data->status:"" }}">
                    </div>

                </div>
                <label for="">ADDRESS</label>
                <div class="row">
                    <div class="form-group col-md">
                        <select name="a_input_5" id="input-region" class="form-control"
                            value="{{ $data ? $data->region:"" }}">
                            <option value="" disabled selected>Select Region</option>
                            <option value="REGION 1" data-value="0"
                                {{ $data && $data->region == "REGION 1" ? "selected":"" }}>REGION 1</option>
                            <option value="REGION 2" data-value="1"
                                {{ $data && $data->region == "REGION 2" ? "selected":"" }}>REGION 2</option>
                            <option value="REGION 3" data-value="2"
                                {{ $data&& $data->region  == "REGION 3" ? "selected":"" }}>REGION 3</option>
                            <option value="REGION 4-A" data-value="3"
                                {{ $data && $data->region == "REGION 4-A" ? "selected":"" }}>REGION 4-A</option>
                            <option value="REGION 4-B" data-value="4"
                                {{ $data && $data->region == "REGION 4-B" ? "selected":"" }}>REGION 4-B</option>
                            <option value="REGION 5" data-value="5"
                                {{ $data && $data->region == "REGION 5" ? "selected":"" }}>REGION 5</option>
                            <option value="REGION 6" data-value="6"
                                {{ $data && $data->region == "REGION 6" ? "selected":"" }}>REGION 6</option>
                            <option value="REGION 7" data-value="7"
                                {{ $data && $data->region == "REGION 7" ? "selected":"" }}>REGION 7</option>
                            <option value="REGION 8" data-value="8"
                                {{ $data && $data->region == "REGION 8" ? "selected":"" }}>REGION 8</option>
                            <option value="REGION 9" data-value="9"
                                {{ $data && $data->region == "REGION 9" ? "selected":"" }}>REGION 9</option>
                            <option value="REGION 10" data-value="10"
                                {{ $data && $data->region ==  "REGION 10" ? "selected":"" }}>REGION 10</option>
                            <option value="REGION 11" data-value="11"
                                {{ $data && $data->region ==  "REGION 11" ? "selected":"" }}>REGION 11</option>
                            <option value="REGION 12" data-value="12"
                                {{ $data && $data->region ==  "REGION 12" ? "selected":"" }}>REGION 12</option>
                            <option value="REGION 13" data-value="13"
                                {{ $data && $data->region ==  "REGION 13" ? "selected":"" }}>REGION 13</option>
                            <option value="REGION BARMM" data-value="14"
                                {{ $data && $data->region ==  "REGION BARMM" ? "selected":"" }}>BARMM</option>
                            <option value="REGION CAR" data-value="15"
                                {{ $data && $data->region ==  "REGION CAR" ? "selected":"" }}>CAR</option>
                            <option value="REGION NCR" data-value="16"
                                {{ $data && $data->region ==  "REGION NCR" ? "selected":"" }}>NCR</option>

                        </select>
                    </div>
                    <div class="form-group col-md">
                        <select name="a_input_4" id="input-province" class="form-control">
                            <option value="{{ $data ? $data->province:"" }}" selected
                                {{ $data && $data->province ? "":"disabled" }}>
                                {{ $data ? $data->province:"Select Province" }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <select name="a_input_3" id="input-city" class="form-control">
                            <option value="{{ $data ? $data->city:"" }}" selected
                                {{ $data && $data->city ? "":"disabled" }}> {{ $data ? $data->city:"Select City" }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <select name="a_input_2" id="input-barangay" class="form-control">
                            <option value="{{ $data ? $data->barangay:"" }}" selected
                                {{ $data && $data->barangay ? "":"disabled" }}>
                                {{ $data ? $data->barangay:"Select Barangay" }}</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <input type="text" class="form-control" name="a_input_1"
                            placeholder="House No. / Street / Blg No." value="{{ $data ? $data->street :"" }}">
                    </div>

                </div>
                <label>PARENTS</label>
                <div class="row">
                    <div class="form-group col-md col-sm-12">
                        <input type="text" class="form-control" placeholder="FATHER'S NAME " name="f_input_1"
                            value="{{ $data ? $data->father_name :"" }}">
                    </div>
                    <div class="form-group col-md col-sm-12">
                        <input type="text" class="form-control" placeholder="MOTHER'S NAME " name="m_input_1"
                            value="{{ $data ? $data->mother_name :"" }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md col-sm-12">
                        <input type="text" class="form-control" placeholder="FATHER'S CONTACT NUMBER" name="f_input_2"
                            value="{{ $data ? $data->father_contact_number :"" }}">
                    </div>
                    <div class="form-group col-md col-sm-12">
                        <input type="text" class="form-control" placeholder="MOTHER'S CONTACT NUMBER" name="m_input_2"
                            value="{{ $data ? $data->mother_contact_number :"" }}">
                    </div>
                </div>
                <label>PARENTS/GUARDIAN'S ADDRESS</label>
                <div class="row">
                    <div class="form-group col-md col-sm-12">
                        <input type="text" class="form-control" placeholder="House No. Street City Province"
                            name="a_input_6" value="{{ $data ? $data->parent_address :"" }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-right">Next</button>
            </form>
        </div>
        {{--  Student Application  --}}
        <div class="tab">
            <div class="card-body">
                <form id="student-application" role="form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md">
                            <select id="input-dept" name="dept" class="form-control"
                                {{ $form_2_1 && $form_2_1->department ?"disabled" : "" }}>
                                <option value="" selected disabled>SELECT DEPARTMENT</option>
                                <option value="SHS" data-value="1"
                                    {{ $form_2_1 && $form_2_1->department == "Shs" ?"selected" : "" }}>SENIOR HIGH
                                </option>
                                <option value="COLLEGE" data-value="2"
                                    {{ $form_2_1 && $form_2_1->department == "College" ?"selected" : "" }}>COLLEGE
                                </option>
                            </select>
                        </div>
                    </div>
                    <div id="form-application">
                        @if($form_2_1)
                        @include('client.layout.applicationFormLayout')
                        @yield('deptLayout')
                        @else
                        <h2>Please Select your Department to continue process </h2>
                        @endif


                    </div>
                    <button class="btn btn-secondary btn-back float-left">Back</button>
                    <button type="submit" class="btn btn-success float-right btn-next">Next</button>
                </form>
            </div>
        </div>
        {{--  Student Requirements  --}}
        <div class="tab">
            <form id="student-requirements" role="form" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('client.layout.requirementLayout')
                    @yield('repLayout')
                    <button class="btn btn-secondary btn-back float-left">Back</button>
                    <button type="submit" class="btn btn-success btn-requirements float-right">Next</button>
                </div>
            </form>
        </div>
        <div class="tab">

            <form action="" id="student-payment" class="card-body" role="form">
                @csrf
                <blockquote class="quote-warning">
                    <small class="text-warning">NOTE:</small>
                    <p>PLEASE SCREENSHOT/PICTURE YOUR PAYMENT RECEIPT</p>

                </blockquote>
                <div class="form-group">
                    <label for="exampleInputFile">Gcash No: 09xxxxxxxxxx</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="hidden" name="file_name[]" value="student_payment">
                            <input type="file" class="custom-file-input files" id="file_input_0" name="file_attach_0">
                            <label class="custom-file-label" for="file_input_0"></label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-secondary btn-back float-left">Back</button>
                <button type="submit" class="btn btn-success float-right">Finish</button>

            </form>


        </div>
        <div class="tab">
            <div class="card-body">
                <h1 class="text-success"><i class="far fa-check-circle" style="font-size:100px"></i></h1>
                <h6 style="text-align: center"> Please wait for your the Verification of your Documents and Payments
                </h6>
                <center><a class="btn btn-success" href="/exam">OKAY</a></center>


            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
    </div>
    @endif
</div>

@endsection