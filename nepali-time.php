 <div id="time">

        <!-- PRINTING NEPALI DATE AND TIME -->

        <span style="font-size:12px;color:#fff" class="time_date">
        <?php 
        $timezone = "Asia/Kathmandu";
        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
        echo date('l F j, Y');?>  &nbsp;| &nbsp; <script type='text/javascript'>var __ndq = __ndq || {format:'W, M D, Y',color:'#fff'};var __sn = document.getElementsByTagName('script'); __sn = __sn[__sn.length-1];(function() {var __nd = document.createElement('script'); __nd.type = 'text/javascript'; __nd.async = true; __nd.src = ('http://') + 'goodies.softnep.com/nepali_date/nep.date.js'; __sn.parentNode.insertBefore(__nd, __sn);})();</script>&nbsp;&nbsp; समय <span id="sn_nepalitime"></span></span>
        <script type="text/javascript">
        var currenttime = "<?php echo date('M-d,Y h:i:s');?>"; <!--"November 20, 2013 13:19:32"-->
        var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")
        var numbers = Array("&#2406;", "&#2407;", "&#2408;", "&#2409;", "&#2410;", "&#2411;", "&#2412;", "&#2413;", "&#2414;", "&#2415;");
        var currenttime = Date(currenttime); 
        var serverdate = new Date(currenttime);
        function padlength(what) {
            var output = (what.toString().length == 1) ? "0" + what : what
            return output
        }
        function displaytime() {
            //alert(currenttime);
            serverdate.setSeconds(serverdate.getSeconds() + 1)
            var datestring = montharray[serverdate.getMonth()] + " " + padlength(serverdate.getDate()) + ", " + serverdate.getFullYear()


            hr=padlength(serverdate.getHours());
            mi=padlength(serverdate.getMinutes()) ;
            se=padlength(serverdate.getSeconds());
            dd="AM";
               if (hr >= 12) {
                hr = hr-12;
                dd = "PM";
            }
            if (hr == 0) {
                hr = 12;
            }
            var timestring = hr + ":" + mi + ":" + se +" "+ dd;
                var arr = timestring.split("");
                for (i = 0; i < (arr.length-3); i++) {
                    if (arr[i] != ":") {
                        arr[i] = numbers[arr[i]];
                    } 
                }
                timestring = arr.join("");
                timestring = timestring.replace("AM","बिहान");       
         timestring = timestring.replace("PM","मध्यान्न");
                document.getElementById("sn_nepalitime").innerHTML = " " + timestring;

            setTimeout('displaytime()',1000);
        }
        displaytime();
        </script>


        <!-- END OF NEPALI DATE AND TIME -->
</div>