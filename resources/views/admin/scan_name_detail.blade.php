@extends('layouts.admin')


@section('title','Scan Detail')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #8f5fe8">{{$scanname}} Details</h4>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Unique Data Elements</th>
                                    <th>Total Data Elements</th>
                                    <th>Last Data Element</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($array as $scans)
                                <tr>
                                    <td style="color: #ffab00"><a href="{{route('scandetailresults',['scanid'=>$scanid,'eventType'=>$scans[0]])}}">{{$scans[1]}}</a></td>
                                    <td style="color: #ffab00">{{$scans[3]}}</td>
                                    <td><label class="badge badge-success">{{$scans[4]}}</label></td>
                                    <td>{{$scans[2]}}</td>
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
