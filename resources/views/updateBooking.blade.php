<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 16px;
            color: #777;
            margin-bottom: 20px;
        }
          /* Calendar Header */
.calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #000;
    color: white;
    border-radius: 20px;
}
.calendar-body {
          display: grid;
            grid-template-columns: repeat(7, 1fr);
            padding: 10px;
            border: 1px solid #000;
        border-radius: 20px;        }
.calendar-header button {
    background: none;
    border: none;
    color: white;
    font-size: 20px;
    cursor: pointer;
}

/* Calendar Days */
.calendar-day {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    margin: 2px;
    border-radius: 50%;
    cursor: pointer;
    border: 1px solid transparent;
    transition: background-color 0.3s, color 0.3s;
}

.calendar-day.selected,
.calendar-day:hover {
    background-color: #333;
    color: white;
    border-color: #333;
   }

   .timepicker {
            grid-column: 2;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .timepicker div {
            margin-top: 20px;
            width: 100px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #000;
            border-radius: 20px;
            cursor: pointer;
        }
     .timepicker div:hover,
     .timepicker div.selected {
       background-color: #333;
       color: white;
    }

.highlight {
    background-color: #e0e0e0;
    color: #666;
    cursor: not-allowed;
}

/* Disabled Styles */
.disabled {
    background-color: #f5f5f5;
    color: #b0b0b0;
    cursor: not-allowed;
}

.show-all {
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.show-all:hover {
    background-color: #444;
}



      
        .calendar-day.outside {
            color: #ccc;
        }

        .calendar-weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
           color: #000;
            padding: 10px;
            font-weight: bold;
            
        }

        .calendar-weekdays div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .booking-info {
            grid-column: 3 / 4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: -200px;
        }

        .booking-info span {
            display: block;
            margin-bottom: 5px;
        }

        
        .design-placeholder{
            grid-column: 2 / 3;
            display: inline;
            flex-direction: column;
            justify-content: center;
            margin-top: -100px;
        }

      

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            margin-top: 10px;
        }
        

        .button.disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: #fff;
            border-bottom: 1px solid #ccc;
            position: relative;
        }
      
        .center-content {
            text-align: center;
            flex-grow: 1;
        }

        .logo h1 {
            font-size: 36px;
            line-height: 1.2;
            margin: 0;
        }

        .logo p {
            font-size: 14px;
            margin: 0;
            color: #666;
            letter-spacing: 1px;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 20px 0 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .nav-links li a {
            text-decoration: none;
            color: #000;
            font-size: 16px;
            font-weight: 400;
        }

        .header-icons {
            position: absolute;
            right: 40px;
            display: flex;
            margin-right: -120px;
            align-items: center;
            gap: 20px;
        }

        .header-icons a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #000;
            font-size: 16px;
        }

        .header-icons img {
            width: 24px;
            height: 24px;
            margin-right: 5px;
        }

        .header-icons span {
            font-weight: 400;
        }
        .form-container {
    display: flex;
    width: 350px;
    margin: 0 ;
    font-family: Arial, sans-serif;
    padding: 20px;
    background-color: #fff;

}

.line-1  {
    width: 2px;
    background-color: #000;
    margin-right: 20px;
}

.form-content {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.container-19 {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.naam,
.emailadres,
.telefoonnummer {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
}

.container-13 {
    display: flex;
    gap: 10px;
}

.rectangle-12,
.rectangle-17,
.rectangle-13,
.rectangle-14 {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 20px;
    box-sizing: border-box;
}

.rectangle-12,
.rectangle-17 {
    flex: 1;
}

.container-20 {
    display: flex;
    gap: 10px;
    align-items: center;
}



.container-11 {
    font-weight: bold;
}

.container-7 {
    text-align: right;
    margin-top: 20px;
}

.volgende {
    background-color: #000;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-size: 16px;
}

.volgende:hover {
    background-color: #333;
}
select{
    width: 100px;
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 20px;            
          
        }
        .delete{

        }
      
        .logo img{
            width: 180px;
            height: 150px;
        }

/* For devices with a max width of 480px */
@media (max-width: 480px) {
    .container {
        grid-template-columns: 1fr; /* Single column layout */
    }

    .calendar-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .calendar-body,
    .calendar-weekdays {
        grid-template-columns: repeat(2, 1fr); /* Adjust grid for smaller screens */
    }

    .button {
        padding: 10px;
        font-size: 14px;
    }

    .form-container {
        padding: 10px;
    }
}

/* For devices with a max width of 768px */
@media (max-width: 768px) {
    .container {
        grid-template-columns: 1fr 1fr; /* Two columns layout */
    }

    .calendar-header {
        flex-direction: column;
        align-items: center;
    }

    .calendar-body,
    .calendar-weekdays {
        grid-template-columns: repeat(4, 1fr); /* Adjust grid for tablets */
    }

    .button {
        padding: 12px 24px;
        font-size: 16px;
    }

    .form-container {
        padding: 15px;
    }
}

    </style>

</head>

<body>
    <header>
        <div class="header-container">
            <div class="center-content">
                <div class="logo">
                    <img width="120px" height="100px"  src="{{ asset('assets/images/logo-06 (1).jpg') }}" alt="">

                    <p>HAIR, BEAUTY & BARBERSHOP</p>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="calendar">
            <div class="calendar-header">
                <button id="prevMonth">&lt;</button>
                <div id="currentMonth">Augustus 2024</div>
                <button id="nextMonth">&gt;</button>
            </div>
            <div class="calendar-weekdays">
                <div>Ma</div>
                <div>Di</div>
                <div>Wo</div>
                <div>Do</div>
                <div>Vr</div>
                <div>Za</div>
                <div>Zo</div>
            </div>
            <div class="calendar-body" id="calendarBody">
                <!-- Calendar days will be populated here -->
            </div>
        </div>
   
        <div class="timepicker" id="timepicker">
            <!-- Time slots will be populated here -->
        </div>
        <div class="design-placeholder" id="design_placeholder">
            <span><strong id="placeholder-date"></strong></span>
            <span>Niet beschikbaar</span>
            <button class="button">Eerst beschikbare datum</button>
        </div>
   
        
        <div class="form-container">
            <div class="line-1"></div>
           
            <form id="bookingForm" action="{{route('booking.show',$booking->id)}}" method="PUT">
                @csrf
                <input type="hidden" name="selected_date" id="hidden-date">
                 <input type="hidden" name="selected_time" id="hidden-time">
                 <input type="hidden" name="service_name" value="{{$booking->service_name}}">
                 <input type="hidden" name="service_price" value="{{$booking->service_price}}">
                 <input type="hidden" name="service_currency" value="{{$booking->service_currency}}">
                <div class="form-content">
                    <div class="container-19">
                        <div class="naam">Naam</div>
                        <div class="container-13">
                            <input type="first_name" name="first_name" class="rectangle-12" placeholder="Voornaam" required value="{{$booking->first_name}}">
                            <input type="last_name" name="last_name" class="rectangle-17" placeholder="Achternaam" required value="{{$booking->last_name}}">
                        </div>
                        <div class="emailadres">E-mailadres</div>
                        <input type="email" name="email" class="rectangle-13" placeholder="E-mailadres" required value="{{$booking->email}}">
                        <div class="telefoonnummer">Telefoonnummer</div>
                        <div class="container-20">
                            <div class="country-code">
                                    <select id="code" name="code" required>
                                            <option value="+1">+1 (United States)</option>
                                            <option value="+7">+7 (Russia)</option>
                                            <option value="+20">+20 (Egypt)</option>
                                            <option value="+27">+27 (South Africa)</option>
                                            <option value="+30">+30 (Greece)</option>
                                            <option value="+31">+31 (Netherlands)</option>
                                            <option value="+32">+32 (Belgium)</option>
                                            <option value="+33">+33 (France)</option>
                                            <option value="+34">+34 (Spain)</option>
                                            <option value="+39">+39 (Italy)</option>
                                            <option value="+44">+44 (United Kingdom)</option>
                                            <option value="+49">+49 (Germany)</option>
                                            <option value="+52">+52 (Mexico)</option>
                                            <option value="+55">+55 (Brazil)</option>
                                            <option value="+61">+61 (Australia)</option>
                                            <option value="+62">+62 (Indonesia)</option>
                                            <option value="+64">+64 (New Zealand)</option>
                                            <option value="+65">+65 (Singapore)</option>
                                            <option value="+81">+81 (Japan)</option>
                                            <option value="+82">+82 (South Korea)</option>
                                            <option value="+86">+86 (China)</option>
                                            <option value="+91">+91 (India)</option>
                                            <option value="+92">+92 (Pakistan)</option>
                                            <option value="+93">+93 (Afghanistan)</option>
                                            <option value="+94">+94 (Sri Lanka)</option>
                                            <option value="+95">+95 (Myanmar)</option>
                                            <option value="+98">+98 (Iran)</option>
                                            <option value="+211">+211 (South Sudan)</option>
                                            <option value="+212">+212 (Morocco)</option>
                                            <option value="+213">+213 (Algeria)</option>
                                            <option value="+216">+216 (Tunisia)</option>
                                            <option value="+218">+218 (Libya)</option>
                                            <option value="+220">+220 (Gambia)</option>
                                            <option value="+221">+221 (Senegal)</option>
                                            <option value="+222">+222 (Mauritania)</option>
                                            <option value="+223">+223 (Mali)</option>
                                            <option value="+224">+224 (Guinea)</option>
                                            <option value="+225">+225 (Ivory Coast)</option>
                                            <option value="+226">+226 (Burkina Faso)</option>
                                            <option value="+227">+227 (Niger)</option>
                                            <option value="+228">+228 (Togo)</option>
                                            <option value="+229">+229 (Benin)</option>
                                            <option value="+230">+230 (Mauritius)</option>
                                            <option value="+231">+231 (Liberia)</option>
                                            <option value="+232">+232 (Sierra Leone)</option>
                                            <option value="+233">+233 (Ghana)</option>
                                            <option value="+234">+234 (Nigeria)</option>
                                            <option value="+235">+235 (Chad)</option>
                                            <option value="+236">+236 (Central African Republic)</option>
                                            <option value="+237">+237 (Cameroon)</option>
                                            <option value="+238">+238 (Cape Verde)</option>
                                            <option value="+239">+239 (São Tomé and Príncipe)</option>
                                            <option value="+240">+240 (Equatorial Guinea)</option>
                                            <option value="+241">+241 (Gabon)</option>
                                            <option value="+242">+242 (Republic of the Congo)</option>
                                            <option value="+243">+243 (Democratic Republic of the Congo)</option>
                                            <option value="+244">+244 (Angola)</option>
                                            <option value="+245">+245 (Guinea-Bissau)</option>
                                            <option value="+246">+246 (British Indian Ocean Territory)</option>
                                            <option value="+248">+248 (Seychelles)</option>
                                            <option value="+249">+249 (Sudan)</option>
                                            <option value="+250">+250 (Rwanda)</option>
                                            <option value="+251">+251 (Ethiopia)</option>
                                            <option value="+252">+252 (Somalia)</option>
                                            <option value="+253">+253 (Djibouti)</option>
                                            <option value="+254">+254 (Kenya)</option>
                                            <option value="+255">+255 (Tanzania)</option>
                                            <option value="+256">+256 (Uganda)</option>
                                            <option value="+257">+257 (Burundi)</option>
                                            <option value="+258">+258 (Mozambique)</option>
                                            <option value="+260">+260 (Zambia)</option>
                                            <option value="+261">+261 (Madagascar)</option>
                                            <option value="+262">+262 (Réunion)</option>
                                            <option value="+263">+263 (Zimbabwe)</option>
                                            <option value="+264">+264 (Namibia)</option>
                                            <option value="+265">+265 (Malawi)</option>
                                            <option value="+266">+266 (Lesotho)</option>
                                            <option value="+267">+267 (Botswana)</option>
                                            <option value="+268">+268 (Eswatini)</option>
                                            <option value="+269">+269 (Comoros)</option>
                                            <option value="+290">+290 (Saint Helena)</option>
                                            <option value="+291">+291 (Eritrea)</option>
                                            <option value="+297">+297 (Aruba)</option>
                                            <option value="+298">+298 (Faroe Islands)</option>
                                            <option value="+299">+299 (Greenland)</option>
                                            <option value="+350">+350 (Gibraltar)</option>
                                            <option value="+351">+351 (Portugal)</option>
                                            <option value="+352">+352 (Luxembourg)</option>
                                            <option value="+353">+353 (Ireland)</option>
                                            <option value="+354">+354 (Iceland)</option>
                                            <option value="+355">+355 (Albania)</option>
                                            <option value="+356">+356 (Malta)</option>
                                            <option value="+357">+357 (Cyprus)</option>
                                            <option value="+358">+358 (Finland)</option>
                                            <option value="+359">+359 (Bulgaria)</option>
                                            <option value="+370">+370 (Lithuania)</option>
                                            <option value="+371">+371 (Latvia)</option>
                                            <option value="+372">+372 (Estonia)</option>
                                            <option value="+373">+373 (Moldova)</option>
                                            <option value="+374">+374 (Armenia)</option>
                                            <option value="+375">+375 (Belarus)</option>
                                            <option value="+376">+376 (Andorra)</option>
                                            <option value="+377">+377 (Monaco)</option>
                                            <option value="+378">+378 (San Marino)</option>
                                            <option value="+380">+380 (Ukraine)</option>
                                            <option value="+381">+381 (Serbia)</option>
                                            <option value="+382">+382 (Montenegro)</option>
                                            <option value="+383">+383 (Kosovo)</option>
                                            <option value="+385">+385 (Croatia)</option>
                                            <option value="+386">+386 (Slovenia)</option>
                                            <option value="+387">+387 (Bosnia and Herzegovina)</option>
                                            <option value="+389">+389 (North Macedonia)</option>
                                            <option value="+420">+420 (Czech Republic)</option>
                                            <option value="+421">+421 (Slovakia)</option>
                                            <option value="+423">+423 (Liechtenstein)</option>
                                            <option value="+500">+500 (Falkland Islands)</option>
                                            <option value="+501">+501 (Belize)</option>
                                            <option value="+502">+502 (Guatemala)</option>
                                            <option value="+503">+503 (El Salvador)</option>
                                            <option value="+504">+504 (Honduras)</option>
                                            <option value="+505">+505 (Nicaragua)</option>
                                            <option value="+506">+506 (Costa Rica)</option>
                                            <option value="+507">+507 (Panama)</option>
                                            <option value="+508">+508 (Saint Pierre and Miquelon)</option>
                                            <option value="+509">+509 (Haiti)</option>
                                            <option value="+590">+590 (Guadeloupe)</option>
                                            <option value="+591">+591 (Bolivia)</option>
                                            <option value="+592">+592 (Guyana)</option>
                                            <option value="+593">+593 (Ecuador)</option>
                                            <option value="+594">+594 (French Guiana)</option>
                                            <option value="+595">+595 (Paraguay)</option>
                                            <option value="+596">+596 (Martinique)</option>
                                            <option value="+597">+597 (Suriname)</option>
                                            <option value="+598">+598 (Uruguay)</option>
                                            <option value="+599">+599 (Curaçao)</option>
                                            <option value="+670">+670 (East Timor)</option>
                                            <option value="+672">+672 (Norfolk Island)</option>
                                            <option value="+673">+673 (Brunei)</option>
                                            <option value="+674">+674 (Nauru)</option>
                                            <option value="+675">+675 (Papua New Guinea)</option>
                                            <option value="+676">+676 (Tonga)</option>
                                            <option value="+677">+677 (Solomon Islands)</option>
                                            <option value="+678">+678 (Vanuatu)</option>
                                            <option value="+679">+679 (Fiji)</option>
                                            <option value="+680">+680 (Palau)</option>
                                            <option value="+681">+681 (Wallis and Futuna)</option>
                                            <option value="+682">+682 (Cook Islands)</option>
                                            <option value="+683">+683 (Niue)</option>
                                            <option value="+685">+685 (Samoa)</option>
                                            <option value="+686">+686 (Kiribati)</option>
                                            <option value="+687">+687 (New Caledonia)</option>
                                            <option value="+688">+688 (Tuvalu)</option>
                                            <option value="+689">+689 (French Polynesia)</option>
                                            <option value="+690">+690 (Tokelau)</option>
                                            <option value="+691">+691 (Micronesia)</option>
                                            <option value="+692">+692 (Marshall Islands)</option>
                                            <option value="+850">+850 (North Korea)</option>
                                            <option value="+852">+852 (Hong Kong)</option>
                                            <option value="+853">+853 (Macau)</option>
                                            <option value="+855">+855 (Cambodia)</option>
                                            <option value="+856">+856 (Laos)</option>
                                            <option value="+880">+880 (Bangladesh)</option>
                                            <option value="+886">+886 (Taiwan)</option>
                                            <option value="+960">+960 (Maldives)</option>
                                            <option value="+961">+961 (Lebanon)</option>
                                            <option value="+962">+962 (Jordan)</option>
                                            <option value="+963">+963 (Syria)</option>
                                            <option value="+964">+964 (Iraq)</option>
                                            <option value="+965">+965 (Kuwait)</option>
                                            <option value="+966">+966 (Saudi Arabia)</option>
                                            <option value="+967">+967 (Yemen)</option>
                                            <option value="+968">+968 (Oman)</option>
                                            <option value="+970">+970 (Palestine)</option>
                                            <option value="+971">+971 (United Arab Emirates)</option>
                                            <option value="+972">+972 (Israel)</option>
                                            <option value="+973">+973 (Bahrain)</option>
                                            <option value="+974">+974 (Qatar)</option>
                                            <option value="+975">+975 (Bhutan)</option>
                                            <option value="+976">+976 (Mongolia)</option>
                                            <option value="+977">+977 (Nepal)</option>
                                            <option value="+992">+992 (Tajikistan)</option>
                                            <option value="+993">+993 (Turkmenistan)</option>
                                            <option value="+994">+994 (Azerbaijan)</option>
                                            <option value="+995">+995 (Georgia)</option>
                                            <option value="+996">+996 (Kyrgyzstan)</option>
                                            <option value="+998">+998 (Uzbekistan)</option>
                                        </select>
                                        
                            </div>
                            <input type="tel" id="phone" name="phone" class="rectangle-14" placeholder="Telefoonnummer" required value="{{$booking->phone}}">
                        </div>
                    </div>
                    <div class="container-7">
                    </div>
                </div>
                <button type="submit" id="next-button" class="volgende">update</button>
               
                <a href="#" id="delete-button" class="volgende">delete</a>


            </form>
            <form id="deleteForm" action="{{route('booking.destroy',$booking->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
            </form>
        </div>
    </div>
       
        

        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>
        const calendarDays = document.getElementById('calendarBody');
    const timepicker = document.getElementById('timepicker');
    const nextButton = document.getElementById('next-button');
    const currentMonthLabel = document.getElementById('currentMonth');
    const designPlaceholder = document.getElementById('design_placeholder');
    const placeholderDateInfo = document.getElementById('placeholder-date');
    const deleteButton = document.getElementById('delete-button');

    const hiddenDate = document.getElementById('hidden-date');
    const hiddenTime = document.getElementById('hidden-time');

    // Pass days data to JavaScript
    const daysData = @json($daysDataArray);

    // Set default date and time from the booking
    let defaultDate = new Date(@json($bookingDate));
    let defaultTime = @json($bookingTime);

    // Initialize currentDate to defaultDate
    let currentDate = new Date(defaultDate.getFullYear(), defaultDate.getMonth(), defaultDate.getDate());
    function populateTimeSlots(date) {
    timepicker.innerHTML = '';

    const maxVisibleSlots = 10; // Number of slots to show initially
    let isExpanded = false; // Track if all slots are shown

    // Get the times for the selected date
    const dayTimes = daysData[date] || [];

    // Function to render time slots based on visibility
    function renderTimeSlots() {
        timepicker.innerHTML = '';

        const slotsToShow = isExpanded ? dayTimes.length : Math.min(dayTimes.length, maxVisibleSlots);

        dayTimes.slice(0, slotsToShow).forEach(({ time, status }) => {
            const slotDiv = document.createElement('div');
            slotDiv.textContent = time;
            if (status === 1) {
                if (time === defaultTime) {
                    slotDiv.classList.add('selected');
                    hiddenTime.value = slotDiv.textContent;
                }
                slotDiv.classList.add('highlight', 'disabled'); // Add custom class for highlighted slots when status is 1 and disable it
            } else {
                slotDiv.addEventListener('click', () => {
                    // Remove 'selected' class from all time slots
                    document.querySelectorAll('.timepicker div.selected').forEach(el => el.classList.remove('selected'));
                    // Add 'selected' class to the clicked time slot
                    slotDiv.classList.add('selected');

                    // Set hidden time value
                    hiddenTime.value = slotDiv.textContent; // This line sets the hidden time
                    console.log(`Selected time: ${slotDiv.textContent}`); // Debugging log
                });
                if (time === defaultTime) {
                    slotDiv.classList.add('selected');
                    hiddenTime.value = slotDiv.textContent;
                }
                // Automatically select the default time if it matches
                
            }
            timepicker.appendChild(slotDiv);
        });

        if (dayTimes.length > maxVisibleSlots) {
            const showAllButton = document.createElement('button');
            showAllButton.classList.add('show-all');
            showAllButton.textContent = isExpanded ? 'Show Less' : 'Show All';
            showAllButton.addEventListener('click', () => {
                isExpanded = !isExpanded;
                renderTimeSlots();
            });
            timepicker.appendChild(showAllButton);
        }
    }

    renderTimeSlots();
}

// Function to update the calendar and add event listeners to each day
function updateCalendar() {
    calendarDays.innerHTML = '';
    currentMonthLabel.textContent = currentDate.toLocaleDateString('nl-NL', {
        month: 'long',
        year: 'numeric'
    });

    const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
    const lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

    // Start day of the week (0 for Sunday, 1 for Monday, etc.)
    const startDay = (firstDayOfMonth.getDay() + 6) % 7; // Adjusting to start week on Monday

    // Populate previous month's trailing days
    for (let i = 0; i < startDay; i++) {
        const emptyDiv = document.createElement('div');
        emptyDiv.className = 'calendar-day outside';
        calendarDays.appendChild(emptyDiv);
    }

    // Populate current month's days
    for (let day = 1; day <= lastDayOfMonth.getDate(); day++) {
        const dayDiv = document.createElement('div');
        dayDiv.className = 'calendar-day';
        dayDiv.textContent = day;

        // Use local date instead of UTC to avoid off-by-one errors
        const date = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
        const dateString = date.toLocaleDateString('en-CA'); // Format as "YYYY-MM-DD"

        // Check if all times for this day have status == 1
        const dayTimes = daysData[dateString] || [];
        const allDisabled = dayTimes.every(timeSlot => timeSlot.status === 1);
       // Adjusted weekend check for Saturday (6) and Sunday (0)

        if (allDisabled ) {
            dayDiv.classList.add('disabled'); // Add custom class for days that are completely disabled
        } else if (date.getDay() !== 0 && date.getDay() !== 6) { // Adjusted for Saturday (6) and Sunday (0)
            const pointMarker = document.createElement('div');
            pointMarker.className = 'point';
            dayDiv.appendChild(pointMarker);
        }

        dayDiv.setAttribute('data-date', dateString);
        dayDiv.addEventListener('click', () => {
            selectDate(dayDiv, allDisabled);
        });
        calendarDays.appendChild(dayDiv);

        // Automatically select the default date if it matches the current day being processed
        if (date.toDateString() === defaultDate.toDateString() && !allDisabled) {
            selectDate(dayDiv, allDisabled);
        }
    }
}

// Function to handle selecting a date
function selectDate(dayDiv, isDisabledDay) {
    if (!isDisabledDay && dayDiv.querySelector('.point')) {
        // If it has a point and is not disabled, show timepicker and hide design-placeholder
        const date = dayDiv.getAttribute('data-date');

        // Update hiddenDate with the selected day
        hiddenDate.value = date; // Directly set the date string

        hiddenTime.value = ''; // Clear hidden time value
        populateTimeSlots(date);

        document.querySelector('.calendar-day.selected')?.classList.remove('selected');
        dayDiv.classList.add('selected');

        // Hide design-placeholder and show timepicker
        designPlaceholder.style.display = 'none';
        timepicker.style.display = 'flex';
    } else {
        const date = dayDiv.getAttribute('data-date');
        const dateString = new Date(date).toLocaleDateString('nl-NL', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        placeholderDateInfo.textContent = `${dateString}`;

        document.querySelector('.calendar-day.selected')?.classList.remove('selected');
        dayDiv.classList.add('selected');
        // If it doesn't have a point, show design-placeholder and hide timepicker
        designPlaceholder.style.display = 'flex';
        timepicker.style.display = 'none';
    }
}

    
document.getElementById('prevMonth').addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    updateCalendar();
});
    document.getElementById('nextMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateCalendar();
    });
 deleteButton.addEventListener('click', (e) => {
     document.getElementById('deleteForm').submit();
     });
            
     updateCalendar();
            </script>
            
        
</body>

</html>
