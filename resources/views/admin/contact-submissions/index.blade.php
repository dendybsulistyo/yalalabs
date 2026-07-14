<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Submissions — Admin Yala Labs</title>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --sans: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
    --mono: 'SF Mono', 'Fira Code', 'Cascadia Code', 'Consolas', 'Liberation Mono', monospace;
    --black: #111111;
    --white: #ffffff;
    --text: #1a1c1c;
    --muted: #505f76;
    --faint: #76777d;
    --bg: #f7f7f7;
    --tag-bg: #ebebeb;
    --accent: #2563eb;
  }

  body {
    font-family: var(--sans);
    background-color: var(--bg);
    color: var(--text);
    font-size: 14px;
  }

  .page { max-width: 1100px; margin: 0 auto; padding: 32px 24px 80px; }

  .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 12px; }
  .page-title { font-size: 22px; font-weight: 800; color: var(--black); }

  .btn-logout {
    background: var(--tag-bg); color: var(--text); border: none; border-radius: 6px;
    padding: 8px 16px; font-family: var(--sans); font-size: 12.5px; font-weight: 600;
    cursor: pointer;
  }

  .form-status {
    background: #e8faf0; color: #1a7a42; border-radius: 8px;
    padding: 12px 16px; font-size: 13px; margin-bottom: 20px;
  }

  .filters {
    display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 20px;
    background: var(--white); padding: 16px; border-radius: 10px;
    box-shadow: 0 1px 3px rgba(17,17,17,.06);
  }

  .filters select, .filters a.reset-link {
    font-family: var(--sans); font-size: 13px; padding: 8px 12px;
    border: 1px solid var(--tag-bg); border-radius: 6px; background: var(--bg); color: var(--text);
  }
  .filters a.reset-link { text-decoration: none; color: var(--muted); display: inline-flex; align-items: center; }

  .table-wrap {
    background: var(--white); border-radius: 10px; overflow-x: auto;
    box-shadow: 0 1px 3px rgba(17,17,17,.06), 0 8px 24px rgba(17,17,17,.04);
  }

  table { width: 100%; border-collapse: collapse; min-width: 760px; }
  th, td { text-align: left; padding: 12px 16px; border-bottom: 1px solid var(--tag-bg); vertical-align: top; }
  th {
    font-family: var(--mono); font-size: 10px; font-weight: 600; letter-spacing: .06em;
    text-transform: uppercase; color: var(--faint);
  }
  tr:last-child td { border-bottom: none; }

  .cell-name { font-weight: 700; color: var(--black); }
  .cell-meta { font-size: 12px; color: var(--faint); margin-top: 2px; }
  .cell-message { max-width: 280px; font-size: 13px; color: var(--muted); white-space: pre-wrap; }

  .badge {
    display: inline-block; padding: 3px 10px; border-radius: 20px;
    font-family: var(--mono); font-size: 10.5px; font-weight: 600; letter-spacing: .04em;
  }
  .badge-sekolah { background: #eef3ff; color: #0041a2; }
  .badge-klinik { background: #e6f7fc; color: #0e9fc4; }
  .badge-ticket { background: #eef0ff; color: #4338ca; }
  .badge-lainnya { background: var(--tag-bg); color: var(--muted); }

  .status-select {
    font-family: var(--sans); font-size: 12.5px; padding: 6px 10px;
    border-radius: 6px; border: 1px solid var(--tag-bg); background: var(--bg); color: var(--text);
  }
  .status-select.status-baru { border-color: #f59e0b; }
  .status-select.status-dihubungi { border-color: #2563eb; }
  .status-select.status-selesai { border-color: #16a34a; }
  .status-select.status-spam { border-color: #dc2626; }

  .empty-state { padding: 48px 16px; text-align: center; color: var(--faint); font-size: 13.5px; }

  .pagination { margin-top: 20px; }
</style>
</head>
<body>

<div class="page">

  <div class="topbar">
    <div class="page-title">Contact Submissions</div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn-logout">Logout</button>
    </form>
  </div>

  @if (session('status'))
    <div class="form-status">{{ session('status') }}</div>
  @endif

  <form method="GET" class="filters">
    <select name="status" onchange="this.form.submit()">
      <option value="">Semua Status</option>
      @foreach ($statuses as $s)
        <option value="{{ $s }}" @selected(request('status') === $s)>{{ ucfirst($s) }}</option>
      @endforeach
    </select>

    <select name="product_interest" onchange="this.form.submit()">
      <option value="">Semua Produk</option>
      @foreach ($products as $p)
        <option value="{{ $p }}" @selected(request('product_interest') === $p)>{{ ucfirst($p) }}</option>
      @endforeach
    </select>

    @if (request('status') || request('product_interest'))
      <a href="{{ route('admin.contact-submissions.index') }}" class="reset-link">Reset filter</a>
    @endif
  </form>

  <div class="table-wrap">
    @if ($submissions->isEmpty())
      <div class="empty-state">Belum ada submission yang masuk.</div>
    @else
      <table>
        <thead>
          <tr>
            <th>Kontak</th>
            <th>Produk</th>
            <th>Pesan</th>
            <th>Tanggal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($submissions as $submission)
            <tr>
              <td>
                <div class="cell-name">{{ $submission->name }}</div>
                @if ($submission->institution_name)
                  <div class="cell-meta">{{ $submission->institution_name }}</div>
                @endif
                <div class="cell-meta">{{ $submission->email }}</div>
                <div class="cell-meta">{{ $submission->phone }}</div>
              </td>
              <td>
                <span class="badge badge-{{ $submission->product_interest }}">{{ ucfirst($submission->product_interest) }}</span>
              </td>
              <td class="cell-message">{{ $submission->message }}</td>
              <td class="cell-meta">{{ $submission->created_at->format('d M Y H:i') }}</td>
              <td>
                <form method="POST" action="{{ route('admin.contact-submissions.update-status', $submission) }}">
                  @csrf
                  @method('PATCH')
                  <select name="status" class="status-select status-{{ $submission->status }}" onchange="this.form.submit()">
                    @foreach ($statuses as $s)
                      <option value="{{ $s }}" @selected($submission->status === $s)>{{ ucfirst($s) }}</option>
                    @endforeach
                  </select>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>

  <div class="pagination">
    {{ $submissions->links() }}
  </div>

</div>
</body>
</html>
