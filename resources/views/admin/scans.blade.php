@extends('layouts.admin')


@section('title','scans')


@section('content')

        <div class="content-wrapper">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #8f5fe8">Scans</h4>
                        <a href="{{route('scans')}}"><button type="button" class="btn btn-success btn-fw col-lg-2">Refresh</button></a>
                        <div class="main-panel">

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Target</th>
                                    <th>Started</th>
                                    <th>Finished</th>
                                    <th>Status</th>
                                    <th>Elements</th>
                                    <th>Correlations</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($json as $scans)
                                <tr>
                                    <!--<td style="color: #ffab00"><a href="{{route('scandetail',['scanid'=>$scans[0],'type'=>'type','scanname'=>$scans[1]])}}">{{$scans[1]}}</a></td>-->
                                    <form action="{{route('groupedlink')}}" method="post">
                                        @csrf
                                        <input value="{{json_encode($scans)}}" type="hidden" name="array">
                                        <input value="{{$scans[1]}}" type="hidden" name="scanname">
                                        <input value="{{$scans[0]}}" type="hidden" name="id">
                                        <td style="color: #ffab00"><button type="submit" class="btn btn-inverse-primary btn-fw">{{$scans[1]}}</button></td>
                                    </form>

                                    <td style="color: #ffab00">{{$scans[2]}}</td>
                                    <td><label class="badge badge-success">{{$scans[3]}}</label></td>
                                    <td>{{$scans[5]}}</td>
                                    <td>{{$scans[6]}}</td>
                                    <td>{{$scans[7]}}</td>
                                    <td>{{$scans[8]["HIGH"]}},{{$scans[8]["MEDIUM"]}},{{$scans[8]["LOW"]}},{{$scans[8]["INFO"]}}</td>
                                    <td>
                                    @if($scans[6]!=="STARTING")

                                        @if($scans[6]==="RUNNING")
                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                            <a href="{{route('scanstop',['scanid'=>$scans[0]])}}"><i class="mdi mdi-stop-circle-outline"></i></a>
                                        </div>
                                        @else
                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                           <a  href="{{route('rerun',['scanid'=>$scans[0]])}}"> <i class="mdi mdi-refresh"></i> </a>
                                        </div>


                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                            <a  href="{{route('scandelete',['scanid'=>$scans[0]])}}"> <i class="mdi mdi-delete"></i></a>
                                        </div>
                                        @endif
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
@endsection
