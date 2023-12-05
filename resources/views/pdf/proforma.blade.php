<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proforma</title>
</head>
<style>
    #group{
        display: flex;
        justify-content: space-between;
    }

    .tableau{
        width: 100%;
    }
    table th{
        background-color: blue;
    }
    tbody tr:nth-child(even){
        background-color: rgb(202, 202, 202);
    }
    .prix{
        margin-left: 900px;
        display: flex;
        justify-content: space-between;
    }
    table td{
        text-align: right;
    }
    .signature{
        display: flex;
        justify-content: space-between;
        padding: 0px 50px 0px 50px;
    }
    #content{
       
    }

</style>
<body>
    <div id="content">

        <center><h1>Facture Proforma</h1></center>
        <div>
            <h3>Mon entreprise</h3>
            <p>Adresse</p>
            <p>Contact</p>
        </div>
        <div id="group">
            <div class="left">
                <p>Date :</p>
                <p>Emis par :</p>
                <p>Delai de livraison :</p>
                <p>Mode de paiement</p>
            </div>
            <div class="right">
                <p><strong>Destinataire</strong></p>
                <p>Entreprise</p>
                <p>Adresse</p>
            <h4>Proforma n°XXXX</h4>
        </div>
    </div>
    <div>
        <table class="tableau">
            <thead>
                <tr>
                    <th>Designation</th>
                    <th>Quantite</th>
                    <th>Unite</th>
                    <th>PrixUnitaire HT</th>
                    <th>TVA</th>
                    <th>Total HT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align : center;">Stylo</td>
                    <td style="text-align : center;">20</td>
                    <td>pce</td>
                    <td>750 Ar</td>
                    <td>20%</td>
                    <td>15 000 Ar</td>
                </tr>
                <tr>
                    <td style="text-align : center;">Cahier</td>
                    <td style="text-align : center;">50</td>
                    <td>pce</td>
                    <td>1200 Ar</td>
                    <td>20%</td>
                    <td>60 000Ar</td>
                </tr>
                <tr>
                    <td style="text-align : center;">Cahier</td>
                    <td style="text-align : center;">50</td>
                    <td>pce</td>
                    <td>1200 Ar</td>
                    <td>20%</td>
                    <td>60 000Ar</td>
                </tr>
                <tr>
                    <td style="text-align : center;">Cahier</td>
                    <td style="text-align : center;">50</td>
                    <td>pce</td>
                    <td>1200 Ar</td>
                    <td>20%</td>
                    <td>60 000Ar</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="to">
        <div class="designation">
            <p><strong>Total HT</strong></p>
            <p><strong>TVA</strong></p>
            <br>
            <p><strong>Total TTC</strong></p>
        </div>
        <div class="price">
            <p>195 000Ar</p>
            <p>XXXXX Ar</p>
            <br>
            <p>200 125 Ar</p>
        </div>
    </div>
    <div class="signature">
        <div class="societe">
            <p>Signature societe </p>
            <br>
            <br>
        </div>
        <div class="fournisseur">
            <p>Signature fournisseur</p>
            <br>
            <br>
        </div>
    </div>
</div>
</body>
</html>