@extends('./layouts/super-admin')

@section('page-title')
    Users
@endsection

@section('nav-users')
    active
@endsection

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="active">Users</li>
    </ul>

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-users"></span> Users <small>{{ $users->total() }} persons</small></h2>
    </div>
    <!-- END PAGE TITLE -->
@endsection

@section('page-content-wrapper')
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Use search to find user. You can search by: name, department, position or status. Or use the advanced search.</p>
                        <div class="form-group">
                            <form class="" action="{{ route('users.index') }}" method="GET">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Who are you looking for?" name="search" value="{{ request('search') }}"/>
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="col-md-4">
                                <button class="btn btn-success btn-block" onclick="document.location = '{{ route('users.create') }}';"><span class="fa fa-plus"></span> Create new User</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="pull-right">
                    {{ $users->appends(['search' => request('search')])->links() }}
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($users as $user)
                <div class="col-md-3">
                    <!-- CONTACT ITEM -->
                    <div class="panel panel-default">
                        <div class="panel-body profile">
                            <div class="profile-image">
                                <img src="{{ url($user->photo) }}" alt="Nadia Ali"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{ $user->fullName() }}</div>
                                <div class="profile-data-title">{{ strtoupper($user->role) }}</div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-times"></span></a>
                                <a href="{{ route('users.edit', $user->id) }}" class="profile-control-right"><span class="fa fa-pencil"></span></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="contact-info">
                                <p><small>Department</small><br/>{{ $user->department }}</p>
                                <p><small>Position</small><br/>{{ $user->position }}</p>
                                <p><small>Status</small><br/>{{ strtoupper($user->employment_status) }}</p>
                                <p><small>Date Created</small><br/>{{ $user->created_at->toDayDateTimeString() }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTACT ITEM -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
