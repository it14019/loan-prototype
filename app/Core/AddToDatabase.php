<?php

namespace App\Core;

use App\Mail\MailToPartner;

class AddToDatabase
{
    public static function add()
    {
        if (isset($_POST['submit'])) {

            if ($_POST['email'] != '' && $_POST['amount'] != '') {
                Database::database()->insert('application', [
                    'email' => $_POST['email'],
                    'amount' => $_POST['amount']
                ]);

                $findLastId = Database::database()->select('application', ['id'], [
                    "ORDER" => ["id" => "DESC"],
                    "LIMIT" => 1
                ]);

                $lastId = $findLastId[0]['id'];

                if ($_POST['amount'] > 5000) {
                    Database::database()->insert('deals', [
                        'app_id' => $lastId,
                        'status' => 'ask',
                        'partner' => 'A'
                    ]);

                    $partner = 'A';

                    MailToPartner::send($partner);

                } else {
                    Database::database()->insert('deals', [
                        'app_id' => $lastId,
                        'status' => 'ask',
                        'partner' => 'B'
                    ]);

                    $partner = 'B';

                    MailToPartner::send($partner);
                }
            }
        }
    }
}
