<?php
use App\Helpers\Helper;
?>
@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1 class="h2">Document Details</h1>
    </div>
    <div class="col-md-6">
        <button class="btn btn-primary float-right" id="print">Print</button>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
        <div id="birth_certificate">
            <header id="header">
                <div class="first_logo">
                    <img src="{{asset('images/logo/Emblem_of_Nepal.svg')}}" alt="nepal_logo" />
                </div>
                <div class="heading">
                    <p class="">
                        <span class="nep_heading">नेपाल सरकार</span>
                        <br />
                        <span class="eng_heading">Nepal Government</span>
                        <br />
                        <span class="nep_heading">स्वास्थ्य तथा जनसङ्ख्या मन्त्रालय</span>
                        <br />
                        <span class="eng_heading">Ministry of Health and Population</span>
                    </p>
                </div>
                <div class="sec_logo">
                    <img src="{{asset('images/logo/Emblem_of_Nepal.svg')}}" alt="pokhara_swasthya_bigyan_pratisthan" />
                </div>
            </header>
            <main id="main">
                <div class="hero">
                    <p class="academy">
                        पोखरा स्वास्थ्यविज्ञान प्रतिष्ठान
                        <br />
                        Pokhara Academy of Health Sciences
                    </p>
                    <p class="hospital">
                        पश्चिमाञ्चल छेत्रिय आश्पताल, पोखरा
                        <br />
                        Western Regional Hospital, Pokhara
                    </p>
                    <p class="certificate">
                        जन्म प्रमाणपत्र
                        <br />
                        Birth Certificate
                    </p>
                </div>
            </main>
            <div class="baby-details">
                <div class="details m-2">
                    <div class="left">
                        <span><strong class="mx-2">जन्म प्रमाणपत्र नंः
                            </strong>{{Helper::convertEngNumToNepali($document->certificate_no)}}</span>
                        <span><strong class="mx-2">Certificate No.: </strong>{{$document->certificate_no}}</span>
                        <br />
                        <span><strong class="mx-2">आई.पी. नंः </strong>
                            {{Helper::convertEngNumToNepali($document->ip_no)}}</span>
                        <span><strong class="mx-2">I.P. NO.: </strong>{{$document->ip_no}}</span>
                        <br />
                        <span><strong class="mx-2">पिताको नाम: </strong> {{$document->father_name}}</span>
                        <span><strong class="mx-2">Father's Name: </strong>{{$document->father_name_dev}}</span>
                        <br />
                        <span><strong class="mx-2">आमाको नाम: </strong> {{$document->mother_name}}</span>
                        <span><strong class="mx-2">Mother's Name: </strong>{{$document->mother_name_dev}}</span>
                        <br />
                        <span><strong class="mx-2">ठेगाना: </strong>{{$document->municipality->municipal_name . '-' .
                            Helper::convertEngNumToNepali($document->ward_no) . ', ' . $document->address . ', ' .
                            $document->district->district_name
                            }}</span>
                        <span><strong class="mx-2">Address: </strong>{{$document->municipality->municipal_name . '-' .
                            $document->ward_no . ', ' . $document->address . ', ' . $document->district->district_name
                            }}</span>
                        <br />
                        <span><strong class="mx-2">जन्म मिति र समय:
                            </strong>{{Helper::convertEngNumToNepali($document->birth_date_bs) . ' ' .
                            Helper::convertEngNumToNepali($document->birth_time)}} <strong> बि.सं </strong> &nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{Helper::convertEngNumToNepali($document->birth_date)}} <strong>ई . सं</strong></span>
                        <span><strong class="mx-2">Birth Date and Time: </strong>{{$document->birth_date_bs . ' ' .
                            $document->birth_time}} <strong>BS</strong>&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$document->birth_date}}
                            <strong>AD</strong></span>
                        <br />
                        <span><strong class="mx-2">बच्चाको लिङ्ग: </strong>{{$document->gender === 'MALE' ? 'छोरा' :
                            'छोरी'}}</span>
                        <span><strong class="mx-2">Sex Of Baby: </strong>{{$document->gender}}</span>
                    </div>
                    <div class="right">
                        <span><strong class="mx-2">मिति:
                            </strong>{{Helper::convertEngNumToNepali($document->registered_date_bs)}}</span>
                        <span><strong class="mx-2">Date: </strong>{{$document->registered_date}}</span>
                        <br />
                        <span><strong></strong></span>
                        <span><strong></strong></span>
                        <br>
                        <span><strong class="mx-2">राष्ट्रियता:
                            </strong>{{$document->fatherNationality->nationality_dev}}</span>
                        <span><strong class="mx-2">Nationality:
                            </strong>{{$document->fatherNationality->nationality}}</span>
                        <br />
                        <span><strong class="mx-2">राष्ट्रियता:
                            </strong>{{$document->motherNationality->nationality_dev}}</span>
                        <span><strong class="mx-2">Nationality:
                            </strong>{{$document->motherNationality->nationality}}</span>
                        <br />
                        <span><strong class="mx-2">बच्चाको वजन: </strong>
                            {{Helper::convertEngNumToNepali($document->weight)}}</span>
                        <span><strong class="mx-2">Weight of baby: </strong>{{$document->weight}}</span>
                        {{-- <div class="bs">
                            <span><strong class="mx-2">वि.सं.: </strong> 876543</span>
                            <span><strong class="mx-2">B.S: </strong>876543</span>
                            <br />
                        </div> --}}
                    </div>
                </div>
            </div>
            <footer id="footer">
                <div class="record">
                    <hr />
                    <p class="">अभिलेख साखा</p>
                    <p class="record_Section">Record Section</p>
                </div>
                <div class="director">
                    <hr />
                    <p class="">निर्देशक</p>
                    <p class="record_Section">Director</p>
                </div>
            </footer>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script>
    $(document).ready(function() {
        $('#print').click(function(e) {
            var divToPrint = document.getElementById('birth_certificate');
                    var newWin = window.open('', 'Print-Window');
                    newWin.document.open();
                    newWin.document.write(`<html><head><link rel="stylesheet" type="text/css" href="{{asset('css/birthcertificate.css')}}"></head><body onload="window.print()">` + divToPrint.innerHTML +
                        `</body></html>`);
                    newWin.document.close();
                    setTimeout(function() {
                        newWin.close();
                    }, 1000);
        })
    })
</script>
@endsection