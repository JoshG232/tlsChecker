<?php
function checkSslCertificate($url) {
    $urlParts = parse_url($url);
    $hostname = $urlParts['host'];

    $context = stream_context_create([
        'ssl' => [
            'capture_peer_cert' => true,
        ],
    ]);

    $socket = stream_socket_client('ssl://' . $hostname . ':443', $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $context);

    if ($socket === false) {
        return null;
    }

    $cert = stream_context_get_params($context)['options']['ssl']['peer_certificate'];

    return [
        'cert_subject' => openssl_x509_parse($cert)['name'],
        'cert_issuer' => openssl_x509_parse($cert)['issuer'],
        'cert_expiry_date' => date('Y-m-d H:i:s', strtotime(openssl_x509_parse($cert)['validTo_time_t'])),
    ];
}

$url = "http://eonenergy.com/";
$certificateInfo = checkSslCertificate($url);

if ($certificateInfo) {
    echo "SSL Certificate Details:\n";
    echo "Subject: " . $certificateInfo['cert_subject'] . "\n";
    echo "Issuer: " . $certificateInfo['cert_issuer'] . "\n";
    echo "Expiry Date: " . $certificateInfo['cert_expiry_date'] . "\n";
} else {
    echo "No SSL certificate found.\n";
}
?>