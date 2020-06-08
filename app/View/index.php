<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<div class="d-flex justify-content-center align-middle mt-5">
    <form method="post" action="/">
        <label for="email">Enter e-mail:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="amount">Enter amount:</label><br>
        <input type="number" id="amount" name="amount" min="50"><br><br>
       <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </form>
</div>

<a href="/deals"> <p class="text-center">Show all Clients with status ASK</p></a>