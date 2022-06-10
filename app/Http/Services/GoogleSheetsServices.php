<?php
namespace App\Http\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class GoogleSheetsServices
{
    public $client, $service, $documentId, $range;
    public function __construct()
    {
        $this->client     = $this->getClient();
        $this->service    = new Sheets($this->client);
        $this->documentId = '1vR0uZcAvbNs3zxOwA0xN_V6hVjGud8Kva2vXBYIj1tA';
        $this->range      = 'A:BB';
    }
    public function getClient()
    {
 
     
        $client = new Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setScopes(Sheets::SPREADSHEETS);
        $client->setAuthConfig('public/credentials.json');
          // $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        return $client;
        // $client = new Client();

        // $client->setApplicationName('FormularioExcel');
        // $client->setRedirectUri('http://localhost/datosExcel');
        // $client->setScopes(Sheets::SPREADSHEETS);
        // $client->setAuthConfig('keys.json');
        // $client->setAccessType('offline');
        //   dd($client);
        // return $client;
    }

    public function readSheet()
    {

        $doc = $this->service->spreadsheets_values->get($this->documentId, $this->range);
        return $doc;
    }
}
