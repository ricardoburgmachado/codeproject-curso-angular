


{!! Form::open(['route'=>'project_file_send','method'=>'post', 'files' => true])!!}



<div class="form-group">
    {!! Form::label('name', 'Name:', ['class'=>'control-label']) !!}
    {!! Form::text('name', '', ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Project Id', 'ProjetoId:', ['class'=>'control-label']) !!}
    {!! Form::text('project_id', '', ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:', ['class'=>'control-label']) !!}
    {!! Form::text('description', '', ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('arquivo', 'File:', ['class'=>'control-label']) !!}
    {!! Form::file('arquivo', '', ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
</div>


{!! Form::close() !!}

