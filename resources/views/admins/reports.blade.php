@extends('layouts.app')

@section('content')
    <header class="masthead" style="height: 250px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading text-center">
                        <h1>Reports:</h1>
                        <hr style="background: white;">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="">
            <section class="posts-2 following">
                <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="featured-developers module">
                          <div class="content">
                            <div class="dev-list">
                              <div class="dev-list-item verified">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Reporter</th>
                                      <th>Reportee</th>
                                      <th>Reason</th>
                                      <th>Block Reportee</th>
                                      <th>Resolved</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @forelse ($reports as $r)
                                      <td>{{ $r->user->name }}</td>
                                      <td>{{ $r->experts->name }}</td>
                                      <td>{{ $r->reason }}</td>
                                      @if (Auth::check() && Auth::user()->admin == 1)
                                        <td>
                                          <a href="{{ route('admin_deactivate', ['id' => $r->experts->id]) }}">
                                            <button type="button" class="btn btn-danger waves-effect waves-light">
                                              <i class="fa fa-user m-r-5"></i> Block Reportee
                                            </button>
                                          </a>
                                        </td>
                                        <td>
                                          <a href="{{ route('admin_mark_report', ['id' => $r->id]) }}">
                                            <button type="button" class="btn btn-success waves-effect waves-light">
                                              <i class="fa fa-user m-r-5"></i> Resolved?
                                            </button>
                                          </a>
                                        </td>
                                      @endif
                                    @empty
                                      <p>No reports yet!</p>
                                    @endforelse
                                  </tbody>
                                </table>
                                {{ $reports->links() }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
