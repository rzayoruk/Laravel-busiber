@extends('layouts.admin')


@section('title','DGA hunter')

@php
$mailarr=array();
$sslarr=array();
$dnsarr=array();
$whoisarr=array();
$other=array();
$empty=array();
@endphp
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$scanname}} Info's</h4>
                            <div class="template-demo">
                                @foreach($array as $elements)

                                @if(preg_match_all("/Email/i",$elements[1],$matches))
                                    @php
                                    //dd($array);
                                    array_push($mailarr,$elements);
                                    @endphp

                                @elseif(preg_match_all("/SSL/i",$elements[1],$matches))
                                @php
                                    //dd($array);
                                    array_push($sslarr,$elements);
                                @endphp

                                @elseif(preg_match_all("/DNS/i",$elements[1],$matches))
                                    @php
                                        //dd($array);
                                        array_push($dnsarr,$elements);
                                    @endphp

                                @elseif(preg_match_all("/whois/i",$elements[1],$matches))
                                    @php
                                        //dd($array);
                                        array_push($whoisarr,$elements);
                                    @endphp

                                    @else
                                        @php
                                            //dd($array);
                                            array_push($other,$elements);
                                        @endphp
                                @endif




                                @endforeach
                                    <div class="row">
                                    @if($mailarr)
                                        <form action="{{route('scandetaillist')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="groupedarray" value="{{serialize($mailarr)}}">
                                            <input type="hidden" name="id" value="{{$id}}">
                                            <input type="hidden" name="scanname" value="{{$scanname}}">
                                        <button type="submit" class="btn btn-inverse-primary btn-fw">Mail</button>
                                        </form>
                                    @endif
                                    @if($whoisarr)

                                        <form action="{{route('scandetaillist')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="groupedarray" value="{{serialize($whoisarr)}}">
                                            <input type="hidden" name="id" value="{{$id}}">
                                            <input type="hidden" name="scanname" value="{{$scanname}}">
                                            <button type="submit" class="btn btn-inverse-primary btn-fw">Whois</button>
                                        </form>
                                    @endif
                                    @if($dnsarr)

                                        <form action="{{route('scandetaillist')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="groupedarray" value="{{serialize($dnsarr)}}">
                                            <input type="hidden" name="id" value="{{$id}}">
                                            <input type="hidden" name="scanname" value="{{$scanname}}">
                                            <button type="submit" class="btn btn-inverse-primary btn-fw">DNS</button>
                                        </form>
                                    @endif
                                    @if($sslarr)
                                        <form action="{{route('scandetaillist')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="groupedarray" value="{{serialize($sslarr)}}">
                                            <input type="hidden" name="id" value="{{$id}}">
                                            <input type="hidden" name="scanname" value="{{$scanname}}">
                                            <button type="submit" class="btn btn-inverse-primary btn-fw">SSL</button>
                                        </form>
                                    @endif
                                    @if($other)
                                        <form action="{{route('scandetaillist')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="groupedarray" value="{{serialize($other)}}">
                                            <input type="hidden" name="id" value="{{$id}}">
                                            <input type="hidden" name="scanname" value="{{$scanname}}">
                                            <button type="submit" class="btn btn-inverse-primary btn-fw">Other's</button>
                                        </form>
                                    @endif

                                    @php
                                       //dd($mailarr,$sslarr,$dnsarr,$whoisarr);
                                    @endphp

                                    </div>

                            </div>
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
