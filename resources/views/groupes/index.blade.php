@extends('template.app')

@section('content')
    <div class="container">
        <p>
            <a href="{{ route('groupes.create') }}" class="btn btn-primary">Ajouter un groupe</a>
        </p>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Nbre de contact</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($groupes))
                      @foreach ($groupes as $group)
                          <tr>
                              <td>{{ $group->id }}</td>
                              <td>{{ $group->libelle }}</td>
                              <td>{{ count($group->contacts) }}</td>
                              <td>
                                  <a href="{{ route('groupes.show', $group->id) }}" class="btn btn-info" title="details">  <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                  <a href="{{ route('groupes.edit', $group->id) }}" title="modifier" class="btn btn-warning"> <i class="fa fa-pencil-square" aria-hidden="true"></i> edit </a>
                                  <form action="{{ route('groupes.destroy', $group->id) }}" method="POST" style="display: inline;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger" title="supprimer"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Nbre de contact</th>
                    <th>Actions</th>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
     
    </div>
@endsection
