@extends('admin.layout.app')

@section('title', 'Logs')

@section('content')
<main>
    <div class="container-fluid site-width">
    <!-- START: Breadcrumbs-->
    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">{{ $title }}</h4></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                   <li class="breadcrumb-item active"><a href="#">{{ $title }}</a></li>
                </ol>
            </div>

            <div class="d-flex">
                <a href="{{ route('logs.download') }}" class="btn btn-primary mr-2">Download Log</a>
                <form action="{{ route('logs.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the log file?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Log</button>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    @if(count($logs))
    <div id="accordion" class="mt-4">
        @foreach($logs as $index => $log)
            <div class="card">
                <div class="card-header" id="heading{{ $index }}">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                            [{{ $log['timestamp'] }}]
                        </button>
                    </h5>
                </div>

                <div id="collapse{{ $index }}" class="collapse" aria-labelledby="heading{{ $index }}" data-parent="#accordion">
                    <div class="card-body">
                        <pre style="white-space: pre-wrap;font-size: 15px;">{{ $log['message'] }}</pre>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info mt-4">No log entries found.</div>
@endif
</main>
@endsection
