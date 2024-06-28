<?php

function code($url){
  $ch = curl_init();
  $headers = [
    'sec-ch-ua: "Not/A)Brand";v="8", "Chromium";v="126", "Google Chrome";v="126"',
    'sec-ch-ua-mobile: ?1',
    'sec-ch-ua-platform: "Android"',
    'upgrade-insecure-requests: 1',
    'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36',
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'sec-fetch-site: cross-site',
    'sec-fetch-mode: navigate',
    'sec-fetch-dest: iframe',
    'referer: https://www.jobstreet.co.id/id/job/76786313?type=standout&ref=search-standalone',
    'accept-encoding: gzip',
    'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
    'cookie: did=s%3Av0%3Affe66420-27a9-11ef-b339-29499a429959.izoxySrMB6LrmuEOMun%2Frnov6U2hNIF11VHjNeRZlKk',
    'cookie: _hjSessionUser_640499=eyJpZCI6Ijc4MjY4NWQ1LTkyZDMtNWUyOS1iMTkzLTlhMzJmMTBkNjcxZCIsImNyZWF0ZWQiOjE3MTgwNzk2NjU4NzksImV4aXN0aW5nIjp0cnVlfQ==',
    'cookie: auth0=s%3AsHq5Iujy7uOnYqzZv46lpYjOXLNgMmGq.CMlvQZL7MX2GmHL6cTo2NxGvcGXHZZNZDOphVzFx4S8',
    'cookie: __cf_bm=DI6c2BFWcpzNuTYAeDRTvN2McNILko.ub5PZfSz8F2A-1719218183-1.0.1.1-keBgB02gUtfHrCuMNiC06XFpr5Oka1RG7fOA4E8hP3XP3KXIZeQpkBZTHU7A1lJLOzHfV.9EzgReTNAHu6ZYiQ','priority: u=0, i'];
//  // Set opsi cURL
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_ENCODING, "gzip");

  $response = curl_exec($ch);
  
  // Periksa kesalahan
  if ($response === false) {
    die('Error occurred: ' . curl_error($ch));
  }
  curl_close($ch);
  if (preg_match('/"code":"([^"]+)"/',$response , $matches)) {
  $code = $matches[1];
  return $code;
  } else {
    echo "[i] Authorization cods tidak ditemukan \n";
  }
}
function auth($url,$data){
// Inisialisasi cURL
  $ch = curl_init();
  $headers = [
      'upgrade-insecure-requests: 1',
      'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36',
      'accept: application/json',
      'content-type: application/json',
      'content-length: '.strlen($data),
      'referer: https://www.jobstreet.co.id/id/job/76786313?type=standout&ref=search-standalone',
      'accept-encoding: gzip',
      'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7'
  ];
  // Set opsi cURL
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_ENCODING, "gzip");
  
  // Eksekusi permintaan
  $response = curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  file_put_contents('auth.json', $response);
  echo "[auth] HTTP Response Code: " . $httpCode."\n";
  echo "[auth] Authorization tersimpan \n";
  // Periksa kesalaha
  if ($response === FALSE) {
      die('Error occurred: ' . curl_error($ch));
  }
  curl_close($ch);
  $time = time();
  return  $time;
}
function job($url){
$ch = curl_init($url);
$headers = [
    "Host: www.jobstreet.co.id",
    'sec-ch-ua: "Not/A)Brand";v="8", "Chromium";v="126", "Google Chrome";v="126"',
    "seek-request-country: ID",
    "sec-ch-ua-mobile: ?1",
    "user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36",
    "accept: application/json",
    "seek-request-brand: jobstreet",
    "x-seek-site: Chalice",
    "x-seek-checksum: 12bd713d",
    'sec-ch-ua-platform: "Android"',
    "sec-fetch-site: same-origin",
    "sec-fetch-mode: cors",
    "sec-fetch-dest: empty",
    "referer: https://www.jobstreet.co.id/id/jobs-in-information-communication-technology?subclassification=6288%2C6290%2C6291%2C6289%2C6293%2C6303",
    "accept-encoding: gzip, deflate, br, zstd",
    "accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7",
    "cookie: sol_id=7021ada4-e6c0-4381-b8dd-5b11351b814a; JobseekerSessionId=f1e0eea7-dc0f-4b89-b675-f6b602601481; JobseekerVisitorId=f1e0eea7-dc0f-4b89-b675-f6b602601481; da_sa_candi_sid=1719571815695; _legacy_auth0.qGPufUg5iBf1s57sfXl6gBdGF9JYInBI.is.authenticated=true; auth0.qGPufUg5iBf1s57sfXl6gBdGF9JYInBI.is.authenticated=true; last-known-sol-user-id=e13c9648299c2a228d718970546cc5d1b8f706466f150785b3f2dd538bbb071c455155ce05876d8102a5d37ae78b1c79592f12e8ebf32b2bcfa8b508d929213b975e708716a8ace0a4fc97bd8de6adbfe50cc80ff00f7dcc5faf74332e1782aeda96a5dfb7f9daa7c15eec8e38cf8889d62a34e3e33b77240810ad717bd0061849b02fb9fb718dcd0e634721a4598f1d3c9107c44f486f790569fad43889e30994b94d5fc17f80; _gcl_au=1.1.957623390.1719571847; ajs_anonymous_id=c909916e61678cff721671da27e7adce; _fbp=fb.2.1719571848133.596107662406438964; _hjSessionUser_640499=eyJpZCI6IjczZDBjZGVkLTIxN2EtNWYwMC1hZWQzLTk4ZWQ4OGNkMTIwNCIsImNyZWF0ZWQiOjE3MTk1NzE4NDgzMDksImV4aXN0aW5nIjp0cnVlfQ==; _hjSession_640499=eyJpZCI6Ijk2MzUwNmU2LTUwNzEtNDU2Mi1hOWIwLTU5MTk2NDA4MWZmYyIsImMiOjE3MTk1NzM5Njc2NzMsInMiOjAsInIiOjAsInNiIjowLCJzciI6MCwic2UiOjAsImZzIjowLCJzcCI6MH0=; __cf_bm=fVLkEL5PMqFeHNFLwkkV4P3fdWSkzxOxZRl1sTdjWUI-1719575370-1.0.1.1-YnXHK6hD.ioWLRZj8ua1jYilffhy5DKJpM2gVZY2HY93.0cf4gBc795umusmbjSsEgc_NqBZI0aIbIAnrCFqEA; da_cdt=visid_01905e779d0d001a5080d124774a0006f001c067005a9-sesid_1719571815695; utag_main=v_id:01905e779d0d001a5080d124774a0006f001c067005a9\$_sn:1\$_se:50%3Bexp-session\$_ss:0%3Bexp-session\$_st:1719577178043%3Bexp-session\$ses_id:1719571815695%3Bexp-session\$_pn:18%3Bexp-session\$_prevpage:home%3Bexp-1719578978079\$dc_visit:1\$dc_event:45%3Bexp-session\$dc_region:ap-east-1%3Bexp-session; _hjHasCachedUserAttributes=true; _dd_s=rum=0&expire=1719576317572"
    
];
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

// Eksekusi cURL dan ambil responsnya
$response = curl_exec($ch);

// Cek apakah ada kesalahan
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    return $response;
}
curl_close($ch);
}
function graphql($url, $data,$auth) {
    $ch = curl_init();
    $headers = array(
        'Content-Type: application/json',
        'Content-Length: '.strlen($data),
        'Authorization: '.$auth,
        'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36',
        'Accept: application/features.seek.all+json, */*',
        'Origin: https://www.jobstreet.co.id',
        'Cookie: sol_id=7021ada4-e6c0-4381-b8dd-5b11351b814a;JobseekerSessionId=f1e0eea7-dc0f-4b89-b675-f6b602601481;JobseekerVisitorId=f1e0eea7-dc0f-4b89-b675-f6b602601481;__cf_bm=gfSRKujUNrdNZXx..BEb9p23APXpFfgZUR66vd.4n84-1719571810-1.0.1.1-424u6wWp012D2OX1jmhch9_TbSi4WyW2dxDq7H.noZI2kMw0UOWOmEGM0LdTfkKRbXJ3UWXNmqHaI2LThpukCw;da_sa_candi_sid=1719571815695;_legacy_auth0.qGPufUg5iBf1s57sfXl6gBdGF9JYInBI.is.authenticated=true;auth0.qGPufUg5iBf1s57sfXl6gBdGF9JYInBI.is.authenticated=true;last-known-sol-user-id=e13c9648299c2a228d718970546cc5d1b8f706466f150785b3f2dd538bbb071c455155ce05876d8102a5d37ae78b1c79592f12e8ebf32b2bcfa8b508d929213b975e708716a8ace0a4fc97bd8de6adbfe50cc80ff00f7dcc5faf74332e1782aeda96a5dfb7f9daa7c15eec8e38cf8889d62a34e3e33b77240810ad717bd0061849b02fb9fb718dcd0e634721a4598f1d3c9107c44f486f790569fad43889e30994b94d5fc17f80;_gcl_au=1.1.957623390.1719571847;ajs_anonymous_id=c909916e61678cff721671da27e7adce;_fbp=fb.2.1719571848133.596107662406438964;_hjSession_640499=eyJpZCI6IjgzZGIwY2UyLWQ4OGMtNDVkNS1iYjhlLTVjNjhkZDE2NTVjMyIsImMiOjE3MTk1NzE4NDgzMTksInMiOjAsInIiOjAsInNiIjowLCJzciI6MCwic2UiOjAsImZzIjoxLCJzcCI6MH0=;_hjSessionUser_640499=eyJpZCI6IjczZDBjZGVkLTIxN2EtNWYwMC1hZWQzLTk4ZWQ4OGNkMTIwNCIsImNyZWF0ZWQiOjE3MTk1NzE4NDgzMDksImV4aXN0aW5nIjp0cnVlfQ==;da_cdt=visid_01905e779d0d001a5080d124774a0006f001c067005a9-sesid_1719571815695;_dd_s=rum=0&expire=1719573044411;utag_main=v_id:01905e779d0d001a5080d124774a0006f001c067005a9$_sn:1$_se:11%3Bexp-session$_ss:0%3Bexp-session$_st:1719573944454%3Bexp-session$ses_id:1719571815695%3Bexp-session$_pn:7%3Bexp-session$_prevpage:home%3Bexp-1719575561936$dc_visit:1$dc_event:7%3Bexp-session$dc_region:ap-east-1%3Bexp-session',
        'Referer: https://www.jobstreet.co.id/id/job/',
    );
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    
    // Eksekusi curl dan dapatkan respons
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "[graphql] HTTP Response Code: " . $httpCode."\n";
    curl_close($ch);
    return $response; // Mengembalikan respons
}
function generateUUIDv4() {
    // Hasilkan 16 byte acak
    $data = random_bytes(16);

    // Set bit ke-4 dan ke-3 dari byte ke-7 dan ke-9 sesuai dengan spesifikasi UUID v4
    $data[6] = chr((ord($data[6]) & 0x0f) | 0x40); // Versi 4
    $data[8] = chr((ord($data[8]) & 0x3f) | 0x80); // Varian

    // Format byte menjadi string UUID
    return sprintf(
        '%02x%02x%02x%02x-%02x%02x-%02x%02x-%02x%02x-%02x%02x%02x%02x%02x%02x',
        ord($data[0]), ord($data[1]), ord($data[2]), ord($data[3]),
        ord($data[4]), ord($data[5]),
        ord($data[6]), ord($data[7]),
        ord($data[8]), ord($data[9]),
        ord($data[10]), ord($data[11]), ord($data[12]), ord($data[13]), ord($data[14]), ord($data[15])
    );
}
function Task($auth,$requestBody1,$requestBody2,$requestBody3,$requestBody4,$requestBody5,$resume,$sessionId,$url,$urlauth,$urljob){
    $applicationCorrelationId= generateUUIDv4();
    //JOB EXIST
    $job = job($urljob);
    $job_info=json_decode($job,true);
    $jobstar=$job_info['data'];
    $jobselect=0;
    foreach ($jobstar as $job){
      if($jobselect>=5){
        break;
      } else {
      $jobId=$job['id'];
      echo("---------$jobId--------\n");
      //DAFTAR PERMINTAAN
      $responseAnswer = graphql($url, $requestBody1,$auth);
      $responseApplied = graphql($url, $requestBody5,$auth);
      $responseResume = graphql($url, $requestBody2,$auth);
      $responseQuestions = graphql($url, $requestBody3,$auth);
      $responseProfile= graphql($url, $requestBody4,$auth);
      $Applied=json_decode($responseApplied,true);
      $isApplied=$Applied['data']['jobDetails']['personalised']['appliedDateTime'];
      if ($isApplied==null){
      echo("[is_applied] False\n");
      //// DECODE ANSWER DAN QUESTION
      $rawdataAnswer = json_decode($responseAnswer, true);
      $dataQuestions = json_decode($responseQuestions, true);
      $dataAnswer = $rawdataAnswer[0]['data']['jobApplicationProcess']['questionnaire']['questions'];
      $answersdatafinal= '[
          {
              "operationName": "ApplySubmitApplication",
              "variables": {
                  "input": {
                      "jobId": "'.$jobId.'",
                      "correlationId": "'.$applicationCorrelationId.'",
                      "zone": "asia-4",
                      "profilePrivacyLevel": "Standard",
                      "resume": {
                          "id": "'.$resume.'",
                          "uri": "/v2/blobstore/resumes/'.$resume.'/",
                          "idFromResumeResource": -1
                      },
                      "mostRecentRole": {
                          "company": "Sekretariat DPRD Kabupaten Lebak ",
                          "title": "Office /IT Support",
                          "started": {
                              "year": 2023,
                              "month": 7
                          },
                          "finished": {
                              "year": 2023,
                              "month": 12
                          }
                      },
                      "questionnaireAnswers": []
                  },
                  "locale": "id-ID"
              },
              "query": "mutation ApplySubmitApplication($input: SubmitApplicationInput!, $locale: Locale) {\n  submitApplication(input: $input) {\n    ... on SubmitApplicationSuccess {\n      applicationId\n      __typename\n    }\n    ... on SubmitApplicationFailure {\n      errors {\n        message(locale: $locale)\n        __typename\n      }\n      __typename\n    }\n    __typename\n  }\n}"
          }
      ]';
      $answersdatafinal = json_decode($answersdatafinal,true);
      //INIALISASI Q&A
      $countquestions =count($dataAnswer) - 1;
      foreach ($dataAnswer as $answer){
        $typeAnswer=$answer['__typename'];
        $lastAnswer = $answer['lastAnswer'];
        $questionId = $answer['id'];
        $textAnswer = $answer['text'];
        $optionsAnswer = $answer['options'];
        
        $key1 = ['experience','Information','Technology','year'];
        $key2 = ['language'];
        $countkey1 = 0;
        $countkey2 = 0;
        $countkey3 = 0;
        for($i=0;$i< count($key1);$i++){
          $countkey1 += substr_count($textAnswer,$key1[$i]);
        }
        for($i=0;$i< count($key2);$i++){
          $countkey2 += substr_count($textAnswer,$key2[$i]);
        }
        $checklastAnswer = is_null($lastAnswer);
        if($checklastAnswer!=true){
          $answers[]=$lastAnswer;
          } else if($checklastAnswer==true and $countkey1>=1 and $typeAnswer=='SingleChoiceQuestion') {
          $answers[]=$answer['options'][1];
          } else if($checklastAnswer==true and $countkey2>=1 and $typeAnswer=='MultipleChoiceQuestion') {
          $answers[]=$answer['options'][2];
          } else if($checklastAnswer==true and $countkey2==0 and $typeAnswer=='MultipleChoiceQuestion') {
          $answers[]=$answer['options'][$countquestions];
          } else {
          $answers[]=$answer['options'][0];
          }
          $input = [
            "questionId" => $questionId,
            "answers" => $answers
            ];
          unset($input['answers'][0]['__typename']);
          $answersdatafinal[0]['variables']['input']['questionnaireAnswers'][] = $input;
          $answers=[];
          $countquestions ++;
      }
      $answersfinal=json_encode($answersdatafinal, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
      $apply=graphql($url, $answersfinal,$auth);
      echo($apply);
      } else {
        echo("[is_applied] True\n");
    }
      $jobselect++;
    }
  }
  echo("[i] Loading");
  $time=time();
  sleep(60);
  echo("\r                                  \r");
  echo("\n");
  return $time;
  }
// URL yang akan diakses

$urljob = "https://www.jobstreet.co.id/api/chalice-search/v4/search?siteKey=ID-Main&sourcesystem=houston&userqueryid=11d90a2aef3e7be3ffaf460caab64f22-6583406&userid=f1e0eea7-dc0f-4b89-b675-f6b602601481&usersessionid=f1e0eea7-dc0f-4b89-b675-f6b602601481&eventCaptureSessionId=f1e0eea7-dc0f-4b89-b675-f6b602601481&page=1&seekSelectAllPages=true&classification=6281&subclassification=6288,6290,6291,6289,6293,6303&pageSize=30&include=seodata&locale=id-ID&seekerId=575724648&solId=7021ada4-e6c0-4381-b8dd-5b11351b814a";
  $sessionId = '1144b545-b1dc-4efa-8990-b522c2291b97';
  $jobId = '76256031';
  $resume = '08de56ab-3ed7-4489-9a72-71c0e3f17f97';
  $url = 'https://www.jobstreet.co.id/graphql';
  $urlauth = 'https://login.seek.com/oauth/token';
  $applicationCorrelationId = generateUUIDv4();
// Perlengkapan permintaan
$requestBody1 = '[{"operationName":"GetJobApplicationProcess","variables":{"jobId":"'.$jobId.'","isAuthenticated":true,"locale":"id-ID"},"query":"query GetJobApplicationProcess($jobId: ID!, $isAuthenticated: Boolean!, $locale: Locale) {\n  jobApplicationProcess(jobId: $jobId) {\n    ...LocationFragment\n    ...ClassificationFragment\n    ...DocumentsFragment\n    ...QuestionnaireFragment\n    job {\n      ...JobFragment\n      __typename\n    }\n    linkOut\n    extractedRoleTitles\n    __typename\n  }\n}\n\nfragment LocationFragment on JobApplicationProcess {\n  location {\n    id\n    name\n    __typename\n  }\n  state {\n    id\n    __typename\n  }\n  area {\n    id\n    name\n    __typename\n  }\n  __typename\n}\n\nfragment ClassificationFragment on JobApplicationProcess {\n  classification {\n    id\n    name\n    subClassification {\n      id\n      name\n      __typename\n    }\n    __typename\n  }\n  __typename\n}\n\nfragment DocumentsFragment on JobApplicationProcess {\n  documents {\n    lastAppliedResumeIdPrefill @include(if: $isAuthenticated)\n    selectionCriteriaRequired\n    lastWrittenCoverLetter @include(if: $isAuthenticated) {\n      content\n      __typename\n    }\n    __typename\n  }\n  __typename\n}\n\nfragment QuestionnaireFragment on JobApplicationProcess {\n  questionnaire {\n    questions @include(if: $isAuthenticated) {\n      id\n      text\n      __typename\n      ... on SingleChoiceQuestion {\n        lastAnswer {\n          id\n          text\n          uri\n          __typename\n        }\n        options {\n          id\n          text\n          uri\n          __typename\n        }\n        __typename\n      }\n      ... on MultipleChoiceQuestion {\n        lastAnswers {\n          id\n          text\n          uri\n          __typename\n        }\n        options {\n          id\n          text\n          uri\n          __typename\n        }\n        __typename\n      }\n      ... on PrivacyPolicyQuestion {\n        url\n        options {\n          id\n          text\n          uri\n          __typename\n        }\n        __typename\n      }\n    }\n    __typename\n  }\n  __typename\n}\n\nfragment JobFragment on Job {\n  id\n  createdAt {\n    shortLabel\n    __typename\n  }\n  content\n  title\n  advertiser {\n    id\n    name(locale: $locale)\n    __typename\n  }\n  abstract\n  source\n  products {\n    branding {\n      id\n      logo {\n        url\n        __typename\n      }\n      __typename\n    }\n    __typename\n  }\n  tracking {\n    hasRoleRequirements\n    __typename\n  }\n  __typename\n}"}]';
$requestBody2 = '[{"operationName":"GetJobDetails","variables":{"jobId":"'.$jobId.'","locale":"id-ID"},"query":"query GetJobDetails($jobId: ID!, $locale: Locale) {\n  jobDetails(id: $jobId) {\n    job {\n      ...JobFragment\n      __typename\n    }\n    __typename\n  }\n}\n\nfragment JobFragment on Job {\n  id\n  createdAt {\n    shortLabel\n    __typename\n  }\n  content\n  title\n  advertiser {\n    id\n    name(locale: $locale)\n    __typename\n  }\n  abstract\n  source\n  products {\n    branding {\n      id\n      logo {\n        url\n        __typename\n      }\n      __typename\n    }\n    __typename\n  }\n  tracking {\n    hasRoleRequirements\n    __typename\n  }\n  __typename\n}"},{"operationName":"GetApplicationQuestions","variables":{"jobId":"'.$jobId.'"},"query":"query GetApplicationQuestions($jobId: ID!) {\n  viewer {\n    _id\n    yearsOfExperience {\n      newToWorkforce\n      __typename\n    }\n    __typename\n  }\n  jobApplicationProcess(jobId: $jobId) {\n    questionnaire {\n      questions {\n        id\n        __typename\n      }\n      __typename\n    }\n    __typename\n  }\n}"},{"operationName":"DocumentsQuery","variables":{"jobId":"'.$jobId.'"},"query":"query DocumentsQuery($jobId: ID!) {\n  viewer {\n    _id\n    resumes {\n      ...resume\n      __typename\n    }\n    __typename\n  }\n  jobApplicationProcess(jobId: $jobId) {\n    documents {\n      lastAppliedResumeIdPrefill\n      selectionCriteriaRequired\n      lastWrittenCoverLetter {\n        content\n        __typename\n      }\n      __typename\n    }\n    __typename\n  }\n}\n\nfragment resume on Resume {\n  id\n  createdDateUtc\n  isDefault\n  fileMetadata {\n    name\n    size\n    virusScanStatus\n    uri\n    __typename\n  }\n  origin {\n    type\n    __typename\n  }\n  __typename\n}"},{"operationName":"TrackJobApplicationStarted","variables":{"input":{"jobId":"'.$jobId.'","sessionId":"'.$sessionId.'","applicationCorrelationId":"'.$applicationCorrelationId.'","isProfileApply":true}},"query":"mutation TrackJobApplicationStarted($input: TrackJobApplicationStartedInput!) {\n  trackJobApplicationStarted(input: $input) {\n    eventId\n    __typename\n  }\n}"}]';
$requestBody3 = '[{"operationName":"RequestResumeParsing","variables":{"input":{"id":"08de56ab-3ed7-4489-9a72-71c0e3f17f97","parsingContext":{"id":"08de56ab-3ed7-4489-9a72-71c0e3f17f97"},"zone":"asia-4"}},"query":"mutation RequestResumeParsing($input: RequestResumeParsingInput!) {\n  requestResumeParsing(input: $input) {\n    ref\n    __typename\n  }\n}"}]';
$requestBody4 = '[{"operationName":"GetRoles","variables":{},"query":"query GetRoles {\n  viewer {\n    _id\n    roles {\n      ...role\n      __typename\n    }\n    yearsOfExperience {\n      newToWorkforce\n      __typename\n    }\n    __typename\n  }\n}\n\nfragment role on Role {\n  id\n  title {\n    text\n    ontologyId\n    __typename\n  }\n  company {\n    text\n    ontologyId\n    __typename\n  }\n  seniority {\n    text\n    ontologyId\n    __typename\n  }\n  from {\n    year\n    month\n    __typename\n  }\n  to {\n    year\n    month\n    __typename\n  }\n  achievements\n  function {\n    id\n    subFunction {\n      id\n      __typename\n    }\n    __typename\n  }\n  industry {\n    id\n    __typename\n  }\n  tracking {\n    events {\n      key\n      value\n      __typename\n    }\n    __typename\n  }\n  __typename\n}"},{"operationName":"GetQualifications","variables":{"zone":"asia-4","languageCode":"id"},"query":"query GetQualifications($zone: Zone!, $languageCode: LanguageCodeIso!) {\n  viewer {\n    ...RefreshedQualifications\n    __typename\n  }\n}\n\nfragment qualification on Qualification {\n  id\n  name {\n    text\n    ontologyId\n    __typename\n  }\n  institute {\n    text\n    ontologyId\n    __typename\n  }\n  completed\n  completionDate {\n    ... on Year {\n      year\n      __typename\n    }\n    ... on MonthYear {\n      month\n      year\n      __typename\n    }\n    __typename\n  }\n  formattedCompletion\n  highlights\n  status\n  verificationUrl\n  credential {\n    credentialInfo {\n      name\n      values\n      __typename\n    }\n    manageVerificationUrl\n    deleteVerificationUrl\n    __typename\n  }\n  __typename\n}\n\nfragment RefreshedQualifications on Candidate {\n  _id\n  qualifications(\n    includeVerified: true\n    status: confirmed\n    zone: $zone\n    languageCode: $languageCode\n  ) {\n    ...qualification\n    __typename\n  }\n  __typename\n}"},{"operationName":"GetLicences","variables":{"languageCode":"id","zone":"asia-4"},"query":"query GetLicences($languageCode: LanguageCodeIso, $zone: Zone) {\n  viewer {\n    _id\n    licences(languageCode: $languageCode, zone: $zone) {\n      ...licence\n      __typename\n    }\n    __typename\n  }\n}\n\nfragment licence on Licence {\n  id\n  name {\n    text\n    ontologyId\n    __typename\n  }\n  issuingOrganisation\n  issueDate {\n    month\n    year\n    __typename\n  }\n  expiryDate {\n    month\n    year\n    __typename\n  }\n  noExpiryDate\n  description\n  status\n  formattedDate\n  verificationUrl\n  verificationMessage\n  credentialType\n  credential {\n    verification {\n      result\n      __typename\n    }\n    credentialInfo {\n      name\n      values\n      __typename\n    }\n    manageVerificationUrl\n    deleteVerificationUrl\n    __typename\n  }\n  __typename\n}"},{"operationName":"GetSkills","variables":{},"query":"query GetSkills {\n  viewer {\n    _id\n    skills {\n      keyword {\n        text\n        ontologyId\n        __typename\n      }\n      __typename\n    }\n    __typename\n  }\n}"},{"operationName":"UnconfirmedDataQuery","variables":{"contextId":"08de56ab-3ed7-4489-9a72-71c0e3f17f97","languageCode":"id"},"query":"query UnconfirmedDataQuery($contextId: String!, $languageCode: LanguageCodeIso!) {\n  viewer {\n    _id\n    unconfirmedDataForContext(\n      contextId: $contextId\n      contextType: Application\n      languageCode: $languageCode\n    ) {\n      ... on UnconfirmedDataPending {\n        completed\n        __typename\n      }\n      ... on UnconfirmedDataCompleted {\n        completed\n        roles {\n          ...unconfirmedRole\n          __typename\n        }\n        qualifications {\n          ...unconfirmedQualification\n          __typename\n        }\n        __typename\n      }\n      __typename\n    }\n    __typename\n  }\n}\n\nfragment role on Role {\n  id\n  title {\n    text\n    ontologyId\n    __typename\n  }\n  company {\n    text\n    ontologyId\n    __typename\n  }\n  seniority {\n    text\n    ontologyId\n    __typename\n  }\n  from {\n    year\n    month\n    __typename\n  }\n  to {\n    year\n    month\n    __typename\n  }\n  achievements\n  function {\n    id\n    subFunction {\n      id\n      __typename\n    }\n    __typename\n  }\n  industry {\n    id\n    __typename\n  }\n  tracking {\n    events {\n      key\n      value\n      __typename\n    }\n    __typename\n  }\n  __typename\n}\n\nfragment qualification on Qualification {\n  id\n  name {\n    text\n    ontologyId\n    __typename\n  }\n  institute {\n    text\n    ontologyId\n    __typename\n  }\n  completed\n  completionDate {\n    ... on Year {\n      year\n      __typename\n    }\n    ... on MonthYear {\n      month\n      year\n      __typename\n    }\n    __typename\n  }\n  formattedCompletion\n  highlights\n  status\n  verificationUrl\n  credential {\n    credentialInfo {\n      name\n      values\n      __typename\n    }\n    manageVerificationUrl\n    deleteVerificationUrl\n    __typename\n  }\n  __typename\n}\n\nfragment unconfirmedRole on Role {\n  ...role\n  __typename\n}\n\nfragment unconfirmedQualification on Qualification {\n  ...qualification\n  tracking {\n    events {\n      key\n      value\n      __typename\n    }\n    __typename\n  }\n  __typename\n}"}]';
$requestBody5='{"operationName":"jobDetailsPersonalised","variables":{"id":"'.$jobId.'","tracking":{"channel":"WEB","jobDetailsViewedCorrelationId":"'.$applicationCorrelationId.'","sessionId":"'.$sessionId.'"},"languageCode":"id","locale":"id-ID","timezone":"Asia/Jakarta","zone":"asia-4"},"query":"query jobDetailsPersonalised($id: ID!, $tracking: JobDetailsTrackingInput, $locale: Locale!, $zone: Zone!, $languageCode: LanguageCodeIso!, $timezone: Timezone!) {\n  jobDetails(id: $id, tracking: $tracking) {\n    personalised {\n      isSaved\n      appliedDateTime {\n        longAbsoluteLabel(locale: $locale, timezone: $timezone)\n        __typename\n      }\n      topApplicantBadge {\n        label(locale: $locale)\n        description(locale: $locale, zone: $zone)\n        __typename\n      }\n      salaryMatch {\n        ... on JobProfileMissingSalaryPreference {\n          label(locale: $locale)\n          __typename\n        }\n        ... on JobProfileSalaryMatch {\n          label(locale: $locale)\n          salaryPreference(locale: $locale, languageCode: $languageCode) {\n            id\n            description\n            country {\n              countryCode\n              name\n              __typename\n            }\n            currencyCode\n            amount\n            salaryType\n            __typename\n          }\n          __typename\n        }\n        ... on JobProfileSalaryNoMatch {\n          label(locale: $locale)\n          __typename\n        }\n        __typename\n      }\n      __typename\n    }\n    __typename\n  }\n}\n"}';

//JOB INFO

//INIALISASI AUTHORIZATION
$authfile = 'auth.json';
if (file_exists($authfile)) {
    // Baca isi file JSON
    $jsonContent = file_get_contents($authfile);
    $data = json_decode($jsonContent, true);
    if ($data !== null or $data['error']=='invalid_request') {
        echo("[auth] Load Authorization berhasil\n");
        $auth = 'Bearer '.$data['access_token'];
        $refresh_token = $data['refresh_token'];
        $authparams = '{
          "redirect_uri": "https://www.jobstreet.co.id/oauth/callback/",
          "initial_scope": "openid profile email offline_access",
          "JobseekerSessionId": "'.$sessionId.'",
          "identity_sdk_version": "6.54.0",
          "refresh_href": "https://www.jobstreet.co.id/id/job/76779079?type\u003dstandout\u0026ref\u003dsavedsearch#sol\u003d19b45f6470b946055ebd49c241f761236e81a33e",
          "client_id": "qGPufUg5iBf1s57sfXl6gBdGF9JYInBI",
          "grant_type": "refresh_token",
          "refresh_token": "'.$refresh_token.'"
        }';
        $authget=auth($urlauth,$authparams);
    } else
    echo("[i] Load Authorization gagal\n");
}
$runTask=Task($auth,$requestBody1,$requestBody2,$requestBody3,$requestBody4,$requestBody5,$resume,$sessionId,$url,$urlauth,$urljob);

//GET AUTH


while(true){
  if (($runTask - $authget) >= 50 * 60){
    if (file_exists($authfile)) {
    // Baca isi file JSON
    $jsonContent = file_get_contents($authfile);
    $data = json_decode($jsonContent, true);
    if ($data !== null or $data['error']=='invalid_request') {
        echo("[i] Load Authorization berhasil\n");
        $auth = 'Bearer '.$data['access_token'];
        $refresh_token = $data['refresh_token'];
        $authparams = '{
          "redirect_uri": "https://www.jobstreet.co.id/oauth/callback/",
          "initial_scope": "openid profile email offline_access",
          "JobseekerSessionId": "'.$sessionId.'",
          "identity_sdk_version": "6.54.0",
          "refresh_href": "https://www.jobstreet.co.id/id/job/76779079?type\u003dstandout\u0026ref\u003dsavedsearch#sol\u003d19b45f6470b946055ebd49c241f761236e81a33e",
          "client_id": "qGPufUg5iBf1s57sfXl6gBdGF9JYInBI",
          "grant_type": "refresh_token",
          "refresh_token": "'.$refresh_token.'"
        }';
        auth($urlauth,$authparams);
    } else
    echo("[i] Load Authorization gagal\n");
}
    echo ("[i] Authorization diperbarui\n");
  }
  $runTask=Task($auth,$requestBody1,$requestBody2,$requestBody3,$requestBody4,$requestBody5,$resume,$sessionId,$url,$urlauth,$urljob);
  echo $runTask;
}