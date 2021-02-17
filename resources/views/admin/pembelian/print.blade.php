<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Athena.com | Invoice</title>
    <link rel="stylesheet" href="{{ asset('print/style.css')}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('print/athena.jpg') }}">
      </div>
      <div id="company">
        <h2 class="name">Athena Design</h2>
        <div>St.Kualu, Pekanbaru, Riau, Indonesia</div>
        <div>+62 822-8370-1881</div>
        <div><a href="mailto:company@example.com">demigoath@gmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>{{ $pembeliand->nobukti }}</h1>
          <div class="date">Tanggal :  {{ date('Y-m-d')}}</div>
          <div class="date">Dibuat pada {{ $pembeliand->created_at->diffForHumans() }}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">JENIS BARANG</th>
            <th class="unit">JUMLAH</th>
            <th class="qty">HARGA</th>
            <th class="total">SUBTOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>{{ $pembeliand->persediaan->namastok }}</td>
            <td class="unit">{{ $pembeliand->qty }}</td>
            <td class="qty">@currency( $pembeliand->harga )</td>
            <td class="total"> @currency($pembeliand->qty * $pembeliand->harga)</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>@currency( $pembeliand->qty * $pembeliand->harga  )</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>

    <script>window.print()</script>

  </body>
</html>
