@section('repLayout')
<blockquote class="quote-warning">
        <small class="text-warning">REMINDER</small>
        <p>PLEASE SCAN YOUR ALL REQUIREMENTS</p>
        
</blockquote>
<div class="form-group">
        <label for="exampleInputFile">2x2 Colored Picture with Applicant's Name Tag</label>
        <div class="input-group">
                <div class="custom-file">
                        <input type="hidden" name="file_name[]" value="2x2_picture">
                        <input type="file" class="custom-file-input files" id="file_input_1" name="file_attach_0">
                        <label class="custom-file-label" for="file_input_1"></label>
                </div>
                <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-comment"></i></span>
                </div>
        </div>
</div>
@if( $form_2_1->department == "Shs")
<div class="form-group">
        <label for="exampleInputFile">Report Card Grade 10 / SF 10</label>
        <div class="input-group">
                <div class="custom-file">
                        <input type="hidden" name="file_name[]" value="report_card_grade_10">
                        <input type="file" class="custom-file-input files" id="file_input_2" name="file_attach_1">
                        <label class="custom-file-label" for="file_input_2">Choose file</label>
                </div>
                <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-comment"></i></span>
                </div>
        </div>
</div>
<div class="form-group">
        <label for="exampleInputFile">PSA Birth Certificate</label>
        <div class="input-group">
                <div class="custom-file">
                        <input type="hidden" name="file_name[]" value="birth_certificate">
                        <input type="file" class="custom-file-input files" id="file_input_3" name="file_attach_2">
                        <label class="custom-file-label" for="file_input_3">Choose file</label>
                </div>
                <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-comment"></i></span>
                </div>
        </div>
</div>
<div class="form-group">
        <label for="exampleInputFile">Good Moral</label>
        <div class="input-group">
                <div class="custom-file">
                        <input type="hidden" name="file_name[]" value="good_moral">
                        <input type="file" class="custom-file-input files" id="file_input_4" name="file_attach_3">
                        <label class="custom-file-label" for="file_input_4">Choose file</label>
                </div>
                <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-comment"></i></span>
                </div>
        </div>
</div>
@elseif($form_2_1->department == 'College')
<h1>College</h1>
@endif
@endsection