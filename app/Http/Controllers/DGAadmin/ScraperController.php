<?php

namespace App\Http\Controllers\DGAadmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
//use Symfony\Component\BrowserKit\Request;


class ScraperController extends Controller
{


    public function scantable()
    {
        return view('admin.scans');
    }

    public function newscan()
    {
        return view('admin.spiderfoot_newscan');
    }


    public function scanning(Request $request)
    {
      $scanname=  $request->input('scanname');
      $scantarget=  $request->input('scantarget');
      //dd($scanname,$scantarget);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5001/startscan");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "scanname=$scanname&scantarget=$scantarget&usecase=all&modulelist=&typelist=");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size); // scanid yi çekip yolunda aş
        $body = substr($response, $header_size);

        curl_close ($ch);
        $x=strpos($header,"?id=");//69

        $newid=substr($header,$x+4,8);

        //dd($header,$body);


        // Further processing ...
        if ($response) {
            //$json=json_decode($response);
            //return view('admin.scan_name_detail',['json'=>$json,'scanid'=>$scanid]);
            // return view('admin.running_chart');
            return redirect(route('scans'));

        }
        else {
            echo "Unsuccesfull";
        }
        //return view('admin.spiderfoot_newscan');
    }


    public function scans()
    {
        $client = new Client();
        $url = "127.0.0.1:5001/scanlist";

        $response = $client->request('POST', $url);

        $response_status_code = $response->getStatusCode();

        if ($response_status_code === 200) {
            $response_body = $response->getBody()->getContents();
            $json = json_decode($response_body, true);
            return view('admin.scans', compact('json'));
        }
    }

    public function groupedlink(Request $request)
    {

        $scans=$request->input('array');
        $scanname=$request->input('scanname');
        $scanid=$request->input('id');

        $json=json_decode($scans);
        //dd($json,$scanname);
       $output= $this->scandetail($json[0],'type',$json[1]);// id burada
        //dd($output);
       $arr=json_decode($output);//affiliate
        //dd($arr);
        return view('admin.redirection_groupedlink',['array'=>$arr,'scanname'=>$scanname,'id'=>$scanid]); // json[0] id viewda ki
    }




    public function scandetail($scanid, $type,$scanname)//scan name click
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5001/scansummary");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "id=$scanid&by=$type");

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        //dd($response);
        curl_close ($ch);


        if ($response){
            return $response;
        }else{
            echo "Error";
        }


        /*
        // Further processing ...
        if ($response) {
            $json=json_decode($response);
            return view('admin.scan_name_detail',['json'=>$json,'scanid'=>$scanid,'scanname'=>$scanname]);

             }
        else {
            echo "Unsuccesfull";
        }*/

    }

    public function scandetaillist(Request $request)
    {
        $scanid=$request->input('id');
        $scanname=$request->input('scanid');
        //dd($scanid);
        $groupedarray=$request->input('groupedarray');
        //dd(unserialize($groupedarray));
        $groupedarray=unserialize($groupedarray);

        //dd($groupedarray);
        return view('admin.scan_name_detail',['array'=>$groupedarray,'scanid'=>$scanid,'scanname'=>$scanname]);
        //return view('admin.scans');
    }

    public function scandetailresults($scanid, $eventType)
    {
    //echo $scanid." " .$eventType;
    //exit();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5001/scaneventresults");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "id=$scanid&eventType=$eventType");//AFFILIATE_EMAIL...


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close ($ch);
       // dd($response);

        if ($response) {
            $json=json_decode($response);
            return view('admin.scan_detail_results',compact('json'));

        }
        else {
            echo "Unsuccesfull";
        }

    }


















    public function scanstop($scanid)
    {
        //echo $scanid." " .$eventType;
        //exit();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5001/stopscan?id=$scanid");



        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close ($ch);
        //dd($response);

        if ($response) {
            return redirect()->route('scans');
        }
        else {
            echo "Unsuccesfull";
        }

    }
    public function scandelete($scanid)
    {
        //echo $scanid." " .$eventType;
        //exit();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5001/scandelete?id=$scanid");



        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close ($ch);
        //dd($response);

        if ($response) {
            return redirect()->route('scans');
        }
        else {
            echo "Unsuccesfull";
        }

    }


    public function rerun($scanid)
    {
        //echo $scanid." " .$eventType;
        //exit();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5001/rerunscan?id=$scanid");



        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close ($ch);
        //dd($response);

        if ($response) {
            return redirect()->route('scans');
        }
        else {
            echo "Unsuccesfull";
        }

    }



}
