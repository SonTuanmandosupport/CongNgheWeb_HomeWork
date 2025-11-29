<?php
// index.php
$filename = "65HTTT_Danh_sach_diem_danh.csv";
if (!file_exists($filename)) {
    die("Không tìm thấy tệp $filename");
}
$file = fopen($filename, "r");
$header = fgetcsv($file);
$rows = [];
while (($row = fgetcsv($file)) !== false) {
    $rows[] = $row;
}
fclose($file);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Danh sách tài khoản CSV</title>

<style>
    /* Body & container */
    :root{
        --bg:#f4f6f8;
        --card:#ffffff;
        --muted:#6b7280;
        --accent:#0f5132; /* green-ish for left header */
        --header-bg:#eef3f7;
        --border:#d6dce3;
    }
    html,body{
        height:100%;
        margin:0;
        font-family: "Segoe UI", Tahoma, Arial, sans-serif;
        background: linear-gradient(180deg,var(--bg),#ffffff 40%);
        color:#111827;
        font-size:13px;
    }
    .wrap{
        max-width:1200px;
        margin:28px auto;
        padding:18px;
    }

    .card{
        background:var(--card);
        border-radius:8px;
        box-shadow: 0 6px 18px rgba(16,24,40,0.08);
        border:1px solid rgba(15,23,42,0.04);
        overflow: hidden;
    }

    .card-header{
        padding:18px 20px;
        border-bottom:1px solid var(--border);
        display:flex;
        align-items:center;
        gap:12px;
    }
    .title {
        font-weight:600;
        letter-spacing:0.2px;
    }
    .subtitle {
        color:var(--muted);
        font-size:12px;
    }

    /* Table container to allow scrolling with sticky header */
    .table-wrap{
        overflow:auto;
        max-height:640px; /* adjust as needed */
    }

    table {
        border-collapse:separate;
        border-spacing:0;
        width:100%;
        min-width:900px; /* force horizontal scrollbar like sheet if many cols */
        table-layout:fixed;
    }

    thead th {
        position:sticky;
        top:0;
        z-index:3;
        background: linear-gradient(180deg,var(--header-bg), #ffffff 120%);
        border-bottom:1px solid var(--border);
        text-align:left;
        font-weight:700;
        padding:10px 12px;
        font-size:13px;
        color:#0f1724;
        vertical-align:bottom;
    }

    /* Make first header cell look like the green "username" header from image */
    thead th:first-child{
        background: linear-gradient(180deg,#dff6e6,#e9f7ee);
        color:var(--accent);
        border-right:1px solid rgba(15,23,42,0.04);
    }

    tbody td{
        padding:10px 12px;
        border-bottom:1px solid #f0f2f4;
        vertical-align:middle;
        font-size:13px;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }

    tbody tr:nth-child(odd){
        background:#ffffff;
    }
    tbody tr:nth-child(even){
        background:#fbfdff; /* subtle alternate */
    }

    tbody tr:hover{
        background:#eff8ff;
    }

    /* Column widths approximate to screenshot */
    colgroup col:nth-child(1){ width:120px; } /* username */
    colgroup col:nth-child(2){ width:160px; } /* password */
    colgroup col:nth-child(3){ width:200px; } /* lastname */
    colgroup col:nth-child(4){ width:140px; } /* firstname */
    colgroup col:nth-child(5){ width:90px; }  /* class */
    colgroup col:nth-child(6){ width:240px; } /* email */
    colgroup col:nth-child(7){ width:140px; } /* course */

    /* small responsive adjustments */
    @media (max-width:900px){
        .wrap{ padding:10px; }
        table { min-width:780px; }
    }
</style>
</head>

<body>
<div class="wrap">
    <div class="card">
        <div class="card-header">
            <div>
                <div class="title">Danh sách tài khoản</div>
                <div class="subtitle">Dữ liệu đọc từ file CSV</div>
            </div>
        </div>

        <div class="table-wrap">
            <table role="table" aria-label="Danh sách tài khoản">
                <!-- optional colgroup to control widths -->
                <colgroup>
                    <?php
                    // ensure we create col elements matching number of header columns
                    $colCount = count($header);
                    for ($i=0;$i<$colCount;$i++){
                        echo "<col>";
                    }
                    ?>
                </colgroup>

                <thead>
                    <tr>
                        <?php foreach ($header as $col): ?>
                            <th><?php echo htmlspecialchars($col, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($rows as $r): ?>
                        <tr>
                            <?php foreach ($r as $cell): ?>
                                <td><?php echo htmlspecialchars($cell, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>