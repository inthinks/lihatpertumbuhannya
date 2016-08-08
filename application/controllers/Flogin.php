<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Flogin extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$fb = new Facebook\Facebook([
		  'app_id' => '1654877454793407',
		  'app_secret' => '50fe6e6cb6606a34d7e32261821f476b',
		  'default_graph_version' => 'v2.2',
		  //'default_access_token' => '{access-token}', // optional
		]);

		// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
		   $helper = $fb->getRedirectLoginHelper();
		  // pre($helper = $fb->getJavaScriptHelper());die;
		//   $helper = $fb->getCanvasHelper();
		//   $helper = $fb->getPageTabHelper();

		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl(base_url('flogin').'/fb_callback', $permissions);
		echo $loginUrl; die;
		echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

		/*try {
		  // Get the Facebook\GraphNodes\GraphUser object for the current user.
		  // If you provided a 'default_access_token', the '{access-token}' is optional.
		  $response = $fb->get('/me', '{access-token}');
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		$me = $response->getGraphUser();
		echo 'Logged in as ' . $me->getName();*/
	}

	function test(){
		$this->load->view('test');
	}

	function fb_callback(){
		$fb = new Facebook\Facebook([
		  'app_id' => '1654877454793407', // Replace {app-id} with your app id
		  'app_secret' => '50fe6e6cb6606a34d7e32261821f476b',
		  'default_graph_version' => 'v2.6',
		  ]);

		$helper = $fb->getRedirectLoginHelper();
				try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		if (! isset($accessToken)) {
		  if ($helper->getError()) {
		    header('HTTP/1.0 401 Unauthorized');
		    echo "Error: " . $helper->getError() . "\n";
		    echo "Error Code: " . $helper->getErrorCode() . "\n";
		    echo "Error Reason: " . $helper->getErrorReason() . "\n";
		    echo "Error Description: " . $helper->getErrorDescription() . "\n";
		  } else {
		    header('HTTP/1.0 400 Bad Request');
		    echo 'Bad request';
		  }
		  exit;
		}

		// Logged in
		echo '<h3>Access Token</h3>';
		var_dump($accessToken->getValue());

		// The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

		// Get the access token metadata from /debug_token
		$tokenMetadata = $oAuth2Client->debugToken($accessToken);
		echo '<h3>Metadata</h3>';
		var_dump($tokenMetadata);

		// Validation (these will throw FacebookSDKException's when they fail)
		$tokenMetadata->validateAppId('1654877454793407'); // Replace {app-id} with your app id
		// If you know the user ID this access token belongs to, you can validate it here
		//$tokenMetadata->validateUserId('123');
		$tokenMetadata->validateExpiration();

		if (! $accessToken->isLongLived()) {
		  // Exchanges a short-lived access token for a long-lived one
		  try {
		    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		  } catch (Facebook\Exceptions\FacebookSDKException $e) {
		    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
		    exit;
		  }

		  echo '<h3>Long-lived</h3>';
		  var_dump($accessToken->getValue());
		}
	}


}
?>