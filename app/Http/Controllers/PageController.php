<?php

namespace App\Http\Controllers;

use App\Models\Host;
use App\Models\Page;
use App\Models\Admin;
use App\Models\Log;
use App\Models\Template;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception; 

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.index', [
            'hosts' => Host::all(),
            'admins' => Admin::all(),
            'templates' => Template::all(),
            'logs' => Log::all(),

        ]);
    }

    public function email(Request $request)
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = "utf-8";
        $mail->SMTPDebug = 0;

        try {                
            $mail->isSMTP();
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Host = $request->host; //888888//
            $mail->SMTPAuth   = true;
            $mail->Username   = $request->sender_email; //888888//
            $mail->Password   = $password[$request->sender_email]; //888888// decrypt()


            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom($request->sender_email); //888888//
            $mail->addAddress($request->reciever); 


            // Content
            $mail->isHTML(true);
            $mail->Subject = $request->email_title; //888888//
            $header = '<html><head><link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200&display=swap" rel="stylesheet"><style>font-family: "Sarabun", sans-serif;</style></head><body>';
            $footer = '</body></html>';
            $body = $request->email_body; //888888//

            foreach ($request->all() as $key => $value) {
                $body = str_replace('#' . $key . '#', $value, $body);
            }
            
            $mail->msgHTML($header . $body . $footer);

            $mail->send();
            $message =  $request->code . ' - Message has been sent<br/>';
        } catch (Exception $e) {
            $message =  $request->code . " - Message could not be sent. Mailer Error: {$mail->ErrorInfo}<br/>";
            //echo $request->code . " - Message could not be sent.<br/>";
        }
        return response()->json($message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
