<?php 


function get_openAi_description($title,$no_of_words){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.openai.com/v1/chat/completions',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
			"model": "gpt-3.5-turbo",
			"messages": [{"role": "user", "content": "Write product description for \''.$title.'\' under \''.$no_of_words.'\' words and make it plagiarism free and should be understandable by all age groups and there should be no grammatical error"}]
		  }',
		  CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
			'Authorization: Bearer sk-xxxxxxxxxxxxx'
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		
		$response = json_decode($response); 
		
		$response_desc = nl2br( $response->choices[0]->message->content ) ; 

		return $response_desc;
	}





?>
