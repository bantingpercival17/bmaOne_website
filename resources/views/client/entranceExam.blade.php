@extends('client.layout')
@section('pageTitle', 'Entrance Exam')
@section('css')
<link rel="stylesheet" href="{{ asset('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection
@section('js')
<script src="{{ asset('assets/app/exam.js') }}"></script>
@endsection
@section('content')
<div id="start-exam">
    <div class="container">
        <div class="card card-success card-outline">
            <div class="card-body">
                @if($data['dept'] == "shs")
                <h1>Welcome Student's</h1>

                <p class="card-text">
                    This your guide line to take Entrance Exam. In this Examination will be given in two (2) house.
                    <br>You need to get 70% grade for your Enrollment Application

                </p>
                @elseif($data['dept'] == "college")
                <h1>Welcome Cadent's</h1>

                <p class="card-text">
                    This your guide line to take Entrance Exam. In this Examination will be given in two (4) house.
                    <br>You need to get 65% grade for your Enrollment Application

                </p>
                @endif
                <center>
                    <button class="btn btn-success btn-start" style="">START EXAM</button>
                </center>

                {{-- <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a> --}}
            </div>
        </div><!-- /.card -->
    </div>

</div>
<div class="container-fluid">
    <div class="category">
        <div class="category-list row">
            @foreach ($data['categ'] as $key =>$item)
            <div class="categ col ">
                <label for="">{{ $item->category_name }}</label>
                <br>
                <span class="bar {{ $key > 0 ? "":'bar-active' }}"></span>
            </div>
            @endforeach
        </div>
    </div>
    <br>
    <div class="ca">
        <div class="">
            <div class="card-header fix">
                <div class="float-right">
                    <label for="" class="timer">00:00:00</label>
                </div>
                <h2>Examination</h2>

            </div>
            @foreach ($data['exam'] as $key => $items)
            <form id="form_{{ $items['categ_id'] }}" class="form-layout">
                @foreach ($items['question_list'] as $item)
                @component('client.exam.questionLayout')
                @slot('id')
                {{ $item['question_id'] }}
                @endslot
                @slot('question')
                @php
                echo $item['question']
                @endphp
                @endslot
                @slot('sample')
                @foreach ($item['choices'] as $key => $item1)
                <div class="form-group clearfix">
                    <div class="icheck-success d-inline">
                        <input type="radio" name="input_{{   $item['question_id'] }}"
                            id="radioSuccess{{    $item['question_id']."_". $key }}" value="{{  $item1['choice_id'] }}">
                        <label for="radioSuccess{{  $item['question_id']."_". $key}}">
                            {{ $item1['choice'] }}
                        </label>
                    </div>
                </div>
                @endforeach
                @endslot
                @endcomponent
                @endforeach
            </form>
            @endforeach
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-next float-right">NEXT</button>
        </div>
    </div>
</div>

@endsection