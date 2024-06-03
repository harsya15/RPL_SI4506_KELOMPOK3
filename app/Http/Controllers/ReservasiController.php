<?php

namespace App\Http\Controllers;
use App\Models\Reservasi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class ReservasiController extends Controller
{
    //make insert data to order_meja
    public function insert(Request $request){
        $no_meja = $request->no_meja;
        $atas_nama = $request->atas_nama;
        $date = $request->date;
        $time = $request->time;
        $jumlah_orang = $request->jumlah;
        $email = $request->email;

        $data = array(
            'no_meja' => $no_meja,
            'atas_nama' => $atas_nama,
            'date' => $date,
            'time' => $time,
            'jumlah_orang' => $jumlah_orang
        );

        Session::put('email_no_meja', $no_meja);
        Session::put('email_atas_nama', $atas_nama);
        Session::put('email_date', $date);
        Session::put('email_time', $time);
        Session::put('email_jumlah_orang', $jumlah_orang);

        $data["title"] = "From Admin Restoran";
        $data["body"] = "Your reservation have been Placed Successfully";
        $data['email'] = $email;
        
        Mail::send('mails.Pesan', $data, function($message)use($data) {
            $message->to($data["email"])
                    ->subject($data["title"]);
        });

        Reservasi::create($data);
        //send mail
        // $this->sendmail($request->email,'Reservasi Meja','Meja Nomor '.$no_meja.' berhasil dipesan');
        //return redirect with alert
        return redirect('/')->with('alert', 'Meja Nomor '.$no_meja.' berhasil dipesan');
    }

    public function sendmail($to, $subject, $message){
        $client = new Client();
    
        try {
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
                    "text" => $message,
                    "html" => "<p>".$message."</p>"
                ]
            ]);
    
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
    
            return response()->json([
                'status_code' => $statusCode,
                'response_body' => $body
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
    
            // Handle specific 422 error
            if ($statusCode == 422) {
                $errorData = json_decode($body, true);
                $errorMessage = $errorData['message'];
                return response()->json([
                    'status_code' => $statusCode,
                    'error_message' => $errorMessage,
                    'detailed_errors' => $errorData['errors']
                ], 422);
            }
    
            return response()->json([
                'status_code' => $statusCode,
                'error_message' => 'An error occurred while sending the email.',
                'response_body' => $body
            ], $statusCode);
        }
    }

    public function index()
    {
        $reservasi = Reservasi::all();
        return view('Reservasi.index', compact('reservasi'));
    }

    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('Reservasi.edit', compact('reservasi'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->update($data);
        return redirect(route('Reservasi.index'))->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();
        return redirect(route('Reservasi.index'))->with('success', 'Data berhasil dihapus');
    }
  
    //make insert data to order_meja
    public function getintouch(Request $request){
        $name = $request->name;
        $subject = $request->subject;
        $message = $request->message;
        $email = $request->email;

        Session::put('email_getintouch_name', $name);
        Session::put('email_getintouch_subject', $subject);
        Session::put('email_getintouch_message', $message);

        $data["title"] = "From Admin Restoran";
        $data["body"] = "Your reservation have been Placed Successfully";
        $data['email'] = $email;
        
        Mail::send('mails.Pesan', $data, function($message)use($data) {
            $message->to($data["email"])
                    ->subject($data["title"]);
        });

        return redirect('/');
    }
}