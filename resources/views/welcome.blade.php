<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- styles -->
        <style>
            .green{
                color:green;
            }
            .red{
                color:red;
            }
        </style>
    </head>
    <body>        
        <div class="container pt-5">
            <div class="row">
                @if (session('status'))
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Notificación!</h4> {{ session('status') }}
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-12">
                <form action="{{ route('welcome.store') }}" class="form form-horizontal" method="POST">
                    @csrf @method('POST')
                    <div class="row">
                        <div class="form-group col-md-10 offset-md-2">
                            <div class="col-md-6 col-xs-12 col-sm-12 form-group">
                                <input type="text" name="string" class="form-control">
                            </div>
                            <div class="col-md-6 col-xs-12 col-sm-12">
                                <button type="submit" class="btn btn-success float-right">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="col-md-10 col-xs-12 col-sm-12 col-lg-10 offset-md-2">
                    <div class="row">
                        <div class="table-responsive ">
                            <table class="table table-expanded">
                                <thead>
                                    <tr>
                                        <th>Date Time</th>
                                        <th>Input</th>
                                        <th>Output</th>
                                        <th>Valid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($resultados->count()>0)
                                        @foreach($resultados as $r)
                                        <tr>
                                            <td>{{$r->date_time}}</td>
                                            <td>{{$r->input}}</td>
                                            <td>{{$r->output}}</td>
                                            <td>
                                                @if ($r->result == 1)
                                                    <span class="green">Valid</span>
                                                @else
                                                    <span class="red">Invalid</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4" align="center"> <b>No data...</b></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>                            
                        </div>                            
                    </div>
                </div>
            </div>
        </div>            
    </body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
