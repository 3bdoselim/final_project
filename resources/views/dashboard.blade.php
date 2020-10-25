@extends('layouts.admin')
<style>
  #card{
    float: left;
  }
</style>

@section('content')
<div class="container-fluid text-center">
  <div >{{App\Models\Branch::paginate(4)->links()}}</div>
<table>
    @foreach (App\Models\Branch::paginate(4) as $branch)
    <tr>
        <div id="card" class="col-md-6 card text-white bg-dark text-center mb-1">
            <div class="card-header card-header-pills">
              <div class="row">
                <div style="font-size: 1.4em;"  class="col">
                    <b class="alert-danger btn-lg">{{$branch->branch_name}}</b>
                    <span class="badge badge-dark">Max</span>
                    <span class="badge badge-primary badge-pill">{{ $branch->branch_max_capicaty }}</span> 
                </div>
                 <div class="col">
                  <a class="btn btn btn-outline-success"
                  href="/branchsections/{{ $branch->id }}">Sections</a>
                  <a class="btn btn btn-outline-primary"
                  href="/branches/{{ $branch->id }}/edit">Edit</a>
                  @if ( $branch->sections->count() == 0  )
                  <form method="POST" action="/branches/{{ $branch->id }}">
                  @csrf
                  @method("delete")
                  <input class="btn btn btn-outline-danger" type="submit" value="Delete">
                  </form>
              @endif
                 </div>
              </div>
            </div>
            <div class="card-body">
              <h2 class="card-title">Working All Days From <span class="badge badge-success badge-pill">{{$branch->branch_opens}}</span> to <span class="badge badge-danger badge-pill">{{$branch->branch_closes}}</span></h2>
              {{-- <div class="container-fluid m-3"> --}}
                <h5><strong>Address</strong> : {{$branch->branch_location}}</h5>
                <ul class="list-inline  text-center">
                  @forelse ($branch->sections  as $section)
                    <li style="font-size: 1.3em;" class="mb-2 list-inline-item font-weight-bold btn-sm alert-info">
                      <span class="badge badge-dark">{{$section->sections->get(0)->section_name}}</span>
                      <span class="badge badge-primary badge-pill">{{$section->branch_section_in_stock}}<br/>{{$section->branch_section_max_capicaty}}</span> 
                    </li>
                  @empty
                  <li style="font-size: 1.8em;" class="list-inline-item font-weight-bold btn-sm alert-info">
                    <span class="badge badge-danger">Nothing Added</span>
                    <span class="badge badge-danger badge-pill">Yet</span> 
                  </li>
                  @endforelse
                </ul>
              {{-- </div> --}}
            </div>
        </div>
    </tr>
    @endforeach
    </table>

</div>
@endsection