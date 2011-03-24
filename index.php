<?php  

	//$rss_address = 'http://twitter.com/statuses/user_timeline/7003692.rss';

	class TwitToImg {  
		
		function __construct() {   
			//echo "We just created and object!";  
		}  
		
		public function parseXml($rss_address) {
			$tweets = simplexml_load_file($rss_address);
			$tweetsList = array();
			
			if( $tweets->channel->item ):
				
				foreach ( $tweets->channel->item as $tweet ):
					array_push($tweetsList, '"'.$tweet.'"');
				endforeach;
				
				$this->printTwits($tweetsList);

			else:
				echo "Error: ".$tweets->error[0];
			endif;		
			
		}
		
		public function printTwits($tweetsList) {
			echo '<ul>';
			foreach($tweetsList as $i => $singleTweet):
				echo '<li><input type="checkbox" value="'.$i.'" />'.$singleTweet.'</li>';
			endforeach;
			echo '</ul>';
		}
	}  
	
	
	$instance = new TwitToImg(); // prints "We just created and object!"  
	
	$instance->parseXml('twit.rss'); 
?>  