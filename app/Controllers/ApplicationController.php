<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\View;
use App\Core\AddToDatabase;
use App\Mail\MailToClient;

class ApplicationController
{
    public function show()
    {
        View::show('index.php');
    }

    public function store()
    {
        AddToDatabase::add();
        header('Location: /');
    }

    public function deals()
    {
        $clients = Database::database()->select('application',
            ['[><]deals' => ['id' => 'app_id']],
            ['application.id', 'application.email', 'application.amount'],
            ['status' => 'ask']);

        View::show('deals.php', [
            'clients' => $clients
        ]);
    }

    public function offer(array $vars)
    {
        Database::database()->update('deals',
            ['status' => 'offer'],
            ['app_id' => $vars['id']]);

        $client = Database::database()->select('application',
            ['[><]deals' => ['id' => 'app_id']],
            ['application.email', 'application.amount', 'deals.partner'],
            ['app_id' => $vars['id']]);

        $email = $client[0]['email'];
        $amount = $client[0]['amount'];
        $partner = $client[0]['partner'];

        MailToClient::send($email, $amount, $partner);

        header('Location: /deals');
    }
}