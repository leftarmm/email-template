<?php

namespace App\Http\Controllers;

use App\Models\Host;
use App\Models\Page;
use App\Models\Admin;
use App\Models\Log;
use App\Models\Template;
use App\Models\University;
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
            'universitys' => University::all(),

        ]);
    }

    public function email(Request $request)
    {
        //return response()->json(1);
        //return response()->json($request->all());
        $host = Host::find($request->host);
        $admin = Admin::find($request->admin);
        $template = Template::find($request->template);
        $university = University::find($request->university);

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
            $mail->Host =  $host->url; //888888//
            $mail->SMTPAuth   = true;
            $mail->Username   = $admin->email; //888888//
            $mail->Password   = decrypt($admin->password); //888888// decrypt()
            $mail->University   = $university->name;

            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom($admin->email); //888888//
            $mail->addAddress($request->reciever);


            // Content
            $mail->isHTML(true);
            $mail->Subject = $template->title; //888888//
            $header = '<html><head><link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200&display=swap" rel="stylesheet"><style>font-family: "Sarabun", sans-serif;</style></head><body>';
            $footer = '</body></html>';
            $body = $template->body; //888888//

            foreach ($request->all() as $key => $value) {
                $body = str_replace('#' . $key . '#', $value, $body);
            }

            $mail->msgHTML($header . $body . $footer);

            $mail->send();
            $message =  $request->code . ' - Message has been sent<br/>';
            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->reciever = $request->reciever;
            $log->relation = $university->id;
            //$log->relation = $university->id;
            $log->status = '1';
            $log->detail = $message;
            $log->save();
        } catch (Exception $e) {
            $message =  $request->code . " - Message could not be sent. Mailer Error: {$mail->ErrorInfo}<br/>";
            //echo $request->code . " - Message could not be sent.<br/>";
            $log = new Log();
            $log->user_id = auth()->user()->id;
            $log->reciever = $request->reciever;
            $log->relation = $university->id;
            //$log->relation = 
            $log->status = '0';
            $log->detail = $message;
            $log->save();
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
