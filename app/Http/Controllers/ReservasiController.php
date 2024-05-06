<?php

namespace App\Http\Controllers;
use App\Models\ReservasiModel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    //make insert data to order_meja
    public function insert(Request $request){
        $no_meja = $request->no_meja;
        $atas_nama = $request->atas_nama;
        $date = $request->date;
        $time = $request->time;
        $jumlah_orang = $request->jumlah;

        $data = array(
            'no_meja' => $no_meja,
            'atas_nama' => $atas_nama,
            'date' => $date,
            'time' => $time,
            'jumlah_orang' => $jumlah_orang
        );

        ReservasiModel::create($data);
        //send mail
        $this->sendmail($request->email,'Reservasi Meja','Meja Nomor '.$no_meja.' berhasil dipesan');
        //return redirect with alert
        return redirect('/')->with('alert', 'Meja Nomor '.$no_meja.' berhasil dipesan');
    }

    public function sendmail($to,$subject,$message){
        $client = new Client();

        $response = $client->post('https://api.mailersend.com/v1/email', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer mlsn.7cbdd0020e01e14b572276b7af46bf3c99a45e9c548636cd7fae6023a13fa2c6'
            ],
            'json' => [
                "from" => [
                    "email" => "AdminBalibul@trial-k68zxl2ekoklj905.mlsender.net"
                ],
                "to" => [
                    [
                        "email" => $to
                    ]
                ],
                "subject" => $subject,
                "text" =>   $message,
                "html" => "<p>".$message."</p>"
            ]
        ]);

        // Handle response as needed
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        return response()->json([
            'status_code' => $statusCode,
            'response_body' => $body
        ]);
    }
}