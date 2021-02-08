<?php
/**
 * Created by PhpStorm.
 * User: sudeep
 * Date: 18/1/19
 * Time: 9:29 PM
 */

namespace App\Http\Controllers;

use App\Models\AdminHelper;
use App\Models\UserHelper;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\LoginHelper;
use App\Models\LoginWorker;
use Illuminate\Routing\Controller as BaseController;


class UserController extends BaseController
{

    /**
     * Function for getting user dashboard page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDashboard()
    {
      //print_r(session('timegenerated').'-'.time());die();

        if(!empty(session('accessToken')) && !empty(session('timegenerated')) && session('timegenerated') > time()-3600){

           if(session('user_id')){
              $userdata = User::find(session('user_id'));
              $username=$userdata->biname;
              $password=$userdata->bipassword;
             }else{
              $username='suntech.powerbi@kiteservices.com';
              $password='Zuy71742';
             }

            $responses = array();
            //session(['timegenerated' => time()]);
            $responses['access_token'] = session('accessToken');
        }else{


         if(session('user_id')){
          $userdata = User::find(session('user_id'));
          $username=$userdata->biname;
          $password=$userdata->bipassword;
         }else{
          $username='suntech.powerbi@kiteservices.com';
          $password='Zuy71742';
         }
	    $responses = array();
            $responses['access_token'] = $this->regenToken();
          }

        // $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
        //     'clientId'                => env('OAUTH_APP_ID'),
        //     'clientSecret'            => env('OAUTH_APP_PASSWORD'),
        //     'username'=>'suntech@kiteservices.com',
        //     'password'=>'Gottilla@666',
        //     'redirectUri'             => env('OAUTH_REDIRECT_URI'),
        //     'urlAuthorize'            => env('OAUTH_AUTHORITY').env('OAUTH_AUTHORIZE_ENDPOINT'),
        //     'urlAccessToken'          => env('OAUTH_AUTHORITY').env('OAUTH_TOKEN_ENDPOINT'),
        //     'urlResourceOwnerDetails' => '',
        //     'scopes'                  => env('OAUTH_SCOPES')
        // ]);

        // $authUrl = $oauthClient->getAuthorizationUrl();
        
        //'oauthState' => $oauthClient->getState(),
        // Save client state so we can validate in callback
        session(['accessToken' => $responses['access_token']]);

        $homeDashToken = session('report_tokens');
        $homePageUrl = "https://app.powerbi.com/groups/b962df5a-da74-4a57-8cd5-9d751a9fd539/reports/164eb29c-7c3e-45ba-84ee-5b517efb179f/ReportSection8dfe45042d52b5d217ee";

        list($groupId,$reportId,$sectionId) = $this->splitUrlVals($homePageUrl);

        if(!isset($homeDashToken['home']) || $homeDashToken['home'] =='') {

           //$this->makeBiCode('code');
           $token = $this->getEmbedToken('token',$homePageUrl);


        $url = '';
        // $groupId = "a51df78f-40d7-4c24-96d1-6f1af5054366";
        // $reportId = "517d2fc8-04a9-448c-9605-dcd6e7eebfcb";
        
        $embedToken = $token;
        if($embedToken !='')
          {
            

            $sessionEmbToken = session('report_tokens');
            $sessionEmbToken = is_null($sessionEmbToken) ? [] : $sessionEmbToken;
            $new = $sessionEmbToken  + ["home"=>$embedToken];
            session('report_tokens',$new);

          }
        } else {
          
          $token = $homeDashToken['home'];
        }
        $data = [];
        $data['groupId']=$groupId;
        $data['reportId']=$reportId;
        $data['sectionId']=$sectionId;
        $data['embedToken']= $token;

        //print_r($data);die();

        return view('contents.user.dashboard',compact('data','responses'));
    }


    public function tokensessioncheck(){


        if(!empty(session('accessToken')) && !empty(session('timegenerated')) && session('timegenerated') > time()-3600){

           if(session('user_id')){
              $userdata = User::find(session('user_id'));
              $username=$userdata->biname;
              $password=$userdata->bipassword;
             }else{
              $username='suntech.powerbi@kiteservices.com';
              $password='Zuy71742';
             }

            $responses = array();
            //session(['timegenerated' => time()]);
            $responses['access_token'] = session('accessToken');
        }else{

         if(session('user_id')){
          $userdata = User::find(session('user_id'));
          $username=$userdata->biname;
          $password=$userdata->bipassword;
         }else{
          $username='suntech.powerbi@kiteservices.com';
          $password='Zuy71742';
         }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://login.windows.net/common/oauth2/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                    "client_id=42283739-1b72-4a4c-af9e-6655ea649bd6&client_secret=kgR24]Ian9-M./7LoiODZ1FRb8rBv[=h&username=suntech.powerbi@kiteservices.com&password=Zuy71742&resource=https://analysis.windows.net/powerbi/api&grant_type=password&scopes=openid");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));


        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);

          $responses = json_decode($server_output,true);

          if(isset($responses['error']) && $responses['error'] == 'invalid_grant'){

              return redirect('/login')->with('error', 'Invalid Token')
                  ->with('errorDetail', 'Security Reason Service Not availabe for this account');

          }

          session(['timegenerated' => time()]);

        }

        // $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
        //     'clientId'                => env('OAUTH_APP_ID'),
        //     'clientSecret'            => env('OAUTH_APP_PASSWORD'),
        //     'username'=>'suntech@kiteservices.com',
        //     'password'=>'Gottilla@666',
        //     'redirectUri'             => env('OAUTH_REDIRECT_URI'),
        //     'urlAuthorize'            => env('OAUTH_AUTHORITY').env('OAUTH_AUTHORIZE_ENDPOINT'),
        //     'urlAccessToken'          => env('OAUTH_AUTHORITY').env('OAUTH_TOKEN_ENDPOINT'),
        //     'urlResourceOwnerDetails' => '',
        //     'scopes'                  => env('OAUTH_SCOPES')
        // ]);

        // $authUrl = $oauthClient->getAuthorizationUrl();
        
        //'oauthState' => $oauthClient->getState(),
        // Save client state so we can validate in callback
        session(['accessToken' => $responses['access_token']]);

         $this->makeBiCode('code');
         $token = $this->getEmbedToken('token');
    }

    public function iframes(Request $request){

        $this->tokensessioncheck();
        $data['token']=session('accessToken');
        $data['pageName']=$request->pageName;
        $reportId = $request->reportId;

        $data['url'] = "https://app.powerbi.com/reportEmbed?reportId=$reportId&groupId=f7432990-0ae5-438b-888d-e6fb21d3e1ad";

        $data['id']=$reportId;

        return view('contents.user.ifrmaes',compact('data'));
    }
    /**
     * Function for getting user reports page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getReports()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'tab_list' => $admin_helper->getReportsTabList()
        );
	if(empty(session('accessToken')) || !empty(session('timegenerated')) || session('timegenerated') < time()-3600){
           $this->regenToken();
        }
        return view('contents.user.reports')->with('data', $data);
    }


    /**
     * Function for getting kpi reports
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getKpiReports()
    {
        $admin_helper = new AdminHelper();

        $data = array(
            'tab_list' => $admin_helper->getReportsTabList()
        );

        return view('contents.user.kpi_reports')->with('data', $data);
    }


    /**
     * Function for getting login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLoginPage(Request $request)
    {
        $username = session('userName');

        if(!isset($username)) {
            $data = array(
                'session_user_id' => $request->session()->get('user_id')
            );

             return view('contents.user.login');
        } else {
            return redirect('/home');
        }
    }

    public function getRegisterPage(Request $request)
    {
        $username = session('userName');

        if(!isset($username)) {
            $data = array(
                'session_user_id' => $request->session()->get('user_id')
            );

             return view('contents.user.register');
        } else {
            return redirect('/home');
        }
    }
    public function userregister(Request $request){

       $validator =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

     
         if(!$validator->fails()){
            $newuser = User::create([
                'username' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'type' => 'user'
             ]);

              $user_name = $request->input('name');
              $password = $request->input('password');

              $login_helper = new LoginHelper();
              $result = $login_helper->checkLogin($user_name, $password);

    
              $request->session()->flash('alert-type', 'warning');
              $request->session()->flash('message', 'Your Account under verfication , Please wait..');
              return redirect('/');
            
         }else{
            $errors = $validator->errors();
             foreach ($errors->all() as $message) {
                $meserror =$message;
         }

            return view('contents.user.register',compact('meserror'));
         }
         

    }

    /**
     * Function for getting data from windows login
     *
     * @param Request $request
     * @param null $id
     * @param null $name
     * @param null $email
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getWindowsData(Request $request,  $id)
    {
        $request->session()->put('user_id', $id);
        $request->session()->put('user_type', 'user');
        $request->session()->flash('alert-type', 'success');
        $request->session()->flash('message', 'Logged in successfully');
        return redirect('user/dashboard');
    }

    /**
     * Function for logging user out'
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        session_destroy();
        $request->session()->flush();
        return redirect('login');
    }


    /**
     * Function for getting category iframes
     *
     * @param Request $request
     */
    public function getCategoryIframes(Request $request)
    {
        $category_id = $request->input('category_id');

        $user_helper = new UserHelper();
        $iframes = $user_helper->getCategoryIframes($category_id);

        $iframes_string = '<div class="row">';

        if(isset($iframes) && !empty($iframes))
        {
            foreach ($iframes as $iframe)
            {
                $iframes_string .= '<div class="col-sm-12 col-md-12 col-lg-12">';
                $iframes_string .= '<div class="card">';
                $iframes_string .= '<div class="card-block">';

                $iframes_string .= '<iframe src="https://www.signumsolutions.tech/lmad/public/iframes?reportId='. $iframe->report_id .'&amp;autoAuth=true&amp;pageName='. $iframe->section_id .'&amp;filterPaneEnabled=false&amp;navContentPaneEnabled=false"
                                    id="'. $iframe->report_id .'"
                                    allowFullScreen
                                    width="100%"
                                    height="'. $iframe->height .'"
                                    style="width:100%"
                                    frameborder="0"> ></iframe>';

                $iframes_string .= '</div>';
                    $iframes_string .= '</div>';
                $iframes_string .= '</div>';
            }
        }

        $iframes_string .= '</div>';

        echo json_encode($iframes_string);
        exit();
    }


    /**
     * Function for getting category iframes
     *
     * @param Request $request
     */
    public function getKpiCategoryIframes(Request $request)
    {
        $category_id = $request->input('category_id');

        $user_helper = new UserHelper();
        $iframes = $user_helper->getKpiCategoryIframes($category_id);

        $iframes_string = '<div class="row">';

        if(isset($iframes) && !empty($iframes))
        {
            foreach ($iframes as $iframe)
            {
                $iframes_string .= '<div class="col-sm-12 col-md-12 col-lg-12">';
                $iframes_string .= '<div class="card">';
                $iframes_string .= '<div class="card-block">';

                $iframes_string .= '<iframe src="https://www.signumsolutions.tech/lmad/public/iframes?reportId='. $iframe->report_id .'&amp;autoAuth=true&amp;pageName='. $iframe->section_id .'&amp;filterPaneEnabled=false&amp;navContentPaneEnabled=false"
                                    id="'. $iframe->report_id .'"
                                    allowFullScreen
                                    width="100%"
                                    height="'. $iframe->height .'"
                                    style="width:100%"
                                    frameborder="0"> ></iframe>';

                $iframes_string .= '</div>';
                $iframes_string .= '</div>';
                $iframes_string .= '</div>';
            }
        }

        $iframes_string .= '</div>';

        echo json_encode($iframes_string);
        exit();
    }

    public function getEmbedToken($url,$reportUrl ='')
    {

      $url = "https://app.powerbi.com/groups/a51df78f-40d7-4c24-96d1-6f1af5054366/reports/517d2fc8-04a9-448c-9605-dcd6e7eebfcb/ReportSection";
        $groupId = "a51df78f-40d7-4c24-96d1-6f1af5054366";
        $reportId = "517d2fc8-04a9-448c-9605-dcd6e7eebfcb";
        $graph_token = session('accessToken');
     
        if($reportUrl !='') {
          list($groupId,$reportId,$sectionId) = $this->splitUrlVals($reportUrl);  
        }
        $fullUrl = "https://api.powerbi.com/v1.0/myorg/groups/".$groupId."/reports/".$reportId."/GenerateToken";


        $embedToken ='';

        if($graph_token && $fullUrl) {
           // start 
          $ch = curl_init( $fullUrl );
          $data = ["accessLevel"=> "View", "allowSaveAs" => "false"];

          $header = array();
          $header[] = 'Content-type: application/json';
          $header[] = 'Authorization: Bearer '.$graph_token;

          $payload = json_encode($data);

          curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
          curl_setopt( $ch, CURLOPT_HTTPHEADER, $header);
          # Return response instead of printing.
          curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );


          # Send request.
          $result = curl_exec($ch);

          curl_close($ch);

          if ($result === FALSE) {
              printf("cUrl error (#%d): %s<br>\n", curl_errno($handle),htmlspecialchars(curl_error($handle)));
          }
          # Print response.
          $jsonObj = json_decode($result);
          $response = json_decode($result);

          if($jsonObj)
          {

            $embedToken = $jsonObj->token;
          }

        } 
    return $embedToken;
    }


    public function makeBiCode($authCode)
    {
            $request_options = [
              'form_params' => [
                'code' => $authCode,
                 'client_id'                => 'a2d22152-53b6-4163-9117-16826ffe2836',
                'client_secret'            => 'zD7nsyvVnl1L5BeBkjcOtppVWeO0i8CDOlJJonfwdf0=',
                'redirect_uri' => env('OAUTH_REDIRECT_URI'),
                'resource' =>'https://analysis.windows.net/powerbi/api',
                'grant_type' => 'password',
                'username'=>'suntech.powerbi@kiteservices.com',
                'password'=>'Zuy71742'
              ],
            ];

            $client = new \GuzzleHttp\Client();

            $tokenEndpoint = 'https://login.microsoftonline.com/kiteservices.com/oauth2/token';//env('OAUTH_AUTHORITY').env('OAUTH_TOKEN_ENDPOINT');
            
            try {
              $response = $client->post($tokenEndpoint, $request_options);
              $response_data = json_decode((string) $response->getBody(), TRUE);
              
              // Expected result.
              $tokens = [
                'access_token' => $response_data['access_token'],
              ];
              if (array_key_exists('expires_in', $response_data)) {
                $tokens['expire'] = 300 + $response_data['expires_in'];
              }


        
             // $this->setAccessToken($response_data['access_token']);


              $this->storeTokens($response_data['access_token'], '');
            
            } catch(\Exception $ex)
            {
                echo $ex->getMessage();

                die();

            }   

            return $response_data['access_token'];
    }

    public function getAccessToken() {
        // Check if tokens exist
        // if (empty(session('accessToken')) ||
        //     empty(session('refreshToken')) ||
        //     empty(session('tokenExpires'))) {
        //     return '';
        // }

        // // Check if token is expired
        // //Get current time + 5 minutes (to allow for time differences)
        // $now = time() + 300;
        // if (session('tokenExpires') <= $now) {
            // Token is expired (or very close to it)
            // so let's refresh

            // Initialize the OAuth client
            $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
                'clientId'                => env('OAUTH_APP_ID'),
                'clientSecret'            => env('OAUTH_APP_PASSWORD'),
                'redirectUri'             => env('OAUTH_REDIRECT_URI'),
                'urlAuthorize'            => env('OAUTH_AUTHORITY').env('OAUTH_AUTHORIZE_ENDPOINT'),
                'urlAccessToken'          => env('OAUTH_AUTHORITY').env('OAUTH_TOKEN_ENDPOINT'),
                'urlResourceOwnerDetails' => '',
                'scopes'                  => env('OAUTH_SCOPES')
            ]);


            try {
                $newToken = $oauthClient->getAccessToken('refresh_token', [
                    'refresh_token' => session('refreshToken')
                ]);


                // Store the new values
                $this->updateTokens($newToken);

                return $newToken->getToken();
            }
            catch (League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
                return '';
            }
        //}

        // Token is still valid, just return it
        return session('accessToken');
    }

    public function storeTokens($accessToken, $authCode) {
        session([
            'accessToken' => $accessToken,
            'authCode' =>$authCode,
            'refreshToken' => $accessToken,
            'tokenExpires' => $accessToken,
            'userName' => 'test1',
            'userEmail' => 'test@gmal.com'
        ]);
    }

    public function updateTokens($accessToken) {
        session([
            'accessToken' => $accessToken,
            'refreshToken' => $accessToken,
            'tokenExpires' => $accessToken
        ]);
    }

    public function clearTokens() {
        session()->forget('accessToken');
        session()->forget('refreshToken');
        session()->forget('tokenExpires');
        session()->forget('userName');
        session()->forget('userEmail');
    }


    public function splitUrlVals($url)
    {
      $url = str_replace("https://app.powerbi.com/","",$url);

      $urlArr = explode("/",$url);

      $groupId = $urlArr[1];
      $reportId = $urlArr[3];
      $sectionId =  isset($urlArr[4]) ? $urlArr[4] : '';

      return [$groupId,$reportId,$sectionId];
    }


    public function getCategoryData(Request $request)
    {
        $category_id = $request->input('category_id');

        $user_helper = new UserHelper();
        $iframes = $user_helper->getCategoryIframes($category_id);      

        foreach($iframes as $ky =>$frame)
        {
          $reportUrl = $frame->report_id;  
        } 

        //dump($reportUrl);
        list($groupId,$reportId,$sectionId) = $this->splitUrlVals($reportUrl);
        
        // dump($groupId);
        // dump($reportId);
        // dump($sectionId);

        $sessionEmbToken = session('report_tokens');
  
        $sessionEmbTokenArr = is_null($sessionEmbToken) ? []: $sessionEmbToken;
        $token = $this->getEmbedToken('token',$reportUrl); 

        $responseArr = ['groupId'=>$groupId,'reportId'=>$reportId,'sectionId'=>$sectionId,'token'=>$token];
        echo json_encode($responseArr);
        exit();
    }
	public function regenToken()
    {
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL,"https://login.windows.net/common/oauth2/token");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS,
                  "client_id=42283739-1b72-4a4c-af9e-6655ea649bd6&client_secret=kgR24]Ian9-M./7LoiODZ1FRb8rBv[=h&username=suntech.powerbi@kiteservices.com&password=Zuy71742&resource=https://analysis.windows.net/powerbi/api&grant_type=password&scopes=openid");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
      // receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $server_output = curl_exec ($ch);
      curl_close ($ch);
      $responses = json_decode($server_output,true);
	//dd($responses);
      if(isset($responses['error']) && $responses['error'] == 'invalid_grant'){
           return redirect('/login')
           ->with('error', 'Invalid Token')
           ->with('errorDetail', 'Security Reason Service Not availabe for this account ');
      }

      session(['timegenerated' => time()]);

      session(['accessToken' => $responses['access_token']]);
	
	return $responses['access_token'];
    }
}
