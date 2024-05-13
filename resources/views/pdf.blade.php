<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>bon de commande</title>
  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    /* body{
      display: flex;
      justify-content: center;
    } */
    .container {
      position: relative;
      width: 800px;
      height: fit-content;
      padding: 10px 10px;
      margin: 0 0;
      border: 1px solid gray;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .title{
      margin: 0 10px;
      height: fit-content;
      display: flex;
      align-items: center;
      justify-content: space-evenly;
    }
    .title h1{
      text-align: center;
      font-weight: 900;
      letter-spacing: 1px;
      margin-bottom: 50px;
      color: rgb(27, 15, 194);
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    .img{
      width: 100%;
      text-align: center;
    }
    .img img{
      width: 330px;
    }
    .con1{
      width: 150px;
      margin-top: 20px;
    }
    .con1::before{
      content: "";
      position: absolute;
      top: 230px;
      left: 5%;
      width: 90%;
      height: 3px ;
      background-color: royalblue;
    }
    
    .con2{
      width: 800px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 10px 20px;
      margin: 0 20px;
      position: relative;
    }
    .con2 *{
      width: 680px;
      height: fit-content;
      padding: 10px 10px;
    }
    .con2 .dis{
      position: absolute;
      top: 0;
      left: 500px;
    }
    .con2 .field,.values{
      background-color: #cacaca;
    }
    .con3{
      margin-left: 20px;
    }
    .table{
      margin-top: 20px ;
      width: 750px;
    }
    .table table{
      width: 100%;
    }
    .table table th,td{
      border-bottom: 1px solid rgb(187, 187, 187);
      border-collapse: collapse;
      text-align: center;
      padding: 15px 0;
    }
    .total{
      width: 200px;
      height: fit-content;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-left: 550px;
      margin-top: 10px;
      position: relative;
      text-align:right;
    }
    .total .text{
      color: blue;
      position: absolute;
      top: 0;
      left: 0;
    }
    .footer{
      width: fit-content;
      margin-left: 500px;
      margin-top: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }
    .footer img{
      width: 200px;
    }
    
  </style>

</head>
<body>
  <div class="container">

    
    <div class="img">
      <img src="{{public_path("/img/fsa.jpg")}}">
    </div>
<div class="title">
      <h1>Bon de Commande</h1>
      
    </div>

    <div class="con1">
      <h3>Mon Entreprise</h3>
      <p>22, Avenue Voltaire
        13000 Rabat
        Maroc
        </p>
    </div>

    <div class="con2">
      <div class="field">
        <p>
          Date <span style="margin-left: 200px;">:</span> {{date('d / m / y')}}<br>
          Bon de commande N° <span style="margin-left: 88px;">:</span>158964 <br>
          Numéro de client <span style="margin-left: 119px;">:</span>{{Auth::user()->id}} <br>
          Modalité de paiement <span style="margin-left: 91px;">:</span>30 jours<br>
          Mode de paiement <span style="margin-left: 111px;">:</span>CB / Chèque<br>
          Emis par <span style="margin-left: 172px;">:</span>{{$fournisseur[0]->nom}} <br>
          Contact client <span style="margin-left: 140px;">:</span>{{Auth::user()->name}}  <br>
          Telephone du client <span style="margin-left: 103px;">:</span>{{Auth::user()->telephone}}  <br>
          </p>  
      </div>
      {{-- <div class="values">
        <p>
          30/03/2023<br>
          123 <br>
          456 <br>
          30 jours<br>
          CB / Chèque<br>
          fournisseur<br>
          Michael Acheteur <br>
          0615789543  <br>
          </p>
      </div> --}}
      <div class="dis">
        <h4>Destinataire</h4>
        <p>Acheteur SA <br>
          Michel Acheteur <br>
          31, rue de la Forêt <br>
          13100 Aix-en-Provence <br>
          Maroc  <br>

        </p>
      </div>
    </div>

    <div class="con3">
      <h3>Informations additionnelles</h3>
      <p>Merci d'avoir choisi Mon Entreprise pour nos services.  <br>
        Service après-vente - Garantie : 1 an
        </p>
    </div>

    <div class="table">
      
      <table>
        <tr>
          <th>N°Produit</th>
          <th>Categorie</th>
          <th>Quantite</th>
          <th>Produit</th>
          <th>date de commande</th>
          <th>Prix HT</th>
          <th> TTC</th>
          <th>Total TTC</th>
        </tr>
        {{$prixHT = 0}}
        {{$prixTTC = 0}}
        @foreach ($commande as $c)
          @if ($c->quantite > 0 && $c->etat == 0)
          
          
          
              
          
          <tr>
            <td>{{$c->id}}</td>
            @foreach ($produit as $p)
                @if ($p->id == $c->produitId )
                  <td>{{$p->type}}</td>
                  <td>{{$c->quantite}}</td>
                  <td>{{$p->name}}</td>
                  <td>{{substr($c->created_at,0,10)}}</td>
                  <td>{{$p->prix}}DH</td>
                  <td>{{$p->prix + $p->prix*20/100}}DH</td>
                  <td>{{($p->prix + $p->prix*20/100) * $c->quantite}}DH</td>
                  {{$prixHT+=$p->prix}}
                  {{$prixTTC+=($p->prix + $p->prix*20/100) * $c->quantite}}
                @endif
            @endforeach
            
            
            </tr>
            @endif
        @endforeach
        
      </table>
    </div>

    <div class="total">
      <div class="text">
        <h3>Total HT</h3>
        <h3>Total TTC</h3>
      </div>
      <div class="prix">
        <h3>{{$prixHT}}DH</h3>
        <h3>{{$prixTTC}}DH</h3>
      </div>
    </div>

    <div class="footer">
      <h3>Signature</h3>
      <img src="{{public_path("/img/signature.jpeg")}}">
    </div>
  </div>
</body>
</html>