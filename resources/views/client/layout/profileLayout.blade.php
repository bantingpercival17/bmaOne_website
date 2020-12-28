@section('profile')
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" width="100"
                        src="/storage/documents/{{ $form_3 ? $form_3[0]->file_path : "avatar.png" }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $data->first_name .' '.$data->last_name }}</h3>

                <p class="text-muted text-center">{{ $data->user->contact_number }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Department</b> <a class="float-right">{{ strtoupper($form_2_1->department)}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Course</b> <a class="float-right">{{ $form_2_1->courseOffer->course_name }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Year Level</b> <a class="float-right">{{ $form_2_1->year_level}}</a>
                    </li>
                </ul>


            </div>
        </div>


    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#form-1" data-toggle="tab">Student
                            Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#form-2" data-toggle="tab">Requirements</a></li>
                    <li class="nav-item"><a class="nav-link" href="#form-3" data-toggle="tab">Payment</a></li>
                    <li class="nav-item"><a class="nav-link" href="#form-4" data-toggle="tab">Exam Approval</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="form-1">
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
                                    <input type="text" class="form-control" id="input-3" name="input_3"
                                        placeholder="Middlename" value="{{ $data ? $data->middle_name:"" }}">
                                </div>

                                <div class="form-group col-md">
                                    <input type="text" class="form-control" id="input-4" name="input_4"
                                        placeholder="Ext" value="{{ $data ? $data->extention_name:"" }}">
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
                                            {{ $data && $data->region == "REGION 4-A" ? "selected":"" }}>REGION 4-A
                                        </option>
                                        <option value="REGION 4-B" data-value="4"
                                            {{ $data && $data->region == "REGION 4-B" ? "selected":"" }}>REGION 4-B
                                        </option>
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
                                            {{ $data && $data->region ==  "REGION 10" ? "selected":"" }}>REGION 10
                                        </option>
                                        <option value="REGION 11" data-value="11"
                                            {{ $data && $data->region ==  "REGION 11" ? "selected":"" }}>REGION 11
                                        </option>
                                        <option value="REGION 12" data-value="12"
                                            {{ $data && $data->region ==  "REGION 12" ? "selected":"" }}>REGION 12
                                        </option>
                                        <option value="REGION 13" data-value="13"
                                            {{ $data && $data->region ==  "REGION 13" ? "selected":"" }}>REGION 13
                                        </option>
                                        <option value="REGION BARMM" data-value="14"
                                            {{ $data && $data->region ==  "REGION BARMM" ? "selected":"" }}>BARMM
                                        </option>
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
                                            {{ $data && $data->city ? "":"disabled" }}>
                                            {{ $data ? $data->city:"Select City" }}
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
                                        placeholder="House No. / Street / Blg No."
                                        value="{{ $data ? $data->street :"" }}">
                                </div>

                            </div>
                            <label>PARENTS</label>
                            <div class="row">
                                <div class="form-group col-md col-sm-12">
                                    <input type="text" class="form-control" placeholder="FATHER'S NAME "
                                        name="f_input_1" value="{{ $data ? $data->father_name :"" }}">
                                </div>
                                <div class="form-group col-md col-sm-12">
                                    <input type="text" class="form-control" placeholder="MOTHER'S NAME "
                                        name="m_input_1" value="{{ $data ? $data->mother_name :"" }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md col-sm-12">
                                    <input type="text" class="form-control" placeholder="FATHER'S CONTACT NUMBER"
                                        name="f_input_2" value="{{ $data ? $data->father_contact_number :"" }}">
                                </div>
                                <div class="form-group col-md col-sm-12">
                                    <input type="text" class="form-control" placeholder="MOTHER'S CONTACT NUMBER"
                                        name="m_input_2" value="{{ $data ? $data->mother_contact_number :"" }}">
                                </div>
                            </div>
                            <label>PARENTS/GUARDIAN'S ADDRESS</label>
                            <div class="row">
                                <div class="form-group col-md col-sm-12">
                                    <input type="text" class="form-control" placeholder="House No. Street City Province"
                                        name="a_input_6" value="{{ $data ? $data->parent_address :"" }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-update float-right">Update</button>
                        </form>
                    </div>
                    <div class=" tab-pane" id="form-2">
                        @if($form_3)
                        @foreach($form_3 as $key => $value)
                        @if($key>0)
                        <div class="post">
                            <div class="user-block">
                                <label for="" class="h5 text-success">{{ strtoupper($value->req_name) }}</label>
                                <span>
                                    @if($value->status == "APPROVE")
                                    <span class="right badge badge-success">APPROVE</span>
                                    @elseif($value->status == "PENDING")
                                    <span class="right badge badge-info">PENDING</span>
                                    @else
                                    <span class="right badge badge-warning">NOT APPROVE</span>
                                    @endif
                                </span>
                                {{--  <span class="description">Shared publicly - 7:30 PM today</span> --}}
                            </div>
                            <p>
                                <img class="img-fluid mb-2" src="/storage/documents/{{ $value->file_path }}" alt="">
                            </p>
                            <p>
                                <a href="#" class="link-black text-sm"><i class="far fa-comments mr-1"></i> Comments
                                    (5)</a>
                            </p>

                        </div>
                        @endif
                        @endforeach

                        @else
                        <div class="callout callout-danger">
                            <h5>Student Requirements!</h5>

                            <p>Empty Tab.</p>
                        </div>
                        @endif

                    </div>
                    <div class="tab-pane" id="form-3">
                    </div>
                    <div class="tab-pane" id="form-4">
                        @if($exam_status['total'] == $exam_status['approve'])
                        <blockquote class="quote-success">
                            <small class="text-success">APPROVE</small>
                            <p>NOW YOU CAN TAKE YOUR EXAM <a href="/exam">CLICK HERE</a></p>
                        </blockquote>
                        @else
                        <blockquote class="quote-info">
                            <small class="text-info">PROCCESSING</small>
                            <p>Your documents is on-doing checking</p>
                        </blockquote>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection