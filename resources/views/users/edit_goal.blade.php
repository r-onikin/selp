<h2 style=text-align: center; Goals </h2>
       
       <div class="row">
        <div class="col-6">
            {!! Form::model($goal, ['route' => 'users.goalUpdate']) !!}

                <div class="form-group">
                    {!! Form::label('title', ' Title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', 'Content:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>