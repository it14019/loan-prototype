<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<ul>
    <?php foreach ($clients as $client): ?>
        <li>
            <?php echo $client['id']; ?> |
            <?php echo $client['email']; ?> |
            <?php echo $client['amount']; ?> |
            <?php echo $client['partner']; ?>
            <form method="post" action="/deals/<?php echo $client['id'] ?>">
                <button type="submit" class="btn btn-primary">Offer</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>