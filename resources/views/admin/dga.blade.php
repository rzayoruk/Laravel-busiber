@extends('layouts.dga')


@section('title','DGA hunter')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="wrapper">
                <input placeholder="Write Url" type="url" name="uri" id="uri">
                <button disabled class="button-3" id="submit">Check DGA</button>
                <div class="result">
                    <div class="loading">
                        <span>↓</span>
                        <span style="--delay: 0.1s">↓</span>
                        <span style="--delay: 0.3s">↓</span>
                        <span style="--delay: 0.4s">↓</span>
                        <span style="--delay: 0.5s">↓</span>
                    </div>
                    <div class="successWrap">
                        <svg  version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                            <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1"
                                    cy="65.1" r="62.1" />
                            <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round"
                                      stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                        </svg>
                        <p class="success">Safe!!</p>
                    </div>

                    <div class="errorWrap">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                            <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1"
                                    cy="65.1" r="62.1" />
                            <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round"
                                  stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3" />
                            <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round"
                                  stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2" />
                        </svg>
                        <p class="error">Danger!!</p>
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
