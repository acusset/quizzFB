@extends('layout.admin')

@section('content')
    @include('admin.common.breadcrumb', [
       'mainTitle' => 'Question',
       'links' => [
           'Question' => 'question.index',
       ]
   ])

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-search fa-fw"></i> Filtre
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form method="post" action="{{route('question.filter')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="quizz">Quizz</label>
                            <select class="form-control" id="quizz" name="quizz">
                                    <option value="{{null}}">--- Tous ---</option>
                                @foreach($quizzs as $quizz)
                                    <option value="{{$quizz->id}}">{{$quizz->label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Rechercher</button>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel .chat-panel -->
        </div>
        <div class="col-lg-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-search fa-fw"></i> Filter
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-question fa-fw"></i> Liste des questions
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Label</th>
                            <th>Quizzs associé(s)</th>
                            <th>Créé en</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($entities as $key => $entity)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$entity->label}}</td>
                                <td>
                                    @foreach($entity->quizzs as $quizz)
                                        <span class="label label-success">{{$quizz->label}}</span>
                                    @endforeach
                                </td>
                                <td>{{$entity->created_at}}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Modifier</a>
                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Supprimer</a>
                                    <a href="#" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> Voir la question</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('question.create') }}" class="btn btn-primary btn-small">Ajouter une question</a>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection