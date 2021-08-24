<?php

    public function pushApns($token, $content, $url) {

        ////////////////////////////////////////////////////////////////////////////////
        $bundleid = 'com.pec.unilife';              # <- Your Bundle ID
        $url = 'https://api.push.apple.com';  # <- https://api.sandbox.push.apple.com or https://api.push.apple.com
        $pem_file = '/var/www/public/certificate/pec.unilife.pem'; //<= prod & dev 可以共用一個 pem
        $pem_secret = '****_some_password_****'; //<= 輸入新的密碼 要填在 php 使用

        ////////////////////////////////////////////////////////////////////////////////
        $deviceToken = $token; //<= 接收裝置的 devToken

        ////////////////////////////////////////////////////////////////////////////////
        $body['aps'] = array('alert' => $content, 'url' => $url);

        // Encode the payload as JSON
        $payload = json_encode($body);

        $http2ch = curl_init();
        curl_setopt_array($http2ch, array(
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
            CURLOPT_URL => "$url/3/device/$token",
            CURLOPT_PORT => 443,
            CURLOPT_HTTPHEADER => array(
                "apns-topic: {$bundleid}"
            ),
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HEADER => 1
        ));
        curl_setopt($http2ch, CURLOPT_URL, "$url/3/device/$token");
        curl_setopt($http2ch, CURLOPT_SSLCERT, $pem_file);
        curl_setopt($http2ch, CURLOPT_SSLCERTPASSWD, $pem_secret);
        curl_setopt($http2ch, CURLOPT_SSL_VERIFYPEER, false); // 相同於 --insecure
        // curl_setopt($http2ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($http2ch, CURLOPT_VERBOSE, true);
        $result = curl_exec($http2ch);

        if($ifEcho) {
            echo $result;
            if ($result == FALSE) {
                echo("Curl failed: " . curl_error($http2ch));
            }

            $status = curl_getinfo($http2ch, CURLINFO_HTTP_CODE);
            echo $status;	
        }

        curl_close($http2ch);

    }
}
