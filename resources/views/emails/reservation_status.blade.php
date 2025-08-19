<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reservation Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f7f7f7;
        }
        .logo {
            margin-bottom: 20px;
            style="display:block; margin:0 auto; max-width:100%; height:auto;"

        }
    </style>
</head>
<body>
    <div class="container">
        <img class="logo" src="https://lh3.googleusercontent.com/nmW_PeQ84FAGRZY5rYoHh2mLCW-75MoXm9E1aebHjr4z2aH-BBoWvoECieMpGGSgmwhAdxuUCC7Y-CHIK6e3CK9S0YVDkk9gzs5vuybs5g" alt="Logo" style="display: block; margin: 0 auto; max-width: 100%; height: auto;">
        <h1>Reservation Status Update</h1>
        <p>The Status of your reservation has been updated to: {{ $reservation->status }}</p>
        <p>Service: {{ $reservation->Service }}</p>
        <p>Status: {{ $reservation->status }}</p>
        <p>Quantite: {{ $reservation->quantite }}</p>
        <p>Longueur: {{ $reservation->longueur }}</p>
        <p>Largeur: {{ $reservation->largeur }}</p>
        <p>Type: {{ $reservation->type }}</p>
        <p>Stockage: {{ $reservation->stockage }}</p>
        <p>Poids total: {{ $reservation->poids_total }}</p>
        <p>Poids taxable: {{ $reservation->poids_taxable }}</p>
        <p>Prix total: {{ $reservation->prix_total }}</p>
    </div>
</body>
</html>
