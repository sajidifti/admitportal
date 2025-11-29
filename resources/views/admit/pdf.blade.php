<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admit Card - {{ $admit->roll }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Tiro+Bangla&display=swap"
        rel="stylesheet">
    <style>
        @media print {
            @page {
                size: A4 landscape;
                margin: 0;
            }

            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Hind Siliguri', sans-serif;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .admit-card {
            width: 1123px;
            /* A4 Landscape width at 96 DPI approx */
            height: 794px;
            /* A4 Landscape height */
            position: relative;
            background-color: #e3f2fd;
            /* Light blue background */
            padding: 15px;
            box-sizing: border-box;
            overflow: hidden;
        }

        .border-outer {
            border: 2px solid #0d47a1;
            height: 100%;
            position: relative;
            padding: 5px;
            box-sizing: border-box;
        }

        .border-inner {
            border: 4px solid #0d47a1;
            height: 100%;
            position: relative;
            background: transparent;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        /* Decorative corners/lines could be added here if needed strictly */

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            opacity: 0.1;
            z-index: 0;
            pointer-events: none;
        }

        .header {
            text-align: center;
            padding-top: 20px;
            position: relative;
            z-index: 1;
        }

        .bismillah {
            color: #d32f2f;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .organization {
            font-size: 24px;
            font-weight: 600;
            color: #000;
        }

        .exam-title {
            font-size: 48px;
            font-weight: 700;
            color: #0d47a1;
            /* Dark blue */
            line-height: 1.2;
            margin: 5px 0;
        }

        .location {
            font-size: 18px;
            font-weight: 500;
            color: #000;
        }

        .badges-wrapper {
            margin-top: 10px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .badges {
            display: flex;
            align-items: center;
            gap: 0;
        }

        .badge-green {
            background-color: #1b5e20;
            color: white;
            padding: 5px 20px;
            font-size: 20px;
            font-weight: 700;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            border: 2px solid #fff;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        .badge-red {
            background-color: #d32f2f;
            color: white;
            padding: 5px 20px;
            font-size: 20px;
            font-weight: 700;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            border: 2px solid #fff;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            margin-left: -5px;
            z-index: 1;
        }

        .content {
            flex: 1;
            padding: 20px 60px;
            position: relative;
            z-index: 1;
        }

        .info-section {
            width: 100%;
            font-family: 'Tiro Bangla', serif;
        }

        .info-row {
            display: flex;
            align-items: baseline;
            margin-bottom: 12px;
            font-size: 20px;
            font-weight: 500;
        }

        .label {
            display: inline-block;
            font-weight: 600;
        }

        .label-main {
            width: 170px;
            text-align: justify;
            text-align-last: justify;
            margin-right: 10px;
        }

        .label-sub {
            width: 80px;
            text-align: justify;
            text-align-last: justify;
            margin-right: 10px;
        }

        .value {
            flex: 1;
            border-bottom: 1px dotted #000;
            padding-left: 10px;
            color: #000;
        }

        .info-row-double {
            display: flex;
            gap: 20px;
            font-size: 20px;
            font-weight: 500;
        }

        .info-row-double .half {
            flex: 1;
            display: flex;
            align-items: baseline;
        }

        .qr-wrapper {
            position: absolute;
            right: 60px;
            top: -100px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .qr-code {
            width: 140px;
            height: 140px;
            border: 2px solid #0d47a1;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
        }

        .qr-text {
            font-size: 10px;
            text-align: center;
            color: #0d47a1;
        }

        .footer {
            padding: 20px 60px;
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            font-size: 14px;
            font-family: 'Tiro Bangla', serif;
        }

        .instructions {
            width: 70%;
        }

        .instructions h4 {
            margin: 0 0 5px 0;
            color: #0d47a1;
            font-size: 16px;
        }

        .instructions ol {
            margin: 0;
            padding-left: 20px;
            line-height: 1.4;
        }

        .signature {
            text-align: center;
            width: 200px;
        }

        .signature-line {
            border-top: 1px dashed #000;
            margin-top: 40px;
            padding-top: 5px;
            font-weight: 700;
            font-size: 16px;
        }

        /* Logo positioning */
        .logo-top-left {
            position: absolute;
            top: 30px;
            left: 30px;
            width: 80px;
            z-index: 2;
        }
    </style>
</head>

<body>

    <div class="admit-card">
        <div class="border-outer">
            <div class="border-inner">
                <!-- Watermark -->
                <img src="{{ asset('images/logo.png') }}" alt="Watermark" class="watermark">

                <!-- Top Left Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-top-left">

                <div class="header">
                    <div class="bismillah">বিসমিল্লাহির রাহমানির রাহিম</div>
                    <div class="organization">মাস্টার মোকছেদুর রহমান ফাউন্ডেশন এর পৃষ্ঠপোষকতায়<br>ও<br>
                        সেনবাগ উপজেলা ওয়েলফেয়ার সোসাইটি ইউএসএ ইনক এর সহযোগিতায়
                    </div>
                    <div class="exam-title">
                        স্কাইরক্স বৃত্তি পরীক্ষা ২০২৫
                    </div>
                    <div class="location">
                        মইজদীপুর, সেনবাগ, নোয়াখালী
                    </div>

                    <div class="badges-wrapper">
                        <!-- QR Code -->
                        <div class="qr-wrapper">
                            <div class="qr-code">
                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(130)->encoding('UTF-8')->errorCorrection('H')->generate('https://tinyurl.com/skyrox') !!}
                            </div>
                            <div class="qr-text">আসন বিন্যাস দেখার<br>জন্য স্ক্যান করুন</div>
                        </div>

                        <!-- Badges -->
                        <div class="badges">
                            <div class="badge-green">প্রবেশপত্র</div>
                            <div class="badge-red">শ্রেণি: {{ $admit->class }}</div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="info-section">
                        <div class="info-row-double">
                            <div class="half">
                                <span class="label label-main">পরীক্ষার্থীর নাম :</span>
                                <span class="value">{{ $admit->name_bn }}</span>
                            </div>
                            <div class="half">
                                <span class="label label-sub">রোল নং :</span>
                                <span class="value">{{ $admit->roll }}</span>
                            </div>
                        </div>
                        <div class="info-row-double">
                            <div class="half">
                                <span class="label label-main">পিতা :</span>
                                <span class="value">{{ $admit->father_name_bn }}</span>
                            </div>
                            <div class="half">
                                <span class="label label-sub">মাতা :</span>
                                <span class="value">{{ $admit->mother_name_bn ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="info-row">
                            <span class="label label-main">বিদ্যালয় :</span>
                            <span class="value">{{ $admit->school }}</span>
                        </div>
                        <div class="info-row">
                            <span class="label label-main">কেন্দ্র :</span>
                            <span class="value">{{ $admit->exam_center_bn }}</span>
                        </div>
                        <div class="info-row-double" style="margin-top: 20px;">
                            <div class="half">
                                <span class="label label-main">পরীক্ষার তারিখ :</span>
                                <span
                                    class="value">{{ \Carbon\Carbon::parse($admit->exam_date)->locale('bn')->isoFormat('LL') }}</span>
                            </div>
                            <div class="half">
                                <span class="label label-sub">সময় :</span>
                                <span class="value">{{ $admit->exam_time }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <div class="instructions">
                        <h4>বি: দ্র:</h4>
                        <ol>
                            <li>পরীক্ষা শুরুর ৩০ মিনিট পূর্বে পরীক্ষার্থীকে কেন্দ্রে উপস্থিত হতে হবে।</li>
                            <li>ঘড়ি, ক্যালকুলেটরসহ কোনো ধরনের ইলেকট্রনিক ডিভাইস নিয়ে কেন্দ্রে প্রবেশ করা যাবে না।</li>
                            <li>কোনো পরীক্ষার্থীর পক্ষে বহিরাগত কোনো শিক্ষার্থী পরীক্ষায় অংশগ্রহণ করলে পরীক্ষার্থীর
                                পরীক্ষা বাতিলসহ তার বিরুদ্ধে আইনানুগ ব্যবস্থা গ্রহণ করা হবে।</li>
                        </ol>
                    </div>
                    <div class="signature">
                        <div class="signature-line">পরীক্ষা নিয়ন্ত্রক</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
