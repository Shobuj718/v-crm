<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

class SmsController extends Controller
{
    public function sendSms()
    {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $client = new Client($accountSid, $authToken);

        dd('sms is not activate...');

        /*$sid    = "AC98c73307d26ce10a51b8e2ee6001dab0";
		$token  = "1cff3b0a83a7f27379cf1e2f66d678cc";
		$twilio = new Client($sid, $token);
*/
		$message = $client->messages
		                  ->create("+8801409400635", // to
		                           [
		                               "body" => "Hello shobuj, this is test message nly please ignore this message.",
		                               "from" => "+12513256794"
		                           ]
		                  );

		print($message);

        /*try
        {
            // Use the client to do fun stuff like send text messages!
            $client->messages->create(
            // the number you'd like to send the message to
                '+8801409400635',
           array(
                 // A Twilio phone number you purchased at twilio.com/console
                 'from' => '+12513256794',
                 // the body of the text message you'd like to send
                 'body' => 'Hey shobuj! It’s good to see you after long time!'
             )
	         );
	    }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }*/
	}
}
