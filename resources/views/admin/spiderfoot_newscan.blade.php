@extends('layouts.admin')


@section('title','DGA hunter')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">New Scan</h4>
                        <p class="card-description"> Start a new scan </p>
                        <form class="forms-sample" action="{{route('scanning')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Scan name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="scanname"  placeholder="The name of this scan.">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Scan Target</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="scantarget"  placeholder="The target of your scan.">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h5><span class="text-muted">Your scan target may be one of the following. SpiderFoot will automatically detect the target type based on the format of your input:</span></h5>
                        <ul>
                            <li><b class="text-info">Domain Name:</b> e.g. example.com</li>
                            <li><b class="text-info">IPv4 Address:</b> e.g. 1.2.3.4</li>
                            <li><b class="text-info">IPv6 Address:</b> e.g. 2606:4700:4700::1111</li>
                            <li><b class="text-info">Hostname/Sub-domain:</b> e.g. abc.example.com</li>
                            <li><b class="text-info">Subnet:</b> e.g. 1.2.3.0/24</li>
                            <li><b class="text-info">Bitcoin Address:</b> e.g. 1HesYJSP1QqcyPEjnQ9vzBL1wujruNGe7R</li>
                            <li><b class="text-info">E-mail address:</b> e.g. bob@example.com</li>
                            <li><b class="text-info">Phone Number:</b> e.g. +12345678901 (E.164 format)</li>
                            <li><b class="text-info">Human Name:</b> e.g. "John Smith" (must be in quotes)</li>
                            <li><b class="text-info">Username:</b> e.g. "jsmith2000" (must be in quotes)</li>
                            <li><b class="text-info">Network ASN:</b> e.g. 1234</li>
                        </ul>
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
