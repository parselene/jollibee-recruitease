
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Interview Invitation | RecruitEase</title>
</head>

<body style="margin:0; padding:0; background-color:#FFF9F0;
             font-family:Arial, Helvetica, sans-serif; color:#302B2B;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0"
           style="background-color:#FFF9F0; padding:35px 15px;">
        <tr>
            <td align="center">

                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                       style="max-width:620px; background:#FFFFFF;
                              border-radius:14px; overflow:hidden;
                              border:1px solid #F0E5DC;">

                    <!-- HEADER -->
                    <tr>
                        <td align="center"
                            style="background-color:#D71920; padding:32px 25px;">

                            <h1 style="margin:0; color:#FFFFFF;
                                       font-size:30px; font-weight:800;
                                       letter-spacing:-1px;">
                                RecruitEase
                            </h1>

                            <div style="width:45px; height:4px;
                                        background:#FFC72C; margin:15px auto;">
                            </div>

                            <p style="margin:0; color:#FFC72C;
                                      font-size:12px; font-weight:bold;
                                      letter-spacing:2px;">
                                INTERVIEW INVITATION
                            </p>
                        </td>
                    </tr>

                    <!-- MAIN CONTENT -->
                    <tr>
                        <td style="padding:35px 35px 25px;">

                            <p style="margin:0 0 12px; color:#D71920;
                                      font-size:12px; font-weight:bold;
                                      letter-spacing:1px;">
                                YOU'VE BEEN SHORTLISTED!
                            </p>

                            <h2 style="margin:0 0 20px; color:#302B2B;
                                       font-size:26px; line-height:1.3;">
                                Congratulations,
                                {{ $interviewSchedule->application->applicant->full_name }}!
                            </h2>

                            <p style="font-size:15px; line-height:1.8;
                                      color:#625B57; margin:0 0 16px;">
                                We are pleased to inform you that your
                                application has been shortlisted. You are
                                invited to participate in an interview as
                                the next step of our recruitment process.
                            </p>

                            <p style="font-size:15px; line-height:1.8;
                                      color:#625B57; margin:0 0 25px;">
                                Please review your interview details below
                                and make the necessary preparations.
                            </p>

                            <!-- INTERVIEW DETAILS -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                   border="0"
                                   style="background:#FFF9F0;
                                          border:1px solid #F0E5DC;
                                          border-radius:10px;">

                                <tr>
                                    <td style="padding:20px 22px 12px;">

                                        <h3 style="margin:0; color:#D71920;
                                                   font-size:16px;">
                                            Interview Details
                                        </h3>

                                        <div style="height:3px; width:40px;
                                                    background:#FFC72C;
                                                    margin-top:10px;">
                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:8px 22px 20px;">

                                        <p style="margin:12px 0 4px;
                                                  color:#8C8580;
                                                  font-size:11px;
                                                  font-weight:bold;
                                                  letter-spacing:1px;">
                                            POSITION
                                        </p>

                                        <p style="margin:0; color:#302B2B;
                                                  font-size:16px;
                                                  font-weight:bold;">
                                            {{ $interviewSchedule->application->jobPosition->title }}
                                        </p>

                                        <p style="margin:18px 0 4px;
                                                  color:#8C8580;
                                                  font-size:11px;
                                                  font-weight:bold;
                                                  letter-spacing:1px;">
                                            DATE
                                        </p>

                                        <p style="margin:0; color:#302B2B;
                                                  font-size:15px;">
                                            {{ $interviewSchedule->scheduled_at->format('l, F d, Y') }}
                                        </p>

                                        <p style="margin:18px 0 4px;
                                                  color:#8C8580;
                                                  font-size:11px;
                                                  font-weight:bold;
                                                  letter-spacing:1px;">
                                            TIME
                                        </p>

                                        <p style="margin:0; color:#302B2B;
                                                  font-size:15px;">
                                            {{ $interviewSchedule->scheduled_at->format('h:i A') }}
                                        </p>

                                        @if($interviewSchedule->location)
                                            <p style="margin:18px 0 4px;
                                                      color:#8C8580;
                                                      font-size:11px;
                                                      font-weight:bold;
                                                      letter-spacing:1px;">
                                                LOCATION
                                            </p>

                                            <p style="margin:0; color:#302B2B;
                                                      font-size:15px;">
                                                {{ $interviewSchedule->location }}
                                            </p>
                                        @endif

                                    </td>
                                </tr>
                            </table>

                            <!-- MEETING LINK -->
                            @if($interviewSchedule->meeting_link)
                                <table width="100%" cellpadding="0"
                                       cellspacing="0" border="0"
                                       style="margin-top:22px;">
                                    <tr>
                                        <td align="center"
                                            style="padding:20px;
                                                   background:#FFFFFF;
                                                   border:1px solid #F0E5DC;
                                                   border-radius:10px;">

                                            <p style="margin:0 0 15px;
                                                      font-size:14px;
                                                      color:#625B57;">
                                                Your interview will be conducted
                                                online. Join using the button below.
                                            </p>

                                            <a href="{{ $interviewSchedule->meeting_link }}"
                                               style="display:inline-block;
                                                      background:#D71920;
                                                      color:#FFFFFF;
                                                      text-decoration:none;
                                                      padding:13px 25px;
                                                      border-radius:6px;
                                                      font-size:14px;
                                                      font-weight:bold;">
                                                Join Interview
                                            </a>

                                        </td>
                                    </tr>
                                </table>
                            @endif

                            <!-- INSTRUCTIONS -->
                            @if($interviewSchedule->instructions)
                                <div style="margin-top:22px;
                                            padding:18px 20px;
                                            border-left:4px solid #FFC72C;
                                            background:#FFFCF5;">

                                    <p style="margin:0 0 8px;
                                              color:#302B2B;
                                              font-size:14px;
                                              font-weight:bold;">
                                        Important Instructions
                                    </p>

                                    <p style="margin:0; color:#625B57;
                                              font-size:14px; line-height:1.8;">
                                        {{ $interviewSchedule->instructions }}
                                    </p>

                                </div>
                            @endif

                            <!-- REMINDER -->
                            <p style="margin:28px 0 0; color:#625B57;
                                      font-size:14px; line-height:1.8;">
                                We encourage you to arrive or join a few
                                minutes before your scheduled interview.
                                Please ensure that you are prepared and
                                have everything you need.
                            </p>

                            <p style="margin:22px 0 0; color:#302B2B;
                                      font-size:14px; line-height:1.8;">
                                We look forward to meeting you!
                            </p>

                            <p style="margin:22px 0 0; color:#625B57;
                                      font-size:14px; line-height:1.8;">
                                Best regards,<br>
                                <strong style="color:#D71920;">
                                    RecruitEase Recruitment Team
                                </strong>
                            </p>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td align="center"
                            style="background:#FFF9F0;
                                   border-top:1px solid #F0E5DC;
                                   padding:22px 25px;">

                            <p style="margin:0 0 7px; color:#D71920;
                                      font-size:14px; font-weight:bold;">
                                RecruitEase
                            </p>

                            <p style="margin:0; color:#8C8580;
                                      font-size:11px; line-height:1.7;">
                                Intelligent Recruitment. Better Opportunities.
                            </p>

                            <p style="margin:12px 0 0; color:#A49C96;
                                      font-size:11px;">
                                © {{ date('Y') }} RecruitEase. All rights reserved.
                            </p>

                            <p style="margin:8px 0 0; color:#A49C96;
                                      font-size:10px;">
                                This is an automated interview notification.
                                Please do not reply directly to this email.
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>