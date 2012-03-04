<div class="geolocations index">
	<h2><?php __('Geolocations');?></h2>
	<article>
	   
	    <address>
	        <h3>Your current location is <?php echo $userInfo['Geolocation']['city']  ?>, <?php echo $userInfo['Geolocation']['country_name']  ?> </h3>
	    </address>
	    <figure>
	        <img src="<?php echo $userInfo['current_observation']['image']['url'] ?>"/>
	    </figure>
        <h4>Current Temperature: <?php echo $userInfo['current_observation']['temperature_string']?>  <?php echo $userInfo['current_observation']['observation_time']?></h4>
	        
	    
	    
	</article>
	
</div>
<?php

/*
 * Array
(
    [Geolocation] => Array
        (
            [type] => CITY
            [country] => US
            [country_iso3166] => US
            [country_name] => USA
            [state] => MD
            [city] => Laurel
            [tz_short] => EST
            [tz_long] => America/New_York
            [lat] => 39.10079956
            [lon] => -76.88269806
            [zip] => 20707
            [magic] => 1
            [wmo] => 99999
            [l] => /q/zmw:20707.1.99999
            [requesturl] => US/MD/Laurel.html
            [wuiurl] => http://www.wunderground.com/US/MD/Laurel.html
        )

    [stations] => Array
        (
            [airport] => Array
                (
                    [station] => Array
                        (
                            [0] => Array
                                (
                                    [city] => Fort Meade
                                    [state] => MD
                                    [country] => US
                                    [icao] => KFME
                                    [lat] => 39.09000015
                                    [lon] => -76.76000214
                                )

                            [1] => Array
                                (
                                    [city] => College Park
                                    [state] => MD
                                    [country] => US
                                    [icao] => KCGS
                                    [lat] => 38.97999954
                                    [lon] => -76.91999817
                                )

                            [2] => Array
                                (
                                    [city] => Baltimore
                                    [state] => MD
                                    [country] => US
                                    [icao] => KBWI
                                    [lat] => 39.18000031
                                    [lon] => -76.66999817
                                )

                            [3] => Array
                                (
                                    [city] => Gaithersburg
                                    [state] => MD
                                    [country] => US
                                    [icao] => KGAI
                                    [lat] => 39.16999817
                                    [lon] => -77.16999817
                                )

                        )

                )

            [pws] => Array
                (
                    [station] => Array
                        (
                            [0] => Array
                                (
                                    [neighborhood] => Emerson Community
                                    [city] => Laurel
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDLAURE6
                                    [distance_km] => 4
                                    [distance_mi] => 2
                                )

                            [1] => Array
                                (
                                    [neighborhood] => Beaufort Park
                                    [city] => Fulton
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDFULTO2
                                    [distance_km] => 7
                                    [distance_mi] => 4
                                )

                            [2] => Array
                                (
                                    [neighborhood] => Kings Contrivance Village, Dickinson Neighborhood
                                    [city] => Columbia
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDCOLUM16
                                    [distance_km] => 7
                                    [distance_mi] => 4
                                )

                            [3] => Array
                                (
                                    [neighborhood] => Snowden Pond at Montpelier
                                    [city] => Laurel
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDLAURE5
                                    [distance_km] => 7
                                    [distance_mi] => 4
                                )

                            [4] => Array
                                (
                                    [neighborhood] => High Point Homes
                                    [city] => Beltsville
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDBELTS1
                                    [distance_km] => 8
                                    [distance_mi] => 4
                                )

                            [5] => Array
                                (
                                    [neighborhood] => Heritage Woods
                                    [city] => Jessup
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDJESSU3
                                    [distance_km] => 8
                                    [distance_mi] => 5
                                )

                            [6] => Array
                                (
                                    [neighborhood] => APRSWXNET Columbia MD US
                                    [city] => Columbia
                                    [state] => MD
                                    [country] => US
                                    [id] => MAT657
                                    [distance_km] => 9
                                    [distance_mi] => 5
                                )

                            [7] => Array
                                (
                                    [neighborhood] => Boxwood Village
                                    [city] => Greenbelt
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDGREEN2
                                    [distance_km] => 9
                                    [distance_mi] => 5
                                )

                            [8] => Array
                                (
                                    [neighborhood] => Hollywood
                                    [city] => College Park
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDCOLLE6
                                    [distance_km] => 10
                                    [distance_mi] => 6
                                )

                            [9] => Array
                                (
                                    [neighborhood] => Highland
                                    [city] => Highland
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDHIGHL2
                                    [distance_km] => 11
                                    [distance_mi] => 6
                                )

                            [10] => Array
                                (
                                    [neighborhood] => MDDOT MD-175 at MD-295
                                    [city] => Annapolis Junction
                                    [state] => MD
                                    [country] => US
                                    [id] => MMD031
                                    [distance_km] => 11
                                    [distance_mi] => 7
                                )

                            [11] => Array
                                (
                                    [neighborhood] => Hidden Clearing
                                    [city] => Columbia
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDCOLUM17
                                    [distance_km] => 11
                                    [distance_mi] => 7
                                )

                            [12] => Array
                                (
                                    [neighborhood] => Pheasant Ridge
                                    [city] => Columbia
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDCOLUM15
                                    [distance_km] => 12
                                    [distance_mi] => 7
                                )

                            [13] => Array
                                (
                                    [neighborhood] => DDMET Greenbelt, MD
                                    [city] => Lanham
                                    [state] => MD
                                    [country] => US
                                    [id] => MSA02
                                    [distance_km] => 12
                                    [distance_mi] => 7
                                )

                            [14] => Array
                                (
                                    [neighborhood] => Kemp Mill/Silver Spring
                                    [city] => Silver Spring
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDSILVE4
                                    [distance_km] => 12
                                    [distance_mi] => 7
                                )

                            [15] => Array
                                (
                                    [neighborhood] => Kendall Ridge
                                    [city] => Columbia
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDCOLUM3
                                    [distance_km] => 12
                                    [distance_mi] => 7
                                )

                            [16] => Array
                                (
                                    [neighborhood] => Kemp Mill
                                    [city] => Silver Spring
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDSILVE23
                                    [distance_km] => 13
                                    [distance_mi] => 7
                                )

                            [17] => Array
                                (
                                    [neighborhood] => Dorchester
                                    [city] => Hanover
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDHANOV2
                                    [distance_km] => 13
                                    [distance_mi] => 8
                                )

                            [18] => Array
                                (
                                    [neighborhood] => Wilde Lake
                                    [city] => Columbia
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDCOLUM10
                                    [distance_km] => 13
                                    [distance_mi] => 8
                                )

                            [19] => Array
                                (
                                    [neighborhood] => Northridge
                                    [city] => Bowie
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDBOWIE2
                                    [distance_km] => 14
                                    [distance_mi] => 8
                                )

                            [20] => Array
                                (
                                    [neighborhood] => Triadelphia Reservoir
                                    [city] => Brookeville
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDBROOK3
                                    [distance_km] => 15
                                    [distance_mi] => 9
                                )

                            [21] => Array
                                (
                                    [neighborhood] => Sandy Ridge Weather
                                    [city] => Elkridge
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDELKRI1
                                    [distance_km] => 15
                                    [distance_mi] => 9
                                )

                            [22] => Array
                                (
                                    [neighborhood] => Saddlebrook West
                                    [city] => Bowie
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDBOWIE1
                                    [distance_km] => 15
                                    [distance_mi] => 9
                                )

                            [23] => Array
                                (
                                    [neighborhood] => Piney Orchard/Station
                                    [city] => Odenton
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDODENT2
                                    [distance_km] => 16
                                    [distance_mi] => 9
                                )Geolocation

                            [24] => Array
                                (
                                    [neighborhood] => Wheaton
                                    [city] => Silver Spring
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDWHEAT1
                                    [distance_km] => 16
                                    [distance_mi] => 9
                                )

                            [25] => Array
                                (
                                    [neighborhood] => Riverdale Park
                                    [city] => Riverdale
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDRIVER3
                                    [distance_km] => 16
                                    [distance_mi] => 9
                                )

                            [26] => Array
                                (
                                    [neighborhood] => Elm & Larch, SOSCA
                                    [city] => Takoma Park
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDTAKOM2
                                    [distance_km] => 16
                                    [distance_mi] => 9
                                )

                            [27] => Array
                                (
                                    [neighborhood] => 
                                    [city] => Ellicott City
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDELLIC14
                                    [distance_km] => 16
                                    [distance_mi] => 10
                                )

                            [28] => Array
                                (
                                    [neighborhood] => Stone Hill Farm
                                    [city] => Ellicott City
                                    [state] => MD
                                    [country] => US
                                    [id] => KMDELLIC12
                                    [distance_km] => 16
                                    [distance_mi] => 10
                                )

                            [29] => Array
                                (
                                    [neighborhood] => APRSWXNET Silver Spring MD US
                                    [city] => Silver Spring
                                    [state] => MD
                                    [country] => US
                                    [id] => MD9421
                                    [distance_km] => 16
                                    [distance_mi] => 10
                                )

                        )

                )

        )

    [current_observation] => Array
        (
            [image] => Array
                (
                    [url] => http://icons-ak.wxug.com/graphics/wu2/logo_130x80.png
                    [title] => Weather Underground
                    [link] => http://www.wunderground.com
                )

            [display_location] => Array
                (
                    [full] => Laurel, MD
                    [city] => Laurel
                    [state] => MD
                    [state_name] => Maryland
                    [country] => US
                    [country_iso3166] => US
                    [zip] => 20707
                    [latitude] => 39.10079956
                    [longitude] => -76.88269806
                    [elevation] => 98.00000000
                )

            [observation_location] => Array
                (
                    [full] => Emerson Community, Laurel, Maryland
                    [city] => Emerson Community, Laurel
                    [state] => Maryland
                    [country] => US
                    [country_iso3166] => US
                    [latitude] => 39.140446
                    [longitude] => -76.859924
                    [elevation] => 344 ft
                )

            [estimated] => Array
                (
                )

            [station_id] => KMDLAURE6
            [observation_time] => Last Updated on March 2, 3:48 PM EST
            [observation_time_rfc822] => Fri, 02 Mar 2012 15:48:40 -0500
            [observation_epoch] => 1330721320
            [local_time_rfc822] => Fri, 02 Mar 2012 15:48:42 -0500
            [local_epoch] => 1330721322
            [local_tz_short] => EST
            [local_tz_long] => America/New_York
            [local_tz_offset] => -0500
            [weather] => Overcast
            [temperature_string] => 50.5 F (10.3 C)
            [temp_f] => 50.5
            [temp_c] => 10.3
            [relative_humidity] => 73%
            [wind_string] => From the ESE at 11.0 MPH Gusting to 11.0 MPH
            [wind_dir] => ESE
            [wind_degrees] => 115
            [wind_mph] => 11
            [wind_gust_mph] => 11.0
            [wind_kph] => 17.7
            [wind_gust_kph] => 17.7
            [pressure_mb] => 1013.4
            [pressure_in] => 29.93
            [pressure_trend] => +
            [dewpoint_string] => 42 F (6 C)
            [dewpoint_f] => 42
            [dewpoint_c] => 6
            [heat_index_string] => NA
            [heat_index_f] => NA
            [heat_index_c] => NA
            [windchill_string] => NA
            [windchill_f] => NA
            [windchill_c] => NA
            [visibility_mi] => 10.0
            [visibility_km] => 16.1
            [solarradiation] => 46
            [UV] => 0.0
            [precip_1hr_string] => 0.00 in ( 0 mm)
            [precip_1hr_in] => 0.00
            [precip_1hr_metric] =>  0
            [precip_today_string] => 0.00 in (0 mm)
            [precip_today_in] => 0.00
            [precip_today_metric] => 0
            [icon] => cloudy
            [icon_url] => http://icons-ak.wxug.com/i/c/k/cloudy.gif
            [forecast_url] => http://www.wunderground.com/US/MD/Laurel.html
            [history_url] => http://www.wunderground.com/history/airport/KMDLAURE6/2012/3/2/DailyHistory.html
            [ob_url] => http://www.wunderground.com/cgi-bin/findweather/getForecast?query=39.140446,-76.859924
        )

    [response] => Array
        (
            [version] => 0.1
            [termsofService] => http://www.wunderground.com/weather/api/d/terms.html
            [features] => Array
                (
                    [geolookup] => 1
                    [conditions] => 1
                )

        )

)


 * 
 */
?>