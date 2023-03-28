@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Module Details</h1>
    <dl class="row">
        <dt class="col-sm-3">Module Name</dt>
        <dd class="col-sm-9">{{ $module->module_name }}</dd>

        <dt class="col-sm-3">Lecturer Name</dt>
        <dd class="col-sm-9">{{ $module->lecturer_name }}</dd>
    </dl>
    <a href="{{ route('modules.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection
