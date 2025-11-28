<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admit Card - {{ $admit->roll }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .card {
            width: 1000px;
            /* design width for landscape A4 */
            height: 700px;
            border: 6px solid #2b8cc6;
            margin: 10px auto;
            padding: 18px;
            box-sizing: border-box;
            position: relative;
            background: #eaf6ff;
        }

        /* header */
        .header {
            text-align: center;
            margin-bottom: 6px;
        }

        .small-line {
            color: #d44;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .org-name {
            font-size: 28px;
            font-weight: 700;
        }

        .exam-title {
            font-size: 46px;
            font-weight: 800;
            color: #0d63a1;
            margin-top: 6px;
        }

        .location {
            font-size: 18px;
            margin-top: 4px;
        }

        /* logo */
        .logo {
            position: absolute;
            left: 28px;
            top: 20px;
            width: 110px;
        }

        /* green label */
        .label {
            display: inline-block;
            padding: 8px 18px;
            background: #187f3a;
            color: #fff;
            font-weight: 700;
            border-radius: 6px;
            margin-top: 8px;
        }

        /* details section */
        .details {
            margin-top: 20px;
            padding: 12px 20px;
            font-size: 20px;
        }

        .row {
            display: flex;
            gap: 30px;
            margin-bottom: 10px;
            align-items: center;
        }

        .col-label {
            width: 160px;
            font-weight: 700;
        }

        .col-value {
            flex: 1;
            border-bottom: 1px dotted #666;
            padding: 6px 8px;
        }

        /* right side photo & roll box */
        .right-box {
            position: absolute;
            right: 28px;
            top: 150px;
            width: 220px;
            text-align: center;
        }

        .photo {
            width: 160px;
            height: 160px;
            border: 1px solid #666;
            object-fit: cover;
            display: block;
            margin: 0 auto 6px;
        }

        .roll-box {
            font-size: 20px;
            border: 2px solid #0d63a1;
            padding: 8px;
            margin-top: 6px;
            background: #f1f9ff;
            font-weight: 700;
        }

        /* footer notes */
        .footer-notes {
            position: absolute;
            left: 28px;
            bottom: 24px;
            right: 28px;
            font-size: 14px;
            line-height: 1.4;
        }

        .exam-info {
            margin-top: 8px;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <div class="card" style="font-family: SolaimanLipi">
        <img src="{{ public_path('images/logo.png') }}" alt="logo" class="logo">

        <div class="header">
            <div class="small-line">বিসমিল্লাহির রাহমানির রাহিম</div>
            <div class="org-name">মাস্টার লোহছদুর রহমান ফাউন্ডেশন এর পৃষ্ঠপোষকতায়</div>
            <div class="exam-title">স্কাইরক্স বৃত্তি পরীক্ষা - ২০২৪</div>
            <div class="location">মাইজদীপুর, সেনবাগ, নোয়াখালী</div>
            <div style="margin-top:8px;">
                <span class="label">প্রবেশপত্র</span>
                <span
                    style="display:inline-block; margin-left:12px; padding:6px 12px; background:#e74c3c; color:#fff; border-radius:6px; font-weight:700;">শ্রেণি:
                    পঞ্চম</span>
            </div>
        </div>

        <div class="details">
            <div class="row">
                <div class="col-label">পরীক্ষার্থীর নাম :</div>
                <div class="col-value">{{ $admit->name_bn }}</div>

                <div class="col-label" style="width:110px;">রোল নং :</div>
                <div class="col-value" style="width:180px;">{{ $admit->roll }}</div>
            </div>

            <div class="row">
                <div class="col-label">পিতা :</div>
                <div class="col-value">{{ $admit->father_name_bn }}</div>

                <div class="col-label" style="width:110px;">মাতা :</div>
                <div class="col-value" style="width:180px;">{{ $admit->mother_name_bn ?? '-' }}</div>
            </div>

            <div class="row">
                <div class="col-label">বিদ্যালয় :</div>
                <div class="col-value">-</div>

                <div class="col-label" style="width:110px;">কেন্দ্র :</div>
                <div class="col-value" style="width:180px;">{{ $admit->exam_center_bn }}</div>
            </div>

            <div class="row" style="margin-top:10px;">
                <div class="col-label">পরীক্ষার তারিখ :</div>
                <div class="col-value">৩০ নভেম্বর ২০২৪, শনিবার</div>

                <div class="col-label" style="width:110px;">সময় :</div>
                <div class="col-value" style="width:180px;">সকাল ১০:০০টা - ১১:০০টা</div>
            </div>
        </div>

        <div class="right-box">
            <div class="roll-box">রোল: {{ $admit->roll }}</div>
        </div>

        <div class="footer-notes">
            <div class="exam-info">বি: দ্র: পরীক্ষার ৩০ মিনিট পূর্বে পরীক্ষার্থীকে কেন্দ্রে উপস্থিত হতে হবে।</div>

            <div style="margin-top:8px;">
                ১। পরীক্ষা চলাকালীন কোনো ধরনের ইলেকট্রনিক ডিভাইস গ্রহণ করা হবে না। <br>
                ২। কেন্দ্রপ্রসূত নির্দেশনা এবং পরীক্ষার নিয়ম মেনে চলতে হবে। <br>
            </div>

            <div style="text-align:right; margin-top:18px; font-weight:700;">পরীক্ষা নিয়ন্ত্রক</div>
        </div>
    </div>
</body>

</html>
