@section('deptLayout')
@if( $form_2_1->department == "Shs")
<h2 for="">SENIOR HIGH</h2>
<input type="hidden" name="dept" value="shs">
<div class="row">
        <div class="form-group col-md col-sm-12"><label for="">STRAND</label><select name="course" class="form-control">
                        <option value="">Select Strand</option>
                        <option value="3" {{ $form_2_1->course_id ? "selected" : "" }}>PBM Specialization</option>
                </select></div>
        <div class="form-group col-md col-sm-12"><label for="">Year Level</label><select name="year_level"
                        class="form-control">
                        <option value="" selected>Select Year Level</option>
                        <option value="11" {{ $form_2_1->year_level ? "selected" : "" }}>Grade 11</option>
                </select></div>
</div>
<h4 for="">EDUCATIONAL BACKGROUND</h4>
<div class="row">
        <div class="form-group col-md col-sm-12"><label for="">LRN</label><input type="text" class="form-control"
                        placeholder="Enter your Lrn" name="lrn" value="{{ $form_2_1->lrn }}"></div>
        <div class="form-group col-md col-sm-12"><label for="">General Average</label><input type="text"
                        class="form-control" placeholder="Junior high General Average" name="average"
                        value="{{ $form_2_1->average }}"></div>
</div>
@foreach ($form_2_2 as $details)
<label for="">{{ $details->school_level }}</label>
<div class="row">
        <div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Name of School"
                        name="schoolname[]" value="{{ $details->school_name }}"></div>
        <div class="form-group col-md col-sm-12"><input type="text" class="form-control"
                        placeholder="School's Complete Address" name="address[]" value="{{ $details->address }}"></div>
        <div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Year Graduated"
                        name="year[]" value="{{ $details->year }}"></div>
</div>
@endforeach
@elseif($form_2_1->department == "College")
<h2 for="">COLLEGE</h2>
<input type="hidden" name="college">
<div class="row">
        <div class="form-group col-md col-sm-12"><label for="">COURSE</label><select name="course" class="form-control">
                        <option value="">Select Strand</option>
                        <option value="1" {{ $form_2_1->course_id == 1 ? "selected" : "" }}>BS MARINE ENGINEERING</option>
                        <option value="2" {{ $form_2_1->course_id == 2 ? "selected" : "" }}>BS MARINE TRANSPORTATION</option>
                </select></div>
        <div class="form-group col-md col-sm-12"><label for="">YEAR LEVEL</label><select name="year_level"
                        class="form-control">
                        <option value="">Select Year Level</option>
                        <option value="1ST" {{ $form_2_1->year_level ? "selected" : "" }}>1ST YEAR</option>
                </select></div>
</div>
<h4 for="">EDUCATIONAL BACKGROUND</h4>

@foreach ($form_2_2 as $details)
<label for="">{{ $details->school_level }}</label>
<div class="row">
        <div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Name of School"
                        name="schoolname[]" value="{{ $details->school_name }}"></div>
        <div class="form-group col-md col-sm-12"><input type="text" class="form-control"
                        placeholder="School's Complete Address" name="address[]" value="{{ $details->address }}"></div>
        <div class="form-group col-md col-sm-12"><input type="text" class="form-control" placeholder="Year Graduated"
                        name="year[]" value="{{ $details->year }}"></div>
</div>
@endforeach
@endif
@endsection